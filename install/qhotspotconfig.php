global $config;
$config = parse_config(true);

// Cron Ekleme
if (!array_search("/usr/local/bin/qhotspot_check.sh", array_column($config['cron']['item'], "command"))) {
    $config['cron']['item'][] = array(
        "minute" => "*/1",
        "hour" => "*",
        "mday" => "*",
        "month" => "*",
        "wday" => "*",
        "who" => "root",
        "command" => "/usr/local/bin/qhotspot_check.sh"
    );
    write_config("QHotspot Check Cron added.");
}

// CA & Sertifika Ekleme
define('FREERADIUS_BASE', '/usr/local');
global $bash_path;
$bash_path = FREERADIUS_BASE . "/bin/bash";
define('FREERADIUS_EXAMPLES', FREERADIUS_BASE . '/share/examples/freeradius/raddb');
define('FREERADIUS_LIB', FREERADIUS_BASE . '/lib');
define('FREERADIUS_ETC', FREERADIUS_BASE . '/etc');
define('FREERADIUS_RADDB', FREERADIUS_ETC . '/raddb');
define('FREERADIUS_CERTS', FREERADIUS_RADDB . '/certs');
define('FREERADIUS_SCRIPTS', FREERADIUS_RADDB . '/scripts');
define('FREERADIUS_MODSAVAIL', FREERADIUS_RADDB . '/mods-available');
define('FREERADIUS_MODSENABLED', FREERADIUS_RADDB . '/mods-enabled');
define('FREERADIUS_SITESAVAIL', FREERADIUS_RADDB . '/sites-available');
define('FREERADIUS_SITESENABLED', FREERADIUS_RADDB . '/sites-enabled');
define('FREERADIUS_POLICYD', FREERADIUS_RADDB . '/policy.d');
define('FREERADIUS_PKGSOURCE', FREERADIUS_BASE . '/pkg');

log_error(gettext("Creating SSL Certificate for QHotspot"));
$eapconf = &$config['installedpackages']['freeradiuseapconf']['config'][0];

if (!is_array($config['ca'])) {
    $config['ca'] = array();
}
$a_ca =& $config['ca'];
if (!is_array($config['cert'])) {
    $config['cert'] = array();
}
$a_cert =& $config['cert'];

$ca = array();
$cert = array();
$ca['refid'] = uniqid();
$ca['descr'] = "QHotspot CA";
$ca['serial'] = 0;
$dn = array(
    'countryName' => 'TR',
    'stateOrProvinceName' => 'Bursa',
    'localityName' => 'Nilufer',
    'organizationName' => 'QHotspot Certificate Authority',
    'emailAddress' => 'ssl@qtechnics.net',
    'commonName' => 'qhotspot-temp-ca');
if (!ca_create($ca, "2048", "3650", $dn, "sha256")) {
    file_notice("FreeRADIUS", gettext("Cannot create temporary FreeRADIUS certificate authority. Visit Services &gt; FreeRADIUS &gt; EAP tab and configure server certificates in the 'Certificates for TLS' section: " . openssl_error_string()));
    $cert_error = true;
} else {
    $eapconf["ssl_ca_cert"] = $ca['refid'];
    $ca_cert = $ca;
    $a_ca[] = $ca;

    $cert['refid'] = uniqid();
    $cert['descr'] = "QHotspot Server Certificate";
    /* Generate server certificate against that CA */
    $dn['commonName'] = "qhotspot-temp-server";
    //$dn['subjectAltName'] = "IP:{$dn['commonName']}";
    if (!cert_create($cert, $ca['refid'], "2048", "3650", $dn, "server")) {
        file_notice("FreeRADIUS", gettext("Cannot create temporary FreeRADIUS certificate. Visit Services &gt; FreeRADIUS &gt; EAP tab and configure server certificates in the 'Certificates for TLS' section: " . openssl_error_string()));
        $cert_error = true;
    } else {
        $a_cert[] = $cert;
        $eapconf["ssl_server_cert"] = $cert['refid'];
    }

    if (($ca_cert != false) && !$cert_error) {
        if (base64_decode($ca_cert['prv'])) {
            file_put_contents(FREERADIUS_CERTS . "/ca_key.pem", base64_decode($ca_cert['prv']));
        }
        if (base64_decode($ca_cert['crt'])) {
            $crl_cert = lookup_crl($eapconf["ssl_ca_crl"]);
            if ($crl_cert != false) {
                $crl = base64_decode($crl_cert['text']);
                $check_crl = "check_crl = yes";
            } else {
                $check_crl = "check_crl = no";
            }
            file_put_contents(FREERADIUS_CERTS . "/ca_cert.pem", base64_decode($ca_cert['crt']) . "\n" . $crl);
        }
        $svr_cert = lookup_cert($eapconf["ssl_server_cert"]);
        if ($svr_cert != false) {
            if (base64_decode($svr_cert['prv'])) {
                file_put_contents(FREERADIUS_CERTS . "/server_key.pem", base64_decode($svr_cert['prv']));
            }
        }
        if (base64_decode($svr_cert['crt'])) {
            file_put_contents(FREERADIUS_CERTS . "/server_cert.pem", base64_decode($svr_cert['crt']));
        }
    }
    // Variables: EAP
    $eapconf['vareapconfdefaulteaptype'] = 'md5';
    $eapconf['vareapconftimerexpire'] = '60';
    $eapconf['vareapconfignoreunknowneaptypes'] = 'no';
    $eapconf['vareapconfciscoaccountingusernamebug'] = 'no';
    $eapconf['vareapconfmaxsessions'] = '4096';
    // Variables: EAP-TLS
    $eapconf['vareapconffragmentsize'] = '1024';
    $eapconf['vareapconfincludelength'] = 'yes';
    $eapconf['vareapconfcountry'] = 'US';
    $eapconf['vareapconfstate'] = 'Texas';
    $eapconf['vareapconfcity'] = 'Austin';
    $eapconf['vareapconforganization'] = 'My Company Ltd';
    $eapconf['vareapconfemail'] = 'admin@mycompany.com';
    $eapconf['vareapconfcommonname'] = 'internal-ca';
    // Variables: Cache
    $eapconf['vareapconfcacheenablecache'] = 'no';
    $eapconf['vareapconfcachelifetime'] = '24';
    $eapconf['vareapconfcachemaxentries'] = '255';
    // Variables OSCP
    $eapconf['vareapconfocspenable'] = 'no';
    $eapconf['vareapconfocspoverridecerturl'] = 'no';
    $eapconf['vareapconfocspurl'] = 'http://127.0.0.1/ocsp/';
    // Variables: EAP-TTLS
    $eapconf['vareapconfttlsdefaulteaptype'] = 'md5';
    $eapconf['vareapconfttlscopyrequesttotunnel'] = 'no';
    $eapconf['vareapconfttlsusetunneledreply'] = 'no';
    $eapconf['vareapconfttlsincludelength'] = 'yes';
    // Variables: EAP-PEAP with MSCHAPv2
    $eapconf['vareapconfpeapdefaulteaptype'] = 'mschapv2';
    $eapconf['vareapconfpeapcopyrequesttotunnel'] = 'no';
    $eapconf['vareapconfpeapusetunneledreply'] = 'no';
    $eapconf['vareapconfpeapsohenable'] = 'Disable';
    write_config(sprintf(gettext("Generated new self-signed HTTPS certificate (%s)"), $cert['refid']));
}


$freeradiusclients = [
    'varclientip' => $config["interfaces"]["lan"]["ipaddr"],
    'varclientipversion' => "ipaddr",
    'varclientshortname' => "QHOTSPOT",
    'varclientsharedsecret' => "qhotspot",
    'varclientproto' => "udp",
    'varclientnastype' => "other",
    'varrequiremessageauthenticator' => "no",
    'varclientmaxconnections' => 16,
    'varclientlogininput' => null,
    'varclientpasswordinput' => null,
    'description' => null,
];

$freeradiusinterfaces0 = [
    'varinterfaceip' => "*",
    'varinterfaceport' => 1812,
    'varinterfacetype' => "auth",
    'varinterfaceipversion' => "ipaddr",
    'description' => null,
];

$freeradiusinterfaces1 = [
    'varinterfaceip' => "*",
    'varinterfaceport' => 1813,
    'varinterfacetype' => "acct",
    'varinterfaceipversion' => "ipaddr",
    'description' => null,
];

$freeradiussettings = [
    "varsettingsmaxrequests" => 1024,
    "varsettingsmaxrequesttime" => 30,
    "varsettingscleanupdelay" => 5,
    "varsettingsallowcoredumps" => "no",
    "varsettingsregularexpressions" => "yes",
    "varsettingsextendedexpressions" => "yes",
    "varsettingslogdir" => "syslog",
    "varsettingsauth" => "yes",
    "varsettingsauthbadpass" => "no",
    "varsettingsauthbadpassmessage" => null,
    "varsettingsauthgoodpass" => "no",
    "varsettingsauthgoodpassmessage" => null,
    "varsettingsstrippednames" => "no",
    "varsettingshostnamelookups" => "no",
    "varsettingsmaxattributes" => 200,
    "varsettingsrejectdelay" => 1,
    "varsettingsstartservers" => 5,
    "varsettingsmaxservers" => 32,
    "varsettingsminspareservers" => 3,
    "varsettingsmaxspareservers" => 10,
    "varsettingsmaxqueuesize" => 65536,
    "varsettingsmaxrequestsperserver" => 0,
    "varsettingsmotpenable" => null,
    "varsettingsmotptimespan" => null,
    "varsettingsmotppasswordattempts" => null,
    "varsettingsmotpchecksumtype" => "md5",
    "varsettingsmotptokenlength" => null,
    "varsettingsenablemacauth" => null,
    "varsettingsenableacctunique" => null,
];

$freeradiussqlconf = [
    "varsqlconfincludeenable" => "on",
    "varsqlconfenableauthorize" => "Enable",
    "varsqlconfenableaccounting" => "Enable",
    "varsqlconfenablesession" => "Enable",
    "varsqlconfenablepostauth" => "Enable",
    "varsqlconfdatabase" => "mysql",
    "varsqlconfserver" => "localhost",
    "varsqlconfport" => 3306,
    "varsqlconflogin" => "{QH_MYSQL_USER_NAME}",
    "varsqlconfpassword" => "{QH_MYSQL_USER_PASS}",
    "varsqlconfradiusdb" => "{QH_MYSQL_DBNAME}",
    "varsqlconfaccttable1" => "radacct",
    "varsqlconfaccttable2" => "radacct",
    "varsqlconfpostauthtable" => "radpostauth",
    "varsqlconfauthchecktable" => "radcheck",
    "varsqlconfauthreplytable" => "radreply",
    "varsqlconfgroupchecktable" => "radgroupcheck",
    "varsqlconfgroupreplytable" => "radgroupreply",
    "varsqlconfusergrouptable" => "radusergroup",
    "varsqlconfreadgroups" => "yes",
    "varsqlconfdeletestalesessions" => "yes",
    "varsqlconfsqltrace" => "no",
    "varsqlconfnumsqlsocks" => 5,
    "varsqlconfconnectfailureretrydelay" => "60",
    "varsqlconflifetime" => 0,
    "varsqlconfmaxqueries" => 0,
    "varsqlconfreadclients" => "no",
    "varsqlconfnastable" => "nas",
    "varsqlconf2failover" => "redundant",
    "varsqlconf2includeenable" => null,
    "varsqlconf2enableauthorize" => "Disable",
    "varsqlconf2enableaccounting" => "Disable",
    "varsqlconf2enablesession" => "Disable",
    "varsqlconf2enablepostauth" => "Disable",
    "varsqlconf2database" => "mysql",
    "varsqlconf2server" => null,
    "varsqlconf2port" => null,
    "varsqlconf2login" => null,
    "varsqlconf2password" => null,
    "varsqlconf2radiusdb" => null,
    "varsqlconf2accttable1" => null,
    "varsqlconf2accttable2" => null,
    "varsqlconf2postauthtable" => null,
    "varsqlconf2authchecktable" => null,
    "varsqlconf2authreplytable" => null,
    "varsqlconf2groupchecktable" => null,
    "varsqlconf2groupreplytable" => null,
    "varsqlconf2usergrouptable" => null,
    "varsqlconf2readgroups" => "yes",
    "varsqlconf2deletestalesessions" => "yes",
    "varsqlconf2sqltrace" => "no",
    "varsqlconf2numsqlsocks" => null,
    "varsqlconf2connectfailureretrydelay" => null,
    "varsqlconf2lifetime" => null,
    "varsqlconf2maxqueries" => null,
    "varsqlconf2readclients" => "yes",
    "varsqlconf2nastable" => null,
];

$captiveportal = [
    "zone" => "QHOTSPOT",
    "descr" => "QHotspot Captive Portal",
    "zoneid" => 1,
    "interface" => "lan",
    "maxproc" => null,
    "timeout" => null,
    "idletimeout" => null,
    "freelogins_count" => null,
    "freelogins_resettimeout" => null,
    "enable" => null,
    "auth_method" => "radius",
    "radacct_enable" => null,
    "reauthenticateacct" => "stopstartfreeradius",
    "httpsname" => null,
    "preauthurl" => null,
    "blockedmacsurl" => null,
    "bwdefaultdn" => null,
    "bwdefaultup" => null,
    "certref" => $config["cert"][0]["refid"],
    "radius_protocol" => "PAP",
    "redirurl" => "http://www.qtechnics.net",
    "radiusip" => $config["interfaces"]["lan"]["ipaddr"],
    "radiusip2" => null,
    "radiusip3" => null,
    "radiusip4" => null,
    "radiusport" => "1812",
    "radiusport2" => null,
    "radiusport3" => null,
    "radiusport4" => null,
    "radiusacctport" => "1813",
    "radiuskey" => "qhotspot",
    "radiuskey2" => null,
    "radiuskey3" => null,
    "radiuskey4" => null,
    "radiusvendor" => "default",
    "radiussrcip_attribute" => "wan",
    "radmac_format" => "default",
    "radiusnasid" => null,
    "page" => null,
];

$testuser = [
    "sortable" => null,
    "varusersusername" => "test",
    "varuserspassword" => "test",
    "varuserspasswordencryption" => "Cleartext-Password",
    "varusersmotpenable" => null,
    "varusersmotpinitsecret" => null,
    "varusersmotppin" => null,
    "varusersmotpoffset" => null,
    "varuserswisprredirectionurl" => null,
    "varuserssimultaneousconnect" => null,
    "description" => null,
    "varusersframedipaddress" => null,
    "varusersframedipnetmask" => null,
    "varusersframedroute" => null,
    "varusersvlanid" => null,
    "varusersexpiration" => null,
    "varuserssessiontimeout" => null,
    "varuserslogintime" => null,
    "varusersamountoftime" => null,
    "varuserspointoftime" => "Daily",
    "varusersmaxtotaloctets" => null,
    "varusersmaxtotaloctetstimerange" => "daily",
    "varusersmaxbandwidthdown" => null,
    "varusersmaxbandwidthup" => null,
    "varusersacctinteriminterval" => null,
    "varuserstopadditionaloptions" => null,
    "varuserscheckitemsadditionaloptions" => null,
    "varusersreplyitemsadditionaloptions" => null,
];

$config["installedpackages"]["freeradiusclients"] =
    ["config" =>
        [
            "0" => $freeradiusclients
        ]
    ];

$config["installedpackages"]["freeradiusinterfaces"] =
    ["config" =>
        [
            "0" => $freeradiusinterfaces0,
            "1" => $freeradiusinterfaces1
        ]
    ];

$config["installedpackages"]["freeradiussettings"] =
    ["config" =>
        [
            "0" => $freeradiussettings
        ]
    ];
$config["installedpackages"]["freeradiussqlconf"] =
    ["config" =>
        [
            "0" => $freeradiussqlconf
        ]
    ];

$config["installedpackages"]["freeradius"] =
    ["config" =>
        [
            "0" => $testuser
        ]
    ];

$config["captiveportal"]["qhotspot"] = $captiveportal;

$sqlconf = <<<EOF
sql {
    database = "mysql"
	driver = "rlm_sql_\${database}"
	server = "localhost"
	port = 3306
	login = "{QH_MYSQL_USER_NAME}"
	password = "{QH_MYSQL_USER_PASS}"
	radius_db = "{QH_MYSQL_DBNAME}"
	acct_table1 = "radacct"
	acct_table2 = "radacct"
	postauth_table = "radpostauth"
	authcheck_table = "radcheck"
	authreply_table = "radreply"
	groupcheck_table = "radgroupcheck"
	groupreply_table = "radgroupreply"
	usergroup_table = "radusergroup"
	read_groups = yes
	deletestalesessions = yes
	sqltrace = yes
	sqltracefile = \${logdir}/sqltrace.sql
	num_sql_socks = 5
	connect_failure_retry_delay = 60
	lifetime = 0
	max_queries = 0
	readclients = no
	nas_table = "nas"
	\$INCLUDE sql/\${database}/dialup.conf
}

sql sql2 {
	database = "mysql"
	driver = "rlm_sql_\${database}"
	server = "localhost"
	port = 3306
	login = "radius"
	password = "radpass"
	radius_db = "radius"
	acct_table1 = "radacct"
	acct_table2 = "radacct"
	postauth_table = "radpostauth"
	authcheck_table = "radcheck"
	authreply_table = "radreply"
	groupcheck_table = "radgroupcheck"
	groupreply_table = "radgroupreply"
	usergroup_table = "radusergroup"
	read_groups = yes
	deletestalesessions = yes
	sqltrace = no
	sqltracefile = \${logdir}/sqltrace.sql
	num_sql_socks = 5
	connect_failure_retry_delay = 60
	lifetime = 0
	max_queries = 0
	readclients = yes
	nas_table = "nas"
	\$INCLUDE sql/\${database}/dialup.conf
}
EOF;
file_put_contents("/usr/local/etc/raddb/sql.conf", $sqlconf);
$eapconf = <<<EOF
Array	### EAP
	eap {
		default_eap_type = md5
		timer_expire     = 60
		ignore_unknown_eap_types = no
		cisco_accounting_username_bug = no
		max_sessions = 4096

		md5 {
		}
		leap {
		}
		gtc {
			#challenge = "Password: "
			auth_type = PAP
		}


		### EAP-TLS and EAP-TLS with OCSP support
		tls {
			certdir = \${confdir}/certs
			cadir = \${confdir}/certs
			# private_key_password =
			private_key_file = \${certdir}/server_key.pem
			certificate_file = \${certdir}/server_cert.pem
			CA_file = \${cadir}/ca_cert.pem
			dh_file = \${certdir}/dh
			random_file = \${certdir}/random
			fragment_size = 1024
			include_length = yes
			check_crl = no
			CA_path = \${cadir}
			### check_cert_issuer = "/C=GB/ST=Berkshire/L=Newbury/O=My Company Ltd/emailAddress=test@mycomp.com/CN=myca" ###
			### check_cert_cn = %{User-Name} ###
			cipher_list = "DEFAULT"
			ecdh_curve = "prime256v1"
			cache {
			      enable = no
			      lifetime = 24
			      max_entries = 255
			}
			verify {
		#     		tmpdir = /tmp/radiusd
		#    		client = "/path/to/openssl verify -CApath  %{TLS-Client-Cert-Filename}"
			}
			ocsp {
			      enable = no
			      override_cert_url = no
			      url = "http://127.0.0.1/ocsp/"
			}
		}

		### EAP-TTLS
		ttls {
			default_eap_type = md5
			copy_request_to_tunnel = no
			use_tunneled_reply = no
			include_length = yes
		}	### end ttls

		### EAP-PEAP
		peap {
			default_eap_type = mschapv2
			copy_request_to_tunnel = no
			use_tunneled_reply = no
		#	proxy_tunneled_request_as_eap = yes
			### MS SoH Server is disabled ###
		}
		mschapv2 {
		#	send_error = no
		}
	}
EOF;
file_put_contents("/usr/local/etc/raddb/eap.conf", $eapconf);
$lanip = $config["interfaces"]["lan"]["ipaddr"];
$clientsconf = <<<EOF

client "QHOTSPOT" {
	ipaddr = $lanip
	proto = udp
	secret = qhotspot
	require_message_authenticator = no
	max_connections = 16
	shortname = QHOTSPOT
	nastype = other
	### login = !root ###
	### password = someadminpass ###
}

EOF;
file_put_contents("/usr/local/etc/raddb/clients.conf", $clientsconf);

write_config("QHotspot Radius Settings added.");
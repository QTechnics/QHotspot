global $config;
$config = parse_config(true);
$eapconf = &$config['installedpackages']['freeradiuseapconf']['config'][0];
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
write_config("EAP Config");


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
    "zone" => "{QH_ZONE_NAME}",
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
	"auth_server" => "radius - LocalRadius",
	"radacct_server" => "LocalRadius"
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

sql sql1 {
	database = "mysql"
	driver = "rlm_sql_\${database}"
	dialect = "\${database}"
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
	delete_stale_sessions = yes
	logfile = \${logdir}/sqltrace.sql
	read_clients = no
	client_table = "nas"
	pool {
		start = \${thread[pool].start_servers}
		min = \${thread[pool].min_spare_servers}
		max = 5
		spare = \${thread[pool].max_spare_servers}
		uses = 0
		retry_delay = 60
		lifetime = 0
		idle_timeout = 60
	}
	group_attribute = "\${.:instance}-SQL-Group"
	\$INCLUDE \${modconfdir}/\${.:name}/main/\${dialect}/queries.conf
}
EOF;
file_put_contents("/usr/local/etc/raddb/mods-enabled/sql", $sqlconf);
$lanip = $config["interfaces"]["lan"]["ipaddr"];
$clientsconf = <<<EOF

client "QHOTSPOT" {
	ipaddr = $lanip
	proto = udp
	secret = 'qhotspot'
	require_message_authenticator = no
	nas_type = other
	### login = !root ###
	### password = someadminpass ###
	limit {
		max_connections = 16
		lifetime = 0
		idle_timeout = 30
	}
}
EOF;
file_put_contents("/usr/local/etc/raddb/clients.conf", $clientsconf);

$s_mysql = false;
foreach ($config['installedpackages']['service'] as $item) {
    if ('mysql-server' == $item['name']) {
        $s_mysql = true;
        break;
    }
}
if ($s_mysql == false) {
    $config['installedpackages']['service'][] = array(
        'name' => 'mysql-server',
        'rcfile' => 'mysql-server.sh',
        'executable' => 'mysqld',
        'description' => 'MySQL Database Server'
    );
}

$s_qhotspot = false;
$status_command = <<<EOF
        \$output=''; exec('/bin/pgrep -anf \'.*QHotspot\.conf.*\'', \$output, \$retval); \$rc=(intval(\$retval) == 0)
EOF;

foreach ($config['installedpackages']['service'] as $item) {
    if ('qhotspot' == $item['name']) {
        $s_qhotspot = true;
    }
}
if ($s_qhotspot == false) {
    $config['installedpackages']['service'][] = array(
        'name' => 'qhotspot',
        'rcfile' => 'qhotspot.sh',
        'executable' => 'qhotspot',
        'custom_php_service_status_command' => $status_command,
        'description' => 'QHotspot Manager Web Console'
    );
}

if (!preg_match("/captive_portal_status/", $config['widgets']['sequence'])) {
    $config['widgets']['sequence'] = $config['widgets']['sequence'] . ",captive_portal_status:col2:open";
}

if (!preg_match("/services_status/", $config['widgets']['sequence'])) {
    $config['widgets']['sequence'] = $config['widgets']['sequence'] . ",services_status:col2:open";
}

$config['system']['authserver'][] = array(
	'refid' => '5bf588f9489a4',
	'type' => 'radius',
	'name' => 'LocalRadius',
	'radius_protocol' => 'PAP',
	'host' => $lanip,
	'radius_nasip_attribute' => 'wan',
	'radius_secret' => 'qhotspot',
	'radius_timeout' => '5',
	'radius_auth_port' => '1812',
	'radius_acct_port' => '1813',
);

write_config("QHotspot Settings added.");
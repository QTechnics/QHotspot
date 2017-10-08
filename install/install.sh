#!/usr/bin/env sh

main() {
touch ${PWD}/qhotspot.log
OUTPUTLOG=${PWD}/qhotspot.log

# Defaults
QH_LANG_DEFAULT="en"
QH_PORT_DEFAULT="81"
QH_MYSQL_ROOT_PASS_DEFAULT="qhotspot"
QH_MYSQL_USER_NAME_DEFAULT="qhotspot"
QH_MYSQL_USER_PASS_DEFAULT="qhotspot"
QH_MYSQL_DBNAME_DEFAULT="qhotspot"

_selectLanguage

printf "\033c"
echo -e ${L_WELCOME}
echo


# User Inputs
_userInputs

echo
echo ${L_STATING}
echo

exec 3>&1 1>>${OUTPUTLOG} 2>&1

# FreeBSD ve pfSense paketleri aktif ediliyor...
_activeRepos

# Gerekli paketler kuruluyor...
_installPackages

# QHotspot Repodan cekiliyor...
_cloneQHotspot

# MySQL 5.6 Server paketi kuruluyor...
_mysqlInstall

_mysqlSettings

# QHotspot nginx 81 port eklemesi yapiliyor...
_nginxSettings

# freeRADIUS3 kuruluyor...
_radiusInstall

# Cron kuruluyor...
_cronInstall

# QHotspot Konfigurasyon yukleniyor...
_qhotspotSettings

# QHotspot Laravel paketleri kuruluyor...
_qhotspotLaravel

# FreeBSD ve pfSense paketleri deaktif ediliyor...
_deactiveRepos

if $( YesOrNo "${L_QUNIFIINSTALL}"); then 1>&3
    echo -n ${L_UNIFICONTROLLER} 1>&3
    fetch -o - https://git.io/j7Jy | sh -s
    echo ${L_OK} 1>&3
fi
if $( YesOrNo "${L_QRESTARTPFSENSE}"); then 1>&3
        echo ${L_RESTARTPFSENSE} 1>&3
        /sbin/reboot
else
        cd /usr/local/qhotspot
fi
}

_selectLanguage() {
    read -p "Select your language (en/tr) [$QH_LANG_DEFAULT]: " QH_LANG
    QH_LANG="${QH_LANG:-$QH_LANG_DEFAULT}"
    case "${QH_LANG}" in
            [eE][nN])
            fetch https://bitbucket.org/qtechnics/qhotspot/raw/master/install/lang_en.inc
            . lang_en.inc
            rm -rf lang_en.inc
            ;;
            [tT][rR])
            fetch https://bitbucket.org/qtechnics/qhotspot/raw/master/install/lang_tr.inc
            . lang_tr.inc
            rm -rf lang_tr.inc
            ;;
    esac
}

 _userInputs() {
    read -p "$L_QPORT [$QH_PORT_DEFAULT]: " QH_PORT
    QH_PORT="${QH_PORT:-$QH_PORT_DEFAULT}"
    read -p "$L_QROOTPASS [$QH_MYSQL_ROOT_PASS_DEFAULT]: " QH_MYSQL_ROOT_PASS
    QH_MYSQL_ROOT_PASS="${QH_MYSQL_ROOT_PASS:-$QH_MYSQL_ROOT_PASS_DEFAULT}"
    read -p "$L_QRADIUSUSERNAME [$QH_MYSQL_USER_NAME_DEFAULT]: " QH_MYSQL_USER_NAME
    QH_MYSQL_USER_NAME="${QH_MYSQL_USER_NAME:-$QH_MYSQL_USER_NAME_DEFAULT}"
    read -p "$L_QRADIUSPASSWORD [$QH_MYSQL_USER_PASS_DEFAULT]: " QH_MYSQL_USER_PASS
    QH_MYSQL_USER_PASS="${QH_MYSQL_USER_PASS:-$QH_MYSQL_USER_PASS_DEFAULT}"
    read -p "$L_QRADIUSDBNAME [$QH_MYSQL_DBNAME_DEFAULT]: " QH_MYSQL_DBNAME
    QH_MYSQL_DBNAME="${QH_MYSQL_DBNAME:-$QH_MYSQL_DBNAME_DEFAULT}"
}

_activeRepos() {
    echo -n ${L_ACTIVEREPOS} 1>&3
    tar xv -C / -f /usr/local/share/pfSense/base.txz ./usr/bin/install
    sed -i .bak -e "s/FreeBSD: { enabled: no/FreeBSD: { enabled: yes/g" /usr/local/etc/pkg/repos/pfSense.conf
    sed -i .bak -e "s/FreeBSD: { enabled: no/FreeBSD: { enabled: yes/g" /usr/local/etc/pkg/repos/FreeBSD.conf
    env ASSUME_ALWAYS_YES=YES /usr/sbin/pkg update
    echo ${L_OK} 1>&3
}

_deactiveRepos() {
    echo -n ${L_DEACTIVEREPOS} 1>&3
    sed -i .bak -e 's/FreeBSD: { enabled: yes/FreeBSD: { enabled: no/g' /usr/local/etc/pkg/repos/pfSense.conf
    sed -i .bak -e 's/FreeBSD: { enabled: yes/FreeBSD: { enabled: no/g' /usr/local/etc/pkg/repos/FreeBSD.conf
    echo ${L_OK} 1>&3
}

_installPackages() {
    echo -n ${L_INSTALLPACKAGES} 1>&3
    ARCH=$(uname -m | sed 's/x86_//;s/i[3-6]86/32/')
    if [ ${ARCH} == "amd64" ]
    then
    env ASSUME_ALWAYS_YES=YES /usr/sbin/pkg install git wget nano mc htop mysql56-server compat8x-amd64 php56-mysql php56-mysqli php56-pdo_mysql php56-soap php-composer
    else
    env ASSUME_ALWAYS_YES=YES /usr/sbin/pkg install git wget nano mc htop mysql56-server compat8x-i386 php56-mysql php56-mysqli php56-pdo_mysql php56-soap php-composer
    fi
    hash -r
    echo ${L_OK} 1>&3
}

_cloneQHotspot() {
    echo -n ${L_CLONEQHOTSPOT} 1>&3
    cd /usr/local
    git clone https://QTechnics@bitbucket.org/qtechnics/qhotspot.git qhotspot
    cd /usr/local/qhotspot
    mv .env.example .env
    cd /usr/local/qhotspot/install
    echo ${L_OK} 1>&3
}

_mysqlInstall() {
    echo -n ${L_MYSQLINSTALL} 1>&3
    if [ ! -f /etc/rc.conf.local ] || [ $(grep -c mysql_enable /etc/rc.conf.local) -eq 0 ]; then
        echo 'mysql_enable="YES"' >> /etc/rc.conf.local
    fi
    mv /usr/local/etc/rc.d/mysql-server /usr/local/etc/rc.d/mysql-server.sh
    sed -i .bak -e 's/mysql_enable="NO"/mysql_enable="YES"/g' /usr/local/etc/rc.d/mysql-server.sh
    service mysql-server.sh start
    echo ${L_OK} 1>&3
}

_mysqlSettings() {
    # MySQL root kullanicisi tanimlaniyor.
    echo -n ${L_MYSQLROOT} 1>&3
    mysqladmin -u root password "${QH_MYSQL_ROOT_PASS}"
    echo ${L_OK} 1>&3

    # MySQL veritabani yukleniyor
    echo -n ${L_MYSQLINSERTS} 1>&3
    cat <<EOF > /usr/local/qhotspot/install/client.cnf
[client]
user = root
password = ${QH_MYSQL_ROOT_PASS}
host = localhost
EOF
    sed -i .bak -e "s/{QH_MYSQL_USER_NAME}/$QH_MYSQL_USER_NAME/g" /usr/local/qhotspot/.env
    sed -i .bak -e "s/{QH_MYSQL_USER_PASS}/$QH_MYSQL_USER_PASS/g" /usr/local/qhotspot/.env
    sed -i .bak -e "s/{QH_MYSQL_DBNAME}/$QH_MYSQL_DBNAME/g" /usr/local/qhotspot/.env

    sed -i .bak -e "s/{QH_MYSQL_ROOT_PASS}/$QH_MYSQL_ROOT_PASS/g" /usr/local/qhotspot/install/qhotspot.sql
    sed -i .bak -e "s/{QH_MYSQL_USER_NAME}/$QH_MYSQL_USER_NAME/g" /usr/local/qhotspot/install/qhotspot.sql
    sed -i .bak -e "s/{QH_MYSQL_USER_PASS}/$QH_MYSQL_USER_PASS/g" /usr/local/qhotspot/install/qhotspot.sql
    sed -i .bak -e "s/{QH_MYSQL_DBNAME}/$QH_MYSQL_DBNAME/g" /usr/local/qhotspot/install/qhotspot.sql

    mysql --defaults-extra-file=/usr/local/qhotspot/install/client.cnf < /usr/local/qhotspot/install/qhotspot.sql
    rm -rf /usr/local/qhotspot/install/client.cnf*
    rm -rf /usr/local/qhotspot/install/qhotspot.sql*
    echo ${L_OK} 1>&3

    # MySQL icin watchdog scripti olusturuluyor.
    echo -n ${L_MYSQLWATCHDOG} 1>&3
    cat <<EOF > /usr/local/bin/qhotspot_check.sh
#!/usr/bin/env sh
service mysql-server.sh status
if [ \$? != 0 ]; then
service mysql-server.sh start
sleep 5
fi
if ! [ -f /var/run/radiusd.pid ]; then
service radiusd onestart
fi
EOF
    chmod +x /usr/local/bin/qhotspot_check.sh
    echo ${L_OK} 1>&3
}

_nginxSettings() {
    echo -n ${L_NGINXINSTALL} 1>&3
    cp /usr/local/qhotspot/install/qhotspot.sh /usr/local/etc/rc.d/qhotspot.sh
    rm -rf /usr/local/qhotspot/install/qhotspot.sh*
    chmod +x /usr/local/etc/rc.d/qhotspot.sh
    if [ ! -f /etc/rc.conf.local ] || [ $(grep -c qhotspot_enable /etc/rc.conf.local) -eq 0 ]; then
        echo 'qhotspot_enable="YES"' >> /etc/rc.conf.local
    fi
    sed -i .bak -e "s/{QH_PORT}/$QH_PORT/g" /usr/local/qhotspot/install/nginx-QHotspot.conf
    echo ${L_OK} 1>&3
}

_radiusInstall() {
    /usr/local/sbin/pfSsh.php playback listpkg | grep "freeradius2"
    if [ $? == 0 ]
    then
    echo -n ${L_RADIUSALREADYINSTALLED} 1>&3
    else
    echo -n ${L_RADIUSINSTALL} 1>&3
    /usr/local/sbin/pfSsh.php playback installpkg "freeradius2"
    hash -r
    fi
    if [ ! -f /etc/rc.conf.local ] || [ $(grep -c radiusd_enable /etc/rc.conf.local) -eq 0 ]; then
        echo 'radiusd_enable="YES"' >> /etc/rc.conf.local
    fi
    echo ${L_OK} 1>&3
}


_cronInstall() {
    /usr/local/sbin/pfSsh.php playback listpkg | grep "cron"
    if [ $? == 0 ]
    then
    echo -n ${L_CRONALREADYINSTALLED} 1>&3
    else
    echo -n ${L_CRONINSTALL} 1>&3
    /usr/local/sbin/pfSsh.php playback installpkg "cron"
    hash -r
    fi
    echo ${L_OK} 1>&3
}

_qhotspotSettings() {
    echo -n ${L_QHOTSPOTSETTINGS} 1>&3
    cp /usr/local/qhotspot/install/qhotspotconfig.php /etc/phpshellsessions/qhotspotconfig
    rm -rf /usr/local/qhotspot/install/qhotspotconfig.php
    sed -i .bak -e "s/{QH_MYSQL_USER_NAME}/$QH_MYSQL_USER_NAME/g" /etc/phpshellsessions/qhotspotconfig
    sed -i .bak -e "s/{QH_MYSQL_USER_PASS}/$QH_MYSQL_USER_PASS/g" /etc/phpshellsessions/qhotspotconfig
    sed -i .bak -e "s/{QH_MYSQL_DBNAME}/$QH_MYSQL_DBNAME/g" /etc/phpshellsessions/qhotspotconfig
    /usr/local/sbin/pfSsh.php playback qhotspotconfig
    echo ${L_OK} 1>&3
}

_qhotspotLaravel() {
    echo -n ${L_QHOTSPOTLARAVEL} 1>&3
    cd /usr/local/qhotspot
    echo "suhosin.executor.include.whitelist = phar" >> /usr/local/etc/php.ini
    sleep 5
    php -d memory_limit=-1 /usr/local/bin/composer.phar install --no-dev
    php artisan key:generate
    php artisan migrate --seed --force
    echo ${L_OK} 1>&3
}

YesOrNo() {
    while :
    do
        echo -n "$1 (yes/no?): " 1>&3
        read -p "$1 (yes/no?): " answer
        case "${answer}" in
            [yY]|[yY][eE][sS]) exit 0 ;;
                [nN]|[nN][oO]) exit 1 ;;
        esac
    done
}

main
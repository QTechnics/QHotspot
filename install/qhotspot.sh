#!/usr/bin/env sh

. /etc/rc.subr

name="qhotspot"
rcvar="qhotspot_enable"
start_cmd="qhotspot_start"
stop_cmd="qhotspot_stop"

pidfile="/var/run/nginx-QHotspot.pid"
config_file="/usr/local/qhotspot/install/nginx-QHotspot.conf"

load_rc_config ${name}

qhotspot_start()
{
if checkyesno ${rcvar}; then
    if [ -f $pidfile ]; then
        echo "QHotspot already running."
        qhotspot_stop
    fi
    echo -n "Qhotspot starting..."
    /usr/local/sbin/nginx -c ${config_file}
    echo " Done."
fi
}

qhotspot_stop()
{
if [ -f $pidfile ]; then
        echo -n "QHotspot stopping."
        pkill -F $pidfile
        while [ `pgrep -F $pidfile` ]; do
            echo -n "."
            sleep 5
        done
        rm $pidfile
        echo " Done."
    fi
}

run_rc_command "$1"
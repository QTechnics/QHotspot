<?php

// Ghost Hot Spot v1
// Emeği Geçenler : Samet YILMAZ,Uğur Demir,Serhat Sabuncu
// pfSense 2.3.2 mysqli değiştikliği : Muzaffer Ali AKYIL

// MySQL Sunucu Bilgileri
$kullaniciadi = "{QH_MYSQL_USER_NAME}";
$sifre = "{QH_MYSQL_USER_PASS}";
$host = "localhost";
$veritabani = "{QH_MYSQL_DBNAME}";

//MYSQL BAĞLANTISI
$baglan = ($GLOBALS["___mysqli_ston"] = mysqli_connect($host, $kullaniciadi, $sifre)) or die("Veritabanı bağlantısı yapılamadı !");
((bool)mysqli_query($baglan, "USE " . $veritabani)) or die("Veritabanı bağlantısı yapılamadı !");

mysqli_query($GLOBALS["___mysqli_ston"], "SET NAMES utf8");
mysqli_query($GLOBALS["___mysqli_ston"], "SET CHARACTER SET utf8");
mysqli_query($GLOBALS["___mysqli_ston"], "SET COLLATION_CONNECTION='utf8_general_ci'");

$inj = array('select', 'insert', 'delete', 'update', 'drop table', 'union', 'null', 'SELECT', 'INSERT', 'DELETE', 'UPDATE', 'DROP TABLE', 'UNION', 'NULL', 'order by', 'order  by');
for ($i = 0; $i < sizeof($_GET); ++$i) {
    for ($j = 0; $j < sizeof($inj); ++$j) {
        foreach ($_GET as $gets) {
            if (preg_match('/' . $inj[$j] . '/', $gets)) {
                $temp = key($_GET);
                $_GET[$temp] = '';
                exit();
                continue;
            }
        }
    }
}
?>
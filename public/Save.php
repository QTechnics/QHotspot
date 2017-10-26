<?php

error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
session_start();
// $user1 = $_SESSION['user'];

if ($_SESSION['username'] == "") {
	header("location:Message.php?id=Yetki");
} else {
	include ("inc/db_settings.php");

$id = !empty($_GET['id']) ? ($_GET['id']) : null;
if($id == "Password"){
 
	$sor=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM admin");
	$username=$_POST['username'];
	$password=$_POST['password'];

	$degis=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE ghost_users SET username='$username',password='$password' WHERE id='1' ") or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
	if($degis){
		header("location:Message.php?id=Password");
	} else {
		header("location:Message.php?id=Hata");
	}
                
} elseif($id =="PostLogDelete"){
	$userfilter=trim(@$_GET['userfilter']);
	$wheretxt=" ";
	if(!empty($userfilter)){
		$wheretxt=" where username like '".$userfilter."%'";
	}
	$sil=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE from radpostauth".$wheretxt) or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));	
	if($sil){
		header("location:Message.php?id=Basarili&retpage=access");
	} else {
		header("location:Message.php?id=Hata&retpage=access");
	}
                
} elseif($id =="SmsLogsDelete"){
	$sil=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE from log ") or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));	
	if($sil){
		header("location:Message.php?id=Basarili");
	} else {
		header("location:Message.php?id=Hata");
	}

} elseif($id =="RadAcctDelete"){
	$userfilter=trim(@$_GET['userfilter']);
	$ipfilter=trim(@$_GET['ipfilter']);

	$wheretxt="";
	if (!empty($userfilter) or !empty($ipfilter)){
		if (!empty($userfilter)){
			$wheretxt=" where username like '".$userfilter."%' ";
		}
		if (!empty($ipfilter)){
			if (!empty($wheretxt)){
				$wheretxt=$wheretxt." and ";
			} else {
				$wheretxt=" where ";
			}
			$wheretxt=$wheretxt."framedipaddress = '".$ipfilter."' ";
		}
	} else {$wheretxt=" ";}


	$sil=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE from radacct".$wheretxt) or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));	
	if($sil){
		header("location:Message.php?id=Basarili&retpage=details");
	} else {
		header("location:Message.php?id=Hata&retpage=details");
	}

} elseif($id =="Ghostclear"){
	$sil=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE from radcheck WHERE tip='1' ") or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));	
	if($sil){
		header("location:Message.php?id=Basarili");
	} else {
		header("location:Message.php?id=Hata");
	}
        
} elseif($id =="smsclear"){
	$sil=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE from radcheck WHERE tip='3' ") or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));	
	if($sil){
		header("location:Message.php?id=Basarili");
	} else {
		header("location:Message.php?id=Hata");
	}

} elseif($id =="cleartc"){
	$sil=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE from radcheck WHERE tip='2' ") or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));	
	if($sil){
		header("location:Message.php?id=Basarili");
	} else {
		header("location:Message.php?id=Hata");
	}

} elseif($id =="RadReplyDelete"){
	$sil=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE from radreply ") or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));	
	if($sil){
		header("location:Message.php?id=Basarili");
	} else {
		header("location:Message.php?id=Hata");
	}

} elseif($id =="RadCheckDelete"){
	$sil=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE from radcheck ") or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));	
	if($sil){
		header("location:Message.php?id=Basarili");
	} else {
		header("location:Message.php?id=Hata");
	}

} elseif($id =="Yetki"){   
	header("location:Message.php?id=Hata3");

} elseif($id =="Settings"){
	$sor=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM ghost_settings");
	$passwordexptime=$_POST['passwordexptime'];
	$smsuser=$_POST['smsuser'];
	$smspass=$_POST['smspass'];
	$smsno=$_POST['smsno'];
	$apiurl=$_POST['apiurl'];

	$degis=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE ghost_settings SET passwordexptime='$passwordexptime',smsuser='$smsuser',smspass='$smspass',smsno='$smsno',apiurl='$apiurl'
				WHERE id='1' ") or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
	if($degis){
		header("location:Message.php?id=Basarili");
	} else {
		header("location:Message.php?id=Hata");
	}
} elseif($id =="ReplyAt"){
	$username=$_POST['username'];
	$attribute=$_POST['attribute'];
	$op=$_POST['op'];
	$value=$_POST['value'];

	$bas=mysqli_query($GLOBALS["___mysqli_ston"], "insert into radreply (username,attribute,op,value) values ('$username','$attribute','$op','$value') ") or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
	if($bas){
		header("location:Message.php?id=Basarili");
	} else {
		header("location:Message.php?id=Hata");
	}

} elseif($id =="CheckAt"){
	$username=$_POST['username'];
	$attribute=$_POST['attribute'];
	$op=$_POST['op'];
	$value=$_POST['value'];

	$bas=mysqli_query($GLOBALS["___mysqli_ston"], "insert into radcheck (username,attribute,op,value) values ('$username','$attribute','$op','$value') ") or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
	if($bas){
		header("location:Message.php?id=Basarili");
	} else {
		header("location:Message.php?id=Hata");
	}

} elseif($id =="NewGhostUser"){
	$username=$_POST['username'];
	$attribute=$_POST['attribute'];
	$op=$_POST['op'];
	$value=$_POST['value'];
	$tip=$_POST['tip'];
	$telefon=$_POST['telefon'];
	$tcno=$_POST['tcno'];
	$adsoyad=$_POST['adsoyad'];

	$bas=mysqli_query($GLOBALS["___mysqli_ston"], "insert into radcheck (username,attribute,op,value,tip,telefon,tcno,adsoyad) values ('$username','$attribute','$op','$value','$tip','$telefon','$tcno','$adsoyad') ") or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
	if($bas){
		header("location:Message.php?id=Basarili");
	} else {
		header("location:Message.php?id=Hata");
	}
	
} elseif($id =="NewTGhost"){
	$uname = $_POST["username"];
	$zaman = $_POST["zaman"];
	$value = $_POST["value"];
	$adsoyad = $_POST["adsoyad"];
	$tcno  = $_POST["tcno"];
	$telefon = $_POST["telefon"];
	$dizi = explode("/", $zaman);
	$eski = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
	$yeni = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov' , 'Dec');
	$yenizaman = str_replace($eski,$yeni,$dizi[1]);
	$zamanedit = $dizi[0]." ".$yenizaman." ".$dizi[2];

	$sql = "insert into radcheck (username,attribute,op,value,adsoyad,tcno,telefon,tip) values ('$uname','Cleartext-Password',':=','$value','$adsoyad','$tcno','$telefon','1')";
	if (mysqli_query($GLOBALS["___mysqli_ston"], $sql)){ 
		header("location:Message.php?id=Basarili");
	}
	$sql2 = "insert into radcheck (username,attribute,op,value) values ('$uname','Expiration','==','$zamanedit')";
	if (mysqli_query($GLOBALS["___mysqli_ston"], $sql2)){
		header("location:Message.php?id=Basarili");
	}
} elseif($id =="Newhours"){
	$uname = $_POST["username"];
	$zaman	= $_POST["zaman"];
	$value	= $_POST["value"];
	$adsoyad = $_POST["adsoyad"];
	$tcno = $_POST["tcno"];
	$telefon = $_POST["telefon"];

	$sql = "insert into radcheck (username,attribute,op,value,adsoyad,tcno,telefon,tip) values ('$uname','Cleartext-Password',':=','$value','$adsoyad','$tcno','$telefon','1')";
	if (mysqli_query($GLOBALS["___mysqli_ston"], $sql)){
		header("location:Message.php?id=Basarili");
	}
	$sql2 = "insert into radcheck (username,attribute,op,value) values ('$uname','Max-Daily-Session',':=','$zaman')";
	if (mysqli_query($GLOBALS["___mysqli_ston"], $sql2)){
		header("location:Message.php?id=Basarili");
	}
}	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PfSense Ghost Radius Manager</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body id="login-bg"> 
 
<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login">
		<a href="index.php"><img src="images/shared/logo.png" width="232" height="71" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox eeeeee???Olum bak Value değeri gonder verdim. kodugum orda SUbmit yazıyor hala cıldırtıyor beni -->
	<div id="loginbox">
<form action="Auth.php" method="POST" >
	<!--  start login-inner -->
	<div id="login-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Kullanıcı</th>
			<td><input type="text" name="username"  class="login-inp" /></td>
		</tr>
		<tr>
			<th>Şifre</th>
			<td><input type="password"name="password"   class="login-inp" /></td>
		</tr>
		<tr>
			<th></th>
		
		</tr>
		<tr>
			<th></th>
		
			<td><input class="submit-login" type="Submit" value="Gonder"   /></td>
		</tr>
		</table>
	</div>
	</form>
 	<!--  end login-inner -->
	<div class="clear"></div>
	<a href="" class="forgot-pwd">Hakkında</a>
 </div>
 <!--  end loginbox -->
 
	<!--  start forgotbox ................................................................................... -->
	<div id="forgotbox">
		<div id="forgotbox-text">Ghost, forumlarda sürekli Hot spot için çözüm arayan türk vatandaşlarına cevap olabilmek adına ücretsiz olarak üretilmiştir.Geliştir ve Paylaş!
		Teşekkürler 
		<br /><br /><br /><a href="http://www.sametyilmaz.com.tr">Samet YILMAZ</a> - sametyilmaznet@gmail.com
		<br /><a href="http://www.ugurdemir.net">Uğur Demir</a> - ugurdemir@outlook.com.tr
		<br /><a href="http://www.serhatsabuncu.com">Serhat Sabuncu</a> - sabuncuserhat@gmail.com
		<br /><a href="http://www.cozumpark.com">ÇözümPark</a> - info@cozumpark.com
		</div>
		<!--  start forgot-inner -->
		<div id="forgot-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		
		<tr>
			<th> </th>
			
		</tr>
		</table>
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="" class="back-login">Geri Dön</a>
	</div>
	<!--  end forgotbox -->

</div>
<!-- End: login-holder -->
</body>
</html>
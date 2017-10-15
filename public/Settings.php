<?php

error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
session_start();
// Teşekkürler Bülent Gür... www.networkakademi.net
 if ($_SESSION['username'] == "") {
header("location:Message.php?id=Yetki");
}
else {
	include ("inc/db_settings.php"); 

$id = !empty($_GET['id']) ? ($_GET['id']) : null;

{
	
?>

	
	<?php
	
} if($id == "general"){
 

 

               ?>
	<?php

require_once ("inc/header.php");

$sql = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM ghost_settings"); 
while($row=mysqli_fetch_array($sql)) {
$dayssms = $row["dayssms"];
$maxsmstime = $row["maxsmstime"];  
$passwordexptime = $row["passwordexptime"];  
$smsuser = $row["smsuser"];  
$smspass = $row["smspass"];  
$smsno = $row["smsno"];  
$mesaj = $row["mesaj"];  
$apiurl = $row["apiurl"];  



  }  

?>
 
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Ghost Genel Ayarlar</h1></div>


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>

	
		<form action="Save.php?id=Settings" method="POST" >
		<table width="600" border="0" cellpadding="0" cellspacing="0"  id="id-form">
  <th width="394" valign="top">Geçerlilik Süresi</th>
		
		
		
			<tr>
			<th valign="top">Şifre geçerlilik süresi:</th>
			<td><input type="text" name="passwordexptime" value="<?=$passwordexptime;?>"  class="inp-form" />
			  gün</td>
			<td></td>
		</tr>
		
	  <th valign="top">Sms Sağlayıcı Ayarları:</th>
		
					<tr>
			<th valign="top">Kullanıcı Adı:</th>
			<td><input type="text" name="smsuser" value="<?=$smsuser;?>"  class="inp-form" /></td>
			<td></td>
		</tr>
						<tr>
			<th valign="top">Şifre:</th>
			<td><input type="text" name="smspass" value="<?=$smspass;?>"  class="inp-form" /></td>
			<td></td>
		</tr>
		
		
<tr>
			<th valign="top">Başlık(Onaylı Olması Gerekir.):</th>
			<td><input type="text" name="smsno" value="<?=$smsno;?>"  class="inp-form" /></td>
			<td></td>
		</tr>
		

				<tr>
			<th valign="top">API URL:</th>
			<td><input type="text" name="apiurl" value="<?=$apiurl;?>"  class="inp-form" /></td>
			<td></td>
		</tr>
		
		
		<tr>
		
		
		<td></td>
	</tr>




	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit"  class="form-submit" />

		</td>
		<td></td>
	</tr>
	</table>
</form>

	</td>
	<td>

	

</td>
</tr>
<tr>
<td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>









 





<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->

 

<div class="clear">&nbsp;</div>
    
<?php
require_once ("inc/footer.php");
?>
						 
	<?php
	
} if($id == "password"){
 
   ?>
<?php

require_once ("inc/header.php");

$sql = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM ghost_users"); 
while($row=mysqli_fetch_array($sql)) {
$username = $row["username"];
$password = $row["password"];  
  }  

?>
 
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Ghost Yönetici Bilgileri</h1></div>


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>

	
		<form action="Save.php?id=Password" method="POST" >
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Kullanıcı Adınız:</th>
			<td><input type="text" name="username" value="<?=$username;?>" class="inp-form" /></td>
			<td></td>
		</tr>
		
		
		
		<tr>
			<th valign="top">Şifreniz:</th>
			<td><input type="text" name="password" value="<?=$password;?>"  class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
		
		
		<td></td>
	</tr>




	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit"  class="form-submit" />

		</td>
		<td></td>
	</tr>
	</table>
</form>

	</td>
	<td>

	

</td>
</tr>
<tr>
<td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>









 





<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->

 

<div class="clear">&nbsp;</div>
    

<?php

require_once ("inc/footer.php");
?>	

     
     
     
     <?php
	
} if($id == "thanks"){
 

 

               ?>
	<?php

require_once ("inc/header.php");


?>
 
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Teşekkürler</h1></div>


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>

	
		<p>Merhaba ; </p>
		<p>&nbsp;</p>
		<p>Ghost'u geliştirdim çünkü buna ihtiyac vardı. Ücretsiz olarak dağıtıyorum çünkü PFSense gibi bir ürünün bizlerle ücretsiz paylaşan insanlarla aynı düşüncedeyiz. Belki yaptığımız çok iyi bir yazılım değil ama sonuç itibariyle üzerine emek verilmiş ve ortaya çıkan bu emeğin karşılığında bir hayır duası etmeniz kafidir.</p>
		<p>&nbsp;</p>
		<p>Yazılımı istediğiniz gibi değiştirebilir,düzenleyebilir,satabilir ve geliştirirseniz bizimlede paylaşırsanız seviniriz.</p>
		<p>&nbsp;</p>
		<p>Yazılımı yazarken vazgeçmemem için hayat arkadaşım Özlem Özer'e teşekkür ediyorum.</p>
		<p>&nbsp;</p>
		<p>Böyle bir ürünün ortaya çıkmasına vesile olan Uğur Demir (ugurdemir.net) abime ayrıca teşekkür ediyorum.</p>
		<p>&nbsp;</p>
		<p>Ürün hakkında bize yol göstermek adına verdiği bilgiler için Özgür Kalkavan (hoscakal) abime teşekkür ederim.</p>
		<p>&nbsp;</p>
		<p>Ürünü kullanıp dua eden bütün PFSense kullanıcılarına teşekkürlerimi sunuyorum.</p>
		<p>&nbsp;</p>
		<p>23 Yaşındayım ve bana büyük destek olan, benim için dönüm noktası olan Network Akademi, Bülent Gür hocama sevgilerimi iletiyorum.</p>
		<p>&nbsp;</p>
		<p>Ne kadar çok teşekkür ettik ! Unuttuğumuz birileri varsa affola onlarada çok teşekkürler.<br />
		  <br />
		  Samet YILMAZ - 
        www.sametyilmaz.com.tr 05.02.2014 (Lise Terk,Diplomasız,Microsoft Sertifikasız,Linux Sertifikasız,Sistem Mühendisi ha birde askerim ! :) )</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p></td>
	<td>

	

</td>
</tr>
<tr>
<td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>









 





<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->

 

<div class="clear">&nbsp;</div>
    
<?php
require_once ("inc/footer.php");
?>




		   <?php
                        }
                        }
                    
?>

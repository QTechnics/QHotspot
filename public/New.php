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
	
} if($id == "attribute"){
 

 

               ?>
						 
<?php

require_once ("inc/header.php");


?>
 
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Yeni Attribute Ekleme </h1></div>


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

	
<table width="40" border="0">
  <tr>
    <td><form action="Save.php?id=CheckAt" method="POST" >
		<table width="600" border="0" cellpadding="0" cellspacing="0"  id="id-form">
  <th width="394" valign="top">RadCheck</th>
		<tr>
	
			<th valign="top">Username</th>
			<td width="185"><input type="text" name="username" required="required"  class="inp-form" /></td>
			<td width="21"></td>
		</tr>
		
		
		
		<tr>
			<th valign="top">Attribute</th>
			<td><input type="text" name="attribute"  required="required" class="inp-form" />
			 </td>
			<td></td>
		</tr>
		
		
			<tr>
			<th valign="top">Op</th>
			<td><input type="text" name="op"  required="required"  class="inp-form" />
			  </td>
			<td></td>
		</tr>
		
				<tr>
			<th valign="top">Value</th>
			<td><input type="text" name="value" required="required"   class="inp-form" />
			</td>
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
</form></td>
    <td><form action="Save.php?id=ReplyAt" method="POST" >
		<table width="600" border="0" cellpadding="0" cellspacing="0"  id="id-form">
  <th width="394" valign="top">RadReply</th>
		<tr>
	
			<th valign="top">Username : </th>
			<td width="185"><input type="text" name="username" required="required"  class="inp-form" /></td>
			<td width="21"></td>
		</tr>
		
		
		
		<tr>
			<th valign="top">Attribute </th>
			<td><input type="text" name="attribute" required="required"   class="inp-form" />
			</td>
			<td></td>
		</tr>
		
		
			<tr>
			<th valign="top">Op</th>
			<td><input type="text" name="op"  required="required" class="inp-form" />
		</td>
			<td></td>
		</tr>
		
			<tr>
			<th valign="top">Value</th>
			<td><input type="text" name="value" required="required"  class="inp-form" />
			</td>
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
</form></td>
  </tr>
</table>


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
 <br />
<br />
<br />
<b>Attribute Nedir ?<br /><br /><br />

Türkçesi özellikler anlamına gelir. Buradan şunu anlıyor olmanız gerekir Kullanıcılara vereceğimiz özeliikleri Attribute sutunune vereceğimiz değerlerle belirliyoruz.Ama aynı zamanda Attribute ile kullanıcıda oluşturabiliyoruz.<br />
<br /><br />


RadCheck Nedir ?<br /><br />


RadCheck Freeradius'un Attribute listesini tutan tablonun ismidir. Ama aynı tablodan birtane daha RadReply adında vardır. İkiside aynı
işe yarıyor ama bazı Özellikler RadCheck'te çalışıyorken bazıları ise RadReply tablosuna eklemeniz gerekiyor.<br /><br /><br />



Eğer biz yeni bir kullanıcı oluşturmak istersek aşağıdaki şekilde RadCheck bölümünden formu doldurursanız vermiş olduğunuz değerler bir adet internet kullanıcısı oluşturacaktır.<br /><br /><br /><br />

<table width="309" border="1">
  <tr>
    <td>username</td>
    <td>attribute</td>
    <td>op</td>
    <td>value</td>
  </tr>
  <tr>
    <td>samet</td>
    <td>Cleartext-Password</td>
    <td>:=</td>
    <td>şifre</td>
  </tr>
</table>
</b>
<p>&nbsp;</p>
<p><b>username  		attribute		    op		value<br />
  samet			Cleartext-Password		:=		şifre<br />
  
  
  Username : Bir kullanıcı ismi belirledik.<br />
  Attribute : Bir kullanıcı olduğunu belirttik.<br />
  Op : Kullanıcı hesapları için op değerinin == olması gerektiği için == yazdık.<br />
  Value : Value değeri olarak kullanıcının şifresinin şifre olmasını sağladık.<br /><br />
  
  Sonuç : Captive Portal login ekranın kullanıcı adına samet şifre bölümüne şifre yazarsanız sınırsız bir internet kullanıcısıyla internete çıkmış olursunuz.</b></p>
<p>&nbsp;</p>
<p><b>Kullanıcıya Süreli İnternet Vermek ;</b></p>
<p>&nbsp;</p>
<p><b><br />
  <table width="309" border="1">
  <tr>
    <td>username</td>
    <td>attribute</td>
    <td>op</td>
    <td>value</td>
  </tr>
  <tr>
    <td>samet</td>
    <td>Expiration</td>
    <td>=</td>
    <td>29 Jan 2014</td>
  </tr>
</table>
</b>
<p>&nbsp;</p>
<p><b>Eğer radcheck bölümünden yukarıdaki şekilde kayıt girerseniz 29 Jan 2014 tarihinde kullanıcı hesabı devre dışı olacaktır.</b><br />
  <br />
<strong>Kullanıcıya Günlük Saat kotası belirlemek</strong></p>
  <table width="309" border="1">
  <tr>
    <td>username</td>
    <td>attribute</td>
    <td>op</td>
    <td>value</td>
  </tr>
  <tr>
    <td>samet</td>
    <td>Max-Daily-Session</td>
    <td>:=</td>
    <td>1800</td>
  </tr>
</table>
  <p>&nbsp;</p>
  <p><strong>Eğer yukarıdaki şekilde Radcheck bölümünden bir kayıt girerseniz kullanıcıya 30 dk internet özelliği ekler ve 30 dakika dolduktan sonra hesap devre dışı olur.</strong></p>
  <p>&nbsp;</p>
  <p><strong>Attribute Listesi : http://freeradius.org/rfc/attributes.html</strong></p>
  <p>&nbsp;</p>
  <p><strong>Attribute Kullanımı : http://freeradius.org/radiusd/man/users.html</strong></p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<p>&nbsp;</p>
</p><br />
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
	
} if($id == "useradd"){
 
   ?>
<?php

require_once ("inc/header.php");


?>

<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Kullanıcı Ekleme </h1></div>


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

	
<table width="40" border="0">
  <tr>
    <td><form action="Save.php?id=NewGhostUser" method="POST" >
		<table width="600" border="0" cellpadding="0" cellspacing="0"  id="id-form">
  <th width="394" valign="top">Süresiz Kullanıcı Ekleme</th>
		<tr>
	
			<th valign="top">Kullanıcı Adı</th>
			<td width="185"><input type="text" name="username" required="required" class="inp-form" /></td>
			<td width="21"></td>
		</tr>
		
		
		
		<tr>
			<th valign="top">Şifre</th>
			<td><input type="text" name="value" required="required" class="inp-form" />
			 </td>
			<td></td>
		</tr>
		
		
			<tr>
			<th valign="top">Ad Soyad</th>
			<td><input type="text" name="adsoyad" required="required"  class="inp-form" />
			  </td>
			<td></td>
		</tr>
		
				<tr>
			<th valign="top">TC No</th>
			<td><input type="text" name="tcno"   class="inp-form" />
            	
			</td>
			<td></td>
		</tr>
		
        <tr>
			<th valign="top">Telefon</th>
			<td><input type="text" name="telefon"   class="inp-form" />
            	
			</td>
			<td></td>
		</tr>
		
		 

		<input type="hidden" name="tip" value="1"   class="inp-form" />
         <input type="hidden" name="attribute" value="Cleartext-Password"   class="inp-form" />
        <input type="hidden" name="op" value=":="   class="inp-form" />
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
</form></td>
    <td><form action="Save.php?id=NewTGhost" method="POST" >
		<table width="600" border="0" cellpadding="0" cellspacing="0"  id="id-form">
  <th width="394" valign="top">Günlük Kullanıcı Ekleme</th>
		<tr>
	
			<th valign="top">Kullanıcı Adı</th>
			<td width="185"><input type="text" name="username" required="required" class="inp-form" /></td>
			<td width="21"></td>
		</tr>
		
		
		
		<tr>
			<th valign="top">Şifre</th>
			<td><input type="text" name="value" required="required" class="inp-form" />
			 </td>
			<td></td>
		</tr>
		
		
			<tr>
			<th valign="top">Ad Soyad</th>
			<td><input type="text" name="adsoyad"  required="required" class="inp-form" />
			  </td>
			<td></td>
		</tr>
		
				<tr>
			<th valign="top">TC No</th>
			<td><input type="text" name="tcno"   class="inp-form" />
            	
			</td>
			<td></td>
		</tr>
		
        <tr>
			<th valign="top">Telefon</th>
			<td><input type="text" name="telefon"   class="inp-form" />
            	
			</td>
			<td></td>
		</tr>
		
		  <tr>
			<th valign="top">Zamanlama</th>
			<td><input type="text" name="zaman" id="date-pick" required="required" class="inp-form" />
            	
			</td>
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
</form></td>



















  </tr>
</table>


	</td>
	<td>

	

</td>
</tr>
 <td><form action="Save.php?id=Newhours" method="POST" >
		<table width="600" border="0" cellpadding="0" cellspacing="0"  id="id-form">
  <th width="394" valign="top">Saatlik Kullanıcı Ekleme</th>
		<tr>
	
			<th valign="top">Kullanıcı Adı</th>
			<td width="185"><input type="text" name="username" required="required" class="inp-form" /></td>
			<td width="21"></td>
		</tr>
		
		
		
		<tr>
			<th valign="top">Şifre</th>
			<td><input type="text" name="value" required="required" class="inp-form" />
			 </td>
			<td></td>
		</tr>
		
		
			<tr>
			<th valign="top">Ad Soyad</th>
			<td><input type="text" name="adsoyad"  required="required" class="inp-form" />
			  </td>
			<td></td>
		</tr>
		
				<tr>
			<th valign="top">TC No</th>
			<td><input type="text" name="tcno"   class="inp-form" />
            	
			</td>
			<td></td>
		</tr>
		
        <tr>
			<th valign="top">Telefon</th>
			<td><input type="text" name="telefon"   class="inp-form" />
            	
			</td>
			<td></td>
		</tr>
		
		  <tr>
			<th valign="top">Saat Seçin</th>
			<td><select name="zaman">
            
            <option value="1800">30 DK</option>
            <option value="3600">1 SAAT</option>
            <option value="7200">2 SAAT</option>
            <option value="10800">3 SAAT</option>
              <option value="14400">4 SAAT</option>
              <option value="18000">5 SAAT</option>
            </select>
            	
			</td>
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
</form></td>
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
	
} if($id == "sms"){

  ?>


sms


		   <?php
                        }
                        }
                    
?>

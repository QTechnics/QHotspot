<?php
ob_start(); 
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
	
} if($id == "ghost"){
 

 

               ?>
						 
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
$sayfa = @$_GET["s"];
if (empty($sayfa) || !is_numeric ($sayfa)) {
$sayfa=1;
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
<title>PfSense Ghost Radius Manager</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!--  checkbox styling script -->
<script src="js/jquery/ui.core.js" type="text/javascript"></script>
<script src="js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="js/jquery/jquery.bind.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>

<!--  styled select box script version 2 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({ 
          image: "images/forms/choose-file.gif",
          imageheight : 21,
          imagewidth : 78,
          width : 310
      });
  });
</script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 


<!--  date picker script -->
<link rel="stylesheet" href="css/datePicker.css" type="text/css" />
<script src="js/jquery/date.js" type="text/javascript"></script>
<script src="js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
};
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body> 
<!-- Start: page-top-outer -->
<?php require_once ("inc/menu.php"); ?>

 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Ghost Kullanıcıları</h1>
	</div>
	<!-- end page-heading -->

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
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
				<!--
				<!--  start message-yellow 
				<div id="message-yellow">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="yellow-left">You have a new message. <a href="">Go to Inbox.</a></td>
					<td class="yellow-right"><a class="close-yellow"><img src="images/table/icon_close_yellow.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-yellow -->
				
				<!--  start message-red 
				<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">Error. <a href="">Please try again.</a></td>
					<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-red
				
				<!--  start message-blue
				<div id="message-blue">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="blue-left">Welcome back. <a href="">View my account.</a> </td>
					<td class="blue-right"><a class="close-blue"><img src="images/table/icon_close_blue.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-blue
			
				<!--  start message-green
				<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left">Product added sucessfully. <a href="">Add new one.</a></td>
					<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-green --> 
	
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				
			<tr>
				
					<th class="table-header-repeat line-left minwidth-1"><a href="">KULLANICI ADI</a>	</th>
				<th class="table-header-repeat line-left"><a href=""><a href="">ŞİFRE</a></th>
					<th class="table-header-repeat line-left"><a href="">AD SOYAD</a></th>
				<th class="table-header-repeat line-left minwidth-1">><a href="">TC KİMLİK</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">TELEFON</a></th>
				
		<th class="table-header-options line-left"><a href="">Seçenekler</a></th>
				</tr>

				
				<?php
				

$kacar = 50;

$ksayisi = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from radcheck WHERE  tip='1'   "));

$ssayisi = ceil ($ksayisi/$kacar);

$nereden = ($sayfa*$kacar) -$kacar;

$bul = mysqli_query($GLOBALS["___mysqli_ston"], "select * from radcheck WHERE  tip='1' order by id desc limit $nereden,$kacar");
while ($goster = mysqli_fetch_array($bul)) {
extract ($goster);
				
				
				?>
				<tr>
				
			
					<td><?php echo "{$username}"; ?></td>
					<td><?php echo "{$value}"; ?></td>
					<td><?php echo "{$adsoyad}"; ?></td>
					<td><?php echo "{$tcno}"; ?></td>
						<td><?php echo "{$telefon}"; ?></td>
                        <td class="options-width">
					<a href="Users.php?id=Useredit&edit=<?php echo "{$id}"; ?>" title="Düzenle" class="icon-1 info-tooltip"></a>
					<a href="Users.php?id=Delete&sil=<?php echo "{$id}"; ?>" title="Sil" class="icon-2 info-tooltip"></a>

					</td>
				</tr>

<?php } ?>




				
				</table>
				<!-- wwww.sametyilmaz.com.tr - www.UgurDemir.com --> 
				</form>
			</div>
			<!--  end content-table  -->
		
		<div id="actions-box">
				<a href="Save.php?id=Ghostclear" title="Bütün Logları temizler" onClick="return confirm('Bütün logları temizlemekten eminmisin ?')" ><img src="images/sil.png" width="32" height="32" /> </a>
				<div class="clear"></div>
			</div>
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				
				<div id="page-info">Sayfalar <strong><?php

$bul = mysqli_query($GLOBALS["___mysqli_ston"], "select * from radcheck order by id desc limit $nereden,$kacar");
for ($i=1; $i < $ssayisi; $i++) { ?>


<?php
echo "<a href='Users.php?id=ghost&s={$i} '> {$i} -</a>";
}

?>


 </strong> </div>
			
			</td>
			
			</tr>
			</table>
			<!--  end paging................ -->
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
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
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    


<?php

require_once ("inc/footer.php");


 }?>				 
						 
	<?php
	
} if($id == "tc"){
 
   ?>

     <?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
session_start();
// Teşekkürler Uğur Demir www.ugurdemir.com
 if ($_SESSION['username'] == "") {
header("location:Message.php?id=Yetki");
}
else {
	
	include ("inc/db_settings.php");
$sayfa = @$_GET["s"];
if (empty($sayfa) || !is_numeric ($sayfa)) {
$sayfa=1;

}


// Powered by Samet 




?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PfSense Ghost Radius Manager</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!--  checkbox styling script -->
<script src="js/jquery/ui.core.js" type="text/javascript"></script>
<script src="js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="js/jquery/jquery.bind.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>

<!--  styled select box script version 2 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({ 
          image: "images/forms/choose-file.gif",
          imageheight : 21,
          imagewidth : 78,
          width : 310
      });
  });
</script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 


<!--  date picker script -->
<link rel="stylesheet" href="css/datePicker.css" type="text/css" />
<script src="js/jquery/date.js" type="text/javascript"></script>
<script src="js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
};
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body> 
<!-- Start: page-top-outer -->
<?php require_once ("inc/menu.php"); ?>

 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>TC Kimlik Kullanıcıları</h1>
	</div>
	<!-- end page-heading -->

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
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
				<!--
				<!--  start message-yellow 
				<div id="message-yellow">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="yellow-left">You have a new message. <a href="">Go to Inbox.</a></td>
					<td class="yellow-right"><a class="close-yellow"><img src="images/table/icon_close_yellow.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-yellow -->
				
				<!--  start message-red 
				<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">Error. <a href="">Please try again.</a></td>
					<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-red
				
				<!--  start message-blue
				<div id="message-blue">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="blue-left">Welcome back. <a href="">View my account.</a> </td>
					<td class="blue-right"><a class="close-blue"><img src="images/table/icon_close_blue.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-blue
			
				<!--  start message-green
				<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left">Product added sucessfully. <a href="">Add new one.</a></td>
					<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-green --> 
	
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				
			<tr>
				
					<th class="table-header-repeat line-left minwidth-1"><a href="">KULLANICI ADI</a>	</th>
				<th class="table-header-repeat line-left"><a href=""><a href="">ŞİFRE</a></th>
					<th class="table-header-repeat line-left"><a href="">AD SOYAD</a></th>
				<th class="table-header-repeat line-left minwidth-1">><a href="">TC KİMLİK</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">DOĞUM TARİHİ</a></th>
				
		<th class="table-header-options line-left"><a href="">Seçenekler</a></th>
				</tr>

				
				<?php
				

$kacar = 50;

$ksayisi = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from radcheck WHERE  tip='2'   "));

$ssayisi = ceil ($ksayisi/$kacar);

$nereden = ($sayfa*$kacar) -$kacar;

$bul = mysqli_query($GLOBALS["___mysqli_ston"], "select * from radcheck WHERE  tip='2' order by id desc limit $nereden,$kacar");
while ($goster = mysqli_fetch_array($bul)) {
extract ($goster);
				
				
				?>
				<tr>
				
			
					<td><?php echo "{$username}"; ?></td>
					<td><?php echo "{$value}"; ?></td>
					<td><?php echo "{$adsoyad}"; ?></td>
					<td><?php echo "{$tcno}"; ?></td>
						<td><?php echo "{$dtarih}"; ?></td>
                        <td class="options-width">
					<a href="Users.php?id=Useredit&edit=<?php echo "{$id}"; ?>" title="Düzenle" class="icon-1 info-tooltip"></a>
					<a href="Users.php?id=Delete&sil=<?php echo "{$id}"; ?>" title="Sil" class="icon-2 info-tooltip"></a>

					</td>
				</tr>

<?php } ?>




				
				</table>
				<!-- wwww.sametyilmaz.com.tr - www.UgurDemir.com --> 
				</form>
			</div>
			<!--  end content-table  -->
		
<div id="actions-box">
				<a href="Save.php?id=cleartc" title="Bütün Logları temizler" onClick="return confirm('Bütün logları temizlemekten eminmisin ?')" ><img src="images/sil.png" width="32" height="32" /> </a>
				<div class="clear"></div>
			</div>
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				
				<div id="page-info">Sayfalar <strong><?php

$bul = mysqli_query($GLOBALS["___mysqli_ston"], "select * from radcheck order by id desc limit $nereden,$kacar");
for ($i=1; $i < $ssayisi; $i++) { ?>


<?php
echo "<a href='Users.php?id=tc&s={$i} '> {$i} -</a>";
}

?>


 </strong> </div>
			
			</td>
			
			</tr>
			</table>
			<!--  end paging................ -->
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
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
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    


<?php

require_once ("inc/footer.php");


 }?>      

	<?php
	
} if($id == "sms"){

  ?>


<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
session_start();
// $user1 = $_SESSION['user'];
 if ($_SESSION['username'] == "") {
header("location:Message.php?id=Yetki");
}
else {
	
	include ("inc/db_settings.php");
	
//sayfa cekiyoruz
$sayfa = @$_GET["s"];
// eğer sayfa sayısı boşssa yada sayı değilse numaraya yönlendir
if (empty($sayfa) || !is_numeric ($sayfa)) {
$sayfa=1;

}







?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PfSense Ghost Radius Manager</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!--  checkbox styling script -->
<script src="js/jquery/ui.core.js" type="text/javascript"></script>
<script src="js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="js/jquery/jquery.bind.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>

<!--  styled select box script version 2 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({ 
          image: "images/forms/choose-file.gif",
          imageheight : 21,
          imagewidth : 78,
          width : 310
      });
  });
</script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 


<!--  date picker script -->
<link rel="stylesheet" href="css/datePicker.css" type="text/css" />
<script src="js/jquery/date.js" type="text/javascript"></script>
<script src="js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
};
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body> 
<!-- Start: page-top-outer -->
<?php require_once ("inc/menu.php"); ?>

 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Sms Kullanıcıları</h1>
	</div>
	<!-- end page-heading -->

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
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
				<!--
				<!--  start message-yellow 
				<div id="message-yellow">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="yellow-left">You have a new message. <a href="">Go to Inbox.</a></td>
					<td class="yellow-right"><a class="close-yellow"><img src="images/table/icon_close_yellow.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-yellow -->
				
				<!--  start message-red 
				<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">Error. <a href="">Please try again.</a></td>
					<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-red
				
				<!--  start message-blue
				<div id="message-blue">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="blue-left">Welcome back. <a href="">View my account.</a> </td>
					<td class="blue-right"><a class="close-blue"><img src="images/table/icon_close_blue.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-blue
			
				<!--  start message-green
				<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left">Product added sucessfully. <a href="">Add new one.</a></td>
					<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-green --> 
	
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				
			<tr>
				
					<th class="table-header-repeat line-left minwidth-1"><a href="">KULLANICI ADI</a>	</th>
				<th class="table-header-repeat line-left"><a href=""><a href="">ŞİFRE</a></th>
					<th class="table-header-repeat line-left"><a href="">AD SOYAD</a></th>

					<th class="table-header-repeat line-left minwidth-1"><a href="">TELEFON</a></th>
				
		<th class="table-header-options line-left"><a href="">Seçenekler</a></th>
				</tr>

				
				<?php
				

$kacar = 50;

$ksayisi = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from radcheck WHERE  tip='3'   "));

$ssayisi = ceil ($ksayisi/$kacar);

$nereden = ($sayfa*$kacar) -$kacar;
mysqli_query($GLOBALS["___mysqli_ston"], "SET NAMES UTF8");
$bul = mysqli_query($GLOBALS["___mysqli_ston"], "select * from radcheck WHERE  tip='3' order by id desc limit $nereden,$kacar");
while ($goster = mysqli_fetch_array($bul)) {
extract ($goster);
				
				
				?>
				<tr>
				
			
					<td><?php echo "{$username}"; ?></td>
					<td><?php echo "{$value}"; ?></td>
					<td><?php echo "{$adsoyad}"; ?></td>
						<td><?php echo "{$telefon}"; ?></td>
                        <td class="options-width">
					<a href="Users.php?id=Useredit&edit=<?php echo "{$id}"; ?>" title="Düzenle" class="icon-1 info-tooltip"></a>
					<a href="Users.php?id=Delete&sil=<?php echo "{$id}"; ?>" title="Sil" class="icon-2 info-tooltip"></a>

					</td>
				</tr>

<?php } ?>




				
				</table>
				<!-- wwww.sametyilmaz.com.tr - www.UgurDemir.com --> 
				</form>
			</div>
			<!--  end content-table  -->
		
	<div id="actions-box">
				<a href="Save.php?id=smsclear" title="Bütün Logları temizler" onClick="return confirm('Bütün logları temizlemekten eminmisin ?')" ><img src="images/sil.png" width="32" height="32" /> </a>
				<div class="clear"></div>
			</div>
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				
				<div id="page-info">Sayfalar <strong><?php

$bul = mysqli_query($GLOBALS["___mysqli_ston"], "select * from radcheck order by id desc limit $nereden,$kacar");
for ($i=1; $i < $ssayisi; $i++) { ?>


<?php
echo "<a href='Users.php?id=sms&s={$i} '> {$i} -</a>";
}

?>


 </strong> </div>
			
			</td>
			
			</tr>
			</table>
			<!--  end paging................ -->
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
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
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    


<?php

require_once ("inc/footer.php");


 }?>

 
 	<?php
	
} if($id == "Delete"){
 
   
   
   
   ?>
<?php
session_start();
  error_reporting(E_ALL ^ E_NOTICE);
  ini_set('error_reporting', E_ALL ^ E_NOTICE);
// $user1 = $_SESSION['user'];
	include ("inc/db_settings.php");

if($_GET["sil"])
{
    $id = $_GET["sil"];

	
    $sil ="DELETE FROM radcheck WHERE id='$id'";
    $sorgu=mysqli_query($GLOBALS["___mysqli_ston"], $sil);
	
	
    
if($sorgu){
header("location:Message.php?id=Basarili");

 }else{
header("location:Message.php?id=Hata");
    }}





?>
 	<?php
	
} if($id == "UserSave"){
   
   ?>
<?php
   
           $id = $_GET["Save"]; 
                   
$username=$_POST['username'];
$value=$_POST['value'];
$adsoyad=$_POST['adsoyad'];
$telefon=$_POST['telefon'];
$tcno=$_POST['tcno'];
$dtarih=$_POST['dtarih'];
$degis=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE radcheck SET username='$username',value='$value',adsoyad='$adsoyad',telefon='$telefon',tcno='$tcno',dtarih='$dtarih' WHERE id='$id'   ") or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
if($degis){
header("location:Message.php?id=Basarili");

 }else{
header("location:Message.php?id=Hata");
    }

?>





 	<?php
	
} if($id == "Useredit"){
 
   
   
   
   ?>
       
 <?php

error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
session_start();
// $user1 = $_SESSION['user'];
 if ($_SESSION['username'] == "") {
header("location:Message.php?id=Yetki");
}
else {
	
	include ("inc/db_settings.php");



require_once ("inc/header.php");

$id = $_GET["edit"];

$sql = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM radcheck WHERE id='$id'"); 
while($row=mysqli_fetch_array($sql)) {
$id = $row["id"]; 
$username = $row["username"]; 
$attribute = $row["attribute"]; 
$op = $row["op"];
$value = $row["value"];
$telefon = $row["telefon"];
$tcno = $row["tcno"];
$adsoyad = $row["adsoyad"];
$dtarih = $row["dtarih"];
  }
?>

<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Kullanıcı Bilgileri</h1></div>


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

	
		<form action="Users.php?id=UserSave&Save=<?=$id;?>" method="POST" >
		<table width="600" border="0" cellpadding="0" cellspacing="0"  id="id-form">
  <th width="394" valign="top">Özellikler</th>
		
		
		

		
										<tr>
			<th valign="top">Ad Soyad:</th>
			<td><input type="text" name="adsoyad" value="<?=$adsoyad;?>"  class="inp-form" /></td>
			<td></td>
		</tr>
		
		
		<tr>
			<th valign="top">Kullanıcı Adı </th>
			<td><input type="text" name="username" value="<?=$username;?>"  class="inp-form" />
			</td>
			<td></td>
		</tr>
		
		
						<tr>
			<th valign="top">Şifre:</th>
			<td><input type="text" name="value" value="<?=$value;?>"  class="inp-form" /></td>
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
<?php } ?>
 
 
 


		   <?php
                        }
                        }
                       ob_end_flush();  
?>

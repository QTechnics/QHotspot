<?php

error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
session_start();
// Teşekkürler Bülent Gür... www.networkakademi.net
if ($_SESSION['username'] == "") {
    header("location:Message.php?id=Yetki");
}
else {
include("inc/db_settings.php");

$id = !empty($_GET['id']) ? ($_GET['id']) : null;

{

    ?>


    <?php

} if ($id == "details"){


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

include("inc/db_settings.php");

//sayfa cekiyoruz
$sayfa = @$_GET["s"];

// eğer sayfa sayısı boşssa yada sayı değilse numaraya yönlendir
if (empty($sayfa) || !is_numeric($sayfa)) {
    $sayfa = 1;

}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="Expires" content="0">
    <title>PfSense Ghost Radius Manager</title>
    <link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default"/>
    <!--[if IE]>
    <link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css"/>
    <![endif]-->

    <!--  jquery core -->
    <script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

    <!--  checkbox styling script -->
    <script src="js/jquery/ui.core.js" type="text/javascript"></script>
    <script src="js/jquery/ui.checkbox.js" type="text/javascript"></script>
    <script src="js/jquery/jquery.bind.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $('input').checkBox();
            $('#toggle-all').click(function () {
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
        $(document).ready(function () {
            $('.styledselect').selectbox({inputClass: "selectbox_styled"});
        });
    </script>


    <![endif]>

    <!--  styled select box script version 2 -->
    <script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.styledselect_form_1').selectbox({inputClass: "styledselect_form_1"});
            $('.styledselect_form_2').selectbox({inputClass: "styledselect_form_2"});
        });
    </script>

    <!--  styled select box script version 3 -->
    <script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.styledselect_pages').selectbox({inputClass: "styledselect_pages"});
        });
    </script>

    <!--  styled file upload script -->
    <script src="js/jquery/jquery.filestyle.js" type="text/javascript"></script>
    <script type="text/javascript" charset="utf-8">
        $(function () {
            $("input.file_1").filestyle({
                image: "images/forms/choose-file.gif",
                imageheight: 21,
                imagewidth: 78,
                width: 310
            });
        });
    </script>

    <!-- Custom jquery scripts -->
    <script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

    <!-- Tooltips -->
    <script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>
    <script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
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
    <link rel="stylesheet" href="css/datePicker.css" type="text/css"/>
    <script src="js/jquery/date.js" type="text/javascript"></script>
    <script src="js/jquery/jquery.datePicker.js" type="text/javascript"></script>
    <script type="text/javascript" charset="utf-8">
        $(function () {

// initialise the "Select date" link
            $('#date-pick')
                .datePicker(
                    // associate the link with a date picker
                    {
                        createButton: false,
                        startDate: '01/01/2005',
                        endDate: '31/12/2020'
                    }
                ).bind(
                // when the link is clicked display the date picker
                'click',
                function () {
                    updateSelects($(this).dpGetSelected()[0]);
                    $(this).dpDisplay();
                    return false;
                }
            ).bind(
                // when a date is selected update the SELECTs
                'dateSelected',
                function (e, selectedDate, $td, state) {
                    updateSelects(selectedDate);
                }
            ).bind(
                'dpClosed',
                function (e, selected) {
                    updateSelects(selected[0]);
                }
            );

            var updateSelects = function (selectedDate) {
                var selectedDate = new Date(selectedDate);
                $('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
                $('#m option[value=' + (selectedDate.getMonth() + 1) + ']').attr('selected', 'selected');
                $('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
            };
// listen for when the selects are changed and update the picker
            $('#d, #m, #y')
                .bind(
                    'change',
                    function () {
                        var d = new Date(
                            $('#y').val(),
                            $('#m').val() - 1,
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
        $(document).ready(function () {
            $(document).pngFix();
        });
    </script>
</head>
<body>
<!-- Start: page-top-outer -->
<?php require_once("inc/menu.php"); ?>


<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
    <!-- start content -->
    <div id="content">

        <!--  start page-heading -->
        <div id="page-heading">
            <h1>Detaylı Kullanıcı Logları </h1>
        </div>
        <!-- end page-heading -->

        <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
            <tr>
                <th rowspan="4" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300"
                                                   alt=""/></th>
                <th class="topleft"></th>
                <td id="tbl-border-top">&nbsp;</td>
                <th class="topright"></th>
                <th rowspan="4" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300"
                                                   alt=""/></th>
            </tr>

            <!-- ylmz, kullanici arama -->
            <tr>
                <td id="tbl-border-left"></td>
                <td>
                    <form action="Logs.php?id=details" method="POST">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" id="id-form">
                            <?php
                            $userfilter = trim($_POST['userfilter']);
                            if (empty($userfilter)) {
                                $userfilter = trim(@$_GET["userfilter"]);
                            }
                            $ipfilter = trim($_POST['ipfilter']);
                            if (empty($ipfilter)) {
                                $ipfilter = trim(@$_GET["ipfilter"]);
                            }
                            ?>
                            <tr>
                                <td width="10"></td>
                                <td width="100"><h4><br>Kullanıcı Adı</h4></td>
                                <td colspan="3" width="200"><input type="text" name="userfilter" class="inp-form"
                                                                   value="<?php echo $userfilter; ?>"/></td>
                            </tr>
                            <tr>
                                <td width="10"></td>
                                <td width="100">
                                    <h4><br>Ip Adresi<h4>
                                </td>
                                <td width="200"><input type="text" name="ipfilter" class="inp-form"
                                                       value="<?php echo $ipfilter; ?>"/></td>
                                <td width="10"></td>
                                <td><input type="submit" class="form-filter"/></td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
            <!-- ylmz, kullanıcı arama -->

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

                                        <th class="table-header-repeat line-left"><a href="">Kullanıcı Adı</a></th>
                                        <th class="table-header-repeat line-left minwidth-1"><a href="">Başlangıç T.</a>
                                        </th>
                                        <th class="table-header-repeat line-left"><a href="">Bitiş T.</a></th>
                                        <th class="table-header-repeat line-left"><a href="">Upload</a></th>
                                        <th class="table-header-repeat line-left"><a href="">Download</a></th>
                                        <th class="table-header-repeat line-left"><a href="">IP</a></th>
                                        <th class="table-header-repeat line-left"><a href="">MAC</a></th>
                                        <th class="table-header-repeat line-left"><a href="">Oturum Süresi</a></th>

                                    </tr>


                                    <?php


                                    $kacar = 50;

                                    // ylmz, kullanici filtre eklenmesi
                                    // *****************************************************************
                                    $userfilter = trim($_POST['userfilter']);
                                    if (empty($userfilter)) {
                                        $userfilter = trim(@$_GET["userfilter"]);
                                    }
                                    $ipfilter = trim($_POST['ipfilter']);
                                    if (empty($ipfilter)) {
                                        $ipfilter = trim(@$_GET["ipfilter"]);
                                    }
                                    $wheretxt = "";
                                    if (!empty($userfilter) or !empty($ipfilter)) {
                                        if (!empty($userfilter)) {
                                            $wheretxt = " where username like '" . $userfilter . "%' ";
                                        }
                                        if (!empty($ipfilter)) {
                                            if (!empty($wheretxt)) {
                                                $wheretxt = $wheretxt . " and ";
                                            } else {
                                                $wheretxt = " where ";
                                            }
                                            $wheretxt = $wheretxt . "framedipaddress = '" . $ipfilter . "' ";
                                        }
                                    } else {
                                        $wheretxt = " ";
                                    }

                                    // $ksayisi = mysql_num_rows (mysql_query("select radacctid from radacct"));
                                    // ylmz, yukaridakinin yerine asagidaki yontem daha hizli sonuc verecektir
                                    $countquery = mysqli_query($GLOBALS["___mysqli_ston"], "select count(*) as 'reccount' from radacct" . $wheretxt);
                                    $countquery->data_seek(0);
                                    $data = $countquery->fetch_array();
                                    $ksayisi = $data["reccount"];
                                    // *****************************************************************

                                    $ssayisi = ceil($ksayisi / $kacar);

                                    $nereden = ($sayfa * $kacar) - $kacar;

                                    $bul = mysqli_query($GLOBALS["___mysqli_ston"], "select * from radacct " . $wheretxt . "order by radacctid desc limit $nereden,$kacar");
                                    while ($goster = mysqli_fetch_array($bul)) {
                                        extract($goster);

                                        $upload = round($acctinputoctets / 1024 / 1024, 2);
                                        $download = round($acctoutputoctets / 1024 / 1024, 2);

                                        if ($acctsessiontime < 60) {
                                            $sure = $acctsessiontime . " sn";
                                        } else {
                                            $gun = floor($acctsessiontime / 86400);
                                            $saat = floor(($acctsessiontime - $gun * 86400) / 3600);
                                            $dakika = floor(($acctsessiontime - $gun * 86400 - $saat * 3600) / 60);
                                            $sure = "";
                                            if ($dakika > 0) {
                                                $sure = $dakika . " dk";
                                            }
                                            if ($saat > 0) {
                                                $sure = $saat . " saat " . $sure;
                                            }
                                            if ($gun > 0) {
                                                $sure = $gun . " gün " . $sure;
                                            }
                                        }
                                        ?>
                                        <tr>

                                            <td><?php echo "{$username}"; ?></td>
                                            <td><?php echo "{$acctstarttime}"; ?></td>
                                            <td><a href=""><?php echo "{$acctstoptime}"; ?></a></td>
                                            <td><?php echo "{$upload} MB"; ?></td>
                                            <td><?php echo "{$download} MB"; ?></td>
                                            <td><?php echo "{$framedipaddress}"; ?></td>
                                            <td><?php echo "{$callingstationid}"; ?></td>
                                            <td><?php echo "{$sure}"; ?></td>
                                        </tr>

                                    <?php } ?>


                                </table>
                                <!-- wwww.sametyilmaz.com.tr - www.UgurDemir.com -->
                            </form>
                        </div>
                        <!--  end content-table  -->

                        <!--  start actions-box ............................................... -->
                        <div id="actions-box">
                            <a href="Save.php?id=RadAcctDelete&userfilter=<?php echo $userfilter ?>&ipfilter=<?php echo $ipfilter ?>"
                               title="Bütün/Filtrelenen logları temizler"
                               onClick="return confirm('Bütün/Filtrelenen logları temizlemekten eminmisin ?')"><img
                                        src="images/sil.png" width="32" height="32"/> </a>
                            <div class="clear"></div>
                        </div>
                        <!-- end actions-box........... -->

                        <!--  start paging..................................................... -->
                        <table border="0" cellpadding="0" cellspacing="0" id="paging-table">
                            <tr>
                                <td>

                                    <div id="page-info">Sayfalar <strong><?php

                                            $bul = mysqli_query($GLOBALS["___mysqli_ston"], "select * from radacct" . $wheretxt . "order by radacctid desc limit $nereden,$kacar");
                                            for ($i = 1; $i < $ssayisi; $i++) { ?>


                                                <?php
                                                echo "<a href='Logs.php?id=details&userfilter={$userfilter}&ipfilter={$ipfilter}&s={$i} '> {$i} -</a>";
                                            }

                                            ?>


                                        </strong></div>

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

require_once("inc/footer.php");


} ?>

<?php

} if ($id == "access"){

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

include("inc/db_settings.php");

//sayfa cekiyoruz
$sayfa = @$_GET["s"];

// eğer sayfa sayısı boşssa yada sayı değilse numaraya yönlendir
if (empty($sayfa) || !is_numeric($sayfa)) {
    $sayfa = 1;

}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>PfSense Ghost Radius Manager</title>
    <link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default"/>
    <!--[if IE]>
    <link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css"/>
    <![endif]-->

    <!--  jquery core -->
    <script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

    <!--  checkbox styling script -->
    <script src="js/jquery/ui.core.js" type="text/javascript"></script>
    <script src="js/jquery/ui.checkbox.js" type="text/javascript"></script>
    <script src="js/jquery/jquery.bind.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $('input').checkBox();
            $('#toggle-all').click(function () {
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
        $(document).ready(function () {
            $('.styledselect').selectbox({inputClass: "selectbox_styled"});
        });
    </script>


    <![endif]>

    <!--  styled select box script version 2 -->
    <script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.styledselect_form_1').selectbox({inputClass: "styledselect_form_1"});
            $('.styledselect_form_2').selectbox({inputClass: "styledselect_form_2"});
        });
    </script>

    <!--  styled select box script version 3 -->
    <script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.styledselect_pages').selectbox({inputClass: "styledselect_pages"});
        });
    </script>

    <!--  styled file upload script -->
    <script src="js/jquery/jquery.filestyle.js" type="text/javascript"></script>
    <script type="text/javascript" charset="utf-8">
        $(function () {
            $("input.file_1").filestyle({
                image: "images/forms/choose-file.gif",
                imageheight: 21,
                imagewidth: 78,
                width: 310
            });
        });
    </script>

    <!-- Custom jquery scripts -->
    <script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

    <!-- Tooltips -->
    <script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>
    <script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
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
    <link rel="stylesheet" href="css/datePicker.css" type="text/css"/>
    <script src="js/jquery/date.js" type="text/javascript"></script>
    <script src="js/jquery/jquery.datePicker.js" type="text/javascript"></script>
    <script type="text/javascript" charset="utf-8">
        $(function () {

// initialise the "Select date" link
            $('#date-pick')
                .datePicker(
                    // associate the link with a date picker
                    {
                        createButton: false,
                        startDate: '01/01/2005',
                        endDate: '31/12/2020'
                    }
                ).bind(
                // when the link is clicked display the date picker
                'click',
                function () {
                    updateSelects($(this).dpGetSelected()[0]);
                    $(this).dpDisplay();
                    return false;
                }
            ).bind(
                // when a date is selected update the SELECTs
                'dateSelected',
                function (e, selectedDate, $td, state) {
                    updateSelects(selectedDate);
                }
            ).bind(
                'dpClosed',
                function (e, selected) {
                    updateSelects(selected[0]);
                }
            );

            var updateSelects = function (selectedDate) {
                var selectedDate = new Date(selectedDate);
                $('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
                $('#m option[value=' + (selectedDate.getMonth() + 1) + ']').attr('selected', 'selected');
                $('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
            };
// listen for when the selects are changed and update the picker
            $('#d, #m, #y')
                .bind(
                    'change',
                    function () {
                        var d = new Date(
                            $('#y').val(),
                            $('#m').val() - 1,
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
        $(document).ready(function () {
            $(document).pngFix();
        });
    </script>
</head>
<body>
<!-- Start: page-top-outer -->
<?php require_once("inc/menu.php"); ?>


<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
    <!-- start content -->
    <div id="content">

        <!--  start page-heading -->
        <div id="page-heading">
            <h1>Kullanıcı Giriş Logları </h1>
        </div>
        <!-- end page-heading -->

        <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
            <tr>
                <th rowspan="4" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300"
                                                   alt=""/></th>
                <th class="topleft"></th>
                <td id="tbl-border-top">&nbsp;</td>
                <th class="topright"></th>
                <th rowspan="4" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300"
                                                   alt=""/></th>
            </tr>

            <!-- ylmz, kullanici arama -->
            <tr>
                <td id="tbl-border-left"></td>
                <td>
                    <form action="Logs.php?id=access" method="POST">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" id="id-form">
                            <tr height="60">
                                <td width="10"></td>
                                <td width="100">
                                    <h4><br>Kullanıcı Adı<h4>
                                </td>
                                <?php $userfilter = trim($_POST['userfilter']);
                                if (empty($userfilter)) {
                                    $userfilter = trim(@$_GET["userfilter"]);
                                }
                                ?>
                                <td width="100"><input type="text" name="userfilter" class="inp-form"
                                                       value="<?php echo $userfilter; ?>"/></td>
                                <td width="10"></td>
                                <td><input type="submit" class="form-filter"/></td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
            <!-- ylmz, kullanici arama -->

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

                                        <th class="table-header-repeat line-left minwidth-1"><a href="">Kullanıcı
                                                Adı</a></th>
                                        <th class="table-header-repeat line-left minwidth-1"><a href="">Şifre</a></th>
                                        <th class="table-header-repeat line-left"><a href="">Cevap</a></th>
                                        <th class="table-header-repeat line-left"><a href="">Giriş Tarihi</a></th>

                                    </tr>


                                    <?php


                                    $kacar = 50;

                                    // ylmz, kullanici filtre eklenmesi
                                    // *****************************************************************
                                    $userfilter = trim($_POST['userfilter']);
                                    if (empty($userfilter)) {
                                        $userfilter = trim(@$_GET["userfilter"]);
                                    }
                                    $wheretxt = " ";
                                    if (!empty($userfilter)) {
                                        $wheretxt = " where username like '" . $userfilter . "%' ";
                                    }

                                    // $ksayisi = mysql_num_rows (mysql_query("select id from radpostauth"));
                                    // ylmz, yukaridakinin yerine asagidaki yontem daha hizli sonuc verecektir
                                    $countquery = mysqli_query($GLOBALS["___mysqli_ston"], "select count(*) as 'reccount' from radpostauth" . $wheretxt);
                                    $countquery->data_seek(0);
                                    $data = $countquery->fetch_array();
                                    $ksayisi = $data["reccount"];
                                    // *****************************************************************


                                    $ssayisi = ceil($ksayisi / $kacar);

                                    $nereden = ($sayfa * $kacar) - $kacar;

                                    $bul = mysqli_query($GLOBALS["___mysqli_ston"], "select * from radpostauth" . $wheretxt . "order by id desc limit $nereden,$kacar");
                                    while ($goster = mysqli_fetch_array($bul)) {
                                        extract($goster);


                                        ?>
                                        <tr>

                                            <td><?php echo "{$username}"; ?></td>
                                            <td><?php echo "{$pass}"; ?></td>
                                            <td><a href=""><?php echo "{$reply}"; ?></a></td>
                                            <td><?php echo "{$authdate}"; ?></td>

                                        </tr>

                                    <?php } ?>


                                </table>
                                <!-- wwww.sametyilmaz.com.tr - www.UgurDemir.com -->
                            </form>
                        </div>
                        <!--  end content-table  -->

                        <!--  start actions-box ............................................... -->
                        <div id="actions-box">
                            <a href="Save.php?id=PostLogDelete&userfilter=<?php echo $userfilter ?>"
                               title="Bütün/Filtrelenen logları temizler"
                               onClick="return confirm('Bütün/Filtrelenen logları temizlemekten eminmisin ?')"><img
                                        src="images/sil.png" width="32" height="32"/> </a>
                            <div class="clear"></div>
                        </div>
                        <!-- end actions-box........... -->

                        <!--  start paging..................................................... -->
                        <table border="0" cellpadding="0" cellspacing="0" id="paging-table">
                            <tr>
                                <td>

                                    <div id="page-info">Sayfalar <strong><?php

                                            $bul = mysqli_query($GLOBALS["___mysqli_ston"], "select * from radpostauth" . $wheretxt . "order by id desc limit $nereden,$kacar");
                                            for ($i = 1; $i < $ssayisi; $i++) { ?>


                                                <?php
                                                echo "<a href='Logs.php?id=access&userfilter={$userfilter}&s={$i} '> {$i} -</a>";
                                            }

                                            ?>


                                        </strong></div>

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

require_once("inc/footer.php");

} ?>


<?php

} if ($id == "sms"){
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

include("inc/db_settings.php");

//sayfa cekiyoruz
$sayfa = @$_GET["s"];
// eğer sayfa sayısı boşssa yada sayı değilse numaraya yönlendir
if (empty($sayfa) || !is_numeric($sayfa)) {
    $sayfa = 1;

}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>PfSense Ghost Radius Manager</title>
    <link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default"/>
    <!--[if IE]>
    <link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css"/>
    <![endif]-->

    <!--  jquery core -->
    <script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

    <!--  checkbox styling script -->
    <script src="js/jquery/ui.core.js" type="text/javascript"></script>
    <script src="js/jquery/ui.checkbox.js" type="text/javascript"></script>
    <script src="js/jquery/jquery.bind.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $('input').checkBox();
            $('#toggle-all').click(function () {
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
        $(document).ready(function () {
            $('.styledselect').selectbox({inputClass: "selectbox_styled"});
        });
    </script>


    <![endif]>

    <!--  styled select box script version 2 -->
    <script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.styledselect_form_1').selectbox({inputClass: "styledselect_form_1"});
            $('.styledselect_form_2').selectbox({inputClass: "styledselect_form_2"});
        });
    </script>

    <!--  styled select box script version 3 -->
    <script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.styledselect_pages').selectbox({inputClass: "styledselect_pages"});
        });
    </script>

    <!--  styled file upload script -->
    <script src="js/jquery/jquery.filestyle.js" type="text/javascript"></script>
    <script type="text/javascript" charset="utf-8">
        $(function () {
            $("input.file_1").filestyle({
                image: "images/forms/choose-file.gif",
                imageheight: 21,
                imagewidth: 78,
                width: 310
            });
        });
    </script>

    <!-- Custom jquery scripts -->
    <script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

    <!-- Tooltips -->
    <script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>
    <script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
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
    <link rel="stylesheet" href="css/datePicker.css" type="text/css"/>
    <script src="js/jquery/date.js" type="text/javascript"></script>
    <script src="js/jquery/jquery.datePicker.js" type="text/javascript"></script>
    <script type="text/javascript" charset="utf-8">
        $(function () {

// initialise the "Select date" link
            $('#date-pick')
                .datePicker(
                    // associate the link with a date picker
                    {
                        createButton: false,
                        startDate: '01/01/2005',
                        endDate: '31/12/2020'
                    }
                ).bind(
                // when the link is clicked display the date picker
                'click',
                function () {
                    updateSelects($(this).dpGetSelected()[0]);
                    $(this).dpDisplay();
                    return false;
                }
            ).bind(
                // when a date is selected update the SELECTs
                'dateSelected',
                function (e, selectedDate, $td, state) {
                    updateSelects(selectedDate);
                }
            ).bind(
                'dpClosed',
                function (e, selected) {
                    updateSelects(selected[0]);
                }
            );

            var updateSelects = function (selectedDate) {
                var selectedDate = new Date(selectedDate);
                $('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
                $('#m option[value=' + (selectedDate.getMonth() + 1) + ']').attr('selected', 'selected');
                $('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
            };
// listen for when the selects are changed and update the picker
            $('#d, #m, #y')
                .bind(
                    'change',
                    function () {
                        var d = new Date(
                            $('#y').val(),
                            $('#m').val() - 1,
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
        $(document).ready(function () {
            $(document).pngFix();
        });
    </script>
</head>
<body>
<!-- Start: page-top-outer -->
<?php require_once("inc/menu.php"); ?>


<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
    <!-- start content -->
    <div id="content">

        <!--  start page-heading -->
        <div id="page-heading">
            <h1>Sms Logları </h1>
        </div>
        <!-- end page-heading -->

        <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
            <tr>
                <th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300"
                                                   alt=""/></th>
                <th class="topleft"></th>
                <td id="tbl-border-top">&nbsp;</td>
                <th class="topright"></th>
                <th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300"
                                                   alt=""/></th>
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

                                        <th class="table-header-repeat line-left minwidth-1"><a href="">Ad Soyad</a>
                                        </th>
                                        <th class="table-header-repeat line-left minwidth-1"><a href="">Telefon</a></th>
                                        <th class="table-header-repeat line-left"><a href="">Kullanıcı Adı</a></th>
                                        <th class="table-header-repeat line-left"><a href="">Şifre</a></th>
                                        <th class="table-header-repeat line-left"><a href="">Gönderim</a></th>

                                    </tr>


                                    <?php


                                    $kacar = 50;

                                    $ksayisi = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select id from log"));

                                    $ssayisi = ceil($ksayisi / $kacar);

                                    $nereden = ($sayfa * $kacar) - $kacar;

                                    $bul = mysqli_query($GLOBALS["___mysqli_ston"], "select * from log order by id desc limit $nereden,$kacar");
                                    while ($goster = mysqli_fetch_array($bul)) {
                                        extract($goster);


                                        ?>
                                        <tr>

                                            <td><?php echo "{$ad} {$soyad}"; ?></td>
                                            <td><?php echo "{$telefon}"; ?></td>
                                            <td><a href=""><?php echo "{$username}"; ?></a></td>
                                            <td><?php echo "{$password}"; ?></td>
                                            <td>


                                                <?php

                                                switch ($hata) {
                                                    case "0":
                                                        echo "Başarılı";
                                                        break;
                                                    case "1":
                                                        echo "Başarısız";
                                                        break;


                                                }
                                                ?>

                                            </td>


                                        </tr>

                                    <?php } ?>


                                </table>
                                <!-- wwww.sametyilmaz.com.tr - www.UgurDemir.com -->
                            </form>
                        </div>
                        <!--  end content-table  -->

                        <!--  start actions-box ............................................... -->
                        <div id="actions-box">
                            <a href="Save.php?id=SmsLogsDelete" title="Bütün Logları temizler"
                               onClick="return confirm('Bütün logları temizlemekten eminmisin ?')"><img
                                        src="images/sil.png" width="32" height="32"/> </a>
                            <div class="clear"></div>
                        </div>
                        <!-- end actions-box........... -->

                        <!--  start paging..................................................... -->
                        <table border="0" cellpadding="0" cellspacing="0" id="paging-table">
                            <tr>
                                <td>

                                    <div id="page-info">Sayfalar <strong><?php

                                            $bul = mysqli_query($GLOBALS["___mysqli_ston"], "select * from log order by id desc limit $nereden,$kacar");
                                            for ($i = 1; $i < $ssayisi; $i++) { ?>


                                                <?php
                                                echo "<a href='Logs.php?id=sms&s={$i} '> {$i} -</a>";
                                            }

                                            ?>


                                        </strong></div>

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

require_once("inc/footer.php");

} ?>




<?php
}
}

?>

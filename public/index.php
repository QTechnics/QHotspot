<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
session_start();
// $user1 = $_SESSION['user'];
if ($_SESSION['username'] == "") {
    header("location:Login.php");
} else {

    include("inc/db_settings.php");
    require_once("inc/header.php");


    $sayfa = @$_GET["s"];
    if (empty($sayfa) || !is_numeric($sayfa)) {
        $sayfa = 1;
    }
    ?>


    <!-- start content-outer ........................................................................................................................START -->
    <div id="content-outer">
        <!-- start content -->
        <div id="content">


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
                                <table width="942" height="325" border="0" style="margin-left:30px;">
                                    <tr>
                                        <td width="147" height="165"><a href="New.php?id=useradd"><img
                                                        src="images/newuser.gif" width="179" height="188"/></a></td>
                                        <td width="147"><a href="New.php?id=attribute"><img
                                                        src="images/newattribute.gif" alt="" width="179" height="188"/></a>
                                        </td>
                                        <td width="147"><a href="Users.php?id=ghost"><img src="images/ghostusers.gif"
                                                                                          alt="" width="179"
                                                                                          height="188"/></a></td>
                                        <td width="147"><a href="Users.php?id=tc"><img src="images/turkey.gif" alt=""
                                                                                       width="179" height="188"/></a>
                                        </td>
                                        <td width="160"><a href="Users.php?id=sms"><img src="images/sms.gif" alt=""
                                                                                        width="179" height="188"/></a>
                                        </td>
                                        <td width="154"><a href="Logs.php?id=access"><img src="images/access.gif" alt=""
                                                                                          width="179" height="188"/></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="Logs.php?id=details"><img src="images/details.gif" alt=""
                                                                               width="179" height="188"/></a></td>
                                        <td><a href="Logs.php?id=sms"><img src="images/smslogs.gif" alt="" width="179"
                                                                           height="188"/></a></td>
                                        <td><a href="Attribute.php?id=radcheck"><img src="images/radcheck.gif" alt=""
                                                                                     width="179" height="188"/></a></td>
                                        <td><a href="Attribute.php?id=radreply"><img src="images/radreply.gif" alt=""
                                                                                     width="179" height="188"/></a></td>
                                        <td><a href="Settings.php?id=general"><img src="images/settings.gif" alt=""
                                                                                   width="179" height="188"/></a></td>
                                        <td><a href="Settings.php?id=password"><img src="images/ghostpass.gif" alt=""
                                                                                    width="179" height="188"/></a></td>

                                    </tr>

                                </table>
                                <br/>
                                </h2>
                                <h1>Online Kullanıcılar</h1><br/>

                                <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">

                                    <tr>

                                        <th class="table-header-repeat line-left minwidth-1"><a href="">KULLANICI
                                                ADI</a></th>
                                        <th class="table-header-repeat line-left"><a href=""><a href="">BAŞLANGIÇ
                                                    TARİHİ</a></th>
                                        <th class="table-header-repeat line-left"><a href="">IP ADRESİ</a></th>
                                        <th class="table-header-repeat line-left minwidth-1">><a href="">MAC ADRESİ</a>
                                        </th>

                                    </tr>


                                    <?php


                                    $kacar = 50;

                                    $ksayisi = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM radacct WHERE acctstoptime IS NULL"));

                                    $ssayisi = ceil($ksayisi / $kacar);

                                    $nereden = ($sayfa * $kacar) - $kacar;

                                    $bul = mysqli_query($GLOBALS["___mysqli_ston"], "select * from radacct WHERE acctstoptime IS NULL order by radacctid desc limit $nereden,$kacar");
                                    while ($goster = mysqli_fetch_array($bul)) {
                                        extract($goster);


                                        ?>
                                        <tr>


                                            <td><?php echo "{$username}"; ?></td>
                                            <td><?php echo "{$acctstarttime}"; ?></td>
                                            <td><?php echo "{$framedipaddress}"; ?></td>
                                            <td><?php echo "{$callingstationid}"; ?></td>
                                        </tr>


                                    <?php } ?>


                                </table>
                                <!-- wwww.sametyilmaz.com.tr - www.UgurDemir.com -->
                                </form>
                            </div>
                            <!--  end content-table  -->

                            <!--  start actions-box ............................................... -->

                            <!-- end actions-box........... -->

                            <!--  start paging..................................................... -->
                            <table border="0" cellpadding="0" cellspacing="0" id="paging-table">
                                <tr>
                                    <td>

                                        <div id="page-info">Sayfalar <strong><?php

                                                $bul = mysqli_query($GLOBALS["___mysqli_ston"], "select * from radacct order by radacctid desc limit $nereden,$kacar");
                                                for ($i = 1; $i < $ssayisi; $i++) { ?>


                                                    <?php
                                                    echo "<a href='index.php?s={$i} '> {$i} -</a>";
                                                }

                                                ?>


                                            </strong></div>

                                    </td>

                                </tr>
                            </table>
                            <!--  end paging................ -->
                        </div>
                        <!--  end table-content  -->

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
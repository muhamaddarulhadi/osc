<?php
    $pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && ($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache');  //check whether page is refresh or not

    foreach($_GET as $loc=>$email)
    $_GET[$loc] = base64_decode(urldecode($email));

    if(isset($_GET[$loc]) && $_GET[$loc] !== '')

    //if(isset($_GET['email']) && $_GET['email'] !== '')
    {
        //$email = $_GET['email'];
        $email =  $_GET[$loc];

        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $db = "osc";   

        $con = mysqli_connect($servername, $dbusername, $dbpassword,$db);

        if (!$con) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }
        else
        {
            if($pageRefreshed == 1)
            {
                $staf = mysqli_query($con,"SELECT email, fullname FROM staf_register WHERE email = '".$_GET[$loc]."'") or die ("Failed to query database" .mysql_error());

                //$staf = mysqli_query($con,"SELECT email, fullname FROM staf_register WHERE email = $email") or die ("Failed to query database" .mysqli_error());     YANG LAMA 
                $row = mysqli_fetch_array($staf);

                if($row['email'] == $_GET[$loc])

                //if($row['email'] == $_GET['email'])     YANG LAMA
                {
                    $row['fullname'];
                } 
            }
            else
            {
                $staf = mysqli_query($con,"SELECT email, fullname FROM staf_register WHERE email = '".$_GET[$loc]."'") or die ("Failed to query database" .mysql_error());
                $row = mysqli_fetch_array($staf);
    
                if($row['email'] == $_GET[$loc])
                {
                    $row['fullname'];
                }
            }
        }
    } 
    else
    {
        header("location: /osc/index.html");
    }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>One Stop Centre</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/-Team-Rotating-Cards-BS4-.css">
    <link rel="stylesheet" href="assets/css/back-to-top-button.css">
    <link rel="stylesheet" href="assets/css/Data-Table-1.css">
    <link rel="stylesheet" href="assets/css/Data-Table.css">
    <link rel="stylesheet" href="assets/css/Drag--Drop-Upload-Form.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Profile-Card.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Sidebar-1-1.css">
    <link rel="stylesheet" href="assets/css/Sidebar-1-2.css">
    <link rel="stylesheet" href="assets/css/sidebar-1.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="text-center" id="line" style="background-color: #2d0e6e ;padding-top: 4px;padding-bottom: 4px;width: auto;height: auto;color: rgb(215,215,215);"><span class="text-center text-sm-center text-md-center text-lg-center text-xl-center justify-content-center align-items-center align-content-center align-self-center flex-wrap" style="color: rgb(255,255,255);font-size: 20px;font-family: ABeeZee, sans-serif;font-style: normal;padding-right: 4px;padding-left: 4px;">One Stop Centre<br></span></div>
    <div
        id="wrapper">
        <div class="d-lg-flex" id="sidebar-wrapper" style="background-color: rgb(0,0,0);">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"> <a href="staff_menu.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>">MENU</a></li>
                <li style="background-color: transparent;"> <a href="muat_naik_kertas_kerja.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>" style="color: rgb(153,153,153);">Muat naik kertas kerja<br></a></li>
                <li style="background-color: transparent;"> <a href="borang_osc_1.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>" style="color: rgb(153,153,153);">Borang OSC/1</a></li>
                <li> <a href="borang_osc_2.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>" style="background-color: #2d0e6e;color: rgb(255,255,255);">Borang OSC/2</a></li>
                <li> <a href="muat_turun_borang.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>">Muat turun lain - lain borang</a></li>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid" id="butang"><a class="btn btn-link" role="button" id="menu-toggle" href="#menu-toggle"><i class="fa fa-bars"></i></a></div>
            <div class="container-fluid" style="max-width: auto;min-width: auto;width: auto;margin-right: 90px;margin-left: 90px;background-color: transparent;">
                <form method="post" action="/osc/php/borangOSC2.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>">
                <section style="width: auto;max-width: auto;min-width: auto;margin-top: 22px;margin-left: 20px;margin-right: 20px;">
                    <div class="row" style="padding-bottom: 34px;width: auto;">
                        <div class="col"><input class="form-control-plaintext" type="text" value="KERANGKA PENJANAAN KEWANGAN" readonly="" style="margin-top: 20px;letter-spacing: normal;font-weight: bold;"></div>
                    </div>
                    <div style="width: auto;">
                        <div class="table-responsive table-borderless" style="margin-bottom: 53px;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Bil</th>
                                        <th>Perkara</th>
                                        <th style="padding: 12px;">Item</th>
                                        <th style="padding: 0px;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" colspan="4" style="padding-bottom: 0px;">Konsultasi / Perundingan / Penganjuran</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th style="padding-bottom: 0px;">Konsultasi</th>
                                                            <th style="padding-bottom: 0px;">Persidangan</th>
                                                            <th style="padding-bottom: 0px;">Kursus</th>
                                                            <th style="padding-bottom: 0px;">Bengkel</th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </th>
                                        <th style="padding: 0px;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" colspan="4" style="padding-bottom: 0px;">Perkhidmatan Pengurusan Fasiliti</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th class="text-center" style="padding-bottom: 0px;">Konsultasi</th>
                                                            <th class="text-center" style="padding-bottom: 0px;">Persidangan</th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </th>
                                        <th style="padding: 0px;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" colspan="4" style="padding-bottom: 0px;">Perkhidmatan Nasihat Pakar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th class="text-center" style="padding-bottom: 0px;">Analisis</th>
                                                            <th class="text-center" style="padding-bottom: 0px;">Rekabentuk</th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>OVERAL</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>i</td>
                                        <td>Sumbangan/Tajaan</td>
                                        <td><input name="11" id="11"  type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="12" id="12"  type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="13" id="13" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="14" id="14" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="15" id="15" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="16" id="16" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="17" id="17" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="18" id="18" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="19" id="19" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ii</td>
                                        <td>Hasil Yuran Penyertaan<br></td>
                                        <td><input name="21" id="21" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="22" id="22" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="23" id="23" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="24" id="24" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="25" id="25" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="26" id="26" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="27" id="27" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="28" id="28" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="29" id="29" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iii</td>
                                        <td>Hasil Yuran Pembentang</td>
                                        <td><input name="31" id="31" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="32" id="32" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="33" id="33" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="34" id="34" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="35" id="35" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="36" id="36" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="37" id="37" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="38" id="38" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="39" id="39" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iv</td>
                                        <td>Hasil Jualan Ikan</td>
                                        <td><input name="41" id="41" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="42" id="42" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="43" id="43" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="44" id="44" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="45" id="45" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="46" id="46" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="47" id="47" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="48" id="48" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="49" id="49" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>v</td>
                                        <td>Hasil Jualan Produk</td>
                                        <td><input name="51" id="51" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="52" id="52" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="53" id="53" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="54" id="54" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="55" id="55" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="56" id="56" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="57" id="57" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="58" id="58" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="59" id="59" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>vi</td>
                                        <td>Lain - lain (Sila nyatakan)</td>
                                        <td><input name="61" id="61" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="62" id="62" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="63" id="63" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="64" id="64" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="65" id="65" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="66" id="66" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="67" id="67" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="68" id="68" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="69" id="69" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="height: 100px;">
                                        <td>vii</td>
                                        <td>Jumlah</td>
                                        <td><input name="71" id="71" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="72" id="72" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="73" id="73" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="74" id="74" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="75" id="75" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="76" id="76" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="77" id="77" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="78" id="78" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="79" id="79" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Kos Jualan</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Kos Langsung Kepada Universiti</td>
                                        <td>B1</td>
                                    </tr>
                                    <tr>
                                        <td>i</td>
                                        <td>Penggunaan Kemudahan/Peralatan Universiti </td>
                                        <td><input name="81" id="81" type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="82" id="82" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="83" id="83" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="84" id="84" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="85" id="85" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="86" id="86" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="87" id="87" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="88" id="88" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="89" id="89" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ii</td>
                                        <td>Penggunaan Ruang/Makmal/Dewan/Padang/<br></td>
                                        <td><input name="91" id="91" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="92" id="92" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="93" id="93" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="94" id="94" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="95" id="95" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="96" id="96" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="97" id="97" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="98" id="98" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="99" id="99" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Gelanggang Sukan (Sewa Termasuk Utiliti &amp; <br></td>
                                        <td><input name="101" id="101" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="102" id="102" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="103" id="103" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="104" id="104" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="105" id="105" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="106" id="106" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="107" id="107" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="108" id="108" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="109" id="109" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Penyelenggaraan<br></td>
                                        <td><input name="111" id="111" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="112" id="112" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="113" id="113" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="114" id="114" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="115" id="115" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="116" id="116" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="117" id="117" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="118" id="118" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="119" id="119" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iii</td>
                                        <td>Persiapan Teknikal (Peralatan Audio/Media)</td>
                                        <td><input name="121" id="121" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="122" id="122" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="123" id="123" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="124" id="124" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="125" id="125" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="126" id="126" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="127" id="127" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="128" id="128" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="129" id="129" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iv</td>
                                        <td>Alatulis/Sijil Penyertaan/Tanda Nama </td>
                                        <td><input name="131" id="131" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="132" id="132" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="133" id="133" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="134" id="134" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="135" id="135" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="136" id="136" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="137" id="137" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="138" id="138" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="139" id="139" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>v</td>
                                        <td>Kenderaan Universiti </td>
                                        <td><input name="141" id="141" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="142" id="142" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="143" id="143" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="144" id="144" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="145" id="145" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="146" id="146" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="147" id="147" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="148" id="148" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="149" id="149" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>vi</td>
                                        <td>Penginapan (Rumah Rehat Universiti/Kolej Kediaman </td>
                                        <td><input name="151" id="151" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="152" id="152" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="153" id="153" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="154" id="154" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="155" id="155" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="156" id="156" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="157" id="157" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="158" id="158" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="159" id="159" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Bil elektrik/air </td>
                                        <td><input name="161" id="161" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="162" id="162" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="163" id="163" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="164" id="164" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="165" id="165" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="166" id="166" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="167" id="167" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="168" id="168" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="169" id="169" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="height: 100px;">
                                        <td>vii</td>
                                        <td>Jumlah</td>
                                        <td><input name="171" id="171" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="172" id="172" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="173" id="173" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="174" id="174" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="175" id="175" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="176" id="176" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="177" id="177" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="178" id="178" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="179" id="179" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Kos Langsung Kepada Kepada Jabatan</td>
                                        <td>B2</td>
                                    </tr>
                                    <tr>
                                        <td>i</td>
                                        <td>Benih</td>
                                        <td><input name="181" id="181" type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="182" id="182" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="183" id="183" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="184" id="184" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="185" id="185" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="186" id="186" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="187" id="187" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="188" id="188" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="189" id="189" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ii</td>
                                        <td>Makanan<br></td>
                                        <td><input name="191" id="191" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="192" id="192" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="193" id="193" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="194" id="194" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="195" id="195" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="196" id="196" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="197" id="197" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="198" id="198" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="199" id="199" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iii</td>
                                        <td>Kos Pekerja<br></td>
                                        <td><input name="201" id="201" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="202" id="202" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="203" id="203" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="204" id="204" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="205" id="205" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="206" id="206" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="207" id="207" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="208" id="208" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="209" id="209" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iv</td>
                                        <td>Mesyuarat &amp; Persiapan<br></td>
                                        <td><input name="211" id="211" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="212" id="212" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="213" id="213" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="214" id="214" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="215" id="215" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="216" id="216" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="217" id="217" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="218" id="218" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="219" id="219" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>v</td>
                                        <td>Bayaran Upah Lori/Meja/Kerusi</td>
                                        <td><input name="221" id="221" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="222" id="222" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="223" id="223" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="224" id="224" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="225" id="225" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="226" id="226" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="227" id="227" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="228" id="228" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="229" id="229" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>vi</td>
                                        <td>Tuntutan Perjalanan</td>
                                        <td><input name="231" id="231" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="232" id="232" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="233" id="233" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="234" id="234" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="235" id="235" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="236" id="236" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="237" id="237" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="238" id="238" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="239" id="239" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>vii</td>
                                        <td>Tuntutan Penginapan Staf</td>
                                        <td><input name="241" id="241" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="242" id="242" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="243" id="243" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="244" id="244" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="245" id="245" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="246" id="246" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="247" id="247" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="248" id="248" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="249" id="249" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>viii</td>
                                        <td>Elaun Lebih Masa</td>
                                        <td><input name="251" id="251" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="252" id="252" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="253" id="253" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="254" id="254" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="255" id="255" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="256" id="256" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="257" id="257" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="258" id="258" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="259" id="259" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ix</td>
                                        <td>Honorarium Penceramah<br></td>
                                        <td><input name="261" id="261" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="262" id="262" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="263" id="263" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="264" id="264" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="265" id="265" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="266" id="266" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="267" id="267" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="268" id="268" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="269" id="269" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>x</td>
                                        <td>Cenderahati</td>
                                        <td><input name="271" id="271" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="272" id="272" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="273" id="273" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="274" id="274" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="275" id="275" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="276" id="276" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="277" id="277" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="278" id="278" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="279" id="279" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="height: 100px;">
                                        <td>xi</td>
                                        <td>Jumlah</td>
                                        <td><input name="281" id="281" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="282" id="282" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="283" id="283" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="284" id="284" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="285" id="285" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="286" id="286" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="287" id="287" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="288" id="288" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="289" id="289" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Kos Tidak Langsung (Universiti Dan Jabatan) </td>
                                        <td>B3</td>
                                    </tr>
                                    <tr>
                                        <td>i</td>
                                        <td>Sewa Bangunan/Kenderaan</td>
                                        <td><input name="291" id="291" type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="292" id="292" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="293" id="293" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="294" id="294" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="295" id="295" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="296" id="296" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="297" id="297" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="298" id="298" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="299" id="299" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ii</td>
                                        <td>Pengangkutan<br></td>
                                        <td><input name="301" id="301" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="302" id="302" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="303" id="303" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="304" id="304" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="305" id="305" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="306" id="306" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="307" id="307" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="308" id="308" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="309" id="309" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iii</td>
                                        <td>Alatan Tulis</td>
                                        <td><input name="311" id="311" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="312" id="312" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="313" id="313" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="314" id="314" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="315" id="315" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="316" id="316" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="317" id="317" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="318" id="318" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="319" id="319" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iv</td>
                                        <td>Telefon<br></td>
                                        <td><input name="321" id="321" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="322" id="322" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="323" id="323" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="324" id="324" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="325" id="325" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="326" id="326" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="327" id="327" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="328" id="328" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="329" id="329" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>v</td>
                                        <td>Lain-lain (sila nyatakan)</td>
                                        <td><input name="331" id="331" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="332" id="332" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="333" id="333" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="334" id="334" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="335" id="335" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="336" id="336" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="337" id="337" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="338" id="338" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="339" id="339" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="height: 100px;">
                                        <td>vi</td>
                                        <td>Jumlah</td>
                                        <td><input name="341" id="341" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="342" id="342" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="343" id="343" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="344" id="344" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="345" id="345" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="346" id="346" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="347" id="347" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="348" id="348" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="349" id="349" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Kos Luaran (Jemputan Luar/Honorarium) </td>
                                        <td>B4</td>
                                    </tr>
                                    <tr>
                                        <td>i</td>
                                        <td>Tiket Penerbangan</td>
                                        <td><input name="351" id="351" type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="352" id="352" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="353" id="353" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="354" id="354" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="355" id="355" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="356" id="356" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="357" id="357" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="358" id="358" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="359" id="359" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ii</td>
                                        <td>Penginapan<br></td>
                                        <td><input name="361" id="361" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="362" id="362" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="363" id="363" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="364" id="364" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="365" id="365" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="366" id="366" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="367" id="367" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="368" id="368" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="369" id="369" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iii</td>
                                        <td>Bayaran Honorarium</td>
                                        <td><input name="371" id="371" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="372" id="372" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="373" id="373" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="374" id="374" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="375" id="375" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="376" id="376" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="377" id="377" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="378" id="378" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="379" id="379" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iv</td>
                                        <td>Pengangkutan<br></td>
                                        <td><input name="381" id="381" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="382" id="382" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="383" id="383" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="384" id="384" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="385" id="385" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="386" id="386" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="387" id="387" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="388" id="388" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="389" id="389" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>v</td>
                                        <td>Tuntutan Perjalanan </td>
                                        <td><input name="391" id="391" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="392" id="392" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="393" id="393" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="394" id="394" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="395" id="395" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="396" id="396" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="397" id="397" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="398" id="398" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="399" id="399" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="height: 100px;">
                                        <td>vi</td>
                                        <td>Jumlah</td>
                                        <td><input name="401" id="401" type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="402" id="402" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="403" id="403" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="404" id="404" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="405" id="405" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="406" id="406" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="407" id="407" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="408" id="408" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="409" id="409" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Sumbangan Kepada UniMAP </td>
                                        <td>B5</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>(5% daripada A)&nbsp;</td>
                                        <td><input name="411" id="411" type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="412" id="412" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="413" id="413" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="414" id="414" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="415" id="415" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="416" id="416" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="417" id="417" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="418" id="418" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="419" id="419" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="height: 100px;">
                                        <td></td>
                                        <td></td>
                                        <td><input name="421" id="421" type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="422" id="422" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="423" id="423" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="424" id="424" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="425" id="425" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="426" id="426" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="427" id="427" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="428" id="428" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="429" id="429" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="height: 80px;">
                                        <td></td>
                                        <td>Keuntungan (A-B) </td>
                                        <td><input name="431" id="431" type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="432" id="432" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="433" id="433" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="434" id="434" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="435" id="435" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="436" id="436" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="437" id="437" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="438" id="438" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="439" id="439" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Pembahagian Keuntungan</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>a) 50% ke Tabung Enterprise</td>
                                        <td><input name="441" id="441" type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="442" id="442" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="443" id="443" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="444" id="444" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="445" id="445" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="446" id="446" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="447" id="447" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="448" id="448" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="449" id="449" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 30px;">40% ke Jabatan</td>
                                        <td><input name="451" id="451" type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="452" id="452" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="453" id="453" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="454" id="454" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="455" id="455" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="456" id="456" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="457" id="457" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="458" id="458" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="459" id="459" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 30px;">10% ke Tabung Endowment PTj </td>
                                        <td><input name="461" id="461" type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="462" id="462" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="463" id="463" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="464" id="464" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="465" id="465" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="466" id="466" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="467" id="467" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="468" id="468" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="469" id="469" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>b) 50% Insentif Kepada Staff / Syarikat Universiti </td>
                                        <td><input name="471" id="471" type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="472" id="472" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="473" id="473" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="474" id="474" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="475" id="475" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="476" id="476" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="477" id="477" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="478" id="478" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="479" id="479" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="height: 100px;">
                                        <td></td>
                                        <td style="padding-left: 30px;">*berdasarkan kelulusan oleh Jawatankuasa Di Peringkat Jabatan</td>
                                        <td><input name="481" id="481" type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="482" id="482" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="483" id="483" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="484" id="484" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="485" id="485" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="486" id="486" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="487" id="487" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="488" id="488" type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input name="489" id="489" type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div style="padding-top: 39px;width: auto;">
                        <div class="row" style="padding-top: 16px;margin-bottom: 13px;">
                            <div class="col"><input class="form-control-plaintext" type="text" value="FORMULA PENGIRAAN:" readonly=""></div>
                        </div>
                        <div class="table-responsive" style="width: 477px;height: auto;">
                            <table class="table">
                                <tbody class="border rounded-0">
                                    <tr>
                                        <td>Pendapatan/Hasil Jualan</td>
                                        <td class="text-center border rounded-0">A</td>
                                    </tr>
                                    <tr>
                                        <td>(-)</td>
                                        <td class="border rounded-0"></td>
                                    </tr>
                                    <tr>
                                        <td class="border rounded-0">Kos Jualan</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="border rounded-0">Kos Langsung Kepada Universiti</td>
                                        <td class="text-center">B1</td>
                                    </tr>
                                    <tr>
                                        <td class="border rounded-0">Kos Langsung Kepada Jabatan</td>
                                        <td class="text-center">B2<br></td>
                                    </tr>
                                    <tr>
                                        <td class="border rounded-0">Kos Tidak Langsung (Universiti dan Jabatan) Luar</td>
                                        <td class="text-center">B3</td>
                                    </tr>
                                    <tr>
                                        <td class="border rounded-0">Kos Luaran (Jemputan Luar/Honorarium)</td>
                                        <td class="text-center">B4</td>
                                    </tr>
                                    <tr>
                                        <td class="border rounded-0">Sumbangan Kepada UniMAP</td>
                                        <td class="text-center">B5</td>
                                    </tr>
                                    <tr>
                                        <td class="border rounded-0">KEUNTUNGAN&nbsp;[A-(B1+B2+B3+B4+B5)] </td>
                                        <td class="text-center">XXX</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row" style="padding-top: 16px;margin-bottom: 13px;margin-top: 28px;">
                            <div class="col"><input class="form-control-plaintext" type="text" value="NOTA :" readonly=""></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;margin-bottom: 8px;">
                            <div class="col" style="width: auto;max-width: auto;"><span class="text-justify">1.&nbsp;Kelulusan Khas (Berkaitan Harga/Caj Perkhidmatan)<br></span></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;">
                            <div class="col" style="width: auto;max-width: auto;"><span class="text-justify">2. Modal Awal (Seed Money)<br></span></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;margin-bottom: 8px;">
                            <div class="col" style="width: auto;max-width: auto;"><span class="text-justify" style="margin-left: 13px;">Berdasarkan nilai RM20,000.00 atau 10% daripada kos projek, atau nilai yang mana lebih rendah <br></span></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;">
                            <div class="col" style="width: auto;max-width: auto;"><span class="text-justify">3. Kos-kos berkaitan adalah termasuk GST (6%) <br></span></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;">
                            <div class="col" style="width: auto;max-width: auto;"><span class="text-justify" style="margin-left: 13px;">5% daripada pendapatan kasar (A) boleh mendapat pengecualian daripada Naib Canselor<br></span></div>
                        </div>
                    </div>
                    <section class="text-center" style="width: auto;margin-bottom: 80px;margin-top: 8px;padding-top: 13px;padding-bottom: 20px;">
                        <div style="width: auto;padding-top: 24px;"><button class="btn btn-primary" type="submit" style="margin-bottom: 5px;">Hantar<i class="fa fa-send" style="padding-left: 9px;"></i></button><button class="btn btn-primary" type="reset" style="margin-left: 10px;margin-bottom: 5px;">Kosongkan semua<i class="material-icons" style="font-size: 14px;padding-left: 9px;">clear</i></button>
                            <a
                                class="btn btn-primary" role="button" style="margin-left: 10px;margin-bottom: 5px;" href="bantuan_staff.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>">Bantuan<i class="icon ion-help" style="margin-left: 9px;"></i></a><button class="btn btn-primary" type="submit" style="margin-left: 10px;margin-bottom: 5px;">Simpan<i class="fas fa-save" style="margin-left: 9px;"></i></button>
                                <button
                                    class="btn btn-primary" type="button" style="margin-left: 10px;margin-bottom: 5px;">Cetak<i class="fa fa-print" style="margin-left: 9px;"></i></button>
                        </div>
                    </section>
                </section>
                </form>
            </div>
        </div>
        </div><span class="fa fa-angle-up ir-arriba"> </span>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
        <script src="assets/js/back-to-top-button.js"></script>
        <script src="assets/js/hide.js"></script>
        <script src="assets/js/Sidebar-Menu.js"></script>
        <script src="assets/js/sticky.js"></script>
</body>
</html>
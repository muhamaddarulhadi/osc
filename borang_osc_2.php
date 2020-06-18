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
                <li style="background-color: transparent;"> <a href="muat_naik_kertas_kerja.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>" style="color: rgb(153,153,153);">Muat naik kertas kerja & Lampiran D<br></a></li>
                <li style="background-color: transparent;"> <a href="borang_osc_1.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>" style="color: rgb(153,153,153);">Borang OSC/1</a></li>
                <li> <a href="borang_osc_2.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>" style="background-color: #2d0e6e;color: rgb(255,255,255);">Borang OSC/2</a></li>
                <li> <a href="borang_wujud_kod_program.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>">Borang wujud kod program</a></li>
                <li> <a href="muat_turun_borang.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>">Muat turun lain - lain borang</a></li>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid" id="butang"><a class="btn btn-link" role="button" id="menu-toggle" href="#menu-toggle"><i class="fa fa-bars"></i></a></div>
            <div class="container-fluid" style="max-width: auto;min-width: auto;width: auto;margin-right: 90px;margin-left: 90px;background-color: transparent;">
                <form method="post" action="/osc/php/borangOSC2.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>">
                <fieldset style="width: auto;max-width: auto;min-width: auto;margin-top: 22px;margin-left: 20px;margin-right: 20px;">
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
                                        <td><input class="a1" name="11" id="11" style="width: auto;" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="a2" name="12" id="12" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a3" name="13" id="13" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a4" name="14" id="14" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a5" name="15" id="15" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="a6" name="16" id="16" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a7" name="17" id="17" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="a8" name="18" id="18" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a9" name="19" id="19" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ii</td>
                                        <td>Hasil Yuran Penyertaan<br></td>
                                        <td><input class="a1" name="21" id="21" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="a2" name="22" id="22" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a3" name="23" id="23" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a4" name="24" id="24" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a5" name="25" id="25" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="a6" name="26" id="26" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a7" name="27" id="27" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="a8" name="28" id="28" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a9" name="29" id="29" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iii</td>
                                        <td>Hasil Yuran Pembentang</td>
                                        <td><input class="a1" name="31" id="31" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="a2" name="32" id="32" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a3" name="33" id="33" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a4" name="34" id="34" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a5" name="35" id="35" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="a6" name="36" id="36" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a7" name="37" id="37" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="a8" name="38" id="38" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a9" name="39" id="39" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iv</td>
                                        <td>Hasil Jualan Ikan</td>
                                        <td><input class="a1" name="41" id="41" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="a2" name="42" id="42" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a3" name="43" id="43" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a4" name="44" id="44" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a5" name="45" id="45" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="a6" name="46" id="46" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a7" name="47" id="47" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="a8" name="48" id="48" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a9" name="49" id="49" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>v</td>
                                        <td>Hasil Jualan Produk</td>
                                        <td><input class="a1" name="51" id="51" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="a2" name="52" id="52" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a3" name="53" id="53" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a4" name="54" id="54" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a5" name="55" id="55" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="a6" name="56" id="56" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a7" name="57" id="57" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="a8" name="58" id="58" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a9" name="59" id="59" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>vi</td>
                                        <td>Lain - lain (Sila nyatakan)</td>
                                        <td><input class="a1" name="61" id="61" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="a2" name="62" id="62" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a3" name="63" id="63" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a4" name="64" id="64" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a5" name="65" id="65" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="a6" name="66" id="66" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a7" name="67" id="67" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="a8" name="68" id="68" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="a9" name="69" id="69" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="height: 100px;">
                                        <td>vii</td>
                                        <td>Jumlah</td>
                                        <td><input class="t1" name="71" id="71" type="number" step="0.01" min="0" value="0"></input></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="t2" name="72" id="72" type="number" step="0.01" min="0" value="0"></input></td>
                                                            <td style="padding-bottom: 0px;"><input class="t3" name="73" id="73" type="number" step="0.01" min="0" value="0"></input></td>
                                                            <td style="padding-bottom: 0px;"><input class="t4" name="74" id="74" type="number" step="0.01" min="0" value="0"></input></td>
                                                            <td style="padding-bottom: 0px;"><input class="t5" name="75" id="75" type="number" step="0.01" min="0" value="0"></input></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="t6" name="76" id="76" type="number" step="0.01" min="0" value="0"></input></td>
                                                            <td style="padding-bottom: 0px;"><input class="t7" name="77" id="77" type="number" step="0.01" min="0" value="0"></input></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="t8" name="78" id="78" type="number" step="0.01" min="0" value="0"></input></td>
                                                            <td style="padding-bottom: 0px;"><input class="t9" name="79" id="79" type="number" step="0.01" min="0" value="0"></input></td>
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
                                        <td><input class="b1-1" name="81" id="81" type="number" step="0.01" min="0" value="0" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-2" name="82" id="82" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-3" name="83" id="83" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-4" name="84" id="84" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-5" name="85" id="85" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-6" name="86" id="86" type="number" step="0.01" min="0" value="0""></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-7" name="87" id="87" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-8" name="88" id="88" type="number" step="0.01" min="0" value="0""></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-9" name="89" id="89" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ii</td>
                                        <td>Penggunaan Ruang/Makmal/Dewan/Padang/<br></td>
                                        <td><input class="b1-1" name="91" id="91" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-2" name="92" id="92" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-3" name="93" id="93" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-4" name="94" id="94" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-5" name="95" id="95" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-6" name="96" id="96" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-7" name="97" id="97" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-8" name="98" id="98" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-9" name="99" id="99" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Gelanggang Sukan (Sewa Termasuk Utiliti &amp; <br></td>
                                        <td><input class="b1-1" name="101" id="101" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-2" name="102" id="102" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-3" name="103" id="103" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-4" name="104" id="104" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-5" name="105" id="105" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-6" name="106" id="106" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-7" name="107" id="107" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-8" name="108" id="108" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-9" name="109" id="109" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Penyelenggaraan<br></td>
                                        <td><input class="b1-1" name="111" id="111" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-2" name="112" id="112" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-3" name="113" id="113" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-4" name="114" id="114" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-5" name="115" id="115" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-6" name="116" id="116" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-7" name="117" id="117" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-8" name="118" id="118" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-9" name="119" id="119" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iii</td>
                                        <td>Persiapan Teknikal (Peralatan Audio/Media)</td>
                                        <td><input class="b1-1" name="121" id="121" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-2" name="122" id="122" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-3" name="123" id="123" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-4" name="124" id="124" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-5" name="125" id="125" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-6" name="126" id="126" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-7" name="127" id="127" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-8" name="128" id="128" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-9" name="129" id="129" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iv</td>
                                        <td>Alat tulis/Sijil Penyertaan/Tanda Nama </td>
                                        <td><input class="b1-1" name="131" id="131" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-2" name="132" id="132" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-3" name="133" id="133" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-4" name="134" id="134" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-5" name="135" id="135" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-6" name="136" id="136" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-7" name="137" id="137" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-8" name="138" id="138" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-9" name="139" id="139" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>v</td>
                                        <td>Kenderaan Universiti </td>
                                        <td><input class="b1-1" name="141" id="141" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-2" name="142" id="142" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-3" name="143" id="143" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-4" name="144" id="144" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-5" name="145" id="145" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-6" name="146" id="146" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-7" name="147" id="147" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-8" name="148" id="148" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-9" name="149" id="149" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>vi</td>
                                        <td>Penginapan (Rumah Rehat Universiti/Kolej Kediaman </td>
                                        <td><input class="b1-1" name="151" id="151" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-2" name="152" id="152" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-3" name="153" id="153" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-4" name="154" id="154" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-5" name="155" id="155" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-6" name="156" id="156" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-7" name="157" id="157" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-8" name="158" id="158" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-9" name="159" id="159" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Bil elektrik/air </td>
                                        <td><input class="b1-1" name="161" id="161" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-2" name="162" id="162" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-3" name="163" id="163" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-4" name="164" id="164" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-5" name="165" id="165" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-6" name="166" id="166" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-7" name="167" id="167" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-8" name="168" id="168" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-9" name="169" id="169" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="height: 100px;">
                                        <td>vii</td>
                                        <td>Jumlah</td>
                                        <td><input class="b1-t1" name="171" id="171" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-t2" name="172" id="172" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-t3" name="173" id="173" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-t4" name="174" id="174" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-t5" name="175" id="175" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-t6" name="176" id="176" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-t7" name="177" id="177" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b1-t8" name="178" id="178" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b1-t9" name="179" id="179" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Kos Langsung Kepada Jabatan</td>
                                        <td>B2</td>
                                    </tr>
                                    <tr>
                                        <td>i</td>
                                        <td>Benih</td>
                                        <td><input class="b2-1" name="181" id="181" type="number" step="0.01" min="0" value="0" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-2" name="182" id="182" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-3" name="183" id="183" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-4" name="184" id="184" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-5" name="185" id="185" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-6" name="186" id="186" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-7" name="187" id="187" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-8" name="188" id="188" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-9" name="189" id="189" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ii</td>
                                        <td>Makanan<br></td>
                                        <td><input class="b2-1" name="191" id="191" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-2" name="192" id="192" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-3" name="193" id="193" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-4" name="194" id="194" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-5" name="195" id="195" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-6" name="196" id="196" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-7" name="197" id="197" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-8" name="198" id="198" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-9" name="199" id="199" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iii</td>
                                        <td>Kos Pekerja<br></td>
                                        <td><input class="b2-1" name="201" id="201" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-2" name="202" id="202" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-3" name="203" id="203" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-4" name="204" id="204" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-5" name="205" id="205" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-6" name="206" id="206" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-7" name="207" id="207" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-8" name="208" id="208" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-9" name="209" id="209" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iv</td>
                                        <td>Mesyuarat &amp; Persiapan<br></td>
                                        <td><input class="b2-1" name="211" id="211" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-2" name="212" id="212" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-3" name="213" id="213" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-4" name="214" id="214" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-5" name="215" id="215" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-6" name="216" id="216" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-7" name="217" id="217" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-8" name="218" id="218" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-9" name="219" id="219" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>v</td>
                                        <td>Bayaran Upah Lori/Meja/Kerusi</td>
                                        <td><input class="b2-1" name="221" id="221" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-2" name="222" id="222" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-3" name="223" id="223" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-4" name="224" id="224" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-5" name="225" id="225" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-6" name="226" id="226" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-7" name="227" id="227" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-8" name="228" id="228" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-9" name="229" id="229" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>vi</td>
                                        <td>Tuntutan Perjalanan</td>
                                        <td><input class="b2-1" name="231" id="231" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-2" name="232" id="232" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-3" name="233" id="233" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-4" name="234" id="234" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-5" name="235" id="235" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-6" name="236" id="236" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-7" name="237" id="237" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-8" name="238" id="238" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-9" name="239" id="239" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>vii</td>
                                        <td>Tuntutan Penginapan Staf</td>
                                        <td><input class="b2-1" name="241" id="241" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-2" name="242" id="242" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-3" name="243" id="243" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-4" name="244" id="244" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-5" name="245" id="245" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-6" name="246" id="246" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-7" name="247" id="247" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-8" name="248" id="248" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-9" name="249" id="249" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>viii</td>
                                        <td>Elaun Lebih Masa</td>
                                        <td><input class="b2-1" name="251" id="251" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-2" name="252" id="252" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-3" name="253" id="253" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-4" name="254" id="254" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-5" name="255" id="255" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-6" name="256" id="256" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-7" name="257" id="257" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-8" name="258" id="258" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-9" name="259" id="259" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ix</td>
                                        <td>Honorarium Penceramah<br></td>
                                        <td><input class="b2-1" name="261" id="261" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-2" name="262" id="262" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-3" name="263" id="263" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-4" name="264" id="264" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-5" name="265" id="265" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-6" name="266" id="266" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-7" name="267" id="267" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-8" name="268" id="268" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-9" name="269" id="269" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>x</td>
                                        <td>Cenderahati</td>
                                        <td><input class="b2-1" name="271" id="271" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-2" name="272" id="272" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-3" name="273" id="273" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-4" name="274" id="274" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-5" name="275" id="275" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-6" name="276" id="276" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-7" name="277" id="277" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-8" name="278" id="278" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-9" name="279" id="279" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="height: 100px;">
                                        <td>xi</td>
                                        <td>Jumlah</td>
                                        <td><input class="b2-t1" name="281" id="281" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-t2" name="282" id="282" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-t3" name="283" id="283" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-t4" name="284" id="284" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-t5" name="285" id="285" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-t6" name="286" id="286" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-t7" name="287" id="287" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b2-t8" name="288" id="288" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b2-t9" name="289" id="289" type="number" step="0.01" min="0" value="0"></td>
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
                                        <td><input class="b3-1" name="291" id="291" type="number" step="0.01" min="0" value="0" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b3-2" name="292" id="292" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-3" name="293" id="293" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-4" name="294" id="294" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-5" name="295" id="295" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b3-6" name="296" id="296" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-7" name="297" id="297" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b3-8" name="298" id="298" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-9" name="299" id="299" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ii</td>
                                        <td>Pengangkutan<br></td>
                                        <td><input class="b3-1" name="301" id="301" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b3-2" name="302" id="302" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-3" name="303" id="303" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-4" name="304" id="304" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-5" name="305" id="305" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b3-6" name="306" id="306" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-7" name="307" id="307" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b3-8" name="308" id="308" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-9" name="309" id="309" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iii</td>
                                        <td>Alatan Tulis</td>
                                        <td><input class="b3-1" name="311" id="311" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b3-2" name="312" id="312" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-3" name="313" id="313" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-4" name="314" id="314" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-5" name="315" id="315" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b3-6" name="316" id="316" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-7" name="317" id="317" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b3-8" name="318" id="318" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-9" name="319" id="319" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iv</td>
                                        <td>Telefon<br></td>
                                        <td><input class="b3-1" name="321" id="321" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b3-2" name="322" id="322" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-3" name="323" id="323" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-4" name="324" id="324" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-5" name="325" id="325" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b3-6" name="326" id="326" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-7" name="327" id="327" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b3-8" name="328" id="328" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-9" name="329" id="329" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>v</td>
                                        <td>Lain-lain (sila nyatakan)</td>
                                        <td><input class="b3-1" name="331" id="331" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b3-2" name="332" id="332" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-3" name="333" id="333" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-4" name="334" id="334" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-5" name="335" id="335" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b3-6" name="336" id="336" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-7" name="337" id="337" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b3-8" name="338" id="338" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-9" name="339" id="339" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="height: 100px;">
                                        <td>vi</td>
                                        <td>Jumlah</td>
                                        <td><input class="b3-t1" name="341" id="341" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b3-t2" name="342" id="342" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-t3" name="343" id="343" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-t4" name="344" id="344" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-t5" name="345" id="345" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b3-t6" name="346" id="346" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-t7" name="347" id="347" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b3-t8" name="348" id="348" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b3-t9" name="349" id="349" type="number" step="0.01" min="0" value="0"></td>
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
                                        <td><input name="351" id="351" type="number" step="0.01" min="0" value="0" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="352" id="352" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="353" id="353" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="354" id="354" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="355" id="355" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="356" id="356" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="357" id="357" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="358" id="358" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="359" id="359" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ii</td>
                                        <td>Penginapan<br></td>
                                        <td><input name="361" id="361" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="362" id="362" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="363" id="363" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="364" id="364" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="365" id="365" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="366" id="366" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="367" id="367" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="368" id="368" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="369" id="369" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iii</td>
                                        <td>Bayaran Honorarium</td>
                                        <td><input name="371" id="371" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="372" id="372" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="373" id="373" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="374" id="374" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="375" id="375" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="376" id="376" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="377" id="377" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="378" id="378" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="379" id="379" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iv</td>
                                        <td>Pengangkutan<br></td>
                                        <td><input name="381" id="381" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="382" id="382" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="383" id="383" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="384" id="384" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="385" id="385" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="386" id="386" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="387" id="387" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="388" id="388" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="389" id="389" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>v</td>
                                        <td>Tuntutan Perjalanan </td>
                                        <td><input name="391" id="391" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="392" id="392" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="393" id="393" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="394" id="394" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="395" id="395" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="396" id="396" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="397" id="397" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="398" id="398" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="399" id="399" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="height: 100px;">
                                        <td>vi</td>
                                        <td>Jumlah</td>
                                        <td><input name="401" id="401" type="number" step="0.01" min="0" value="0"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="402" id="402" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="403" id="403" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="404" id="404" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="405" id="405" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="406" id="406" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="407" id="407" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="408" id="408" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="409" id="409" type="number" step="0.01" min="0" value="0"></td>
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
                                    <tr style="height: 100px;">
                                        <td></td>
                                        <td>(5% daripada A)&nbsp;</td>
                                        <td><input class="b5-t1" name="411" id="411" type="number" step="0.01" min="0" value="0" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b5-t2" name="412" id="412" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b5-t3" name="413" id="413" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b5-t4" name="414" id="414" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b5-t5" name="415" id="415" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b5-t6" name="416" id="416" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b5-t7" name="417" id="417" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input class="b5-t8" name="418" id="418" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input class="b5-t9" name="419" id="419" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <!--<tr style="height: 100px;">
                                        <td></td>
                                        <td></td>
                                        <td><input name="421" id="421" type="number" step="0.01" min="0" value="0" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="422" id="422" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="423" id="423" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="424" id="424" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="425" id="425" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="426" id="426" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="427" id="427" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="428" id="428" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="429" id="429" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr> -->
                                    <tr style="height: 80px;">
                                        <td></td>
                                        <td>Keuntungan (A-B) </td>
                                        <td><input name="431" id="431" type="number" step="0.01" min="0" value="0" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="432" id="432" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="433" id="433" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="434" id="434" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="435" id="435" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="436" id="436" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="437" id="437" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="438" id="438" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="439" id="439" type="number" step="0.01" min="0" value="0"></td>
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
                                        <td><input name="441" id="441" type="number" step="0.01" min="0" value="0" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="442" id="442" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="443" id="443" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="444" id="444" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="445" id="445" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="446" id="446" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="447" id="447" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="448" id="448" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="449" id="449" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 30px;">40% ke Jabatan</td>
                                        <td><input name="451" id="451" type="number" step="0.01" min="0" value="0" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="452" id="452" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="453" id="453" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="454" id="454" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="455" id="455" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="456" id="456" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="457" id="457" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="458" id="458" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="459" id="459" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 30px;">10% ke Tabung Endowment PTj </td>
                                        <td><input name="461" id="461" type="number" step="0.01" min="0" value="0" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="462" id="462" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="463" id="463" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="464" id="464" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="465" id="465" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="466" id="466" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="467" id="467" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="468" id="468" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="469" id="469" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>b) 50% Insentif Kepada Staff / Syarikat Universiti </td>
                                        <td><input name="471" id="471" type="number" step="0.01" min="0" value="0" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="472" id="472" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="473" id="473" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="474" id="474" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="475" id="475" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="476" id="476" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="477" id="477" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="478" id="478" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="479" id="479" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="height: 100px;">
                                        <td></td>
                                        <td style="padding-left: 30px;">*berdasarkan kelulusan oleh Jawatankuasa Di Peringkat Jabatan</td>
                                        <!--<td><input name="481" id="481" type="number" step="0.01" min="0" value="0" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="482" id="482" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="483" id="483" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="484" id="484" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="485" id="485" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="486" id="486" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="487" id="487" type="number" step="0.01" min="0" value="0"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input name="488" id="488" type="number" step="0.01" min="0" value="0"></td>
                                                            <td style="padding-bottom: 0px;"><input name="489" id="489" type="number" step="0.01" min="0" value="0"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>-->
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
                </fieldset>
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
        <script>
            $('input.a1,input.a2,input.a3,input.a4,input.a5,input.a6,input.a7,input.a8,input.a9').change(function () 
            {
                var result1 = 0;
                var result2 = 0;
                var result3 = 0;
                var result4 = 0;
                var result5 = 0;
                var result6 = 0;
                var result7 = 0;
                var result8 = 0;
                var result9 = 0;

                $('.a1').each(function () 
                {
                    result1 += +$(this).val();
                });
                $('.t1').val(result1);

                $('.a2').each(function () 
                {
                    result2 += +$(this).val();
                });
                $('.t2').val(result2);       
                
                $('.a3').each(function () 
                {
                    result3 += +$(this).val();
                });
                $('.t3').val(result3); 

                $('.a4').each(function () 
                {
                    result4 += +$(this).val();
                });
                $('.t4').val(result4);

                $('.a5').each(function () 
                {
                    result5 += +$(this).val();
                });
                $('.t5').val(result5);       
                
                $('.a6').each(function () 
                {
                    result6 += +$(this).val();
                });
                $('.t6').val(result6);

                $('.a7').each(function () 
                {
                    result7 += +$(this).val();
                });
                $('.t7').val(result7);

                $('.a8').each(function () 
                {
                    result8 += +$(this).val();
                });
                $('.t8').val(result8);       
                
                $('.a9').each(function () 
                {
                    result9 += +$(this).val();
                });
                $('.t9').val(result9);
            });
        

            $('input.b1-1,input.b1-2,input.b1-3,input.b1-4,input.b1-5,input.b1-6,input.b1-7,input.b1-8,input.b1-9').change(function () 
            {
                var result10 = 0;
                var result11 = 0;
                var result12 = 0;
                var result13 = 0;
                var result14 = 0;
                var result15 = 0;
                var result16 = 0;
                var result17 = 0;
                var result18 = 0;

                $('.b1-1').each(function () 
                {
                    result10 += +$(this).val();
                });
                $('.b1-t1').val(result10);

                $('.b1-2').each(function () 
                {
                    result11 += +$(this).val();
                });
                $('.b1-t2').val(result11);       
                
                $('.b1-3').each(function () 
                {
                    result12 += +$(this).val();
                });
                $('.b1-t3').val(result12); 

                $('.b1-4').each(function () 
                {
                    result13 += +$(this).val();
                });
                $('.b1-t4').val(result13);

                $('.b1-5').each(function () 
                {
                    result14 += +$(this).val();
                });
                $('.b1-t5').val(result14);       
                
                $('.b1-6').each(function () 
                {
                    result15 += +$(this).val();
                });
                $('.b1-t6').val(result15);

                $('.b1-7').each(function () 
                {
                    result16 += +$(this).val();
                });
                $('.b1-t7').val(result16);

                $('.b1-8').each(function () 
                {
                    result17 += +$(this).val();
                });
                $('.b1-t8').val(result17);  
                
                $('.b1-9').each(function () 
                {
                    result18 += +$(this).val();
                });
                $('.b1-t9').val(result18);
            });

  
            $('input.b2-1,input.b2-2,input.b2-3,input.b2-4,input.b2-5,input.b2-6,input.b2-7,input.b2-8,input.b2-9').change(function () 
            {
                var result19 = 0;
                var result20 = 0;
                var result21 = 0;
                var result22 = 0;
                var result23 = 0;
                var result24 = 0;
                var result25 = 0;
                var result26 = 0;
                var result27 = 0;

                $('.b2-1').each(function () 
                {
                    result19 += +$(this).val();
                });
                $('.b2-t1').val(result19);

                $('.b2-2').each(function () 
                {
                    result20 += +$(this).val();
                });
                $('.b2-t2').val(result20);       
                
                $('.b2-3').each(function () 
                {
                    result21 += +$(this).val();
                });
                $('.b2-t3').val(result21); 

                $('.b2-4').each(function () 
                {
                    result22 += +$(this).val();
                });
                $('.b2-t4').val(result22);

                $('.b2-5').each(function () 
                {
                    result23 += +$(this).val();
                });
                $('.b2-t5').val(result23);       
                
                $('.b2-6').each(function () 
                {
                    result24 += +$(this).val();
                });
                $('.b2-t6').val(result24);

                $('.b2-7').each(function () 
                {
                    result25 += +$(this).val();
                });
                $('.b2-t7').val(result25);

                $('.b2-8').each(function () 
                {
                    result26 += +$(this).val();
                });
                $('.b2-t8').val(result26);  
                
                $('.b2-9').each(function () 
                {
                    result27 += +$(this).val();
                });
                $('.b2-t9').val(result27);
            });


            $('input.b3-1,input.b3-2,input.b3-3,input.b3-4,input.b3-5,input.b3-6,input.b3-7,input.b3-8,input.b3-9').change(function () 
            {
                var result28 = 0;
                var result29 = 0;
                var result30 = 0;
                var result31 = 0;
                var result32 = 0;
                var result33 = 0;
                var result34 = 0;
                var result35 = 0;
                var result36 = 0;

                $('.b3-1').each(function () 
                {
                    result28 += +$(this).val();
                });
                $('.b3-t1').val(result28);

                $('.b3-2').each(function () 
                {
                    result29 += +$(this).val();
                });
                $('.b3-t2').val(result29);       
                
                $('.b3-3').each(function () 
                {
                    result30 += +$(this).val();
                });
                $('.b3-t3').val(result30); 

                $('.b3-4').each(function () 
                {
                    result31 += +$(this).val();
                });
                $('.b3-t4').val(result31);

                $('.b3-5').each(function () 
                {
                    result32 += +$(this).val();
                });
                $('.b3-t5').val(result32);       
                
                $('.b3-6').each(function () 
                {
                    result33 += +$(this).val();
                });
                $('.b3-t6').val(result33);

                $('.b3-7').each(function () 
                {
                    result34 += +$(this).val();
                });
                $('.b3-t7').val(result34);

                $('.b3-8').each(function () 
                {
                    result35 += +$(this).val();
                });
                $('.b3-t8').val(result35);  
                
                $('.b3-9').each(function () 
                {
                    result36 += +$(this).val();
                });
                $('.b3-t9').val(result36);
            });


            $('input.b4-1,input.b4-2,input.b4-3,input.b4-4,input.b4-5,input.b4-6,input.b4-7,input.b4-8,input.b4-9').change(function () 
            {
                var result37 = 0;
                var result38 = 0;
                var result39 = 0;
                var result40 = 0;
                var result41 = 0;
                var result42 = 0;
                var result43 = 0;
                var result44 = 0;
                var result45 = 0;

                $('.b4-1').each(function () 
                {
                    result37 += +$(this).val();
                });
                $('.b4-t1').val(result37);

                $('.b4-2').each(function () 
                {
                    result38 += +$(this).val();
                });
                $('.b4-t2').val(result38);       
                
                $('.b4-3').each(function () 
                {
                    result39 += +$(this).val();
                });
                $('.b4-t3').val(result39); 

                $('.b4-4').each(function () 
                {
                    result40 += +$(this).val();
                });
                $('.b4-t4').val(result40);

                $('.b4-5').each(function () 
                {
                    result41 += +$(this).val();
                });
                $('.b4-t5').val(result41);       
                
                $('.b4-6').each(function () 
                {
                    result42 += +$(this).val();
                });
                $('.b4-t6').val(result42);

                $('.b4-7').each(function () 
                {
                    result43 += +$(this).val();
                });
                $('.b4-t7').val(result43);

                $('.b4-8').each(function () 
                {
                    result44 += +$(this).val();
                });
                $('.b4-t8').val(result44);  
                
                $('.b4-9').each(function () 
                {
                    result45 += +$(this).val();
                });
                $('.b4-t9').val(result45);
            });

        </script>
        <script>
            $('.t1,.t2,.t3,.t4,.t5,.t6,.t7,.t8,.t9').change(function () 
            {
                var result46 = 0;
                var result47 = 0;
                var result48 = 0;
                var result49 = 0;
                var result50 = 0;
                var result51 = 0;
                var result52 = 0;
                var result53 = 0;
                var result54 = 0;

                $('.t1').each(function () 
                {
                    5/100*.t1 = result46 +$(this).val();
                });
                $('.b5-t1').val(result46);

                $('.t2').each(function () 
                {
                    5/100*'.t2' = result47;
                });
                $('.b5-t2').val(result47);

                $('.t3').each(function () 
                {
                    5/100*'.t3' = result48;
                });
                $('.b5-t3').val(result48);

                $('.t4').each(function () 
                {
                    5/100*'.t4' = result49;
                });
                $('.b5-t4').val(result49);

                $('.t5').each(function () 
                {
                    5/100*'.t5' = result50;
                });
                $('.b5-t5').val(result50);

                $('.t6').each(function () 
                {
                    5/100*'.t6' = result51;
                });
                $('.b5-t6').val(result51);

                $('.t7').each(function () 
                {
                    5/100*'.t7' = result52;
                });
                $('.b5-t7').val(result52);

                $('.t8').each(function () 
                {
                    5/100*'.t8' = result53;
                });
                $('.b5-t8').val(result53);

                $('.t9').each(function () 
                {
                    5/100*'.t9' = result54;
                });
                $('.b5-t9').val(result54);
            });
        </script>
</body>
</html>
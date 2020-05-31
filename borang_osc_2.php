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

<body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">
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
                <form method="post" action="#">
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
                                        <td><input type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ii</td>
                                        <td>Hasil Yuran Penyertaan<br></td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iii</td>
                                        <td>Hasil Yuran Pembentang</td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iv</td>
                                        <td>Hasil Jualan Ikan</td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>v</td>
                                        <td>Hasil Jualan Produk</td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>vi</td>
                                        <td>Lain - lain (Sila nyatakan)</td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="height: 100px;">
                                        <td></td>
                                        <td></td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                        <td><input type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ii</td>
                                        <td>Penggunaan Ruang/Makmal/Dewan/Padang/<br></td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Gelanggang Sukan (Sewa Termasuk Utiliti &amp; <br></td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Penyelenggaraan<br></td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iii</td>
                                        <td>Persiapan Teknikal (Peralatan Audio/Media)</td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iv</td>
                                        <td>Alatulis/Sijil Penyertaan/Tanda Nama </td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>v</td>
                                        <td>Kenderaan Universiti </td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>vi</td>
                                        <td>Penginapan (Rumah Rehat Universiti/Kolej Kediaman </td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Bil elektrik/air </td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="height: 100px;">
                                        <td></td>
                                        <td></td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                        <td><input type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ii</td>
                                        <td>Makanan<br></td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iii</td>
                                        <td>Kos Pekerja<br></td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iv</td>
                                        <td>Mesyuarat &amp; Persiapan<br></td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>v</td>
                                        <td>Bayaran Upah Lori/Meja/Kerusi</td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>vi</td>
                                        <td>Tuntutan Perjalanan</td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>vii</td>
                                        <td>Tuntutan Penginapan Staf</td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>viii</td>
                                        <td>Elaun Lebih Masa</td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ix</td>
                                        <td>Honorarium Penceramah<br></td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>x</td>
                                        <td>Cenderahati</td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="height: 100px;">
                                        <td></td>
                                        <td></td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                        <td><input type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ii</td>
                                        <td>Pengangkutan<br></td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iii</td>
                                        <td>Alatan Tulis</td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iv</td>
                                        <td>Telefon<br></td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>v</td>
                                        <td>Lain-lain (sila nyatakan)</td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="height: 100px;">
                                        <td></td>
                                        <td></td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                        <td><input type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ii</td>
                                        <td>Penginapan<br></td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iii</td>
                                        <td>Bayaran Honorarium</td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>iv</td>
                                        <td>Pengangkutan<br></td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>v</td>
                                        <td>Tuntutan Perjalanan </td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="height: 100px;">
                                        <td></td>
                                        <td></td>
                                        <td><input type="text"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                        <td><input type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="height: 100px;">
                                        <td></td>
                                        <td></td>
                                        <td><input type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="height: 80px;">
                                        <td></td>
                                        <td>Keuntungan (A-B) </td>
                                        <td><input type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                        <td><input type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 30px;">40% ke Jabatan</td>
                                        <td><input type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 30px;">10% ke Tabung Endowment PTj </td>
                                        <td><input type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>b) 50% Insentif Kepada Staff / Syarikat Universiti </td>
                                        <td><input type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="height: 100px;">
                                        <td></td>
                                        <td style="padding-left: 30px;">*berdasarkan kelulusan oleh Jawatankuasa Di Peringkat Jabatan</td>
                                        <td><input type="text" style="width: auto;"></td>
                                        <td style="padding: 0px;padding-bottom: 0px;width: auto;height: auto;">
                                            <div class="table-responsive table-borderless" style="height: auto;width: auto;">
                                                <table class="table table-bordered">
                                                    <tbody style="width: auto;height: auto;">
                                                        <tr style="height: auto;width: auto;">
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
                                                            <td style="padding-bottom: 0px;width: auto;height: auto;"><input type="text"></td>
                                                            <td style="padding-bottom: 0px;"><input type="text"></td>
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
        <script type="text/javascript">
                window.history.forward();
                function noBack() 
                { 
                    window.history.forward(); 
                    alert
                }
        </script>
</body>

</html>
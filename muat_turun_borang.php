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


            /*$staf = mysqli_query($con,"SELECT email, fullname FROM staf_register WHERE email = '".$_GET['email']."'") or die ("Failed to query database" .mysql_error());
            $row = mysqli_fetch_array($staf);

            if($row['email'] == $_GET['email'])
            {
                $row['fullname'];
            }*/
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
        id="wrapper" style="width: auto;height: auto;">
        <div class="d-lg-flex" id="sidebar-wrapper" style="background-color: rgb(0,0,0);">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"> <a href="staff_menu.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>">MENU</a></li>
                <li style="background-color: transparent;"> <a href="muat_naik_kertas_kerja.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>" style="color: rgb(153,153,153);">Muat naik kertas kerja<br></a></li>
                <li style="background-color: transparent;"> <a href="borang_osc_1.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>" style="color: rgb(153,153,153);">Borang OSC/1</a></li>
                <li> <a href="borang_osc_2.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>">Borang OSC/2</a></li>
                <li style="background-color: #2d0e6e;"> <a href="muat_turun_borang.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>" style="color: rgb(255,255,255);">Muat turun lain - lain borang</a></li>
            </ul>
        </div>
        <div class="page-content-wrapper" style="width: auto;height: auto;">
            <div class="container-fluid" id="butang" style="width: auto;"><a class="btn btn-link" role="button" id="menu-toggle" href="#menu-toggle" style="width: auto;"><i class="fa fa-bars"></i></a></div>
            <div class="container-fluid" style="max-width: auto;min-width: auto;width: auto;height: auto;margin-right: 90px;margin-left: 90px;background-color: transparent;filter: saturate(100%);">
                <section style="width: auto;max-width: auto;min-width: auto;margin-top: 22px;margin-left: 20px;margin-right: 20px;height: auto;">
                    <div class="row" style="width: auto;">
                        <div class="col"><input class="form-control-plaintext" type="text" value="BERIKUT MERUPAKAN SENARAI DOKUMEN YANG BOLEH DI MUAT TURUN" readonly="" style="margin-top: 20px;font-weight: bold;"></div>
                    </div>
                    <div class="row" style="width: auto;padding-top: 22px;">
                        <div class="col"><a href="/osc/assets/dokumen/Borang_UniMAP_OSC1_(Borang_maklumat_aktiviti_penjanaan_kewangan).docx" download>1. Borang OSC 1</a></div>
                    </div>
                    <div class="row" style="padding-top: 15px;">
                        <div class="col"><a href="/osc/assets/dokumen/BORANG_OSC_2.xlsx" download>2. Borang OSC 2</a></div>
                    </div>
                    <div class="row" style="padding-top: 15px;">
                        <div class="col"><a href="/osc/assets/dokumen/Carta_Alir_OSC_(1).docx" download>3. Carta alir OSC</a></div>
                    </div>
                    <div class="row" style="padding-top: 15px;">
                        <div class="col"><a href="/osc/assets/dokumen/BORANG_PERMOHONAN_WUJUD_KOD_UNTUK_PROGRAM_17-11-2016_(3).docx" download>4. Borang Permohonan Wujud Kod Untuk Program</a></div>
                    </div>
                    <div class="row" style="padding-top: 15px;">
                        <div class="col"><a href="/osc/assets/dokumen/BORANG_PENUTUPAN_PROGRAM.doc" download>5. Borang Penutupan Program</a></div>
                    </div>
                    <section class="text-left" style="width: auto;margin-bottom: 80px;margin-top: 8px;padding-top: 69px;">
                        <div style="width: auto;"><a class="btn btn-primary" role="button" style="margin-left: 10px;margin-bottom: 5px;" href="bantuan_staff.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>">Bantuan<i class="icon ion-help" style="margin-left: 9px;"></i></a></div>
                    </section>
                </section>
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
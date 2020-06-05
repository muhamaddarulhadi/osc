<?php
    $pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && ($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache');  //check whether page is refresh or not

    foreach($_GET as $loc=>$email)
    $_GET[$loc] = base64_decode(urldecode($email));

    if(isset($_GET[$loc]) && $_GET[$loc] !== '')

    //if(isset($_GET['email']) && $_GET['email'] !== '')     YANG LAMA
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
            die("Sambungan gagal! : " . mysqli_connect_error());
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
            /*else if ($_SERVER['HTTP_REFERER'] == 'http://localhost/osc/index.html')
            {
                //hanya untuk guna index.html ke staff_menu.html

                $staf = mysqli_query($con,"SELECT email, fullname FROM staf_register WHERE email = '".$_GET[$loc]."'") or die ("Failed to query database" .mysql_error());

                //$staf = mysqli_query($con,"SELECT email, fullname FROM staf_register WHERE email = $email") or die ("Failed to query database" .mysqli_error());     YANG LAMA 
                $row = mysqli_fetch_array($staf);

                if($row['email'] == $_GET[$loc])

                //if($row['email'] == $_GET['email'])     YANG LAMA
                {
                    $row['fullname'];
                } 
            }
            else if ($_SERVER['HTTP_REFERER'] == 'http://localhost/osc/update_profile.php')
            {
                //hanya untuk guna muat_naik_kertas_kerja.html/borang_osc1 dan 2/muat_turun_borang ke staff_menu.html

                $staf = mysqli_query($con,"SELECT email, fullname FROM staf_register WHERE email = '".$_GET[$loc]."'") or die ("Failed to query database" .mysql_error());

                $row = mysqli_fetch_array($staf);

                if($row['email'] == $_GET[$loc])

                //if($row['email'] == $_GET['email'])     YANG LAMA
                {
                    $row['fullname'];
                }
            }*/ 
            else
            {
                $staf = mysqli_query($con,"SELECT email, fullname FROM staf_register WHERE email = '".$_GET[$loc]."'") or die ("Failed to query database" .mysql_error());
                $row = mysqli_fetch_array($staf);

                if($row['email'] == $_GET[$loc])

                //if($row['email'] == $_GET['email'])     YANG LAMA
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
    <div class="text-center" id="line" style="background-color: #2d0e6e;padding-top: 4px;padding-bottom: 4px;width: auto;height: auto;color: rgb(215,215,215);"><span class="text-center text-sm-center text-md-center text-lg-center text-xl-center justify-content-center align-items-center align-content-center align-self-center flex-wrap" style="color: rgb(255,255,255);font-size: 20px;font-family: ABeeZee, sans-serif;font-style: normal;padding-right: 4px;padding-left: 4px;">One Stop Centre<br></span></div>
    <section>
        <div class="text-center profile-card" style="margin: 15px;background-color: #ffffff;padding-bottom: 15px;padding-top: 15px;">
            <div>
                <h3><?php echo $row['fullname'] ?></h3>
                <p style="padding:20px;padding-bottom:0;padding-top:5px;"><?php echo $row['email'] ?></p>
            </div>
        </div>
    </section>
    <section class="text-center" style="width: auto;">
        <div style="width: auto;"><a class="btn btn-primary" role="button" href="/osc/muat_naik_kertas_kerja.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>">Masukkan data pemohonan anda<i class="fa fa-file-text" style="margin-left: 9px;"></i></a><a class="btn btn-primary" role="button" style="margin-left: 37px;" href="index.html">Log Keluar&nbsp;<i class="icon-logout" style="margin-left: 9px;"></i></a>
            <a
                class="btn btn-primary" role="button" style="margin-left: 37px;" href="/osc/bantuan_staff.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>">Bantuan<i class="icon ion-help" style="margin-left: 9px;"></i></a><a class="btn btn-primary" role="button" style="margin-left: 37px;" href="/osc/update_profile.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>">Sunting Maklumat Anda&nbsp;<i class="icon ion-android-settings" style="margin-left: 9px;"></i></a></div>
    </section>
    <section>
        <div class="text-center profile-card" style="margin: 15px;background-color: #ffffff;padding-bottom: 15px;padding-top: 15px;">
            <div>
                <p style="padding:20px;padding-bottom:0;padding-top:5px;">Senarai pemohonan anda</p>
            </div>
            <div></div>
        </div>
    </section>
    <section>
        <div class="text-center profile-card" style="margin: 15px;background-color: #ffffff;padding-bottom: 15px;padding-top: 15px;">
            <div>
                <p style="padding:20px;padding-bottom:0;padding-top:5px;">Senarai pemohonan yang di tolak</p>
            </div>
            <div></div>
        </div>
    </section>
    <section>
        <div class="text-center profile-card" style="margin: 15px;background-color: #ffffff;padding-bottom: 15px;padding-top: 15px;">
            <div>
                <p style="padding:20px;padding-bottom:0;padding-top:5px;">Senarai pemohonan yang di terima</p>
            </div>
            <div></div>
        </div>
    </section><span class="fa fa-angle-up ir-arriba"> </span>
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
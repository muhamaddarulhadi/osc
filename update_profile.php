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
                $staf = mysqli_query($con,"SELECT email, fullname, staffid, password FROM staf_register WHERE email = '".$_GET[$loc]."'") or die ("Failed to query database" .mysql_error());

                //$staf = mysqli_query($con,"SELECT email, fullname FROM staf_register WHERE email = $email") or die ("Failed to query database" .mysqli_error());     YANG LAMA 
                $row = mysqli_fetch_array($staf);

                if($row['email'] == $_GET[$loc])

                //if($row['email'] == $_GET['email'])     YANG LAMA
                {
                    $row['fullname'];
                    $row['staffid'];
                    $row['password'];
                    $row['email'];
                } 
            }
            /*else if ($_SERVER['HTTP_REFERER'] == 'http://localhost/osc/php/update_profile.php')
            {
                //hanya untuk guna index.html ke staff_menu.html

                $staf = mysqli_query($con,"SELECT email, fullname, staffid, password FROM staf_register WHERE email = '".$_GET[$loc]."'") or die ("Failed to query database" .mysql_error());

                //$staf = mysqli_query($con,"SELECT email, fullname FROM staf_register WHERE email = $email") or die ("Failed to query database" .mysqli_error());     YANG LAMA 
                $row = mysqli_fetch_array($staf);

                if($row['email'] == $_GET[$loc])

                //if($row['email'] == $_GET['email'])     YANG LAMA
                {
                    $row['fullname'];
                    $row['staffid'];
                    $row['password'];
                    $row['email'];
                } 
            }*/
            else
            {
                $staf = mysqli_query($con,"SELECT email, fullname, staffid, password FROM staf_register WHERE email = '".$_GET[$loc]."'") or die ("Failed to query database" .mysql_error());
                $row = mysqli_fetch_array($staf);

                if($row['email'] == $_GET[$loc])

                //if($row['email'] == $_GET['email'])     YANG LAMA
                {
                    $row['fullname'];
                    $row['staffid'];
                    $row['password'];
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
<body style="background-color: rgb(241,241,241);">
    <div class="text-center" id="line" style="background-color: #2d0e6e;padding-top: 4px;padding-bottom: 4px;width: auto;height: auto;color: rgb(215,215,215);"><span class="text-center text-sm-center text-md-center text-lg-center text-xl-center justify-content-center align-items-center align-content-center align-self-center flex-wrap" style="color: rgb(255,255,255);font-size: 20px;font-family: ABeeZee, sans-serif;font-style: normal;padding-right: 4px;padding-left: 4px;">One Stop Centre<br></span></div>
    <div
        class="login-card" style="background-color: #ffffff;width: auto;max-width: 513px;margin-bottom: 60px;margin-top: 75px;max-height: 596.612px;height: auto;">
        <p class="profile-name-card" style="color: #000000;font-size: 30px;margin-bottom: 21px;margin-top: -17px;">Maklumat anda</p>
        <form autocomplete="off" method="POST" action="/osc/php/update_profile.php?emailE=<?php echo urlencode(base64_encode($row['email'])) ?>" class="form-signin"><span class="reauth-email"> </span><span style="margin-bottom: 12px;">E - Mel</span><input class="form-control" value="<?php echo $row['email'] ?>" name="email" type="email" id="inputEmail" required="" placeholder="E-Mel" autofocus="" autocomplete="off" style="font-size: 14px;line-height: 18px;"><span
                style="margin-bottom: 12px;margin-top: 12px;">Nama penuh</span><input class="form-control" value="<?php echo $row['fullname'] ?>" name="fullname" type="string" id="inputFullname"
                required="" placeholder="Nama Penuh" style="margin-top: 0px;font-size: 14px;line-height: 18px;" autocomplete="off" autofocus=""><span style="margin-bottom: 12px;margin-top: 12px;">ID Staf</span><input readonly class="form-control" value="<?php echo $row['staffid'] ?>" name="staffid" type="string" id="inputStaffID" required="" placeholder="Staf ID" style="margin-top: 0px;font-size: 14px;line-height: 18px;"
                autocomplete="off" autofocus=""><span style="margin-bottom: 12px;margin-top: 12px;">Kata laluan</span>
            <div class="input-container" style="align-items: center; display: flex; border: 1px solid #dadee3; border-radius: 3px; margin-top: 0px;"><input class="form-control" value="<?php echo $row['password'] ?>" name="password" type="password" id="inputPassword" required="" placeholder="Kata Laluan" autocomplete="off" maxlength="10" minlength="6" style="padding-top: 6px;padding-right: 12px;padding-bottom: 6px;padding-left: 12px;margin-bottom: 0px; border: none; outline: none; font-size: 14px; color: #333;">
                <i
                    class="material-icons visibility" style="padding-right: 8px;cursor: pointer;padding-left: 8px;color: rgb(170,170,170);">visibility_off</i>
            </div>
            <div class="form-row" style="margin-top: 29px;">
                <div class="col"><a class="btn btn-primary btn-block btn-lg btn-signin" role="button" href="staff_menu.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>" style="background-color: rgb(0,123,255);font-size: 14px;border-radius: 10px;">Batal</a></div>  <!-- kena letak <a /a> dan role="button" kalau nak link ke page lain -->
                <div class="col"><button class="btn btn-primary btn-block btn-lg btn-signin" type="submit" style="background-color: rgb(0,123,255);font-size: 14px;border-radius: 10px;">Kemaskini</button></div>
            </div>
        </form>
        <div class="row no-gutters text-center" style="margin-top: 20px;">
            <!--<div class="col"><a class="forgot-password" href="index.html" style="color: #000000;font-size: 14px;margin-top: 10px;height: 24px;">Anda mahu log masuk?</a></div>-->
        </div>
        </div>
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
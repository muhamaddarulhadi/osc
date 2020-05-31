<?php

    $pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && ($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache');  //check whether page is refresh or not

    foreach($_GET as $loc=>$email)
    $_GET[$loc] = base64_decode(urldecode($email));

    if(isset($_GET[$loc]) && $_GET[$loc] !== '')

    //if(isset($_GET['email']) && $_GET['email'] !== '')  //YANG LAMA
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
    /*
    if(isset($_POST['upload']))
    {
        //YANG LAIN
        $file = $_FILES["file"];
        
        move_uploaded_file($file["tmp_name"]), "uploads/" . $file["name"]);

        header("Location : osc/muat_naik_kertas_kerja.html");



        //YANG LAIN
        #retrieve file title
        $title = $_POST["title"];
     
        #file name with a random number so that similar dont get replaced
        $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
    
        #temporary file name to store file
        $tname = $_FILES["file"]["tmp_name"];
    
        #upload directory path
        $uploads_dir = 'uploads';
        #TO move the uploaded file to specific location
        move_uploaded_file($tname, $uploads_dir.'/'.$pname);
    
        #sql query to insert into database
        $sql = "INSERT into fileup(title,image) VALUES('$title','$pname')";
    
        if(mysqli_query($conn,$sql)){
    
        echo "File Sucessfully uploaded";
        }
        else
        {
            echo "Error";
        }
    } */
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
        <div id="sidebar-wrapper" style="background-color: rgb(0,0,0);">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"> <a href="staff_menu.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>">MENU</a></li>
                <li style="background-color: #2d0e6e;"> <a href="muat_naik_kertas_kerja.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>" style="color: rgb(255,255,255);">Muat naik kertas kerja<br></a></li>
                <li> <a href="borang_osc_1.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>">Borang OSC/1</a></li>
                <li> <a href="borang_osc_2.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>">Borang OSC/2</a></li>
                <li> <a href="muat_turun_borang.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>">Muat turun lain - lain borang</a></li>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid" id="butang"><a class="btn btn-link" role="button" id="menu-toggle" href="#menu-toggle"><i class="fa fa-bars"></i></a></div>
            <div class="container" style="max-width: auto;min-width: auto;width: auto;">
                <section style="width: auto;max-width: auto;min-width: auto;">
                    <div style="width: auto;max-width: auto;min-width: auto;">
                        <div class="row padMar mx-auto col-sm-9 col-md-7 col-lg-5 col-xl-6 colorCajasBlancas margenesCajas" style="padding-top: 65px;width: auto;max-width: auto;min-width: auto;">
                            <div class="col margenesCajas" style="max-width: auto;width: auto;">
                                <div class="row" style="width: auto;max-width: auto;min-width: auto;">
                                    <div class="col-12 col-sm-10 col-md-10 col-lg-12 col-xl-9 d-flex flex-wrap padMar mx-auto">
                                        <h4 class="padMar" style="width: auto;max-width: auto;">Muat naik kertas kerja&nbsp;</h4>
                                    </div>
                                    <div class="col-12 col-sm-10 col-md-10 col-lg-12 col-xl-9 d-flex flex-wrap padMar mx-auto">
                                        <p class="margenesTxts" style="width: auto;max-width: auto;">*Yang diluluskan oleh ketua jabatan sahaja</p>
                                    </div>
                                    <div class="col-12 col-sm-10 col-md-10 col-lg-12 col-xl-9 d-flex flex-wrap padMar mx-auto">
                                        <p class="margenesTxts" style="width: auto;max-width: auto;">Muat naik dokumen dalam berformat pdf sahaja</p>
                                    </div>
                                    <div class="col-12 col-sm-10 col-md-10 col-lg-12 col-xl-9 d-flex flex-wrap padMar mx-auto" style="width: auto;max-width: auto;">
                                        <form action="#" method="POST" enctype="multipart/form-data">
                                            <input type="file" name="pdfFile">
                                            <input type="submit" name="upload" value="Muat Naik" class="btn btn-primary btn-Oscuro" style="margin-top: 13px">
                                          </form>
                                    
                                        <!--<button class="btn btn-primary btn-Oscuro" type="button" style="padding-right: 19px;margin-top: 5px;">Pilih Dokumen</button><input type="text" readonly="" style="margin-left: 5px;margin-top: 5px;">
                                        
                                        <button class="btn btn-primary btn-Oscuro"
                                            type="button" style="margin-left: 5px;margin-top: 5px;">Muat Naik</button>--></div>
                                    <div class="col-12 col-sm-10 col-md-10 col-lg-12 col-xl-9 d-flex flex-wrap padMar mx-auto" style="padding-top: 14px;width: auto;max-width: auto;">
                                        <p class="margenesTxts" style="width: auto;max-width: auto;margin-right: 7px;">Status:&nbsp;</p>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
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

        <style name="button choose file">
            .inputfile:focus + label 
            {
                outline: 1px dotted #000;
                outline: -webkit-focus-ring-color auto 5px;
            }
        </style>
        <script type="text/javascript">
                window.history.forward();
                function noBack() 
                { 
                    window.history.forward(); 
                }
        </script>
</body>

</html>
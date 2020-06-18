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
<html style="width: auto;height: auto;">
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
<body style="width: auto;height: auto;">
    <div class="text-center" id="line" style="background-color: #2d0e6e ;padding-top: 4px;padding-bottom: 4px;width: auto;height: auto;color: rgb(215,215,215);"><span class="text-center text-sm-center text-md-center text-lg-center text-xl-center justify-content-center align-items-center align-content-center align-self-center flex-wrap" style="color: rgb(255,255,255);font-size: 20px;font-family: ABeeZee, sans-serif;font-style: normal;padding-right: 4px;padding-left: 4px;">One Stop Centre<br></span></div>
    <div
        id="wrapper" style="width: auto;height: auto;">
        <div class="d-lg-flex" id="sidebar-wrapper" style="background-color: rgb(0,0,0);">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"> <a href="staff_menu.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>">MENU</a></li>
                <li style="background-color: transparent;"> <a href="muat_naik_kertas_kerja.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>" style="color: rgb(153,153,153);">Muat naik kertas kerja & Lampiran D<br></a></li>
                <li style="background-color: #2d0e6e;"> <a href="borang_osc_1.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>" style="color: rgb(255,255,255);">Borang OSC/1</a></li>
                <li> <a href="borang_osc_2.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>">Borang OSC/2</a></li>
                <li> <a href="borang_wujud_kod_program.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>">Borang wujud kod program</a></li>
                <li> <a href="muat_turun_borang.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>">Muat turun lain - lain borang</a></li>
            </ul>
        </div>
        <div class="page-content-wrapper" style="width: auto;height: auto;">
            <div class="container-fluid" id="butang" style="width: auto;"><a class="btn btn-link" role="button" id="menu-toggle" href="#menu-toggle" style="width: auto;"><i class="fa fa-bars"></i></a></div>
            <div class="container-fluid" style="max-width: auto;min-width: auto;width: auto;height: auto;margin-right: 90px;margin-left: 90px;background-color: transparent;filter: saturate(100%);">
                <form method="POST" action="/osc/php/borangOSC1.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>">
                <section style="width: auto;max-width: auto;min-width: auto;margin-top: 22px;margin-left: 20px;margin-right: 20px;height: auto;">
                    <div class="row" style="width: auto;">
                        <div class="col"><input class="form-control-plaintext" type="text" value="BORANG AKTIVITI PENJANAAN KEWANGAN UniMAP" readonly="" style="margin-top: 20px;font-weight: bold;"></div>
                    </div>
                    <div style="margin-bottom: 10px;width: auto;">
                        <div class="row" style="padding-top: 16px;margin-bottom: 14px;width: auto;">
                            <div class="col"><input class="form-control-plaintext" type="text" value="1. MAKLUMAT AM KETUA PROJEK" readonly=""></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;margin-bottom: 14px;width: auto;">
                            <div class="col align-self-center" style="width: auto;max-width: auto;"><span>Nama Ketua Projek</span></div>
                            <div class="col" style="width: auto;max-width: auto;padding-left: 15px;"><input name="nama_ketua_projek" id="nama_ketua_projek" class="d-lg-flex" type="text" style="width: auto;"></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;margin-bottom: 14px;width: auto;">
                            <div class="col align-self-center" style="width: auto;max-width: auto;"><span>Jawatan (Jika staf kontrak, sila nyatakan tarikh tamat kontrak)</span></div>
                            <div class="col" style="width: auto;max-width: auto;padding-left: 15px;"><input name="jawatan" id="jawatan" type="text" style="width: auto;"></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;margin-bottom: 14px;width: auto;">
                            <div class="col align-self-center" style="width: auto;max-width: auto;"><span>No. Kad Pengenalan/Passport</span></div>
                            <div class="col" style="width: auto;max-width: auto;padding-left: 15px;"><input name="ic_num" id="ic_num" type="text" style="width: auto;"></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;margin-bottom: 14px;width: auto;">
                            <div class="col align-self-center" style="width: auto;max-width: auto;"><span>No. Staf</span></div>
                            <div class="col" style="width: auto;max-width: auto;padding-left: 15px;"><input name="staffid" id="staffid" type="text" style="width: auto;"></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;margin-bottom: 14px;width: auto;">
                            <div class="col align-self-center" style="width: auto;max-width: auto;"><span>Fakulti / Pusat / Institut<br></span></div>
                            <div class="col" style="width: auto;max-width: auto;padding-left: 15px;"><input name="pusat" id="pusat" type="text" style="width: auto;"></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;margin-bottom: 14px;width: auto;">
                            <div class="col align-self-center" style="width: auto;max-width: auto;"><span>E-Mel<br></span></div>
                            <div class="col" style="width: auto;max-width: auto;padding-left: 15px;"><input name="email_1" id="email" type="text" style="width: auto;"></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;margin-bottom: 14px;width: auto;">
                            <div class="col align-self-center" style="width: auto;max-width: auto;"><span>Kewarganegaraan<br></span></div>
                            <div class="col" style="width: auto;max-width: auto;padding-left: 15px;"><input name="warga" id="warga" type="text" style="width: auto;"></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;margin-bottom: 14px;width: auto;">
                            <div class="col align-self-center" style="width: auto;max-width: auto;"><span>No. Tel: HP / Pejabat<br></span></div>
                            <div class="col" style="width: auto;max-width: auto;padding-left: 15px;"><input name="tel" id="tel" type="text" style="width: auto;"></div>
                        </div>
                    </div>
                    <div style="margin-top: 10px;margin-bottom: 10px;width: auto;">
                        <div class="row" style="padding-top: 16px;margin-bottom: 13px;">
                            <div class="col"><input class="form-control-plaintext" type="text" value="2. MAKLUMAT PROJEK" readonly=""></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;margin-bottom: 14px;">
                            <div class="col align-self-center" style="width: auto;max-width: auto;"><span>Nama Klien / Organisasi<br></span></div>
                            <div class="col" style="width: auto;max-width: auto;padding-left: 15px;"><input name="klien" id="klien" type="text" style="width: auto;"></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;margin-bottom: 14px;">
                            <div class="col align-self-center" style="width: auto;max-width: auto;"><span>Alamat</span></div>
                            <div class="col" style="width: auto;max-width: auto;padding-left: 15px;"><input name="alamat_klien" id="alamat_klien" type="text" style="width: auto;"></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;margin-bottom: 14px;">
                            <div class="col align-self-center" style="width: auto;max-width: auto;"><span>No. Telefon</span></div>
                            <div class="col" style="width: auto;max-width: auto;padding-left: 15px;"><input name="tel_klien" id="tel_klien" type="text" style="width: auto;"></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;margin-bottom: 14px;">
                            <div class="col align-self-center" style="width: auto;max-width: auto;"><span>No. Faks</span></div>
                            <div class="col" style="width: auto;max-width: auto;padding-left: 15px;"><input name="faks_klien" id="faks_klien" type="text" style="width: auto;"></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;margin-bottom: 14px;">
                            <div class="col align-self-center" style="width: auto;max-width: auto;"><span>E-Mel<br></span></div>
                            <div class="col" style="width: auto;max-width: auto;padding-left: 15px;"><input name="email_klien" id="email_klien" type="text" style="width: auto;"></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;margin-bottom: 14px;">
                            <div class="col align-self-center" style="width: auto;max-width: auto;"><span>Tajuk Projek<br></span></div>
                            <div class="col" style="width: auto;max-width: auto;padding-left: 15px;"><input name="tajuk" id="tajuk" type="text" style="width: auto;"></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;margin-bottom: 14px;">
                            <div class="col align-self-center" style="width: auto;max-width: auto;"><span>Bidang Projek<br></span></div>
                            <div class="col" style="width: auto;max-width: auto;padding-left: 15px;"><input name="bidang" id="bidang" type="text" style="width: auto;"></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;margin-bottom: 9px;">
                            <div class="col align-self-center" style="width: auto;max-width: auto;"><span>Tempoh Projek<br></span></div>
                            <div class="col container-fluid" style="width: auto;max-width: auto;padding-left: 15px;"><span style="margin-right: 7px;margin-bottom: 5px;">Dari</span><input name="dari_date" id="dari_date" type="date" style="margin-right: 10px;margin-bottom: 5px;"><span style="margin-right: 7px;margin-bottom: 5px;">Hingga</span><input name="hingga_date" id="hingga_date" type="date" style="margin-bottom: 5px;"></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;margin-bottom: 14px;">
                            <div class="col align-self-center" style="width: auto;max-width: auto;"><span>Lokasi Projek<br></span></div>
                            <div class="col" style="width: auto;max-width: auto;padding-left: 15px;"><input name="lokasi" id="lokasi" type="text" style="width: auto;"></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;margin-bottom: 14px;">
                            <div class="col align-self-center" style="width: auto;max-width: auto;"><span>Kos Projek<br></span></div>
                            <div class="col" style="width: auto;max-width: auto;padding-left: 15px;"><input name="kos" id="kos" type="text" style="width: auto;"></div>
                        </div>
                    </div>
                    <div style="margin-top: 10px;margin-bottom: 10px;width: auto;">
                        <div class="row" style="padding-top: 16px;margin-bottom: 13px;width: auto;">
                            <div class="col" style="width: auto;"><input class="form-control-plaintext" type="text" value="3. PENGAKUAN KETUA PROJEK" readonly=""></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;margin-bottom: 34px;width: auto;">
                            <div class="col" style="width: auto;max-width: auto;"><span class="text-justify" style="width: auto;">Saya dengan ini memohon kebenaran Universiti untuk menjalankan projek/program ini dan saya mengesahkan maklumat-maklumat yang diberikan di atas adalah benar dan betul. Saya juga berjanji projek/program ini tidak akan menjejaskan tugas rasmi saya di Universiti dan saya berjanji memberi keutamaan kepada tugas-tugas dan tanggungjawab saya kepada Universiti ini. Selain itu, saya akan memastikan projek/program ini berjalan dengan jayanya sehingga selesai. <br></span></div>
                        </div>
                        <div class="row no-gutters d-lg-flex" style="margin-left: 16px;margin-bottom: 20px;padding-bottom: 21px;width: auto;">
                            <div class="col-xl-1 align-self-center" style="width: auto;max-width: auto;margin-right: 20px;"><span class="text-justify" style="width: auto;">Tarikh :<br></span></div>
                            <div class="col" style="width: auto;max-width: auto;"><input name="now_date_confirm" id="now_date_confirm" type="date" style="width: auto;"></div>
                        </div>
                    </div>
                    <section class="text-center" style="width: auto;margin-bottom: 80px;margin-top: 8px;padding-top: 13px;">
                        <div style="width: auto;"><button class="btn btn-primary" type="submit" style="margin-bottom: 5px;">Hantar<i class="fa fa-send" style="padding-left: 9px;"></i></button><button class="btn btn-primary" type="reset" style="margin-left: 10px;margin-bottom: 5px;">Kosongkan semua<i class="material-icons" style="font-size: 14px;padding-left: 9px;">clear</i></button>
                            <a
                                class="btn btn-primary" role="button" style="margin-left: 10px;margin-bottom: 5px;" href="bantuan_staff.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>">Bantuan<i class="icon ion-help" style="margin-left: 9px;"></i></a><!--<button class="btn btn-primary" type="button" style="margin-left: 10px;margin-bottom: 5px;">Simpan<i class="fas fa-save" style="margin-left: 9px;"></i></button>-->
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
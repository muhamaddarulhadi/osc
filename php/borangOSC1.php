<?php
    if ($_SERVER['HTTP_REFERER'] == !'http://localhost/osc/borang_osc_1.php')
    { 
         header("location: /osc/index.html");
    }
    else
    {
        foreach($_GET as $loc=>$email)
        $_GET[$loc] = base64_decode(urldecode($email));
    
        if(isset($_GET[$loc]) && $_GET[$loc] !== '')
        {
            $email =  $_GET[$loc];

            $nama_ketua_projek = $_POST['nama_ketua_projek'];
            $jawatan = $_POST['jawatan'];
            $ic_num = $_POST['ic_num'];
            $staffid = $_POST['staffid'];
            $pusat = $_POST['pusat'];
            $email_1 = $_POST['email_1'];
            $warga = $_POST['warga'];
            $tel = $_POST['tel'];

            $klien = $_POST['klien'];
            $alamat_klien = $_POST['alamat_klien'];
            $tel_klien = $_POST['tel_klien'];
            $faks_klien = $_POST['faks_klien'];
            $email_klien = $_POST['email_klien'];
            $tajuk = $_POST['tajuk'];
            $bidang = $_POST['bidang'];
            $dari_date = $_POST['dari_date'];
            $hingga_date = $_POST['hingga_date'];
            $lokasi = $_POST['lokasi'];
            $kos = $_POST['kos'];

            $now_date_confirm = $_POST['now_date_confirm'];
             
            if (empty($nama_ketua_projek) || empty($jawatan) || empty($staffid) || empty($pusat) || empty($email_1) || empty($warga) || empty($tel) || empty($klien) || empty($alamat_klien) || empty($tel_klien) || empty($faks_klien) || empty($email_klien) || empty($tajuk) || empty($bidang) || empty($dari_date) || empty($hingga_date) || empty($lokasi) || empty($kos) || empty($now_date_confirm)) 
            {
                ?>   
                    <script type="text/javascript">
                        alert("Kesemua maklumat diperlukan!"); 
                        history.go(-1);  
                        window.location.href="borang_osc_1.php?email=<?php echo urlencode(base64_encode($_GET[$loc])) ?>"; 
                    </script>
                <?php  
                die();
            }
            else
            { 
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
                    $staf = mysqli_query($con,"SELECT email, fullname FROM staf_register WHERE email = '".$_GET[$loc]."'") or die ("Failed to query database" .mysql_error());
                    $row = mysqli_fetch_array($staf);

                    if($row['email'] == $_GET[$loc])
                    {
                        $INSERT = "INSERT INTO borang_osc_1(emailUser, nama_ketua_projek, jawatan, ic_num, staffid, pusat, email_1, warga, tel, klien, alamat_klien, tel_klien, faks_klien, email_klien, tajuk, bidang, dari_date, hingga_date, lokasi, kos, now_date_confirm) values('".$row['email']."', '$nama_ketua_projek', '$jawatan', '$ic_num', '$staffid', '$pusat', '$email_1', '$warga', '$tel', '$klien', '$alamat_klien', '$tel_klien', '$faks_klien', '$email_klien', '$tajuk', '$bidang', '$dari_date', '$hingga_date', '$lokasi', '$kos', '$now_date_confirm')";
                        
                        if(mysqli_query($con, $INSERT))
                        {
                            ?>
                                <script type="text/javascript">
                                    alert("Anda berjaya untuk masukkan data borang OSC 1!"); 
                                    location.replace("/osc/borang_osc_1.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>");  
                                </script>
                            <?php
                            die();
                        }
                        else
                        {
                            ?>   
                                <script type="text/javascript">
                                    alert("Anda tidak berjaya untuk masukkan data borang OSC 1!"); 
                                    location.replace("/osc/borang_osc_1.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>");  
                                </script>
                            <?php
                            //echo "ERROR: Could not able to execute $INSERT. " . mysqli_error($con);
                            die();
                        }
                    }
                }
            }
        } 
        else
        {
            header("location: /osc/index.html");
        }
    }
?>
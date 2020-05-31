<?php

    if(isset($_GET['email']) && $_GET['email'] !== '')
    {
        $email = $_GET['email'];

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
            $staf = mysqli_query($con,"SELECT email, fullname FROM staf_register WHERE email = '".$_GET['email']."'") or die ("Failed to query database" .mysql_error());
            $row = mysqli_fetch_array($staf);

            if($row['email'] == $_GET['email'])
            {
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
                            alert("All field are required"); 
                            history.go(-1);  
                            window.location.href="borang_osc_1.html?email=<?php echo $row['email'] ?>";  
                        </script>
                    <?php  

                    die();
                }
                else    
                {
                    $INSERT = mysqli_query($con, "INSERT INTO borang1(email, nama_ketua_projek, jawatan, ic_num, staffid, pusat, email_1, warga, tel, klien, alamat_klien, tel_klien, faks_klien, email_klien, tajuk, bidang, dari_date, hingga_date, lokasi, kos, now_date_confirm) values('".$row['email']."', )") or die ("Failed to query database" .mysql_error());
                }
            }
        }
    } 
    else
    {
        header("location: /osc/borang_osc_1.html");
    }








?>
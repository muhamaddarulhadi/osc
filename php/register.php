<?php
    if ($_SERVER['HTTP_REFERER'] == !'http://localhost/osc/register.php')
    { 
        header("location: /osc/index.html");
    }
    else
    {
        if ($_SERVER['HTTP_REFERER'] == 'http://localhost/osc/register.php') //cek sama ada dia running dari link yang mana, kalau bukan dari link ni, dia akan p ke default link
        {
            $email = $_POST['email'];    
            $fullname = $_POST['fullname'];   
            $staffid = $_POST['staffid'];
            $password = $_POST['password'];

            if (empty($email) || empty($fullname) || empty($staffid) || empty($password)) 
            {
                ?>   
                    <script type="text/javascript">
                        alert("Kesemua maklumat diperlukan!"); 
                        history.go(-1);  
                        window.location.href="register.php";  
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
                    //$SELECT = "SELECT staffid, email FROM staf_register WHERE staffid = ? LIMIT 1";
                    $SELECT = "SELECT staffid, email FROM staf_register WHERE staffid = ? OR email = ? LIMIT 1";  //kena letak OR untuk check sama ada untuk staffid atau email

                    $INSERT = "INSERT INTO staf_register(email, fullname, staffid, password) values(?,?,?,?)";

                    $stmt = $con->prepare($SELECT);
                    $stmt->bind_param("ss",$staffid, $email);
                    $stmt->execute();
                    $stmt->bind_result($staffid, $email);
                    $stmt->store_result();
                    $rnum = $stmt->num_rows;
            
                    if ($rnum==0)
                    {
                        $stmt->close();
                        $stmt = $con->prepare($INSERT);
                        $stmt->bind_param("ssss",$email, $fullname, $staffid, $password); 
                        $stmt->execute();
                        ?>   
                            <script type="text/javascript">
                                alert("Anda berjaya untuk mendaftar!"); 
                                history.go(-1);  
                                window.location.href="register.php";  
                            </script>
                        <?php
                        die();
                    }
                    else 
                    {
                        ?>   
                            <script type="text/javascript">
                                alert("ID Staf atau E-Mel telah didaftarkan");
                                history.go(-1);
                                window.location.href="register.php";
                            </script>
                        <?php
                        die();
                    }
                    $stmt->close();
                    $con->close();
                }
            }
        }
        else
        {
            header("location: /osc/index.html");
        }
    }
?>
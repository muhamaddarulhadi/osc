<?php

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
                alert("All field are required"); 
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
            die("Connection failed: " . mysqli_connect_error());
        }
        else
        {
            $SELECT = "SELECT staffid FROM staf_register WHERE staffid = ? LIMIT 1";
            $INSERT = "INSERT INTO staf_register(email, fullname, staffid, password) values(?,?,?,?)";

            $stmt = $con->prepare($SELECT);
            $stmt->bind_param("s", $staffid);
            $stmt->execute();
            $stmt->bind_result($staffid);
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
                    alert("Success to register"); 
                    history.go(-1);  
                    window.location.href="register.php";  
                </script>
                <?php
            } 
            else 
            {
                ?>   
                <script type="text/javascript">
                    alert("Someone already register using this Staff ID"); 
                    history.go(-1);
                    window.location.href="register.php";
                </script>
                <?php 
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

?>
<?php

    $email = $_POST["email"];
    $password = $_POST["password"];
    $user = $_POST["user"];

    if (empty($email) || empty($password) || empty($user))
    {
        ?>   
            <script type="text/javascript">
                alert("All field are required"); 
                history.go(-1);  
                window.location.href="index.html";  
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
            if ($user=="Staf")
            {
                $staf = mysqli_query($con,"SELECT email, password FROM staf_register WHERE email = '".$_POST['email']."' AND password = '".$_POST['password']."'") or die ("Failed to query database" .mysql_error());
                $row = mysqli_fetch_array($staf); //dia masukkan data drpd data row yang dah dapat dalam table database

                if($row['email'] == $email && $row['password'] == $password)
                {
                    header("location: /OSC/staff_menu.html?email='".$row['email']."'");
                }
                else
                {
                    ?>   
                        <script type="text/javascript">
                            alert("Login Failed! Incorrect email or password."); 
                            history.go(-1);  
                            window.location.href="index.html";  
                        </script>
                    <?php  
                    die();
                }
            } 
            if ($user=="OSC Staf")
            {
                $staf = mysqli_query($con,"SELECT email, password FROM osc_staf WHERE email = '".$_POST['email']."' AND password = '".$_POST['password']."'") or die ("Failed to query database" .mysql_error());
                $row = mysqli_fetch_array($staf);

                if($row['email'] == $email && $row['password'] == $password)
                {
                    header("location: /OSC/osc_staff_menu.html?email='".$row['email']."'");
                }
                else
                {
                    ?>   
                        <script type="text/javascript">
                            alert("Login Failed! Incorrect email or password."); 
                            history.go(-1);  
                            window.location.href="index.html";  
                        </script>
                    <?php  
                    die();
                }
            }
            if ($user=="TNC")
            {
                $staf = mysqli_query($con,"SELECT email, password FROM tnc WHERE email = '".$_POST['email']."' AND password = '".$_POST['password']."'") or die ("Failed to query database" .mysql_error());
                $row = mysqli_fetch_array($staf);

                if($row['email'] == $email && $row['password'] == $password)
                {
                    header("location: /OSC/tnc_menu.html?email='".$row['email']."'");
                }
                else
                {
                    ?>   
                        <script type="text/javascript">
                            alert("Login Failed! Incorrect email or password."); 
                            history.go(-1);  
                            window.location.href="index.html";  
                        </script>
                    <?php  
                    die();
                }
            }
        }
    }
?>
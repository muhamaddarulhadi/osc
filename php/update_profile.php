<?php
    if ($_SERVER['HTTP_REFERER'] == !'http://localhost/osc/update_profile.php')
    { 
        header("location: /osc/index.html");
    }
    else
    {
        foreach($_GET as $loc=>$emailE)
        $_GET[$loc] = base64_decode(urldecode($emailE));

        if(isset($_GET[$loc]) && $_GET[$loc] !== '')
        {
            $emailE =  $_GET[$loc]; 

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
                        window.location.href="update_profile.php?email=<?php echo urlencode(base64_encode($_GET[$loc])) ?>"; 
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
                    $UPDATE = "UPDATE staf_register SET email = '".$email."', fullname = '".$fullname."', staffid = '".$staffid."', password = '".$password."' WHERE email = '".$_GET[$loc]."' ";  //kena letak OR untuk check sama ada untuk staffid atau email
                    $qry = mysqli_query($con,$UPDATE);
            
                    if ($qry)
                    {
                        $staf = mysqli_query($con,"SELECT email FROM staf_register WHERE email = '".$_POST['email']."'") or die ("Failed to query database" .mysql_error());
                        $row = mysqli_fetch_array($staf);
                        
                        if($row['email'] == $_POST['email'])
                        {
                            ?>   
                                <script type="text/javascript">
                                    alert("Anda berjaya untuk kemaskini maklumat anda!");
                                    location.replace("/osc/staff_menu.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>");
                                </script>
                            <?php
                            die();
                        }  
                    }
                    else 
                    {
                        $staf = mysqli_query($con,"SELECT email FROM staf_register WHERE email = '".$_POST['email']."'") or die ("Failed to query database" .mysql_error());
                        $row = mysqli_fetch_array($staf);
                        
                        if($row['email'] == $_POST['email'])
                        {
                            ?>   
                                <script type="text/javascript">
                                    alert("Maaf, kemaskini anda gagal!");
                                    location.replace("/osc/update_profile.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>");
                                </script>
                            <?php
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
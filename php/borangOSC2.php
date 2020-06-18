<?php
    if ($_SERVER['HTTP_REFERER'] == !'http://localhost/osc/borang_osc_2.php')
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

            $d11 = $_POST['11']; $d12 = $_POST['12']; $d13 = $_POST['13']; $d14 = $_POST['14']; $d = $_POST['15']; $d = $_POST['16']; $ = $_POST['17']; $ = $_POST['18']; $ = $_POST['19']; 
            $d21 = $_POST['21']; $d22 = $_POST['22']; $d23 = $_POST['23']; $d24 = $_POST['24']; $d = $_POST['25']; $d = $_POST['26']; $ = $_POST['27']; $ = $_POST['28']; $ = $_POST['29']; 
            $d31 = $_POST['31']; $d32 = $_POST['32']; $d33 = $_POST['33']; $d34 = $_POST['34']; $d = $_POST['35']; $d = $_POST['36']; $ = $_POST['37']; $ = $_POST['38']; $ = $_POST['39'];
            $d41 = $_POST['41']; $d42 = $_POST['42']; $d43 = $_POST['43']; $d44 = $_POST['44']; $d = $_POST['45']; $d = $_POST['46']; $ = $_POST['47']; $ = $_POST['48']; $ = $_POST['49']; 
            $d51 = $_POST['51']; $d52 = $_POST['52']; $d53 = $_POST['53']; $d54 = $_POST['54']; $d = $_POST['55']; $d = $_POST['56']; $ = $_POST['57']; $ = $_POST['58']; $ = $_POST['59']; 
            $d61 = $_POST['61']; $d62 = $_POST['62']; $d63 = $_POST['63']; $d64 = $_POST['64']; $d = $_POST['65']; $d = $_POST['66']; $ = $_POST['67']; $ = $_POST['68']; $ = $_POST['69']; 
            $d71 = $_POST['71']; $d72 = $_POST['72']; $d73 = $_POST['73']; $d = $_POST['74']; $d = $_POST['75']; $d = $_POST['76']; $ = $_POST['77']; $ = $_POST['78']; $ = $_POST['79']; 
            $d81 = $_POST['81']; $d82 = $_POST['82']; $d83 = $_POST['83']; $d = $_POST['84']; $d = $_POST['85']; $d = $_POST['86']; $ = $_POST['87']; $ = $_POST['88']; $ = $_POST['89']; 
            $d91 = $_POST['91']; $d92 = $_POST['92']; $d93 = $_POST['93']; $d = $_POST['94']; $d = $_POST['95']; $d = $_POST['96']; $ = $_POST['97']; $ = $_POST['98']; $ = $_POST['99']; 
            $d101 = $_POST['101']; $d102 = $_POST['102']; $d103 = $_POST['103']; $d = $_POST['104']; $d = $_POST['105']; $d = $_POST['106']; $ = $_POST['107']; $ = $_POST['108']; $ = $_POST['109'];
            $d111 = $_POST['111']; $d112 = $_POST['112']; $d113 = $_POST['113']; $d = $_POST['114']; $d = $_POST['115']; $d = $_POST['116']; $ = $_POST['117']; $ = $_POST['118']; $ = $_POST['119']; 
            $d121 = $_POST['121']; $d122 = $_POST['122']; $d123 = $_POST['123']; $d = $_POST['124']; $d = $_POST['125']; $d = $_POST['126']; $ = $_POST['127']; $ = $_POST['128']; $ = $_POST['129']; 
            $d131 = $_POST['131']; $d132 = $_POST['132']; $d133 = $_POST['133']; $d = $_POST['134']; $d = $_POST['135']; $d = $_POST['136']; $ = $_POST['137']; $ = $_POST['138']; $ = $_POST['139']; 
            $d141 = $_POST['141']; $d142 = $_POST['142']; $d143 = $_POST['143']; $d = $_POST['144']; $d = $_POST['145']; $d = $_POST['146']; $ = $_POST['147']; $ = $_POST['148']; $ = $_POST['149']; 
            $d151 = $_POST['151']; $d152 = $_POST['152']; $d153 = $_POST['153']; $d = $_POST['154']; $d = $_POST['155']; $d = $_POST['156']; $ = $_POST['157']; $ = $_POST['158']; $ = $_POST['159']; 
            $d161 = $_POST['161']; $d162 = $_POST['162']; $d163 = $_POST['163']; $d = $_POST['164']; $d = $_POST['165']; $d = $_POST['166']; $ = $_POST['167']; $ = $_POST['168']; $ = $_POST['169']; 
            $d171 = $_POST['171']; $d172 = $_POST['172']; $d173 = $_POST['173']; $d = $_POST['174']; $d = $_POST['175']; $d = $_POST['176']; $ = $_POST['177']; $ = $_POST['178']; $ = $_POST['179']; 
            $d181 = $_POST['181']; $d182 = $_POST['182']; $d183 = $_POST['183']; $d = $_POST['184']; $d = $_POST['185']; $d = $_POST['186']; $ = $_POST['187']; $ = $_POST['188']; $ = $_POST['189']; 
            $d191 = $_POST['191']; $d192 = $_POST['192']; $d193 = $_POST['193']; $d = $_POST['194']; $d = $_POST['195']; $d = $_POST['196']; $ = $_POST['197']; $ = $_POST['198']; $ = $_POST['199']; 
            $d201 = $_POST['201']; $d202 = $_POST['202']; $d203 = $_POST['203']; $d = $_POST['204']; $d = $_POST['205']; $d = $_POST['206']; $ = $_POST['207']; $ = $_POST['208']; $ = $_POST['209'];
            $d211 = $_POST['211']; $d212 = $_POST['212']; $d213 = $_POST['213']; $d = $_POST['214']; $d = $_POST['215']; $d = $_POST['216']; $ = $_POST['217']; $ = $_POST['218']; $ = $_POST['219']; 
            $d221 = $_POST['221']; $d222 = $_POST['222']; $d223 = $_POST['223']; $d = $_POST['224']; $d = $_POST['225']; $d = $_POST['226']; $ = $_POST['227']; $ = $_POST['228']; $ = $_POST['229']; 
            $d231 = $_POST['231']; $d232 = $_POST['232']; $d233 = $_POST['233']; $d = $_POST['234']; $d = $_POST['235']; $d = $_POST['236']; $ = $_POST['237']; $ = $_POST['238']; $ = $_POST['239']; 
            $d241 = $_POST['241']; $d242 = $_POST['242']; $d243 = $_POST['243']; $d = $_POST['244']; $d = $_POST['245']; $d = $_POST['246']; $ = $_POST['247']; $ = $_POST['248']; $ = $_POST['249']; 
            $d251 = $_POST['251']; $d252 = $_POST['252']; $d253 = $_POST['253']; $d = $_POST['254']; $d = $_POST['255']; $d = $_POST['256']; $ = $_POST['257']; $ = $_POST['258']; $ = $_POST['259']; 
            $d261 = $_POST['261']; $d262 = $_POST['262']; $d263 = $_POST['263']; $d = $_POST['264']; $d = $_POST['265']; $d = $_POST['266']; $ = $_POST['267']; $ = $_POST['268']; $ = $_POST['269']; 
            $d271 = $_POST['271']; $d272 = $_POST['272']; $d273 = $_POST['273']; $d = $_POST['274']; $d = $_POST['275']; $d = $_POST['276']; $ = $_POST['277']; $ = $_POST['278']; $ = $_POST['279']; 
            $d281 = $_POST['281']; $d282 = $_POST['282']; $d283 = $_POST['283']; $d = $_POST['284']; $d = $_POST['285']; $d = $_POST['286']; $ = $_POST['287']; $ = $_POST['288']; $ = $_POST['289']; 
            $d291 = $_POST['291']; $d292 = $_POST['292']; $d293 = $_POST['293']; $d = $_POST['294']; $d = $_POST['295']; $d = $_POST['296']; $ = $_POST['297']; $ = $_POST['298']; $ = $_POST['299']; 
            $d301 = $_POST['301']; $d302 = $_POST['302']; $d303 = $_POST['303']; $d = $_POST['304']; $d = $_POST['305']; $d = $_POST['306']; $ = $_POST['307']; $ = $_POST['308']; $ = $_POST['309'];
            $d311 = $_POST['311']; $d312 = $_POST['312']; $d313 = $_POST['313']; $d = $_POST['314']; $d = $_POST['315']; $d = $_POST['316']; $ = $_POST['317']; $ = $_POST['318']; $ = $_POST['319']; 
            $d321 = $_POST['321']; $d322 = $_POST['322']; $d323 = $_POST['323']; $d = $_POST['324']; $d = $_POST['325']; $d = $_POST['326']; $ = $_POST['327']; $ = $_POST['328']; $ = $_POST['329']; 
            $d331 = $_POST['331']; $d332 = $_POST['332']; $d333 = $_POST['333']; $d = $_POST['334']; $d = $_POST['335']; $d = $_POST['336']; $ = $_POST['337']; $ = $_POST['338']; $ = $_POST['339']; 
            $d341 = $_POST['341']; $d342 = $_POST['342']; $d334 = $_POST['343']; $d = $_POST['344']; $d = $_POST['345']; $d = $_POST['346']; $ = $_POST['347']; $ = $_POST['348']; $ = $_POST['349']; 
            $d351 = $_POST['351']; $d352 = $_POST['352']; $d335 = $_POST['353']; $d = $_POST['354']; $d = $_POST['355']; $d = $_POST['356']; $ = $_POST['357']; $ = $_POST['358']; $ = $_POST['359']; 
            $d361 = $_POST['361']; $d362 = $_POST['362']; $d336 = $_POST['363']; $d = $_POST['364']; $d = $_POST['365']; $d = $_POST['366']; $ = $_POST['367']; $ = $_POST['368']; $ = $_POST['369']; 
            $d371 = $_POST['371']; $d372 = $_POST['372']; $d337 = $_POST['373']; $d = $_POST['374']; $d = $_POST['375']; $d = $_POST['376']; $ = $_POST['377']; $ = $_POST['378']; $ = $_POST['379']; 
            $d381 = $_POST['381']; $d382 = $_POST['382']; $d338 = $_POST['383']; $d = $_POST['384']; $d = $_POST['385']; $d = $_POST['386']; $ = $_POST['387']; $ = $_POST['388']; $ = $_POST['389']; 
            $d391 = $_POST['391']; $d392 = $_POST['392']; $d339 = $_POST['393']; $d = $_POST['394']; $d = $_POST['395']; $d = $_POST['396']; $ = $_POST['397']; $ = $_POST['398']; $ = $_POST['399']; 
            $d401 = $_POST['401']; $d402 = $_POST['402']; $d403 = $_POST['403']; $d = $_POST['404']; $d = $_POST['405']; $d = $_POST['406']; $ = $_POST['407']; $ = $_POST['408']; $ = $_POST['409']; 
            $d411 = $_POST['411']; $d412 = $_POST['412']; $d413 = $_POST['413']; $d = $_POST['414']; $d = $_POST['415']; $d = $_POST['416']; $ = $_POST['417']; $ = $_POST['418']; $ = $_POST['419']; 
            $d421 = $_POST['421']; $d422 = $_POST['422']; $d423 = $_POST['423']; $d = $_POST['424']; $d = $_POST['425']; $d = $_POST['426']; $ = $_POST['427']; $ = $_POST['428']; $ = $_POST['429']; 
            $d431 = $_POST['431']; $d432 = $_POST['432']; $d433 = $_POST['433']; $d = $_POST['434']; $d = $_POST['435']; $d = $_POST['436']; $ = $_POST['437']; $ = $_POST['438']; $ = $_POST['439']; 
            $d441 = $_POST['441']; $d442 = $_POST['442']; $d443 = $_POST['443']; $d = $_POST['444']; $d = $_POST['445']; $d = $_POST['446']; $ = $_POST['447']; $ = $_POST['448']; $ = $_POST['449']; 
            $d451 = $_POST['451']; $d452 = $_POST['452']; $d453 = $_POST['453']; $d = $_POST['454']; $d = $_POST['455']; $d = $_POST['456']; $ = $_POST['457']; $ = $_POST['458']; $ = $_POST['459']; 
            $d461 = $_POST['461']; $d462 = $_POST['462']; $d463 = $_POST['463']; $d = $_POST['464']; $d = $_POST['465']; $d = $_POST['466']; $ = $_POST['467']; $ = $_POST['468']; $ = $_POST['469']; 
            $d471 = $_POST['471']; $d472 = $_POST['472']; $d473 = $_POST['473']; $d = $_POST['474']; $d = $_POST['475']; $d = $_POST['476']; $ = $_POST['477']; $ = $_POST['478']; $ = $_POST['479']; 
            $d481 = $_POST['481']; $d482 = $_POST['482']; $d483 = $_POST['483']; $d = $_POST['484']; $d = $_POST['485']; $d = $_POST['486']; $ = $_POST['487']; $ = $_POST['488']; $ = $_POST['489']; 
                    
            if (empty($nama_ketua_projek) || empty($jawatan) || empty($staffid) || empty($pusat) || empty($email_1) || empty($warga) || empty($tel) || empty($klien) || empty($alamat_klien) || empty($tel_klien) || empty($faks_klien) || empty($email_klien) || empty($tajuk) || empty($bidang) || empty($dari_date) || empty($hingga_date) || empty($lokasi) || empty($kos) || empty($now_date_confirm)) 
            {
                ?>   
                    <script type="text/javascript">
                        alert("Kesemua maklumat diperlukan!"); 
                        history.go(-1);  
                        window.location.href="borang_osc_2.php?email=<?php echo urlencode(base64_encode($_GET[$loc])) ?>"; 
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
                                    alert("Anda berjaya untuk masukkan data borang OSC 2!"); 
                                    location.replace("/osc/borang_osc_2.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>");  
                                </script>
                            <?php
                            die();
                        }
                        else
                        {
                            ?>   
                                <script type="text/javascript">
                                    alert("Anda tidak berjaya untuk masukkan data borang OSC 2!"); 
                                    location.replace("/osc/borang_osc_2.php?email=<?php echo urlencode(base64_encode($row['email'])) ?>");  
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
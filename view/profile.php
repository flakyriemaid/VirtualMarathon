<head>
    <link rel="stylesheet" href="view/style/profile.css">
    <script defer src="view/JS/profile.js"></script>
    <title>Profile</title>
</head>


<body>


    <div class="content">
        <?php
        function pindah()
        {
            //session thingy here

        }
        ?>
        <div class="user_info">
            <div class="setting">
                <i class="fas fa-cog"></i>
            </div>
            <div class="user_info_picture">
                <?php
                if (isset($_SESSION["gambar"])&&($_SESSION["gambar"]!=NULL)&&($_SESSION["gambar"]!='NULL')) {
                     $dp = $_SESSION["gambar"];
                     //var_dump($dp);
                } 
                else{
                    $dp="view/assets/user.png";
                    //var_dump($dp);
                }?>
                <img src="<?php echo $dp;?>" alt="" class>
            </div>
            <div class="info_1">
                <?php
                if (isset($_SESSION["nama"])) {
                    $user = $_SESSION["nama"];
                    echo "<h2> $user </h2>";
                }
                ?>
            </div>
            <hr>
            <br>
            
            <div class="detil_info info_umur">
                <?php
                if (isset($_SESSION["usia"])) {
                    $user = $_SESSION["usia"];
                    echo "<h2> Usia: $user </h2>";
                }
                ?>
            </div>
            <div class="detil_info info_gender">
                <?php
                if (isset($_SESSION["Gender"])) {
                    $user = $_SESSION["Gender"];
                    echo "<h2> Gender: $user </h2>";
                }
                ?>
            </div>
            <div class="detil_info info_alamat">
                <?php
                if (isset($_SESSION["Alamat"])) {
                    $user = $_SESSION["Alamat"];
                    echo "<h2> Alamat: $user </h2>";
                }
                ?>
            </div>
            <div class="detil_info info_saldo">
                <?php
                if (isset($_SESSION["saldo"])) {
                    $user = $_SESSION["saldo"];
                    echo "<h2> Saldo: $user </h2>";
                }
                ?>
            </div>
        </div>
        <div class="current_track">
            <div class="go_button">
                <a href="#" class="myButton">GO!!</a>
            </div>
        </div>
        <div class="owned_medal">
            <!-- <div class="medal"><img class="badge_img" src="view/assets/mountain1.png" alt=""></div> -->
            <?php foreach ($result[0] as $key => $row) {
            ?>
                <div class="medal"><?php echo $row->getGambarBadge() ?></div>
            <?php } ?>

        </div>
        <div class="API_weather">
            <div class="trackList">

                <?php foreach ($result[1] as $key => $row) {
                ?>
                    <a href="progress" id="<?php echo $row->getTema() ?>"><?php echo $row->getTema(); ?></a>
                <?php } ?>

            </div>
        </div>
        <div class="statistic">
            <div id="openweathermap-widget-21"></div>
            <script src='//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/d3.min.js'></script>
            <script>
                window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];
                window.myWidgetParam.push({
                    id: 21,
                    cityid: '1650357',
                    appid: 'ebe0a8f921d74fd22be5420b94a8a607',
                    units: 'metric',
                    containerid: 'openweathermap-widget-21',
                });
                (function() {
                    var script = document.createElement('script');
                    script.async = true;
                    script.charset = "utf-8";
                    script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(script, s);
                })();



                let links = document.querySelector('.trackList').children
                for (let a of links) {
                    a.addEventListener('click', function() {
                        event.preventDefault();
                        console.log("<?php echo pindah() ?>");
                        window.location.href = "progress";
                    })
                }
            </script>
        </div>



    </div>

    <div class="over">
        <div class="box">
            <input type="text" name="namabaru">
            <label for="namabaru">Name : </label>
            <br>
            <input type="text" name="passwordbaru">
            <label for="passwordbaru">new password : </label>
            <br>
            <input type="text" name="re-passwordbaru">
            <label for="re-passwordbaru">retype new password : </label>
            <br>
            <input type="file" name="gambarbaru" id="">
            <br>
            <button>Change</button>
        </div>
    </div>
</body>
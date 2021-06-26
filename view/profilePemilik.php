
<head>
    <link rel="stylesheet" href="view/style/profile.css">
    <title>Profile_Pemilik</title>
</head>


<body>
    <?php
        session_start();
        
    ?>
    <div class="content">
        <div class="user_info">
            <div class="user_info_picture">
            <?php
                    if(isset($_SESSION["gambarPemilik"])&&($_SESSION["gambarPemilik"]!=NULL)&&($_SESSION["gambarPemilik"]!='NULL')){
                        $dp=$_SESSION["gambarPemilik"];
                        
                    }
                    else{
                        $dp="view/assets/user.png";
                    }
                    
                ?>
                <img class="user_info_picture" src="<?php echo $dp?>">
            </div>
            <div class="info_1">
                <?php
                    if(isset($_SESSION["usernamePemilik"])){
                        $user=$_SESSION["usernamePemilik"];
                        echo "<h2> $user </h2>";
                    }
                ?>
            </div>
            <br><br><br><br>
            <hr>
            <button onclick="laporan()" id="goToValidate">Lihat Laporan</button>
            <button onclick="addTrack()" id="goToAddTrack">Masukan Track Baru</button>
            <button onclick="changeTrack()" id="goToUbahTrack">Ubah Track</button>
            <button onclick="addAdmin()" id="goToAddAdmin">Add Admin</button>
            <script>
                function laporan(){
                    location.href="laporan";
                }
                function addTrack(){
                    location.href="addTrack";
                }
                function changeTrack(){
                    location.href="changeTrack";
                }
                function addAdmin(){
                    location.href="addAdmin";
                }
            </script>
        </div>
    </div>
</body>
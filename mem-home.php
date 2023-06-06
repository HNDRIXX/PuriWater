<?php
require_once 'logout.php';
require 'login.php';
require 'connection.php';
require 'date.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="image/logo.png">
    <title>MEMBER</title>
</head>
<script src="https://kit.fontawesome.com/4c890c6a79.js" crossorigin="anonymous"></script>
<style>
     @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@520&display=swap');

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        list-style: none;
        text-decoration: none;
    }

    body{
        background-color: #f3f5f9;
        font-family: 'Montserrat', sans-serif;
    }

    .wrapper{
        display: flex;
        position: relative;
    }

    .wrapper .sidebar{
        width: 210px;
        height: 100%;
        background:#383838;
        padding: 30px 0px;
        position: fixed;
        transition: ease all .3s;
    }

    .wrapper .sidebar ul li{
        padding: 15px;
        border-bottom: 1px solid #bdb8d7;
        border-bottom: 1px solid #0000000d;
        border-top: 1px solid #ffffff0d;
    }    

    .wrapper .sidebar ul li a{
        color:#afaeae;
        display: block;
    }

    .wrapper .sidebar ul li a .fas{
        width: 25px;
    }

    .wrapper .sidebar ul li:hover a{
        transition: ease all .3s;
        color:#fff;
    }

    #active{
        background: #fff;
        color:#000000;
        border-radius: 0px;
        /* transform: scale(1.0); */
    }

    .wrapper .main_content{
        width: 100%;
        margin-left: 210px;
    }

    .wrapper .main_content .header{
        width: 100%;
        display:flex;
        position: relative;
        padding: 20px;
        justify-content:space-between;
        align-items:center;

        background-color: #575656;
        color: #fff;
    }

    .wrapper .main_content .header img{
        width: 2.2%;
        overflow: hidden;
    }
    
    .wrapper .main_content .announcement{
        width: 100%;
        /* border:3px solid #2e2e2e; */
        background-color: #ececec;
        height: 90vh;
        padding: 10px;
        overflow: hidden;
    }
    
    .announcement #title{
        margin-top: 1px;
        letter-spacing: -1px;
        padding: 15px;
        font-size: 1.3rem;
        font-weight: 500;
        color: #3e3c3c;
    }

    .announcement #title span{
        position: absolute;
        right: 20px;
        top: 95px;
        color: #b4b4b4;
        font-size: 12px;
    }
    
    hr {
        width: 100%;
        margin: auto;
        border: none;
        padding: 0.5px;
        background-color: #ccc7c7;
        margin-top: -1em;
        margin-bottom: 1em;
    }

    #announce, #newannounce{
        background-color: #dfdcdc;
        margin: 5px;
        margin-top: 5px;
        color: #000000;
        border-radius: 5px;
        padding: 10px;
        font-size: 14px;
    }

    #announce i, #newannounce i{
        vertical-align: middle;
        font-size: 20px;
    }

    #expiredate{
        vertical-align: middle;
        margin-left: 33px;
        font-size: 9px;
    }

    @media screen and (max-width: 900px){
        .logo{
            display: none;
        }

        .wrapper .sidebar{
            width: 50px;
            height: 100%;
            background:#383838;
            padding: 30px 0px;
            position: fixed;
            
            transition: ease all .3s;
        }

        .wrapper .sidebar ul i{
            display: initial;
        }

        .wrapper .sidebar ul li a{
            overflow: hidden;
        }

        .wrapper .sidebar ul i{
            margin-right: 100px;
        }

        .wrapper .main_content{
            width: 100%;
            margin-left: 50px;
            margin-right: 10px;
        }
    }
</style>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="logo">
                <img src="image/logo1.png" style="width: 100%; margin-bottom: 20px;" draggable="false">
            </div>
            
            <ul>
                <li id="active"><a href="mem-home.php" id="active"><i class="fas fa-home"></i>HOME</a></li>
                <li><a href="mem-sessions.php"><i class="fas fa-calendar"></i>SESSIONS</a></li>
                <li><a href="mem-profile.php"><i class="fas fa-user"></i>PROFILE</a></li>
                <li><a href="mem-settings.php"><i class="fas fa-cog"></i>SETTINGS</a></li>
                <li><a href="index.php"><i class="fas fa-sign-out"></i>LOGOUT</a></li>
            </ul>
        </div>

        <div class="main_content">
            <?php $welcomeName = $_SESSION['full_name']; ?>
            
            <div class="header"><?php echo $msg,$welcomeName; ?>.<img src="image/header.png" alt=""></div>  
            
            <div class="announcement">
                <p id="title" style="margin-bottom: 20px;">ANNOUNCEMENT<span>HOME &nbsp;<i class="fa-solid fa-angle-right" style="font-size: 10px;"></i>&nbsp; ANNOUNCEMENT</span></p><hr>
               
                <p id='announce' style="background-color: #62b654; color: #fff;"><i class="fa fa-hand-sparkles"></i>&nbsp;&nbsp;The gym follows the COVID-19 Protocol for safety and sanitation, and the gym's equipment is always clean and disinfected.</p>

                <p id='announce'><i class="fa fa-id-card"></i>&nbsp;&nbsp;&nbsp;No vaccination card, No entry</i> </p>
                <?php
                    $query = "SELECT * FROM announcement";
                    $result = mysqli_query($conn, $query);
                        
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)){
                                $Expiry = $row['ann_Expire'];
                                //echo $Expiry; 
                                //echo "<br>";
                                //echo $Date; 
                        
                                if($Date < $Expiry){    
                                    echo "<div id='newannounce'><i class='fa fa-bullhorn'></i>&nbsp;&nbsp;
                                            $row[ann_Announce]
                                            <br><span id='expiredate'>Announcement expire on:&nbsp;&nbsp;$row[ann_Expire]</span></div>";
                                }   
                            }
                        } 
                        // else {
                        //     echo "<p id='announce'>No Announcement for now listed</i> </p>";
                        // }?>	
            </div>
        </div>
    </div>
</body>
</html>
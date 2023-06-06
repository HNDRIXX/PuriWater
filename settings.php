<?php
require_once 'logout.php';
require 'login.php';
require 'connection.php';
require 'date.php';
?>

<?php 
    // if (isset($_POST['submit-button'])){
    //     $no_of_records_per_page = $_POST['no_of_records_per_page'];
        
    // }
    // if (isset($_GET['pageno'])) {
    //     $pageno = $_GET['pageno'];
    // } else {
    //     $pageno = 1;
    // }
    
    // $no_of_records_per_page = 5;
    // $offset = ($pageno-1) * $no_of_records_per_page;
    
    // $total_pages_sql = "SELECT COUNT(*) FROM announcement WHERE status = 1 ";
    // $result = mysqli_query($conn, $total_pages_sql);
    // $total_rows = mysqli_fetch_array($result)[0];
    // $total_pages = ceil($total_rows / $no_of_records_per_page);

    // $sql = "SELECT * FROM announcement WHERE status = 1 LIMIT $offset, $no_of_records_per_page";
    // $res_data = mysqli_query($conn,$sql);
?>

<?php       
    // $currentPage = $pageno;
    // $startPage = $currentPage - 2;
    // $endPage = $currentPage + 2;

    // if ($startPage <= 0) {
    //     $endPage -= ($startPage - 1);
    //     $startPage = 1;
    // }

    // if ($endPage > $total_pages)
    //     $endPage = $total_pages;
?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="icons/css/all.css">
    <link rel="icon" href="image/water1.png">
    <title>HOME</title>
</head>

<script src="https://kit.fontawesome.com/4c890c6a79.js" crossorigin="anonymous"></script>
<style>
     @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@520&display=swap');

     @font-face {
        font-family: 'montserratregular';
        src: url('montserrat-regular.woff') format('woff');
        font-weight: normal;
        font-style: normal;
    }

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        list-style: none;
        text-decoration: none;
        
    }

    body{
        background-color: #f3f5f9;
        font-family: 'montserratregular';
        /* font-family: 'Montserrat', sans-serif; */
    }

    .wrapper{
        display: flex;
        position: relative;
    }

    .wrapper .sidebar{
        width: 210px;
        height: 100%;
        background-color: #6da5fa;
        padding: 20px 0px;
        position: fixed;
        transition: ease all .3s;
    }

    .wrapper .sidebar ul li{
        padding: 14.5px;
        border-bottom: 1px solid #bdb8d7;
        border-bottom: 1px solid #0000000d;
        border-top: 1px solid #ffffff0d;
    }    

    .wrapper .sidebar ul li a{
        font-weight: bold;
        color: #091C47;
        font-size: 14px;
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

        background-color: #3c6eda ;
        color: #fff;
    }

    #imgheader{
        width: 20px;
        overflow: hidden;
    }

    .wrapper .main_content .announcement{
        width: 100%;
        /* border:3px solid #2e2e2e; */
        padding: 10px;
    }
    
    .announcement{
        overflow: hidden;
    }

    .announcement #title{
        margin-top: 1px;
        letter-spacing: -1px;
        padding: 15px;
        font-size: 1.3rem;
        font-weight: 500;
        color: #041730;
    }

    .announcement #sidetitle{
        color: #b4b4b4;
        font-size: 12px;
    }
    
    hr {
        width: 98%;
        margin: auto;
        border: none;
        padding: 2px;
        border-bottom: 1px solid #bdb8d8;
        border-bottom: 1px solid #0000002d;
        border-top: 1px solid #ffffff1d;
        margin-top: -1em;
        margin-bottom: 1em;
    }

    #firsthr {
        width: 98%;
        margin: auto;
        border: none;
        padding: 0.5px;
        background-color: #00013a;
        margin-top: 1em;
        margin-bottom: 2em;
    }

    .account-content{
        height: 72vh;
        color: #000000;
        padding: 20px;
        border-radius: 5px;
    }

    .account-content hr {
        margin: 20px auto;
    }

    .changebutton{
        color: #000000;
        float: right;
        border: none;
        font-size: 12px;
        cursor: pointer;
        text-transform: uppercase;
        text-decoration: none;
        background: transparent;
        margin: -20px;
        margin-right: 16px;
    }

    #pass-submit, #cancel{
        border-radius: 5px;
        padding: 5px;
        margin-top: 7px;
        width: 120px;
        font-size: 12px;
        font-family: 'Montserrat';
        background-color: #383838;
        color: #fff;
        border: none;
        outline: none;
        cursor: pointer;
    }

    .account-content form{
        margin-left: 30px;
        margin-top: 10px;
    }
    .account-content form input{
        width: 245px;
        outline: none;
    }

    /* MEMBER CSS */
    .wrapper .main_content .header img{
        display: none;
        width: 2.2%;
        overflow: hidden;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }
    
    @media screen and (max-width: 900px){
        .logo{
            display: none;
        }

        .wrapper .sidebar{
            width: 50px;
            height: 100%;
            padding: 50px 0px;
            position: fixed;
            
            transition: ease all .3s;
        }

        .wrapper .sidebar ul i{
            font-size: 20px;
            display: initial;
        }

        .wrapper .sidebar ul li a{
            overflow: hidden;
        }

        .wrapper .sidebar ul i{
            margin-right: 500px;
        }

        .wrapper .main_content{
            width: 100%;
            margin-left: 50px;
        }


        .popup{
            width: 85vw;
        }

        
    }

</style>
<?php if ($_SESSION["roles"] == 'admin'){ ?>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="logo" style="margin-left:-25px; margin-top: -20px;margin-bottom: -20px;">
                <img src="image/water1.png" style="width:250px;" draggable="false">
            </div>
            
            <ul>
                <li><a href="home.php"><i class="fas fa-home"></i>HOME</a></li>
                <li><a href="users.php"><i class="fas fa-users"></i>USERS</a></li>
                <li><a href="customers.php"><i class="fas fa-users"></i>CUSTOMERS</a></li>
                <li><a href="delivery.php"><i class="fas fa-calendar"></i>DELIVERY</a></li>
                <li><a href="announcement.php"><i class="fas fa-bullhorn"></i>ANNOUNCEMENT</a></li>
                <li id="active"><a href="settings.php"  id="active"><i class="fas fa-cog"></i>SETTINGS</a></li>
                <li><a href="index.php?logout=1"><i class="fas fa-sign-out-alt"></i>LOGOUT</a></li>
            </ul>
        </div>

        <div class="main_content">
            <?php $welcomeName = $_SESSION['username']; ?>
            
            <div class="header"><?php echo $msg,$welcomeName; ?>.</div> 
            
            <div class="announcement">
                <p id="title" style="margin-bottom: 5px;">SETTINGS</p><hr id='firsthr'>

                    <div class="account-content">
                        <div>
                            <p>Name: <span style="margin-left:70px"><?php echo $_SESSION['username'];?></span></p><hr>
                            <p>Username: <span style="margin-left:35px"><?php echo $_SESSION['username'];?></span></p>
                            
                            <?php
                                $query = "SELECT * FROM delivery";
                                $result = mysqli_query($conn, $query);

                                if ($row = mysqli_fetch_assoc($result))
                                {
                                    echo "<hr><p>Price: <span style='margin-left:35px'>₱ $row[price_Default]</span></p><a href='settings.php?changeprice=1' class='changebutton' name='changepass'>Change</a>";
                                }

                                if (isset($_GET['changeprice'])){
                                    echo "<form method='POST'>";
                                    echo "<p style='padding-top: 5px;'>Price: </p><input type='number' name='del_Price'></input><br>";
        
                                    if(isset($_POST['price-submit'])){
                                        $del_Price = $_POST['del_Price'];
                                        $sql = "UPDATE delivery SET price_Default = $del_Price;
                                        ALTER TABLE delivery MODIFY COLUMN del_Price INT(5) NOT NULL DEFAULT '$del_Price';
                                        ALTER TABLE delivery MODIFY COLUMN price_Default INT(5) NOT NULL DEFAULT '$del_Price';";

                                        if (mysqli_multi_query($conn,$sql)){
                                            echo "<script>alert('Price Changed Successfully');window.location.href = 'settings.php?';</script>";
                                        }
                                        else{
                                            echo '<script>alert("Failed");</script>';
                                        }
                                    } else if(isset($_POST['cancel']))
                                    {
                                        echo "<script> location.replace('settings.php'); </script>";
                                    }
                                    echo "<br>";
                                    echo "<button id='pass-submit' name='price-submit'>Save Changes</button>";
                                    echo "<button id='cancel' name='cancel' style='margin-left: 5px; color: #fff; '>Cancel</button>";
                                    echo "</form>";
                                }
                            ?><hr>
        
                            <p>Password</p>
                            <a href="settings.php?changepass=1" class="changebutton" name="changepass">Change</a>

                            <?php  
                                if (isset($_GET['changepass'])){
                                    echo "<form method='POST'>";
                                    echo "<p style='padding-top: 5px;'>Current Password: </p><input type='password' name='curPass'></input><br>";
                                    echo "<p>New Password: </p><input type='password' name='newPass1'></input><br>";
                                    echo "<p>Retype Password: </p><input type='password' name='newPass2'></input>";
        
                                    if(isset($_POST['pass-submit'])){
                                        if($_POST['curPass']==$_SESSION['password']){
                                            if($_POST['newPass1']==$_POST['newPass2']){
                                                $password = $_POST['newPass1'];
                                                if($password != ""){
                                                    $username = $_SESSION['username'];
                                                    $role = $_SESSION['role'];
                                                    $sql = "UPDATE accounts SET password='$password' WHERE username='$username'";
        
                                                    if($_POST['curPass']==$password)
                                                    {
                                                        echo "<p id='pass-error'><i class='fas fa-exclamation-circle'></i>Old Password can not be used</p>";
                                                    }
                                                    else if(mysqli_query($conn, $sql)){	
                                                        if(mysqli_query($conn, $sql)){
                                                        echo "<script>alert('Password Changed Successfully, Logging you out');window.location.href = 'index.php?logout=1';</script>";
                                                        }
                                                    }else{
                                                        echo "Error updating record: " . mysqli_error($conn);
                                                    }
                                                }else{
                                                    echo "<p id='pass-error'><i class='fas fa-exclamation-circle'></i> New Password cannot be blank</p>";
                                                }
                                            }else{
                                                echo "<p id='pass-error'><i class='fas fa-exclamation-circle'></i> Password does not match</p>";
                                            }
                                        }else{
                                            echo "<p style= 'margin: 0px;' id='pass-error'><i class='fas fa-exclamation-circle'></i> Wrong Current Password</p>";
                                        }
                                    }
                                    else if(isset($_POST['cancel']))
                                    {
                                        echo "<script> location.replace('settings.php'); </script>";
                                    }
                                    echo "<br>";
                                    echo "<button id='pass-submit' name='pass-submit'>Save Changes</button>";
                                    echo "<button id='cancel' name='cancel' style='margin-left: 5px; color: #fff; '>Cancel</button>";
                                    echo "</form>";
                                }
                            ?>
                            <hr>
        
                            
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($_SESSION["roles"] == 'customer'){ ?>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="logo" style="margin-left:-25px; margin-top: -20px;margin-bottom: -20px;">
                <img src="image/water1.png" style="width:250px;" draggable="false">
            </div>
            
            <ul>
                <li><a href="home.php"><i class="fas fa-home"></i>HOME</a></li>
                <li><a href="cstmr-delivery.php"><i class="fas fa-calendar"></i>DELIVERY</a></li>
                <li><a href="trackorder.php"><i class="fas fa-calendar"></i>TRACK</a></li>
                <li><a href=""><i class="fas fa-user"></i>ACCOUNT</a></li>
                <li id="active"><a href="settings.php" id="active"><i class="fas fa-cog"></i>SETTINGS</a></li>
                <li><a href="index.php"><i class="fas fa-sign-out-alt"></i>LOGOUT</a></li>
            </ul>
        </div>

        <div class="main_content">
            <?php $welcomeName = $_SESSION['username']; ?>
            
            <div class="header"><?php echo $msg,$welcomeName; ?>.<img id='imgheader' src="image/header.png" alt=""></div>  
            
            <div class="announcement">
                <p id="title" style="margin-bottom: 5px;">SETTINGS</p><hr id='firsthr'>

                    <div class="account-content">
                        <div>
                            <p>Name: <span style="margin-left:70px"><?php echo $_SESSION['username'];?></span></p><hr>
                            <p>Username: <span style="margin-left:35px"><?php echo $_SESSION['username'];?></span></p><hr>
        
                            <p>Password</p>
                            <a href="settings.php?changepass=1" class="changebutton" name="changepass">Change</a>

                            <?php  
                                if (isset($_GET['changepass'])){
                                    echo "<form method='POST'>";
                                    echo "<p style='padding-top: 5px;'>Current Password: </p><input type='password' name='curPass'></input><br>";
                                    echo "<p>New Password: </p><input type='password' name='newPass1'></input><br>";
                                    echo "<p>Retype Password: </p><input type='password' name='newPass2'></input>";
        
                                    if(isset($_POST['pass-submit'])){
                                        if($_POST['curPass']==$_SESSION['password']){
                                            if($_POST['newPass1']==$_POST['newPass2']){
                                                $password = $_POST['newPass1'];
                                                if($password != ""){
                                                    $username = $_SESSION['username'];
                                                    $role = $_SESSION['role'];
                                                    $sql = "UPDATE accounts SET password='$password' WHERE username='$username'";
        
                                                    if($_POST['curPass']==$password)
                                                    {
                                                        echo "<p id='pass-error'><i class='fas fa-exclamation-circle'></i>Old Password can not be used</p>";
                                                    }
                                                    else if(mysqli_query($conn, $sql)){	
                                                        if(mysqli_query($conn, $sql)){
                                                        echo "<script>alert('Password Changed Successfully, Logging you out');window.location.href = 'index.php?logout=1';</script>";
                                                        }
                                                    }else{
                                                        echo "Error updating record: " . mysqli_error($conn);
                                                    }
                                                }else{
                                                    echo "<p id='pass-error'><i class='fas fa-exclamation-circle'></i> New Password cannot be blank</p>";
                                                }
                                            }else{
                                                echo "<p id='pass-error'><i class='fas fa-exclamation-circle'></i> Password does not match</p>";
                                            }
                                        }else{
                                            echo "<p style= 'margin: 0px;' id='pass-error'><i class='fas fa-exclamation-circle'></i> Wrong Current Password</p>";
                                        }
                                    }
                                    else if(isset($_POST['cancel']))
                                    {
                                        echo "<script> location.replace('settings.php'); </script>";
                                    }
                                    echo "<br>";
                                    echo "<button id='pass-submit' name='pass-submit'>Save Changes</button>";
                                    echo "<button id='cancel' name='cancel' style='margin-left: 5px; color: #fff; '>Cancel</button>";
                                    echo "</form>";
        
                                    
                                }
                            ?>
                            <hr>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
</body>
</html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
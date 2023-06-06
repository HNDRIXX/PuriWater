
<?php
require 'connection.php';
require 'login.php';
require 'date.php';

if (isset($_POST['submit-button'])){
    $cstmr_id = $_POST['cstmr_id'];
    $del_Quantity = $_POST['del_Quantity'];
    $del_Paid = $_POST['del_Paid'];

    $sql = "SELECT COUNT(*) FROM delivery";
    $count = 0;
    $zero = 0;

    if ($result = mysqli_query($conn, $sql)) {
        $row = mysqli_fetch_row($result);
        $count = $row[0];
    }

    $count = $count + 1;
    $del_id = "dlvr$zero$count";

    $queryed = "SELECT * FROM delivery";
    $resulted = mysqli_query($conn, $queryed);
    
    if (mysqli_num_rows($resulted)>0){
        while($row=mysqli_fetch_assoc($resulted)){
            if ($row['del_id'] >= 'dlvr09'){
                $del_id = "dlvr$count";
            }else{
                $del_id = "dlvr$zero$count";
            }
        }
    }

    $queryeders = "SELECT * FROM customers WHERE cstmr_id = '$cstmr_id'";
    $resulteders = mysqli_query($conn, $queryeders);

    if ($row = mysqli_fetch_array($resulteders)) {
        if ($row['cstmr_OrderCount'] == 5){
            $insert = "INSERT INTO delivery (del_id, cstmr_id, del_Quantity, del_Price, del_Paid) VALUES ('$del_id', '$cstmr_id', '$del_Quantity', 'FREE', '$del_Paid')";
        } else{
            $insert = "INSERT INTO delivery (del_id, cstmr_id, del_Quantity, del_Paid) VALUES ('$del_id', '$cstmr_id','$del_Quantity','$del_Paid')";
        }

        if (mysqli_query($conn, $insert)) {
            $cstmr_id = $_SESSION['customer'];
            $queryedersi = "SELECT * FROM customers WHERE cstmr_id = '$cstmr_id' AND cstmr_OrderCount = 5";
            $resultedersi = mysqli_query($conn, $queryedersi);
        
            if ($row = mysqli_fetch_array($resultedersi)) {
                $queryedersy = "UPDATE customers SET cstmr_OrderCount = 0";
                $resultedersy = mysqli_query($conn, $queryedersy);
            }

            echo '<script>alert("Order Added!");window.location.href = "cstmr-delivery.php#";</script>';
        }
        else{
            echo '<script>alert("Insert Error")</script>';
        }
    }
}
?>
<!-- PAGSAPIT NG 12:00 AM MAG AUUTO DECREASE ANG DAY SA PROMO HANGANG SA MAGEXPIRED -->
<?php
    // $query = "SELECT * FROM session_vw";
    // $result = mysqli_query($conn, $query);
    // $counter = 0;
    // if (mysqli_num_rows($result)>0){
    //     while($row=mysqli_fetch_assoc($result)){
    //         if (date("h:ia") == '02:16am'){
    //             $counter = $row['remainingDays'] - 1;
    //             // echo "<td>$row[totalDay]</td>";
    //             $edit = "UPDATE session_vw SET remainingDays='$counter' WHERE SessionID = '$row[SessionID]'";
    //             mysqli_query($conn, $edit);
    //         } 
    //     }
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="image/water1.png">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="icons/css/all.css">
    <title>DELIVERY</title>
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
        font-weight: bold;
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
        color:#03113a;
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
        overflow: hidden;
    }

    .wrapper .main_content .header{
        width: 100%;
        display:flex;
        position: relative;
        padding: 20px;
        justify-content:space-between;
        align-items:center;

        background-color: #3c6eda;
        color: #fff;
    }

    .wrapper .main_content .header img{
        display: none;
        width: 20px;
        overflow: hidden;
    }

    .wrapper .main_content .announcement{
        width: 100%;
        /* border:3px solid #2e2e2e; */
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
    
    /* .announcement #sideicon {
        position: absolute;
        background-color: #ccc7c7;
        padding: 20px;
        top: 3.7rem;
        left: 13.1rem;
        
    } */

    hr {
        width: 92.5%;
        margin-left: 15px;
        border: none;
        padding: 0.5px;
        background-color: #00013a;
        margin-top: -0.1em;
        margin-bottom: 1.5em;
    }

    #firsthr {
        width: 100%;
        margin: auto;
        border: none;
        padding: 0.5px;
        background-color: #00013a;
        margin-top: 1em;
        margin-bottom: 1em;
    }

    #announce{
        background-color: #e4e4e4;
        color: #000000;
        border-radius: 5px;
        padding: 10px;
        font-size: 14px;
        text-align: center;
    }

    #announce i{
        vertical-align: middle;
        font-size: 25px;
    }

    .button{
        float: right;
        background-color: #6da5fa;
        color: #fffdfd;
        cursor: pointer;
        margin-top: -10px;
        margin-right: -10px;
        border-radius: 0px 0px 0px 120px;
        box-shadow: 2px 10px 10px;
        border: none;
        width: 80px;
        height: 80px;
        padding-left: 20px;
        padding-top: 20px;
        outline: none;
        text-align: center;
        transition: ease-in-out .10s;
    }

    .button i{
        color: #fffdfd;
        font-size: 25px;
        font-weight: bolder;
        overflow-y: hidden;
    }

    .button:hover {
        width: 90px;
        height: 90px;
        transition: ease all .10s;
        border: none;
        outline: none;
        background: #06072A;
    }

    .overlay {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.7);
        transition: opacity 500ms;
        visibility: hidden;
        opacity: 0;
    }

    .overlay:target {
        visibility: visible;
        opacity: 1;
    }

    .popup {
        margin: 70px auto;
        padding: 20px;
        background: #fff;
        border-radius: 5px;
        height: 50vh auto;
        width: 800px;
        position: relative;
        transition: all 0.5s ease-in-out;
    }

    .popup h2, .popupedit h2{
        color: #333;
        font-size: 1.2rem;
    }

    .popup hr, .popupedit hr{
        background-color: #000000;
        padding: 0.7px;
        margin-top: 5px;
        margin-bottom: 10px;
        border: none;
    }

    .popup .close, .popupedit .close{
        position: absolute;
        top: 10px;
        right: 19px;
        transition: all 200ms;
        font-size: 30px;
        font-weight: bold;
        text-decoration: none;
        color: #333;
    }
    
    .popup .content {
        width: 100%;
        height: fit-content;
        margin: 0 auto;
        margin-bottom: 22px;
    }

    .content label{
        font-size: 0.9em;
        margin-bottom: 13px;
        margin-left: 15px;
        width: 31%;
        display: inline-block;
        vertical-align: top;
    }

    .content select{
        outline: none;
        padding: 7px;
        width: 60%;
        margin-left: 36px;
    }

    .content input{
      outline: none;
      padding: 7px;
      width: 60%;
      margin-left: 40px;
    }

    .submit-button, .received-button{
        background-color: #277234;
        color: #fff;
        outline: none;
        border: none;
        width: 30%;
        display: block;
        border-radius: 5px;
        padding: 10px;
        margin: 0 auto;
    }

    .received-button{
        width: 180px !important;
    }

    .submit-button:hover, .received-button:hover{
        background-color: #41b654;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    table{
        border-collapse: collapse;
        height: auto;
        width: 100%;
    }
    th {
        background-color: #C2DCFF;
        color:#2e2d2d;
        font-size: 15px;
        font-weight: 500;
        padding: 10px;
    }
    th, td {
                
        text-align:center;
        border:1px solid #dfdfdf;
    }

    td{
        padding: 4px;
        white-space: nowrap;
    }

    tr{
        background-color: #fff;
        font-size: 14px;
    }

    table tr:nth-child(odd) td{
        background-color: #E1EDFD;
    }

    .fa-info-circle{
        font-size: 19px;
        width: -10px
    }

    .hover {
        position: relative;
        display: inline-block;
    }

    .hover .hoverdisplay {
        visibility: hidden;
        padding: 15px;
        background-color: #06044C;
        color: #fff;
        text-align: justify;
        line-height: 23px;
        border-radius: 0.25em;
        white-space: nowrap;
        font-size: 15px;
        width: 30vw;
        
        /* Position the tooltip */
        position: absolute;
        z-index: 1;
        top: 80%;
        right: 50%;
        transition-property: visibility;
        transition-delay: 0s;
    }

    .hover:hover .hoverdisplay {
        visibility: visible;
        transition-delay: 0.3s;
    }

    .hoverdisplay label{
        margin-right: 5px;
    }
    
    .insideannouncement{
        width: 100%;
        /* border:3px solid #2e2e2e; */
        height: 76vh auto;
        padding: 10px;
        overflow-y: scroll;

    }

    .hoverdisplay hr{
        margin: 10px 0px 10px 0px;
    }

    #paidstatus{
        color: #fff;
        padding: 7px;
        border-radius: 5px;
        font-size: 17px;
        width: 100%;
        text-align: center;
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

        .button{
            padding-top: 14px;
            padding-left: 15px;
            width: 50px;
            height: 50px;
            
        }

        .button i{
            color: #fffdfd;
            font-size: 15px;
            font-weight: bolder;
            overflow-y: hidden;
        }

        .button:hover {
            width: 50px;
            height: 50px;
        }

        #popupdelivery{
            font-size: 15px;
        }

        .content input{
            outline: none;
            padding: 5px;
            width: 56%;
            margin-left: 20px;
        }

        .content label{
            margin-left: 5px;
            vertical-align: middle;
        }

        .content select{
            outline: none;
            padding: 5px;
            width: 56%;
            margin-left: 16px;
        }

        
    }
</style>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="logo" style="margin-left:-25px; margin-top: -20px;margin-bottom: -20px;">
                <img src="image/water1.png" style="width:250px;" draggable="false">
            </div>
            
            <ul>
                <li><a href="home.php"><i class="fas fa-home"></i>HOME</a></li>
                <li id="active"><a href="cstmr-delivery.php"  id="active"><i class="fas fa-calendar"></i>DELIVERY</a></li>
                <li><a href="trackorder.php"><i class="fas fa-calendar"></i>TRACK</a></li>
                <li><a href=""><i class="fas fa-user"></i>ACCOUNT</a></li>
                <li><a href="settings.php"><i class="fas fa-cog"></i>SETTINGS</a></li>
                <li><a href="index.php"><i class="fas fa-sign-out-alt"></i>LOGOUT</a></li>
            </ul>
        </div>

        <div class="main_content">
            <?php $welcomeName = $_SESSION['username']; ?>
            
            <div class="header"><?php echo $msg,$welcomeName; ?>.<img src="image/header.png" alt=""></div>  
            
            <div class="announcement">
                <?php
                     $cstmr_id = $_SESSION['customer'];
                     $query = "SELECT COUNT(*) FROM delivery WHERE cstmr_id = '$cstmr_id' AND del_Level = 1";
                    
                     if ($result = mysqli_query($conn, $query)) {
                        $row = mysqli_fetch_row($result);
                        $count = $row[0];

                            if ($count >= 2)
                                echo "<a class='button' href='#popuperror'><i class='fa fa-plus'></i></a>";
                            else
                                echo "<a class='button' href='#popupdelivery'><i class='fa fa-plus'></i></a>";
                        
                    }
                    
                ?>
                <!-- <a class="button" href="#popupdelivery"><i class="fa fa-plus"></i></a> -->
                <div style="display:flex; justify-content:space-between;align-items:center;">
                    <p id="title" style="margin-bottom: 20px;">DELIVERY</p>
                </div><hr>

                <div id="popupdelivery" class="overlay">
                    <div class="popup">
                        <h2>Add Order</h2><hr id='firsthr'>
                        
                        <a class="close" href="#">×</a>

                        <form method="POST">
                        <div class="content">
                            <?php
                                $cstmr_id = $_SESSION['customer'];
                                $query = "SELECT * FROM customers WHERE cstmr_id = '$cstmr_id'";
                                $result = mysqli_query($conn, $query);

                                while($row = mysqli_fetch_assoc($result))
                                {
                                    echo "<label>Customer ID:</label><input type='text'placeholder='' name='cstmr_id' value='$row[cstmr_id]' readonly><br>";
                                }?>
                            
                            <?php
                                $query = "SELECT * FROM delivery";
                                $result = mysqli_query($conn, $query);

                                if ($row = mysqli_fetch_assoc($result))
                                {
                                    echo "<label style='margin:10px; font-size:13px; width: 100%; color:#686868;'><i>*NOTE: ₱: $row[price_Default] per Container.</i></label><br>";
                                }?>

                            <label>Quantity: </label><input type="number" maxlength="5" placeholder="Quantity" name="del_Quantity"><br>

                            <label>Payment: </label> 
                                <select name="del_Paid"> 
                                    <option value="COD">COD (Cash on Delivery)</option>
                                    <!-- <option value="Yes">Yes</option>
                                    <option value="No">Not Yet</option> -->
                                </select></br>

                            <button style="margin-top: 10px;" type="submit" name="submit-button" value="SUBMIT" class="submit-button">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="insideannouncement">  
                    <?php
                    $cstmr_id = $_SESSION['customer'];
                    $query = "SELECT * FROM delivery_vw WHERE CstmrID = '$cstmr_id'";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        echo "<table>";
                            echo "<tr>";
                                    // echo "<th>Customer Name</th>";
                                echo "<th>ID</th>";
                                echo "<th>Quantity</th>";
                                echo "<th>Price</th>";
                                echo "<th>Status</th>";
                                echo "<th>Date</th>";
                                echo "</tr>";
                        
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                                // echo "<td>$row[CstmrFullName]</td>";
                                echo "<td>$row[DeliveryID]</td>";
                                echo "<td>$row[DelQuantity]</td>";

                                if ($row['DelPrice'] == 0)
                                    echo "<td>FREE</td>";
                                else
                                    echo "<td>₱ $row[DelPrice]</td>";
                                

                                echo "<td>$row[DelStatus]</td>";
                                echo "<td>$row[DelDate]</td>";
          
                                // if ($row['DelPaid'] != 'No'){
                                //     echo "<td><div id='paidstatus'style='background-color: #25AE24;'>
                                //     $row[DelPaid]</div></td>";
                                // }
                                
                                // if ($row['DelPaid'] != 'Yes'){
                                //     echo "<td><div id='paidstatus' style='background-color: #EA2629; color: #fff;'>$row[DelPaid]</div></td>";
                                // }
                                

                                // echo "<td style='width:15%;'><button type='submit' name='received' class='received-button'>Order Received</button></td>"; 
                                echo "</tr>";
                        }
                        echo "</table>";
                    } 
                    else 
                        echo "<p id='announce'>No Session/s listed</i> </p>";?>
                </div>
            </div>
        </div>
    </div>

    <div id="popuperror" class="overlay">
        <div class="popup">
            <h2>Oops!</h2><hr id='firsthr'>
            
            <a class="close" href="#">×</a>

            <form method="POST">
            <div class="content">
               <p style='text-align:center;'><i style='color:#FD9187; font-size:50px; margin-bottom: 25px;' class='fa fa-exclamation-circle'></i><br>
               You Reached the Limit Order.<br>Minimum Order is Two</p>
            </div>
        </div>
    </div>
</body>
</html>
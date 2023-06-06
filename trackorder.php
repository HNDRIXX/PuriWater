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

    $insert = "INSERT INTO delivery (del_id, cstmr_id, del_Quantity, del_Paid)
	VALUES ('$del_id', '$cstmr_id','$del_Quantity','$del_Paid')";
    if (mysqli_query($conn, $insert)) {
        echo '<script>alert("Order Added!");window.location.href = "cstmr-delivery.php#";</script>';
}
else{
    echo '<script>alert("Insert Error")</script>';
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="image/water1.png">
    <link rel="stylesheet" href="css/trackorder.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="icons/css/all.css">
    <title>TRACK ORDER</title>
</head>
<script src="https://kit.fontawesome.com/4c890c6a79.js" crossorigin="anonymous"></script>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="logo" style="margin-left:-25px; margin-top: -20px;margin-bottom: -20px;">
                <img src="image/water1.png" style="width:250px;" draggable="false">
            </div>
            
            <ul>
                <li><a href="home.php"><i class="fas fa-home"></i>HOME</a></li>
                <li><a href="cstmr-delivery.php"><i class="fas fa-calendar"></i>DELIVERY</a></li>
                <li id="active"><a href="trackorder.php" id="active"><i class="fas fa-calendar"></i>TRACK</a></li>
                <li><a href=""><i class="fas fa-user"></i>ACCOUNT</a></li>
                <li><a href="settings.php"><i class="fas fa-cog"></i>SETTINGS</a></li>
                <li><a href="index.php"><i class="fas fa-sign-out-alt"></i>LOGOUT</a></li>
            </ul>
        </div>

        <div class="main_content">
            <?php $welcomeName = $_SESSION['username']; ?>
            
            <div class="header"><?php echo $msg,$welcomeName; ?>.<img src="image/header.png" alt=""></div>  
            
            <div class="announcement">
                <div style="display:flex; justify-content:space-between;align-items:center;">
                    <p id="title" style="margin-bottom: 20px;">TRACK ORDER</p>
                </div><hr>

                <div class="insideannouncement">
                    <?php
                    $cstmr_id = $_SESSION['customer'];
                    $query = "SELECT * FROM delivery_vw WHERE CstmrID = '$cstmr_id' AND DelLevel = 1";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<div id='perplan'>
                            <p id='planid'><i class='fa-solid fa-bookmark'></i>$row[DeliveryID]</p>
                            <div id='pergif'>
                                <img src='image/delivery.gif' style='width:190px;'>
                            </div>
                            <div id='percontent'>
                                <p id='planname'>Status: $row[DelStatus]</p>
                                <p id='plandesc'><i class='fa fa-home' style='font-size: 12px; margin-right:5px;padding:10px 0px 10px 0px;'></i>$row[CstmrAdd], Brgy: $row[CstmrBrgy]</p>";
                                // <p id='planprice'><label>Price: ₱</label>$row[pln_Price]</p>
                                echo " <p id='planday'>Payment: $row[DelPaid]</p>";
                                echo " <p id='planday'>Quantity: $row[DelQuantity]</p>
                                <button type='submit' id='planedit' name='received' class='received-button'>Order Received</button>
                            </div>
                            </div>";

                            // echo "<tr>";
                            //     echo "<td>$row[CstmrFullName]</td>";
                            //     echo "<td>$row[DelQuantity]</td>";
                            //     echo "<td>$row[DelStatus]</td>";
          
                            //     if ($row['DelPaid'] != 'No'){
                            //         echo "<td><div id='paidstatus'style='background-color: #25AE24;'>
                            //         $row[DelPaid]</div></td>";
                            //     }
                                
                            //     if ($row['DelPaid'] != 'Yes'){
                            //         echo "<td><div id='paidstatus' style='background-color: #EA2629; color: #fff;'>$row[DelPaid]</div></td>";
                            //     }
                                

                            //     echo "<td style='width:15%;'><button type='submit' name='received' class='received-button'>Order Received</button></td>"; 
                            //     echo "</tr>";
                        }
                        // echo "</table>";
                    } 
                    else 
                        echo "<p id='announce'>No Session/s listed</i> </p>";?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
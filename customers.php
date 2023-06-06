<?php
require_once 'connection.php';
require 'date.php';
require 'login.php';

// if (isset($_SESSION['admin'])){
//     echo "<script> location.replace('admin-member.php'); </script>";
// 	exit();
// }

// if (isset($_SESSION['member'])){
//     echo "<script> location.replace('index.php'); </script>";
// 	exit();
// }

// if (isset($_SESSION['trainer'])){
//     echo "<script> location.replace('index.php'); </script>";
// 	exit();
// }

if (isset($_POST['submit-button'])){
    $acc_id = $_POST['acc_id'];
    $cstmr_id = $_POST['cstmr_id'];
    $cstmr_FirstName = $_POST['cstmr_FirstName'];
    $cstmr_MiddleName = $_POST['cstmr_MiddleName'];
    $cstmr_LastName = $_POST['cstmr_LastName'];
    $cstmr_ContactNum = $_POST['cstmr_ContactNum'];
    $cstmr_Address = $_POST['cstmr_Address'];
    $cstmr_Brgy = $_POST['cstmr_Brgy'];
    $cstmr_Email = $_POST['cstmr_Email'];

    $insert = "INSERT INTO customers (acc_id, cstmr_id, cstmr_FirstName, cstmr_MiddleName,cstmr_LastName, cstmr_ContactNum, cstmr_Address, cstmr_Brgy, cstmr_Email) 
	VALUES ('$acc_id','$cstmr_id','$cstmr_FirstName','$cstmr_MiddleName','$cstmr_LastName','$cstmr_ContactNum','$cstmr_Address','$cstmr_Brgy','$cstmr_Email')";
    if (mysqli_query($conn, $insert)) {
        echo '<script>alert("New Customer Added!");window.location.href = "customers.php#";</script>';
    }
    else{
        echo '<script>alert("Error")</script>';
    }
}
?>
<?php
if(isset($_POST['update'])) // when click on Update button
{ 
    $cstmr_id = $_POST['cstmr_id'];
    $cstmr_Address = $_POST['cstmr_Address'];
    $cstmr_Email = $_POST['cstmr_Email'];
    $cstmr_ContactNum = $_POST['cstmr_ContactNum'];
    $edit = "UPDATE customers SET cstmr_id='$cstmr_id', cstmr_Address='$cstmr_Address', cstmr_Email='$cstmr_Email', cstmr_ContactNum ='$cstmr_ContactNum' WHERE cstmr_id = '$cstmr_id'";

    if (mysqli_query($conn,$edit)){
        echo '<script>alert("Successfully edit a record");window.location.href = "customers.php?editrecord=1";</script>';
    }
    else{
        echo '<script>alert("Edit record failed");window.location.href = "admin-member.php?edit=fail";</script>';
    }
}   
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="icons/css/all.css">
    <link rel="icon" href="image/water1.png">
    <title>CUSTOMERS</title>
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
        font-weight: bold;
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

    hr {
        width: 92.5%;
        margin-left: 15px;
        border: none;
        padding: 0.5px;
        background-color: #00013a;
        margin-top: -0.1em;
        margin-bottom: 1.5em;
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
        width: 500px;
        position: relative;
        transition: all 0.5s ease-in-out;
    }

    .popup h2,.popupedit h2{
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
    
    .popup .content{
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
        padding: 4px;
        width: 50%;
        margin-left: 36px;
    }

    .content input{
      outline: none;
      padding: 4px;
      width: 50%;
      margin-left: 40px;
    }

    .submit-button{
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

    .submit-button:hover{
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
        height: 72vh;
        padding: 10px;
        overflow-y: scroll;
    }

    .popupedit{
        margin: 70px auto;
        padding: 20px;
        background: #fff;
        border-radius: 5px;
        height: 50vh auto;
        text-align: justify;
        width: 800px;
        position: relative;
        transition: all 0.5s ease-in-out;
    }

    .popupedit .content input{
      outline: none;
      padding: 4px;
      width: 58%;
      margin-left: 40px;
    }

    #update{
        background-color: #277234;
        color: #fff;
        outline: none;
        border: none;
        width: 200px;
        padding: 10px;
        border-radius: 5px;
        display: block;
        margin: auto;
    }

    #update:hover{
        background-color: #41b654;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
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
            <div class="logo" style="margin-left:-25px; margin-top: -20px;margin-bottom: -20px;">
                <img src="image/water1.png" style="width:250px;" draggable="false">
            </div>
            
            <ul>
                <li><a href="home.php"><i class="fas fa-home"></i>HOME</a></li>
                <li><a href="users.php"><i class="fas fa-users"></i>USERS</a></li>
                <li id="active"><a href="customers.php"  id="active"><i class="fas fa-users"></i>CUSTOMERS</a></li>
                <li><a href="delivery.php"><i class="fas fa-calendar"></i>DELIVERY</a></li>
                <li><a href="announcement.php"><i class="fas fa-bullhorn"></i>ANNOUNCEMENT</a></li>
                <li><a href="settings.php"><i class="fas fa-cog"></i>SETTINGS</a></li>
                <li><a href="index.php?logout=1"><i class="fas fa-sign-out-alt"></i>LOGOUT</a></li>
            </ul>
        </div>

        <div class="main_content">
            <?php $welcomeName = $_SESSION['username']; ?>
            
            <div class="header"><?php echo $msg,$welcomeName; ?>.</div>  
            
            <div class="announcement">
            <a class="button" href="#popupmember"><i class="fa fa-plus"></i></a>
                <div style="display:flex; justify-content:space-between;align-items:center;">
                    <p id="title" style="margin-bottom: 20px;">CUSTOMERS</p>
                    
                </div><hr>

                <div id="popupmember" class="overlay">
                    <div class="popup">
                        <h2>Add Customer</h2><hr>
                        
                        <a class="close" href="#">×</a>

                    <form method="POST">
                        <div class="content">
                            <label>Acc. ID: </label>
                                <select name="acc_id">
                                    <option value=""> --- </option>
                                    <?php
                                        $sql = "SELECT * FROM accounts WHERE roles='customer'";
                                        $result = mysqli_query($conn, $sql);

                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            echo "<option>".$row['acc_id']."</option>";
                                        }
                                    ?>
  			                    </select><br>

                            <label>Customer ID: </label><input type="text" placeholder="NOTE: Same with Acc. ID" name="cstmr_id"><br>
                            

                            <label>First Name: </label><input type="text" placeholder="FirstName" name="cstmr_FirstName"><br>

                            <label>Middle Name: </label><input type="text" placeholder="MiddleName" name="cstmr_MiddleName"><br>

                            <label>Last Name: </label><input type="text" placeholder="LastName" name="cstmr_LastName"><br>
                            
                            <label>Contact#: </label><input type="text" maxlength="11" placeholder="Contact Number" name="cstmr_ContactNum"><br>

                            <label>Address: </label><input type="text" placeholder="Address" class="text" name="cstmr_Address"><br>

                            <label>Baranggay: </label><input type="number" maxlength="5" placeholder="Baranggay" name="cstmr_Brgy"><br>

                            <label>Email: </label><input type="text" placeholder="Email" name="cstmr_Email"><br>

                            <!-- <label>Joined Date: </label><input type="date" placeholder="Joined" name="mem_JoinedDate"><br> -->
                        </div>
                        
                        <input style="margin-top: 10px;" type="submit" name="submit-button" value="SUBMIT" class="submit-button">
                    </div>
                    </form>
                </div>

                <div class="insideannouncement">
                    <?php
                        $query = "SELECT * FROM customers_vw";
                        $result = mysqli_query($conn, $query);
                            
                            if (mysqli_num_rows($result) > 0) {
                                echo "<table>";
                                echo "<tr>";
                                        echo "<th>Customer Name</th>";
                                        echo "<th>Contact Number</th>";
                                        echo "<th>Details</th>";
                                        echo "<th>Action/s</th>";
                                        echo "</tr>";

                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                            echo "<td> $row[CstmrFullName]</td>";
                                            echo "<td>$row[CstmrContactNum]</td>";	

                                            echo "<td><div class='hover'><i class='fa fa-info-circle'></i>
                                            <span class='hoverdisplay'>
                                            <label>Address:</label> $row[CstmrAddress]<br>
                                            <label>Brgy:</label> $row[CstmrBrgy]<br>
                                            <label>Email:</label> $row[CstmrEmail]<br>
                                            <label>Joined Date:</label> $row[JoinedDate]<br>
                                            </div></td>";
                                            
                                            echo "<td><a href='#popupshow&cstmr_id=$row[CstmrID]'><i class='fa fa-pencil-alt'style='font-size:19px; color:#2e2d2d'></i></a>

                                            <div id='popupshow&cstmr_id=$row[CstmrID]' class='overlay'>
                                            <div class='popupedit'>
                                            <h2>Update Customer Data</h2><hr>
                        
                                            <a class='close' href='#'>×</a>
                                            <form method='POST'>
                                                <div class='content'>
                                                    <input type='hidden' name='cstmr_id' value='$row[CstmrID]' placeholder='ID' ><br>

                                                    <label>Address Number</label>
                                                    <input type='text' name='cstmr_Address' value='$row[CstmrAddress]' placeholder='Address' Required><br>
                                    
                                                    <label>Email</label>
                                                    <input type='text' name='cstmr_Email' value='$row[CstmrEmail]' placeholder='Email' Required><br>
                                    
                                                    <label>Contact Number</label>
                                                    <input type='text' maxlength='11' name='cstmr_ContactNum' value='$row[CstmrContactNum]' placeholder='Contact Number' Required><br>

                                                    <button type='submit' id='update' name='update' style='margin-top:20px;' value='Update'>Update</button>
                                            </form>
                                        </div>
                                            </div>
                                            </td>";
                                    echo "</tr>";
                                            
                                            // '#popupeditmember'
                                }
                                echo "</table>";
                            } 
                            else {
                                echo "<p id='announce'>No member/s listed</i> </p>";
                            }?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
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

<!DOCTYPE html>
<html lang="en">
<head>
    
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="icons/css/all.css">
    <link rel="icon" href="image/water1.png">
    <link rel="stylesheet" href="css/home.css">
    <title>HOME</title>
</head>
<script src="https://kit.fontawesome.com/4c890c6a79.js" crossorigin="anonymous"></script>
<body>
<?php  if ($_SESSION["roles"] == "admin"){?>
    <div class="wrapper">
        <div class="sidebar">
            <div class="logo" style="margin-left:-25px; margin-top: -20px;margin-bottom: -20px;">
                <img src="image/water1.png" style="width:250px;" draggable="false">
            </div>
            
            <ul>
                <li id="active"><a href="home.php" id="active"><i class="fas fa-home"></i>HOME</a></li>
                <li><a href="users.php"><i class="fas fa-users"></i>USERS</a></li>
                <li><a href="customers.php"><i class="fas fa-users"></i>CUSTOMERS</a></li>
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
                <div style="display:flex; justify-content:space-between;align-items:center;">
                    <p id="title" style="margin-bottom: 20px;">HOME</p>
                    <span id='sidetitle'>HOME &nbsp;<i class="fa-solid fa-angle-right" style="font-size: 10px;"></i>&nbsp; DASHBOARD &nbsp;<i class="fa-solid fa-angle-right" style="font-size: 10px;"></i>&nbsp; ANNOUNCEMENT</span>
                </div><hr>  
                <div class="dashboard">
                    <div id="kahon">
                        <a class="button" href="#popupchart"><i class="fa fa-chart-pie" title="Show Chart"></i></a>

                        <div id="popupchart" class="overlay">
                            <div class="popup">
                                <h2>Overall Percentage</h2><hr>
                                
                                <a class="close" href="#" style="color: black;" >×</a>
                                
                                <div id="brgychart"></div>  
                            </div>
                        </div>

                        <i class="fas fa-user"></i><?php 
                        $sql = "SELECT COUNT(*) FROM customers";
                        $count = 0;

                        if ($result = mysqli_query($conn, $sql)) {
                            $row = mysqli_fetch_row($result);
                            $count = $row[0];
                        }
                        echo "<p><strong style='font-size: 22px;'>$count</strong> <br>Total Customer/s</p>";
                    ?>
                    </div>

                    <div id="kahon">
                        <i class="fas fa-calendar"></i><?php 
                        $sql = "SELECT COUNT(*) FROM delivery";
                        $count = 0;

                        if ($result = mysqli_query($conn, $sql)) {
                            $row = mysqli_fetch_row($result);
                            $count = $row[0];
                        }
                        echo "<p><strong style='font-size: 22px;'>$count</strong> <br>Total Deliveries</p>";;
                    ?>
                    </div>
                
                    <div id="kahon">
                        <i class="fas fa-calendar"></i><?php 
                        $sql = "SELECT COUNT(*) FROM delivery WHERE del_Level = 1";
                        $count = 0;

                        if ($result = mysqli_query($conn, $sql)) {
                            $row = mysqli_fetch_row($result);
                            $count = $row[0];
                        }
                        echo "<p><strong style='font-size: 22px;'>$count</strong> <br>Total Ongoing Deliveries</p>";
                    ?>
                    </div>

                    <div id="kahon">
                        <a class="button" href="#popupincome"><i class="fa fa-chart-pie" title="Show Chart"></i></a>

                        <div id="popupincome" class="overlay">
                            <div class="popup">
                                <h2>Overall Percentage</h2><hr>
                                
                                <a class="close" href="#" style="color: black;" >×</a>

                                <div id="trylang"></div>
                            </div>
                        </div>
                        
                        <i class="fa fa-coins"></i>
                        <?php
                            
                            $query = "SELECT * FROM delivery_vw WHERE DelLevel = 2";
                            $result = mysqli_query($conn, $query);
                            $sum = 0;
                            if (mysqli_num_rows($result)>0){
                                
                                while($row=mysqli_fetch_assoc($result)){
                                        $amount = $row['DelPrice'];
                                        $sum += $amount;
                                }
                            }
                            echo "<p><strong style='font-size: 20px;'>
                            ₱&nbsp;$sum</strong><br>Total Earning/s</p>";
                            
                        ?>
                    </div>
                </div>       
            </div>

            <div class="insideannouncement"> 
                <p id='announce' style="background-color: #62b654; color: #fff;"><i class="fa fa-hand-sparkles"></i>&nbsp;&nbsp;Our shop follows the COVID-19 Protocol for safety and sanitation, and the equipment is always clean and disinfected.</p>

                <p id='announce'><i class="fa fa-id-card"></i>&nbsp;&nbsp;&nbsp;No vaccination card, No entry</p>

                <?php
                    $query = "SELECT * FROM announcement";
                    $result = mysqli_query($conn, $query);
                            
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)){
                            if ($row['status'] == 1){
                                while ($row = mysqli_fetch_array($res_data)){
                                        
                                    echo "<div id='newannounce'><i class='fa fa-bullhorn'></i>&nbsp;&nbsp;$row[ann_Announce]
                                    <br><span id='expiredate'>Announcement expire on:&nbsp;&nbsp;$row[ann_Expire]</span></div>";
                                        
                                }
                            }
                        }?>
             <?php  } else
                        echo "<p id='announce'>No announcement/s listed.</p>";?>
            </div> 
        </div>
    </div>
</body>
<?php } 
if ($_SESSION["roles"] == 'customer'){ ?>
<div class="wrapper">
        <div class="sidebar">
            <div class="logo" style="margin-left:-25px; margin-top: -20px;margin-bottom: -20px;">
                <img src="image/water1.png" style="width:250px;" draggable="false">
            </div>
            
            <ul>
                <li id="active"><a href="home.php" id="active"><i class="fas fa-home"></i>HOME</a></li>
                <li><a href="cstmr-delivery.php"><i class="fas fa-calendar"></i>DELIVERY</a></li>
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
                <div style="display:flex; justify-content:space-between;align-items:center;">
                    <p id="title" style="margin-bottom: 20px;">HOME</p>
                    <span id='sidetitle'>HOME &nbsp;<i class="fa-solid fa-angle-right" style="font-size: 10px;"></i>&nbsp; DASHBOARD &nbsp;<i class="fa-solid fa-angle-right" style="font-size: 10px;"></i>&nbsp; ANNOUNCEMENT</span>
                </div><hr>  
            </div>
            
            <div class="insideannouncement">
                    <table id="ordercount">
                        <tr>
                            <th colspan="5">
                                <div class="order-header">
                                    <img src="image/free.svg" alt="">
                                    <span><b>FREE ORDER!</b><br>
                                        <p>When you complete the 5 checks, your next order is FREE!</p>
                                    </span>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <?php  
                                $cstmr_id = $_SESSION['customer'];
                                $queryed = "SELECT * FROM customers WHERE cstmr_id = '$cstmr_id'";
                                $resulted = mysqli_query($conn, $queryed);

                                if ($row = mysqli_fetch_array($resulted)) {
                                    if ($row['cstmr_OrderCount'] == 1)
                                    echo "<td><i class='fa fa-check-circle'></td><td></td><td></td><td></td><td></td>";
                                    elseif ($row['cstmr_OrderCount'] == 2)
                                    echo "<td><i class='fa fa-check-circle'></td><td><i class='fa fa-check-circle'></td><td></td><td></td><td></td>";
                                    elseif ($row['cstmr_OrderCount'] == 3)
                                    echo "<td><i class='fa fa-check-circle'></td><td><i class='fa fa-check-circle'</td><td><i class='fa fa-check-circle'></td><td></td><td></td>";
                                    elseif ($row['cstmr_OrderCount'] == 4)
                                    echo "<td><i class='fa fa-check-circle'></td><td><i class='fa fa-check-circle'></td><td><i class='fa fa-check-circle'></td><td><i class='fa fa-check-circle'></td><td></td>";
                                    elseif ($row['cstmr_OrderCount'] == 5)
                                    echo "<td><i class='fa fa-check-circle'></td><td><i class='fa fa-check-circle'></td><td><i class='fa fa-check-circle'></td><td><i class='fa fa-check-circle'></td><td><i class='fa fa-check-circle'></td><tr><th colspan='5' id='free'>Your Next Order is FREE!</th></tr>";
                                    else 
                                    echo "<td colspan='5'>Order to Gain Check Stamp!</td>";
                                }
                            ?>
                        </tr>
                    </table>
                <p id='announce' style="background-color: #62b654; color: #fff;"><i class="fa fa-hand-sparkles"></i>&nbsp;&nbsp;Our shop follows the COVID-19 Protocol for safety and sanitation, and the equipment is always clean and disinfected.</p>

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
                        // }
                ?>	
            </div>
        </div>
    </div>
<?php } ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([  
            ['Baranggay', 'Number' , { role: 'style' }],  
            <?php
            $sql = "SELECT CstmrBrgy, count(*) as number FROM customers_vw GROUP BY CstmrBrgy";
            $fire = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($fire))  
            {  
            echo "['".$row['CstmrBrgy']."',".$row['number'].",'color: #7C7C7B'],"; 
            }  
            ?>  
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
        { calc: "stringify",
            sourceColumn: 1,
            type: "string",
            role: "annotation" },
        2]);

        var options = {
            title: "Baranggay",
            bar: {groupWidth: "50%"},
            legend: { position: "none" },
        };
        var chart = new google.visualization.BarChart(document.getElementById("brgychart"));
        chart.draw(view, options);
    }
</script>

<script>
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Age', 'Total', { role: 'style' }],
            <?php
            $sql = "SELECT Age, count(*) as total FROM member_vw GROUP BY Age";
            $fire = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_assoc($fire)) {
                // if ($row['Gender'] == 'Male'){
                //     echo "['".$row['Gender']."',".$row['total'].",'color: gray'],";
                // } else if ($row['Gender'] == 'Female'){
                //     echo "['".$row['Gender']."',".$row['total'].",'color: orange'],";
                // }  
                echo "['".$row['Age']."',".$row['total'].",'color: #7C7C7B'],"; 
            }?>
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
                        { calc: "stringify",
                            sourceColumn: 1,
                            type: "string",
                            role: "annotation" },
                        2]);

        var options = {
            title: "Member's Age",
            bar: {groupWidth: "50%"},
            legend: { position: "none" },
        };
        var chart = new google.visualization.BarChart(document.getElementById("agechart"));
        chart.draw(view, options);
    }
</script>

<script>
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Age', 'Total', { role: 'style' }],
            <?php
            $sql = "SELECT Age, count(*) as total FROM member_vw GROUP BY Age";
            $fire = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_assoc($fire)) {
                echo "['".$row['Age']."',".$row['total'].",'color: #7C7C7B'],"; 
            }?>
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
                        { calc: "stringify",
                            sourceColumn: 1,
                            type: "string",
                            role: "annotation" },
                        2]);

        var options = {
            title: "Member's Age",
            bar: {groupWidth: "50%"},
            legend: { position: "none" },
        };
        var chart = new google.visualization.BarChart(document.getElementById("agechart"));
        chart.draw(view, options);
    }
</script>

<script>
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Total ₱', { role: 'style' }],
            <?php
            $query = "SELECT * FROM session_vw";
                            $result = mysqli_query($conn, $query);
                            $sum = 0;
                            if (mysqli_num_rows($result)>0){
                                
                                while($row=mysqli_fetch_assoc($result)){
                                    if ($row['Paid'] != 'No'){
                                        $try = $row['plnID'];
                                        $queryed = "SELECT * FROM plan_vw";
                                        $resulted = mysqli_query($conn, $queryed);
                                        
                                        if (mysqli_num_rows($resulted)>0){
                                            while($row=mysqli_fetch_assoc($resulted)){
                                                if ($try ==  $row['PlanID']){
                                                    $amount = $row['Price'];
                                                    $sum += $amount;
                                                }
                                            }
                                        }
                                    } 
                                }
                            }
                            echo "['".date("Y")."',".$sum.",'color: #7C7C7B'],"; 
            
            ?>
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
                        { calc: "stringify",
                            sourceColumn: 1,
                            type: "string",
                            role: "annotation" },
                        2]);

        var options = {
            title: "Total Income",
            bar: {groupWidth: "50%"},
            legend: { position: "none" },
        };
        var chart = new google.visualization.BarChart(document.getElementById("trylang"));
        chart.draw(view, options);
    }
</script>
</html>
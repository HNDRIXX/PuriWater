<?php
$msg;
date_default_timezone_set('Asia/Manila');
$Hour = date('G');
$Date = date("Y-m-d");
// echo "Today is ". date("l").", ".date("Y/m/d")."<br>";
if ( $Hour >= 5 && $Hour <= 11 ) {
    $msg = "Good Morning, ";
} else if ( $Hour >= 12 && $Hour <= 18 ) {
    $msg = "Good Afternoon, ";
} else if ( $Hour >= 19 || $Hour <= 4 ) {
    $msg = "Good Evening, ";
}
?>
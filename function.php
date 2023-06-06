<?php
require 'connection.php';
// $display = array("display", ":", "", ";");

if(isset($_GET['ann_id'])){
    $ann_id = $_GET['ann_id'];

    $sql = "UPDATE announcement SET status = 2 WHERE ann_id = '$ann_id'";

    if (mysqli_query($conn,$sql)){
        echo '<script>alert("Successfully Supress Record");</script>';
    }
    else{
        echo '<script>alert("Edit record failed");</script>';
    }
}
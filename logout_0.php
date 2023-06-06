<?php
require 'connection.php';
if (isset($_GET['logout'])){
    session_destroy();

    echo "<script> location.replace('index.php'); </script>";
    exit();
}
?>
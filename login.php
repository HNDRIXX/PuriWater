<?php
session_start();
require 'connection.php';
$errors = array();
$username = "";
if (isset($_POST['btn-login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
	if (empty($username)) {
        $errors['username'] = "<p id='errorUsername'><i class='fas fa-exclamation-circle'></i> Username Required</p>";
    }//end if
    if (empty($password)) {
        $errors['password'] = "<p id='errorPassword'><i class='fas fa-exclamation-circle'></i> Password Required</p>";
    }//end if
	if(count($errors) === 0) {
		$query = "SELECT * FROM accounts WHERE username ='$username' AND password = '$password'";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) == 1){
			while ($row = mysqli_fetch_assoc($result)){
				if ($row["roles"] == "admin"){
					$_SESSION['admin'] = $row["acc_id"];
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $row['password'];
					$_SESSION["roles"] = $row["roles"];
					echo "<script> location.replace('home.php'); </script>";
					exit();
				}elseif ($row["roles"] == "customer"){
					$_SESSION['customer'] = $row["acc_id"];
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $row['password'];
					$_SESSION["roles"] = $row["roles"];

					$customer = $_SESSION['customer'];
					$query = "SELECT * FROM customers_vw WHERE CstmrID = '$customer';";
					$result = mysqli_query($conn, $query);
					$row = mysqli_fetch_assoc($result);
					$_SESSION['full_name'] = $row["CstmrFullName"];
					$_SESSION['ContactNum'] = $row["CstmrContactNum"];
					echo "<script> location.replace('home.php'); </script>";
					exit();
				}
			}
		}else {
			$errors['login_fail'] = "<p id='errorCredentials'>
			<i class='fas fa-exclamation-circle'></i> Wrong Credentials</p>";}
	}
}

?>
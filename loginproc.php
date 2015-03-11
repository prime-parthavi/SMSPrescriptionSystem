<?php

// Inialize session
session_start();

// Include database connection settings
include('include/config.inc');
//protect from mysql injection

$myusername= mysql_real_escape_string($_POST['username']);
$mypassword= mysql_real_escape_string(md5($_POST['password']));
//create a select query
$sql = "SELECT * FROM admin WHERE username = '$myusername' && password = '$mypassword'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // start session
    $_SESSION['username'] = $_POST['username'];
    header('Location:dashboard.php?msg="Welcome to your Admin Dashboard"');
} else {
    header('Location:index.php?msg="Wrong username or password"');
}


?>


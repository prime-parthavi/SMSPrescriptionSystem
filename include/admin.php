<?php

// Inialize session
session_start();
if(isset($_SESSION['username'])){
  header("Location:upload.form.php");
}else{


// Check, if username session is NOT set then this page will jump to login page
?>
 
 <?php
 if(isset($_POST['login'])){
// Inialize session
  session_start();

// Include database connection settings
  include('config.inc');

  $myusername= mysql_real_escape_string($_POST['username']);
  $mypassword=mysql_real_escape_string(md5($_POST['password'])) ;

//To protect MySQL injection (more detail about MySQL injection)
// Retrieve username and password from database according to user's input
  $login = mysql_query("SELECT * FROM user WHERE `username` = '$myusername' && `password` = '$mypassword'");

// Check username and password match
  $checked=mysql_fetch_array($login);
  if ($checked>0) {
// Set username session variable
    $_SESSION['username'] = $_POST['username'];
// Jump to secured page
    header('Location:upload.form.php');
  }
  else {
// Jump to login page

    header('Location: admin.php?$var="wrong username or password"'); 

  }
}else{

  ?>

  <!Doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">


    <title>Seno Properties </title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="bootstrap.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="signin.css">
 <script src="jquery.js"></script>
 <script src="bootstrap.js"></script>
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
    </head>

    <body>
      <?php 
      if(isset($_GET['$var'])){
     // echo   $var = $_GET['$var'];
        echo '
        <div class="alert alert-dismissable alert-danger" style="width:50%; text-align:center; margin-left:30%; margin-right:30%;">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Error!</strong> <a href="#" class="alert-link">wrong username or password</a>.
        </div>';
      }
      ?>
      <div class="container">

        <form class="form-signin" action="admin.php" method="post">
          <h2 class="form-signin-heading">Admin Pannel</h2>
          <span>Seno Properties </span>
          <input type="text" autofocus="" required="" placeholder="Username"  name="username"  class="form-control"><br >
          <input type="password" required="" placeholder="Password" name="password" class="form-control">
          <label class="checkbox">
            <input type="checkbox" value="remember-me"> Remember me
          </label>
          <button type="submit"  name="login"class="btn btn-lg btn-primary btn-block">Sign in</button>
        </form>
      </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<!-- 
<div style="display:none;" id="link64_vdp_tabid">1332</div></body></html>
<footer>
<?php include("footer.php");  

?>
</footer>
-->
<?php
}}
?>
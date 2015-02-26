<?php

session_start();
error_reporting(-1)
?>
<!Doctype html>

<html>
<head>
  <title>SMS Prescription System</title>

  <link rel="stylesheet" type="text/css" href="include/cerulean.css" media="screen">

  <!--Includes CSS into the header -->
  <!--Styling and javascript for the slider -->
  <link href="include/2/js-image-slider.css" rel="stylesheet" type="text/css" />
  <script src="include/2/js-image-slider.js" type="text/javascript"></script>
  <!--Adding the base javascript and jquery-->
  <script src="include/jquery.js"></script>
  <script src="include/bootstrap.js"></script>
  
  <script src="include/lightbox.js" type="text/javascript"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--   <link rel="stylesheet" href="include/bootstrap.css" > -->
  <style type="text/css">
    html{
      font-family:Arial;
      
    }
    body{
      margin-top:auto; 
      margin-left:10%;
      margin-right:10%;  
      background: url(include/img/drug.jpg) no-repeat center center fixed; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
     
    }
  </style>
  
</head>
<body>

  <div class="navbar navbar-default" style="font-size:1.1em; font-weight:bold; heigh:30px;">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img id="logo"src="include/img/logo.png" style="height:50px; width:100%; margin-top:-20%; padding:7%;"></a>
    </div>
    <div class="navbar-collapse collapse navbar-inverse-collapse">
      <ul class="nav navbar-nav">
        <li><a href="index.php"  >Home</a></li>
        <li><a href="aboutus.php"  >About us</a></li>

        
        <li><a href= "contactus.php"  >Contact Us</a></li>
        

      </ul>
    </li>
  </ul>

  <ul class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" action="rent.php" method="post">
      <input class="form-control col-lg-8" placeholder="Search by Location" type="text" name="location">
    </form>
    <?php

// Inialize session

    if(!isset($_SESSION['username'])){

     echo '<li class="dropdown"  data-toggle="tab">
     <a class="dropdown-toggle" href="#" data-toggle="dropdown">Admin Login <strong class="caret"></strong></a>
     <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px; background-image:url(include/background.gif);">
      <form method="post" action="loginproc.php"  id="formLogin" accept-charset="UTF-8">
        <input type="text" autofocus="" required="" placeholder="Username"  name="username" style="margin-bottom: 15px; width:250px;" class="form-control"><br >
        <input type="password" required="" placeholder="Password" name="password" style="margin-bottom: 15px; width:250px;" class="form-control">
        <input style="float: left; margin-right: 10px;" type="checkbox" name="remember-me" id="remember-me" value="1">
        <label class="string optional" for="user_remember_me" > Remember me</label>
        <input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Sign In" style="margin-bottom: 15px; width:250px;">    

      </form>
    </div>
  </li>';
}else{
 echo "<li><a href='dashboard.php'>Dashboard </a></li>";
 echo "<li><a href='include/logout.php'>Log out</li>";
}
// Check, if username session is NOT set then this page will jump to login page
?>
</ul>
</div>
</div>
<div class="main" >

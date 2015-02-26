<?php

// Inialize session
session_start();
if(!isset($_SESSION['username'])){
  header("Location:admin.php?var='login please!!'");
}else{
 include("header.php");
  $username =  $_SESSION['username'];

// Check, if username session is NOT set then this page will jump to login page
  ?>
  <div class="container">
    <div class="row clearfix">
      <div class="col-md-12 column">
        <div class="row clearfix">
          <div class="col-md-8 column">
          </div>
          <div class="col-md-4 column">
            <div class="list-group">
             <a href="#" class="list-group-item active">Home</a>
             <div class="list-group-item">
              List header
            </div>
            <div class="list-group-item">
              <h4 class="list-group-item-heading">
                List group item heading
              </h4>
              <p class="list-group-item-text">
                ...
              </p>
            </div>
            <div class="list-group-item">
              <span class="badge">14</span>Help
            </div> <a class="list-group-item active"><span class="badge">14</span>Help</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
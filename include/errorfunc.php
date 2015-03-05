<?php
  function incaseMysqlerror(){
    
   //echo "Wrong Code Entered \n Please check the code and Try again";
   //$msg = "Wrong Code Entered \n Please check the code and Try again";
        $file = "/var/www/html/debug/mysqlerror.txt";
        $date = date('m/d/Y h:i:s a', time());
        $error = mysql_error()." ". $date." \n";
        file_put_contents($file, $error, FILE_APPEND | LOCK_EX);

    
  }
  

?>

<?php

include "include/errorfunc.php";
$sender = $_GET['sender'];  //gets the senders number form smsc
$msg =    $_GET['text'];

if(strlen($sender) > 5 && $msg != " "){
	$a = explode(" ", $msg);    
	$keyword = $a[0];
	$drug = $a[1];
	$age = $a[2];
	$age_range= "";


	if(($keyword || $msg || $drug || $age) != "" ){
		if ($a[0] == "presc") {
			include 'include/config.inc';
			if($age <= 1){
				$age_range = "0-1";
				$age_q= mysqli_query($conn,  "SELECT * FROM `Age_ranges` WHERE `age_groups`= '$age_range '");
			 //if either the age 
				if($conn->error){
			//call mysql system function to display error;
					incaseMysqlerror();
					echo  $age ." is not a correct age value";
					exit();
				}

				$age_range_id = mysqli_fetch_row($age_q);

				$drug_q = mysqli_query($conn, "SELECT * FROM `drugs` WHERE `Name` = '$drug' || `medical` = '$drug'");
			//check if mysql returns any value
				if(mysqli_num_rows($drug_q) < 1){
			//if mysql returns an error or no value
					incaseMysqlerror();
					echo  $drug." was not found in the system, pleasecheck the drug name";
					exit();
				}

				$drug_id = mysqli_fetch_row($drug_q);
				$d_id = $drug_id[0];
				$age_g = $age_range_id[0];
				$sql = mysqli_query($conn, "SELECT `prescription`, `period` FROM `prescription`WHERE `drug_id` ='$d_id' AND `age_range` ='$age_g'")or die($conn->error);
				if($conn->error){
			//call mysql system function to display error;

					incaseMysqlerror();
					echo  "OOOPs something went wrong with your request, please try again later";
					exit();
				}
				while($presc = mysqli_fetch_row($sql)){			
					echo $drug_id[1]. " prescription for a ".$age." year old ".$presc[0];
					$t = intval($presc[1])*60*60; 			
					$checktime = time();
					$ntime = $t + $checktime;			
					$msg = "Its time to take your medication";
					$save = "INSERT INTO notification(id, dnumber,message,ntime,checktime) 
					values('','$sender','$msg','$ntime','$checktime')";
					$conn->query($save);
				}

			}//End 1 and below
			elseif ( 2 <= $age && $age <= 5) {
       	# code...

				$age_range = "2-5";
				$age_q= mysqli_query($conn,  "SELECT * FROM `Age_ranges` WHERE `age_groups`= '$age_range '");
			 //if either the age 
				if($conn->error){
			//call mysql system function to display error;
					incaseMysqlerror();
					echo  $age ." is not a correct age value";
					exit();
				}

				$age_range_id = mysqli_fetch_row($age_q);

				$drug_q = mysqli_query($conn, "SELECT * FROM `drugs` WHERE `Name` = '$drug' || `medical` = '$drug'");
			//check if mysql returns any value
				if(mysqli_num_rows($drug_q) < 1){
			//if mysql returns an error or no value
					incaseMysqlerror();
					echo  $drug." was not found in the system, pleasecheck the drug name";
					exit();
				}

				$drug_id = mysqli_fetch_row($drug_q);
				$d_id = $drug_id[0];
				$age_g = $age_range_id[0];
				$sql = mysqli_query($conn, "SELECT `prescription`, `period`, `period` FROM `prescription`WHERE `drug_id` ='$d_id' AND `age_range` ='$age_g'")or die($conn->error);
				if($conn->error){
			//call mysql system function to display error;

					incaseMysqlerror();
					echo  "OOOPs something went wrong with your request, please try again later";
					exit();
				}
				while($presc = mysqli_fetch_row($sql)){			
					echo $drug_id[1]. " prescription for a ".$age." year old ".$presc[0];
					$t = intval($presc[1])*60*60; 			
					$checktime = time();
					$ntime = $t + $checktime;			
					$msg = "Its time to take your medication";
					$save = "INSERT INTO notification(id, dnumber,message,ntime,checktime) 
					values('','$sender','$msg','$ntime','$checktime')";
					$conn->query($save);
				}
			}//end 10below
			elseif (6 <= $age && $age <=10) {
       	# code...
				$age_range = "6-10";
				$age_q= mysqli_query($conn,  "SELECT * FROM `Age_ranges` WHERE `age_groups`= '$age_range '");
			 //if either the age 
				if($conn->error){
			//call mysql system function to display error;
					incaseMysqlerror();
					echo  $age ." is not a correct age value";
					exit();
				}

				$age_range_id = mysqli_fetch_row($age_q);

				$drug_q = mysqli_query($conn, "SELECT * FROM `drugs` WHERE `Name` = '$drug' || `medical` = '$drug'");
			//check if mysql returns any value
				if(mysqli_num_rows($drug_q) < 1){
			//if mysql returns an error or no value
					incaseMysqlerror();
					echo  $drug." was not found in the system, pleasecheck the drug name";
					exit();
				}

				$drug_id = mysqli_fetch_row($drug_q);
				$d_id = $drug_id[0];
				$age_g = $age_range_id[0];
				$sql = mysqli_query($conn, "SELECT `prescription`, `period` FROM `prescription`WHERE `drug_id` ='$d_id' AND `age_range` ='$age_g'")or die($conn->error);
				if($conn->error){
			//call mysql system function to display error;

					incaseMysqlerror();
					echo  "OOOPs something went wrong with your request, please try again later";
					exit();
				}
				while($presc = mysqli_fetch_row($sql)){			
					echo $drug_id[1]. " prescription for a ".$age." year old ".$presc[0];
					$t = intval($presc[1])*60*60; 			
					$checktime = time();
					$ntime = $t + $checktime;			
					$msg = "Its time to take your medication";
					$save = "INSERT INTO notification(id, dnumber,message,ntime,checktime) 
					values('','$sender','$msg','$ntime','$checktime')";
					$conn->query($save);
				}
			}//14 below
			elseif (11 <= $age && $age<= 15) {
       	# code...
				$age_range = "11-15";
				$age_q= mysqli_query($conn,  "SELECT * FROM `Age_ranges` WHERE `age_groups`= '$age_range '");
			 //if either the age 
				if($conn->error){
			//call mysql system function to display error;
					incaseMysqlerror();
					echo  $age ." is not a correct age value";
					exit();
				}

				$age_range_id = mysqli_fetch_row($age_q);

				$drug_q = mysqli_query($conn, "SELECT * FROM `drugs` WHERE `Name` = '$drug' || `medical` = '$drug'");
			//check if mysql returns any value
				if(mysqli_num_rows($drug_q) < 1){
			//if mysql returns an error or no value
					incaseMysqlerror();
					echo  $drug." was not found in the system, pleasecheck the drug name";
					exit();
				}

				$drug_id = mysqli_fetch_row($drug_q);
				$d_id = $drug_id[0];
				$age_g = $age_range_id[0];
				$sql = mysqli_query($conn, "SELECT `prescription` , `period`FROM `prescription`WHERE `drug_id` ='$d_id' AND `age_range` ='$age_g'")or die($conn->error);
				if($conn->error){
			//call mysql system function to display error;

					incaseMysqlerror();
					echo  "OOOPs something went wrong with your request, please try again later";
					exit();
				}
				while($presc = mysqli_fetch_row($sql)){			
					echo $drug_id[1]. " prescription for a ".$age." year old ".$presc[0];
					$t = intval($presc[1])*60*60; 			
					$checktime = time();
					$ntime = $t + $checktime;			
					$msg = "Its time to take your medication";
					$save = "INSERT INTO notification(id, dnumber,message,ntime,checktime) 
					values('','$sender','$msg','$ntime','$checktime')";
					$conn->query($save);
				}

			}//end 15 below
			elseif ($age >= 16) {
       	# code...
				$age_range = "over 16";
				$age_q= mysqli_query($conn,  "SELECT * FROM `Age_ranges` WHERE `age_groups`= '$age_range '");
			 //if either the age 
				if($conn->error){
			//call mysql system function to display error;
					incaseMysqlerror();
					echo  $age ." is not a correct age value";
					exit();
				}

				$age_range_id = mysqli_fetch_row($age_q);

				$drug_q = mysqli_query($conn, "SELECT * FROM `drugs` WHERE `Name` = '$drug' || `medical` = '$drug'");
			//check if mysql returns any value
				if(mysqli_num_rows($drug_q) < 1){
			//if mysql returns an error or no value
					incaseMysqlerror();
					echo  $drug." was not found in the system, pleasecheck the drug name";
					exit();
				}

				$drug_id = mysqli_fetch_row($drug_q);
				$d_id = $drug_id[0];
				$age_g = $age_range_id[0];
				$sql = mysqli_query($conn, "SELECT `prescription` , `period`FROM `prescription`WHERE `drug_id` ='$d_id' AND `age_range` ='$age_g'")or die($conn->error);
				if($conn->error){
			//call mysql system function to display error;

					incaseMysqlerror();
					echo  "OOOPs something went wrong with your request, please try again later";
					exit();
				}
				while($presc = mysqli_fetch_row($sql)){			
					echo $drug_id[1]. " prescription for a ".$age." year old ".$presc[0];
					$t = intval($presc[1])*60*60; 			
					$checktime = time();
					$ntime = $t + $checktime;			
					$msg = "Its time to take your medication";
					$save = "INSERT INTO notification(id, dnumber,message,ntime,checktime) 
					values('','$sender','$msg','$ntime','$checktime')";
					$conn->query($save);
				}

			} //End if 16 > over
			
		}else{
			echo "Age cannot be empty";
			exit();
		}

	}else{
	//if any required field is empty
		echo "Request missing required fields. format is 'presc[space]drugname[space]age'";

	}
}else{

	$file = "/var/www/html/CMS/block.txt";
	$date = date('m/d/Y h:i:s a', time());
	$num = $sender."\n";
	file_put_contents($file, $num, FILE_APPEND | LOCK_EX);
	echo "Phone Number not allowed";
	exit();



}

?>
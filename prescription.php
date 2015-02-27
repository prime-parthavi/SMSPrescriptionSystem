<?php
global $compcode;

$sender = "7988787879"; //$_GET['sender'];  //gets the senders number form smsc
$msg =     "prsc panadol 1";  //$_GET['text'];
$a = explode(" ", $msg);
$keyword = $a[0];
$drug = $a[1];
$age = $a[2];
$age_range= "";

if(strlen($sender) > 5){
	if ($a[0] == "presc") {
		include 'include/config.inc';
		if($age <= 1){
			$age_range = "0-1";
			$age_q= mysqli_query($conn,  "SELECT * FROM `Age_ranges` WHERE `age_groups`= '$age_range '")or die($conn->error);
			$age_range_id = mysqli_fetch_row($age_q);
			$drug = mysqli_query($conn, "SELECT * FROM `drugs` WHERE `Name` = '$drug' || `medical` = '$drug'");
			$drug_id = mysqli_fetch_row($drug);
			$d_id = $drug_id[0];
			$age_g = $age_range_id[0];
			$sql = mysqli_query($conn, "SELECT `prescription` FROM `prescription`WHERE `drug_id` ='$d_id' AND `age_range` ='$age_g'")or die($conn->error);
			$presc = mysqli_fetch_row($sql);
			echo $drug_id[1]. " prescription for a ".$age." year old ".$presc[0];

		}elseif ( 2 <= $age && $age <= 5) {
       	# code...
			
			$age_range = "2-5";
			$age_q= mysqli_query($conn,  "SELECT * FROM `Age_ranges` WHERE `age_groups`= '$age_range '")or die($conn->error);
			$age_range_id = mysqli_fetch_row($age_q);
			$drug = mysqli_query($conn, "SELECT * FROM `drugs` WHERE `Name` = '$drug' || `medical` = '$drug'");
			$drug_id = mysqli_fetch_row($drug);
			$d_id = $drug_id[0];
			$age_g = $age_range_id[0];
			$sql = mysqli_query($conn, "SELECT `prescription` FROM `prescription`WHERE `drug_id` ='$d_id' AND `age_range` ='$age_g'")or die($conn->error);
			$presc = mysqli_fetch_row($sql);
			echo $drug_id[1]. " prescription for a ".$age." year old ".$presc[0];
		}elseif (6 <= $age && $age <=10) {
       	# code...
			$age_range = "6-10";
			$age_q= mysqli_query($conn,  "SELECT * FROM `Age_ranges` WHERE `age_groups`= '$age_range '")or die($conn->error);
			$age_range_id = mysqli_fetch_row($age_q);
			$drug = mysqli_query($conn, "SELECT * FROM `drugs` WHERE `Name` = '$drug' || `medical` = '$drug'");
			$drug_id = mysqli_fetch_row($drug);
			$d_id = $drug_id[0];
			$age_g = $age_range_id[0];
			$sql = mysqli_query($conn, "SELECT `prescription` FROM `prescription`WHERE `drug_id` ='$d_id' AND `age_range` ='$age_g'")or die($conn->error);
			$presc = mysqli_fetch_row($sql);
			echo $drug_id[1]. " prescription for a ".$age." year old ".$presc[0];

		}elseif (11 <= $age && $age<= 15) {
       	# code...
			$age_range = "11-15";
			$age_q= mysqli_query($conn,  "SELECT * FROM `Age_ranges` WHERE `age_groups`= '$age_range '")or die($conn->error);
			$age_range_id = mysqli_fetch_row($age_q);
			$drug = mysqli_query($conn, "SELECT * FROM `drugs` WHERE `Name` = '$drug' || `medical` = '$drug'");
			$drug_id = mysqli_fetch_row($drug);
			$d_id = $drug_id[0];
			$age_g = $age_range_id[0];
			$sql = mysqli_query($conn, "SELECT `prescription` FROM `prescription`WHERE `drug_id` ='$d_id' AND `age_range` ='$age_g'")or die($conn->error);
			$presc = mysqli_fetch_row($sql);
			echo $drug_id[1]. " prescription for a ".$age." year old ".$presc[0];

		}elseif ($age <= 16) {
       	# code...
			$age_range = "over 16";
			$age_q= mysqli_query($conn,  "SELECT * FROM `Age_ranges` WHERE `age_groups`= '$age_range '")or die($conn->error);
			$age_range_id = mysqli_fetch_row($age_q);
			$drug = mysqli_query($conn, "SELECT * FROM `drugs` WHERE `Name` = '$drug' || `medical` = '$drug'");
			$drug_id = mysqli_fetch_row($drug);
			$d_id = $drug_id[0];
			$age_g = $age_range_id[0];
			$sql = mysqli_query($conn, "SELECT `prescription` FROM `prescription`WHERE `drug_id` ='$d_id' AND `age_range` ='$age_g'")or die($conn->error);
			$presc = mysqli_fetch_row($sql);
			echo $drug_id[1]. " prescription for a ".$age." year old ".$presc[0];

		}
	}else{
		echo "Wrong keyword please check and try again";
	}
}else{

	$file = "/var/www/CMS/block.txt";
	$date = date('m/d/Y h:i:s a', time());
	$num = $sender."\n";
	file_put_contents($file, $num, FILE_APPEND | LOCK_EX);
	exit();



}

?>
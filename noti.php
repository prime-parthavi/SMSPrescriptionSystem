<?php
include 'include/config.inc';
//*****Notification section**************//

//Executed by the crontab every second of every minute of every hour and every day
//* * * * * /usr/local/bin/php /var/www/html/smsprescription/noti.php
			$currentime = time();
			$noti = "SELECT `ntime`, `dnumber`, `message` FROM notification WHERE `ntime`= '$currentime'";
			$action = mysqli_query($conn, $noti);
			if($conn->error){
			//call mysql system function to display error;

				incaseMysqlerror();
				echo  "OOOPs Error sending notification";				
				exit();
			} 
			if(mysqli_num_rows($action) > 0)
				while ($row = mysqli_fetch_row($action)) {
			   		$a = $row[0];
					$to = $row[1];
					$text = $row[2];
					echo "did i run?";
					
					if($currentime = strtotime($a)){
						$url = urlencode("http://localhost:17400/cgi-bin/sendsms?username=presc&password=presc&to=".$to."&text=".$text."");
						file_get_contents($url);
						$period = (intval($a) - intval($currentime))/3600;
						$new_notif_time = intval($currentime) + (intval($period)*60*60);
						$mysqli->query("UPDATE notification SET `ntime` ='$new_notif_time' WHERE ntime = $a");
						$mysqli->commit();
					}
				}
//*****End Notification section***********//
?>
<?php

// Inialize session
session_start();
//check if user is logged in
if(!isset($_SESSION['username'])){
	//if user aint logged in redirect to the index page with
	header("Location:index.php?msg='login please!!'");
}else{

	//if user is logged in load the rest of the page 
	$username =  $_SESSION['username'];
	include("header.php");
	include("include/config.inc");
 //select the drugs in the system
	$sql = "SELECT * FROM drugs";
	$age_sql = "SELECT * FROM Age_ranges";
//declare global variables
	global $row, $result,$age_range,$age_result;
	$result = mysqli_query($conn, $sql);
	$age_result = mysqli_query($conn,$age_sql);




	if(isset($_POST['adddrug'])){
		$name = $_POST["name"];
		$medical = $_POST["medical"];
		 //check if the post includes the name and medical name
		if($name != " " && $medical !=" "){
			$sql = "INSERT INTO drugs (id, name , medical)
			VALUES ('', '$name', '$medical')";

			if ($conn->query($sql) === TRUE) {

				echo '<div class="alert alert-dismissible alert-success">
				<button type="button" class="close" data-dismiss="alert">x</button>
				New record created successfully
			</div>';
			$page = $_SERVER['PHP_SELF'];
			$sec = "1";
			header("Refresh: $sec; url=$page");
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;

			echo '<div class="alert alert-dismissible alert-error">
			<button type="button" class="close" data-dismiss="alert">x</button>
			Error while creating record
		</div>';
	}
	$conn->close();

}else if($name != " " && $medical == " "){
		 //check if the post includes the name and medical name is abscent
		//create an insert query
	$sql = "INSERT INTO drugs (id, name , medical)
	VALUES ('', '$name', ' ')";
		//check if connection exist and excute
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
}

}elseif (isset($_POST["addpresc"])) {
	$drug_id = $_POST["drug_id"];
	$age_range = $_POST['age_range'];
	$prescription = $_POST['presc'];
	$num_of_tabs = $_POST['num_of_tabs'];
	$arr = str_split($prescription);

	$period = 24/$arr[2];
	echo $period;
	if($drug_id != ""){
		$sql = "INSERT INTO prescription (id, drug_id ,age_range,prescription,period,num_of_tabs )
		VALUES ('', $drug_id, $age_range,'$prescription',$period, $num_of_tabs)";

		if ($conn->query($sql) === TRUE) {
			
			echo '<div class="alert alert-dismissible alert-success">
			<button type="button" class="close" data-dismiss="alert">x</button>
			prescription added
		</div>';
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;

		echo '<div class="alert alert-dismissible alert-error">
		<button type="button" class="close" data-dismiss="alert">x</button>
		Error while creating record
	</div>';
}
$conn->close();
}

}	


if(isset($_GET["msg"])){
	$msg  = $_GET["msg"];
	echo '<div class="alert alert-dismissible alert-success">
	<button type="button" class="close" data-dismiss="alert">x</button>
	'.$msg.' </div>';
}

?>

<table class="table">
	<tr>
		<td>
			<div class="well"> 
				<div class="panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Add Drug</h3>
					</div>

					<div class="panel-body">
						<fieldset>
							
							<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="formLogin" accept-charset="UTF-8">
								<div class="form-group">
									<label class="control-label" for="inputDefault">Drug Name</label>
									<input class="form-control" placeholder="Human Readable Name" id="inputDefault" name="name"type="text">
								</div>
								<div class="form-group">
									<label class="control-label" for="inputDefault">Medical Name</label>
									<input class="form-control" id="inputDefault" placeholder="Medical Readable Name" name="medical"type="text">
								</div>
								<div class="form-group" style="float:right;">
									<div class="col-lg-10 col-lg-offset-2" >
										<button type="reset" class="btn btn-default">Cancel</button>
										<button type="submit" class="btn btn-primary" name="adddrug">Submit</button>
									</div>
								</div>
							</form>
						</fieldset>
					</div>
				</div>
			</div>
		</td>
		<td>
			<div class="well">
				<div class="panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Add Drug Prescription</h3>
					</div>
					<div class="panel-body">
						<fieldset></fieldset>
						<form method="post" action="#"  id="formLogin" accept-charset="UTF-8">
							<div class="form-group">
								<label class="control-label" for="inputDefault">Select Drug</label>
								<div class="form-group"  style="margin-bottom: 15px; width:250px;">
									<select class="form-control"  name="drug_id" id="select">
										<?php
										while($row = mysqli_fetch_row($result)){
											echo "<option value = ". $row[0].">".$row[1]."</option >";
										}
										?>

									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label" for="inputDefault">Select Age Group</label>
								<div class="form-group"  style="margin-bottom: 15px; width:250px;">
									<select class="form-control"  name="age_range" id="select">
										<?php
										while($row = mysqli_fetch_row($age_result)){
											echo "<option value = ". $row[0].">".$row[1]."</option >";
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label" for="inputDefault">Number of Tabs</label>
								<input class="form-control" style="margin-bottom: 15px; width:250px;" id="inputDefault" name="num_of_tabs" type="text">
							</div>
							<div class="form-group">
								<label class="control-label" for="inputDefault">prescription</label>
								<input class="form-control" style="margin-bottom: 15px; width:250px;" id="inputDefault" name="presc"type="text">
							</div>

							<div class="form-group" style="float:center;">
								<div class="col-lg-10 col-lg-offset-2" >
									<button type="reset" class="btn btn-default">Cancel</button>
									<button type="submit" class="btn btn-primary" name="addpresc">Submit</button>
								</div>
							</div>
						</form>
					</fieldset>
				</div>
			</div>
		</div>
	</td>

</tr>
<tr>
	<td>
		<div class="panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Panel info</h3>
			</div>
			<div class="panel-body">
				Panel content
			</div>
		</div>
	</td>
	<td>
		<div class="panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Panel info</h3>
			</div>
			<div class="panel-body">
				Panel content
			</div>
		</div>
	</td>
</tr>

</table>
<?php include("include/footer.php"); } ?>
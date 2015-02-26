<?php include("header.php");
if(isset($_GET["msg"])){
	$msg = $_GET["msg"];
	echo '<div class="alert alert-dismissible alert-danger">
	<button type="button" class="close" data-dismiss="alert">x</button>
	'.$msg.'
</div>';}
?>
<?php include("include/footer.php"); ?>
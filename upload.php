<?php
	include 'includes/dbh.inc.php';
	if(isset($_FILES['upload'])){
		move_uploaded_file($_FILES['upload']['tmp_name'],"files/".$_FILES['upload']['name']);
		$pa="files/";
		$filename=$_FILES['upload']['name'];
		$myfile=fopen($pa.$_FILES['upload']['name'], 'r');
		fclose($myfile);
		$sql="INSERT into files values('$filename')";
		mysqli_query($conn,$sql);
		header("location: index.php?upload=success");
}
?>
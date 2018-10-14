<?php 
	include 'includes/dbh.inc.php';
	$sql="SELECT * from files";
	$result = mysqli_query($conn,$sql);
	$num=mysqli_num_rows($result);
	if(isset($_POST['append'])){
		$attachment=$_POST['appendstring'];
		$pos = $_POST['pos'];
		$filename=$_POST['files'];
		$path='files/'.$filename;
		$handle=fopen($path, 'r');
		$string = file_get_contents($path);
		$newstr = substr_replace($string, $attachment, $pos, 0);
		//echo $newstr;
		fclose($handle);
		$handle=fopen($path,'w+');
		fwrite($handle, $newstr);
		fclose($handle);
		header("location: append.php?AppendSuccess");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<style type="text/css">
		.ans{
			font-size: 25px;
			color: red;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#uploads").click(function(){
					$("#content").text("");
					var ip="<form method='POST' enctype='multipart/form-data' action='upload.php'><input type='file' name='upload'><button name='up' class='btn btn-success' id='upsuccess' >Upload</button></form>";
					$("#content").append(ip);
					$("#delactive").removeClass("active");
					$("#seactive").removeClass("active");
					$("#edactive").removeClass("active");
					$("#upactive").addClass("active");
			});
			$("#del").click(function(){
					window.location.href='delete.php';
					$("#upactive").removeClass("active");
					$("#seactive").removeClass("active");
					$("#edactive").removeClass("active");
			});
			$("#search").click(function(){
					window.location.href='search.php';
					$("#upactive").removeClass("active");
					$("#delactive").removeClass("active");
					$("#edactive").removeClass("active");
			});
			$("#edit").click(function(){
					window.location.href='append.php';
			});
		});
	</script>
</head>
<body>
	<div class="container">	
		<h1>File Management System</h1>
		<div class="card text-center">
		  	<div class="card-header">
			    <ul class="nav nav-tabs card-header-tabs">
			      <li class="nav-item">
			        <a class="nav-link" id="upactive"><button type="button" class="btn btn-outline-success" id="uploads">Upload</button></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" id="delactive"><button type="button" class="btn btn-outline-danger" id="del">Delete</button></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" id="edactive"><button type="button" class="btn btn-outline-primary" id="edit">Edit</button></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" id="seactive"><button type="button" class="btn btn-outline-info" id="search">Search</button></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link active" id="appctive"><button type="button" class="btn btn-outline-primary" id="append">Append</button></a>
			      </li>
			    </ul>
	  		</div>
			<div class="card-body">
				<div id="content">
					<form method='POST' enctype='multipart/form-data'>
					<h3>Select the file to Append Text</h3>	
					<?php
						while($num--){
							$r = mysqli_fetch_array($result);
							echo '<div class="form-check">
							  <input class="" type="radio" name="files"  value="'.$r["f_name"].'" checked>'
							    .$r["f_name"].'

							</div>';
						}
					?>
					<div class="text-center">	
						<input class="form-control-sm col-4" type="text" placeholder="Text to Append" name="appendstring">
						<input class="form-control-sm col-4" type="number" placeholder="Position to Append" name="pos">
						<button name='append' class='btn btn-success' id='appsuccess'>Append</button>
					</div>
					<div class="ans">
					</div>
					</form>
				</div>
			</div>
		</div>
		</div>
</body>
</html>

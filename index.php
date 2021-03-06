<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
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
			});
			$("#search").click(function(){
					window.location.href='search.php';
			});
			$("#append").click(function(){
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
			        <a class="nav-link" id="appctive"><button type="button" class="btn btn-outline-primary" id="append">Append</button></a>
			      </li>
			    </ul>
	  		</div>
			<div class="card-body">
				<div id="content">
					<form method='POST' enctype='multipart/form-data' action='index.php'><input type='file' name='upload'><button name='up' class='btn btn-success' id='upsuccess' >Upload</button></form>
				</div>
			</div>
		</div>
		</div>
	</form>
</body>
</html>
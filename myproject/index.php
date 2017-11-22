<?php 
include 'dbConnect.php';



?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title>Book</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<style>
	img{
		max-width:200px; 
	}
	.btn-default {
		height: 34px ;
	}


</style>
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">SmartBook</a>
		</div>
		<ul class="nav navbar-nav">
			<li class="active"><a href="#">Home</a></li>
			<li><a href="#">Page 1</a></li>
			<li><a href="#">Page 2</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		</ul>
		<form class="navbar-form navbar-right">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search">
				<div class="input-group-btn">
					<button class="btn btn-default" type="submit">
						<i class="glyphicon glyphicon-search"></i>
					</button>
				</div>
			</div>
		</form>

	</div>
</nav>
<div class="container">
	<div class="row">
		<div class="book_block">
			<div class="book_block col-md-12">
				<div class="col-md-6 col-lg-4 col-sm-6 col-xs-6 cover_block">
					<?php $db=mysqli_query($connect,"SELECT * FROM cover_image");
					while($tab=mysqli_fetch_assoc($db)){
						$result[]=$tab;
					}
					for($i=0;$i<count($result);$i++){
						foreach($result[$i] as $key=>$value){
							$str=$result[$i]['cover_url'];
							$img="";
							$img="<img class='cover-image' src='$str'><br><br>";
						}
						echo $img;
					}
					?>
				</div>
				<div class="col-md-6 book_info">
					<?php
					$queryInfo="SELECT * FROM book_table";
					$info=mysqli_query($connect,$queryInfo);
					while($infoTab=mysqli_fetch_assoc($info)){
						$infoBook=$infoTab;
						for($i=0;$i<count($infoBook);$i++){
							foreach($infoBook[$i] as $key=>$value){
								$info="";
								$str=$infoBook['book_name'];
								$info=$str;

							}
								

							
						}
						echo count($infoBook);
					}

					?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="upload">
	<form action="upload.php" method ="post" enctype="multipart/form-data">
		<input type="file" name="file">
		<button type="submit" class="btn btn-success">Upload</button>
	</form>
</div> 

</body>
</html>


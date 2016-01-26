<?php
session_start();
if(!isset($_SESSION['user']))
{
	header('Location:login_page.php');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Flat Finder</title>
        <link rel="icon" 
      type="image/png" 
      href="../../Images/1.png">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--including files from CDN for the formatting to work-->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script 
			src="http://maps.googleapis.com/maps/api/js">
		</script>
        <script src="my_flats.js"></script>
		<style>
		#googlemaps{
			position:absolute;
			right:20px;
			top:20px;
		}
		</style>
		
</head>
<body style="background-image:url(../../Images/2.jpg);">
		<div class="container">
		<div id="googlemaps" style="height:650px; width:750px" >
		</div>
		<div class="container">
        	<h2 style="color:white;">Welcome, <?php 
				echo $_SESSION['user'];
			?>		<a href="logout.php">logout</a></h2>
			
		</div>
	</div>
</body>
</html>
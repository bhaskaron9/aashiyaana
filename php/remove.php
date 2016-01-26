<?php
session_start();
if(!isset($_SESSION['user']))
{
	header('Location:login_page.php?stat=5');
}
$mylat=$_GET["lat"];
$mylng=$_GET["lng"];
$con=mysqli_connect("localhost","root","","flat_finder");
$query=sprintf("DELETE FROM temp WHERE lat=%s AND lng=%s",mysqli_real_escape_string($con,$mylat),
  mysqli_real_escape_string($con,$mylng));
$result=mysqli_query($con,$query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
else
{
	header('Location:my_flats.php');
}
?>
<?php
session_start();
if(!isset($_SESSION['user']))
{
	header('Location:login_page.php?stat=5');
}
$mylat=$_GET["lat"];
$mylng=$_GET["lng"];
$con=mysqli_connect("localhost","root","","flat_finder");
$query=sprintf("DELETE FROM mapin WHERE lat=%s AND lng=%s",mysqli_real_escape_string($con,$mylat),
  mysqli_real_escape_string($con,$mylng));
$result=mysqli_query($con,$query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
else
{
	header('Location:my_flats.php');
}
/*$mysqli=new MySQLi("localhost","root","","flat_finder");
	if($mysqli->connect_errno){
		echo "Failed to connect to MySQL:(" . $mysqli->connect_errno . ") ".$mysqli->connect_error;
	}
if(!($stmt=$mysqli->prepare("DELETE FROM mapin WHERE Lat=? AND Lng=?"))){
		echo "Prepare failed : (" . $mysqli->errno . ")".$mysqli->error;
	}
if(!($stmt->bind_param('bb',$mylat,$mylng))){
	echo "Binding failed :(".$stmt->errno.")".$stmt->error;
}
if(!($stmt->execute())){
	echo "Execution failed :(".$stmt->errno.")".$stmt->error;
}
$result=$stmt->store_result();
if (!$result) {
		echo $result;
  die('Invalid query: ' . $stmt->error);
}
else
{
	header('Location:my_flats.php');
}*/
?>
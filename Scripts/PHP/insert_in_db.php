
<?php
//To insert the marked and linked places in the database and store them
$addr=$_GET['addr'];
$lat=$_GET['lat'];
$lng=$_GET['lng'];
session_start();
$user=$_SESSION['user'];
$con=mysqli_connect("localhost","root","","flat_finder");
//mysql_select_db("maps");
$query=sprintf("INSERT INTO mapin " . //query to insert in the database
		 " (FlatCode, Username, Addr, Lat, Lng) " .
         " VALUES (NULL, '%s', '%s', '%s', '%s');",
		 mysqli_real_escape_string($con,$user),
         mysqli_real_escape_string($con,$addr),
         mysqli_real_escape_string($con,$lat),
         mysqli_real_escape_string($con,$lng));
$result = mysqli_query($con,$query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}
?>

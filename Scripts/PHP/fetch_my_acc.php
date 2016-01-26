<?php
session_start();
if(isset($_SESSION['user']))
$user=$_SESSION['user'];
//it returns an xml file which contains all markers stored in the database
$doc=new DOMDocument("1.0");//creating XML DOM
$my_node=$doc->createElement("property");//parent node of XML
$pnode=$doc->appendChild($my_node);
$con=mysqli_connect("localhost","root","","flat_finder");
$query=sprintf("SELECT Lat, Lng FROM mapin WHERE Username='".$user."'");//query to select all the markers from db
$result=mysqli_query($con,$query);
if (!$result) {
  die("Invalid query: " . mysqli_error());
}

header("Content-type:text/xml");//creating nodes with db info in XML file
while ($row = mysqli_fetch_assoc($result)){
$my_node=$doc->createElement("flat");
$newnode=$pnode->appendChild($my_node);
$newnode->setAttribute("lat",$row['Lat']);
$newnode->setAttribute("lng",$row['Lng']);
}
echo $doc->saveXML();//saving XML Document
?>

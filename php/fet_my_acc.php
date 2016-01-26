<?php
session_start();
if(isset($_SESSION['user']))
$user=$_SESSION['user'];
//it returns an xml file which contains all markers stored in the database
$doc=new DOMDocument("1.0");//creating XML DOM
$my_node=$doc->createElement("markers");//parent node of XML
$pnode=$doc->appendChild($my_node);
$con=mysqli_connect("localhost","root","","maps");
$query=sprintf("SELECT link, lat, lng FROM markers WHERE username='".$user."'");//query to select all the markers from db
$result=mysqli_query($con,$query);
if (!$result) {
  die("Invalid query: " . mysqli_error());
}

header("Content-type:text/xml");//creating nodes with db info in XML file
while ($row = mysqli_fetch_assoc($result)){
$my_node=$doc->createElement("marker");
$newnode=$pnode->appendChild($my_node);
$newnode->setAttribute("link", $row['link']);
$newnode->setAttribute("lat",$row['lat']);
$newnode->setAttribute("lng",$row['lng']);
}
echo $doc->saveXML();//saving XML Document
?>

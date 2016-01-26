<?php 
session_start();
$user=$_SESSION['user'];
$doc=new DOMDocument("1.0");//creating XML DOM
$my_node=$doc->createElement("flats");//parent node of XML
$pnode=$doc->appendChild($my_node);
$con=mysqli_connect("localhost","root","","flat_finder");
$query=sprintf("SELECT ID, FlatTitle FROM flatdetails WHERE username='".$user."'");//query to select all the markers from db
$result=mysqli_query($con,$query);
if (!$result) {
  die("Invalid query: " . mysqli_error());
}

header("Content-type:text/xml");//creating nodes with db info in XML file
while ($row = mysqli_fetch_assoc($result)){
$my_node=$doc->createElement("flat");
$newnode=$pnode->appendChild($my_node);
$newnode->setAttribute("flatid", $row['ID']);
$newnode->setAttribute("flattitle",$row['FlatTitle']);

}
echo $doc->saveXML();//saving XML Document
?>

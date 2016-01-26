<?php
if(isset($_SESSION['user']))
{
$user=$_SESSION['user'];
}
$user='ay';
//it returns an xml file which contains all markers stored in the database
$doc=new DOMDocument("1.0");//creating XML DOM
$my_node=$doc->createElement("ids");//parent node of XML
$pnode=$doc->appendChild($my_node);
$con=mysqli_connect("localhost","root","","flat_finder");
$result=mysqli_query($con,"SELECT ID FROM machinelearningkindaa WHERE Buyername='".$user."'");
/*if (!$result) {
  die("Invalid query: " . mysqli_error());
}*/
header("Content-type:text/xml");//creating nodes with db info in XML file
while ($row = mysqli_fetch_assoc($result))
{
$my_node=$doc->createElement("id");
$newnode=$pnode->appendChild($my_node);
$newnode->setAttribute("id_no", $row['ID']);
}
echo $doc->saveXML();//saving XML Document
?>
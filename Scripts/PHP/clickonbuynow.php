<?php
	include 'loginchk.php';
	include 'Scripts/mysqlconnect.php';
	$id = $_GET["code"];
	$buyer=$_SESSION['user'];
	$query1="SELECT `Username` FROM `flatdetails` WHERE `ID`=$id;";
	$q1 = mysql_query($query1);
	$query_row1 = mysql_fetch_assoc($q1);
	$seller=$query_row1['Username'];
	$query2="INSERT INTO `flat_finder`.`agreement` (`FlatCode`, `AgreementID`, `Buyer`, `SellerID`) VALUES ('$id', NULL, '$buyer', '$seller');";
	$q2 = mysql_query($query2);
	$querytemp="SELECT MAX(`AgreementID`) FROM `flat_finder`.`agreement`;";
	$qtemp = mysql_query($querytemp);
	$query_temp = mysql_fetch_assoc($qtemp);
	$agrid = $query_temp['MAX(`AgreementID`)'];
	$query3="INSERT INTO `flat_finder`.`notification` (`ID`, `AgreementID`, `User`, `Seen`) VALUES (NULL, '$agrid', '$buyer', 'n');";
	$q3 = mysql_query($query3);
	$query4="INSERT INTO `flat_finder`.`notification` (`ID`, `AgreementID`, `User`, `Seen`) VALUES (NULL, '$agrid', '$seller', 'n');";
	$q4 = mysql_query($query4);
	echo "Your Request has been registered<br>Seller will update asap";
?>
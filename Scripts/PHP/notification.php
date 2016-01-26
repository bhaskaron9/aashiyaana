<?php
	include 'loginchk.php';
	include 'Scripts/mysqlconnect.php';
	$user=$_SESSION['user'];
	echo "Unseen";
	$query1="SELECT `AgreementID` FROM `flat_finder`.`notification` WHERE `Seen`='n' AND `User`='$user';";
	$q1 = mysql_query($query1);
	while ($query_row1 = mysql_fetch_assoc($q1))
	{
		$agrid = $query_row1['AgreementID'];
		echo $agrid;
	}
	echo "Seen";
	$queryseen="SELECT `AgreementID` FROM `flat_finder`.`notification` WHERE `Seen`='y' AND `User`='$user';";
	$qseen = mysql_query($queryseen);
	while ($query_rowseen = mysql_fetch_assoc($qseen))
	{
		$agrid = $query_rowseen['AgreementID'];
		echo $agrid;
	}
	$query2="UPDATE `notification` SET `Seen`='y' WHERE User='$user';";
	$q2 = mysql_query($query2);
	
?>
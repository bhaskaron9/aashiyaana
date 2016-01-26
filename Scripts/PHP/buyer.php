
<html>
<head>
<title>imsherlock</title>

<?php
session_start();
if(!isset($_SESSION['user']))
{
	header('Location:login_page.php');
}
?>
</head>
<body>
	<?php

if(isset($_GET["formtext1"]))
{
$add=$_GET["formtext1"];
echo  $add;
/* echo $add*/
//$con=mysqli_connect("localhost","root","","flat_finder");

require 'Scripts/mysqlconnect.php';



//$query2=mysqli_query($con,"INSERT INTO `machinelearningkindaa`(`Buyername`,`SearchID`) VALUES('$_SESSION[".'user'."]','$add')");
$session = $_SESSION['user'];
echo "username:".$session;
echo "    ";
echo $add;

$query2="INSERT INTO machinelearningkindaa(`Buyername`,`SearchID`) VALUES('$session','$add')";

if($q6=mysql_query($query2))
{	echo "bhaskar";
}
$here=0;

//$run=query_run($q6);



//$query3="SELECT * FROM `mostsearched` WHERE `Keyword`='".$add."'";

//$query3='SELECT * FROM `mostsearched` WHERE `Keyword`= '".$add."'.';

//$q7=mysql_query($query3);	


/*
while($row1=mysql_fetch_array($q7))
{
	$updatecount = $row1['Count'] + 1;
	//echo $updatecount;
	$query4='UPDATE `mostsearched` SET `Count` = "$updatecount" WHERE `SearchID` = "$add" ';//creating problem :imsherlock
	$q8=mysql_query($query4);	
		$here=1;
		//echo "found";
}

*/

$query11="SELECT * FROM `mostsearched`";
$q11 = mysql_query($query11);
//$row11 = mysql_fetch_array($q11);

while($row11=mysql_fetch_array($q11)){
	//if(strcmp($row11["Keyword"],$add) == 0){
	if($row11["Keyword"]==$add){
		$here = 1;
		echo "it has been found blah";
		$count = $row11["Count"] + 1;
		$rw=$row11["ID"];
		$query12 = "DELETE FROM `mostsearched` WHERE ID=$rw";
		$rundy1=mysql_query($query12);
		
		$query11 = "INSERT INTO `mostsearched`(`ID`,`Keyword`,`Count`) VALUES ('$rw' ,'$add' , '$count')";
		
		$rundy=mysql_query($query11);
		//echo "it has been run";
		//echo $count;
		break;
	}

}

if($here==0)
{
	$query4="INSERT INTO `mostsearched` (`Keyword`,`Count`) VALUES ('$add','1')";
	$q8=mysql_query($query4);
}
		

$query=mysql_query("SELECT * FROM AddressDetails");
		
		while($row=mysql_fetch_assoc($query))
		{
				if(($row['AddressLine1']==$add)||($row['AddressLine2']==$add)||($row['City']==$add)||($row['Country']==$add)||($row['State']==$add)){
					
					echo $row["FlatCode"];
					$temp = $row["FlatCode"];
					$queryy=mysql_query("INSERT INTO machinelearningkindaa(`Buyername`,`SearchID`) VALUES ($add,$temp)");
					
					
				}
		}
 /*
 
 $query=mysql_query("SELECT * FROM AddressDetails");
		$count=0;
		$other=0;
		while($row=mysql_fetch_assoc($query))
		{
			
			if($row['AddressLine1']==$add)
			{	
					//$count=1;
					$ans=$row['FlatCode'];
					//$query5=mysql_query("SELECT * FROM FlatDetails WHERE ");
					echo $ans;
					$other=1;



			}
		}

		if($count==0)
		{

				$query=mysqli_query($con,"SELECT * FROM AddressDetails");
					
					while($row=mysqli_fetch_assoc($query))
					{
						
						if($row['AddressLine2']==$add)
						{	
								//$count=1;
								$ans=$row['FlatCode'];
								echo $ans;
								$other=1;



						}
					}

		}

		if($count==0)
		{

				$query=mysqli_query($con,"SELECT * FROM AddressDetails");
					
					while($row=mysqli_fetch_assoc($query))
					{
						
						if($row['City']==$add)
						{	
								//$count=1;
								$ans=$row['FlatCode'];
								echo $ans;
								$other=1;
						}
					}

		}
		if($count==0)
		{

				$query=mysqli_query($con,"SELECT * FROM AddressDetails");
					
					while($row=mysqli_fetch_assoc($query))
					{
						
						if($row['Country']==$add)
						{	
								//$count=1;
								$ans=$row['FlatCode'];
								echo $ans;
								$other=1;
						}
					}

		}
		if($count==0)
		{

				$query=mysqli_query($con,"SELECT * FROM AddressDetails");
					
					while($row=mysqli_fetch_assoc($query))
					{
						
						if($row['State']==$add)
						{	
								$count=1;
								$ans=$row['FlatCode'];
								echo $ans;
								$other=1;
						}
					}

		}
		if($other==0)
		{



			header('Location:maps.php');
			//id is in variable ans for future use
			//$query=mysqli_query($con,"SELECT * FROM FlatDetails WHERE ID='" . $ans . "' ");
			//$row=mysqli_fetch_assoc($query)
			

					//echo $row['FlatTitle'];

		}

*/

//GROUP BY Views
		//WHERE $add=AddressLine1
		$finalquery="SELECT flatdetails.FlatTitle,flatdetails.Price,flatdetails.Area,flatdetails.Type ,flatdetails.PayTerm, addressdetails.AddressLine1,addressdetails.AddressLine2, flatdetails.ID FROM addressdetails INNER JOIN flatdetails ON flatdetails.ID = addressdetails.FlatCode ORDER BY flatdetails.Views DESC";
		$q9 = mysql_query($finalquery);
		//$finalquery=mysqli_query($con,"SELECT FlatDetails.FlatTitle, FlatDetails.Price,FlatDetails.Area,FlatDetails.Type,FlatDetails.Contact, AddressDetails.AddressLine1,AddressDetails.AddressLine2,AddressDetails.City,AddressDetails.Country,AddressDetails.State  FROM AddressDetails INNER JOIN FlatDetails ON FlatDetails.ID = AddressDetails.FlatCode  ");
		
		
		while($row1=mysql_fetch_array($finalquery))
		{
				
 
				if($add==$row1['AddressLine1'])
					header('Location:maps.php');
				 if($add==$row1['AddressLine2'])
					header('Location:maps.php');
				 if($add==$row1['AddressLine2'])
					header('Location:maps.php');
				 if($add==$row1['Type'])
					header('Location:maps.php');
				if($add==$row1['PayTerm'])
					header('Location:maps.php');






		}


}


?>
<form action="buyer.php" method="GET">
<input name="formbutton1" type="submit" value="Search" style="position:absolute;left:502px;top:213px;z-index:2">
<input name="formtext1" type="text"  style="position:absolute;width:364px;left:681px;top:213px;z-index:3" placeholder="Search">
<div id="text1" style="position:absolute; overflow:hidden; left:205px; top:81px; width:150px; height:90px; z-index:4">
<div class="wpmd">
</form>
<div><font color="#00FFFF" class="ws16"><B>Welcome <?php 
				echo $_SESSION['user'];
			?></B><a href="logout.php">Logout</a></font></div>
</div></div>

<div id="my_id">
</div><br><br><br><br><br><br><br><br><br><br><br><br><br>
<iframe src="machinelearn/" height="100%" width="100%"></iframe>
</body>
</html>

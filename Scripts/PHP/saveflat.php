<?php

		include 'loginchk.php';
		if(isset($_POST["flat_title"])&&
		isset($_POST["add1"])&&
		isset($_POST["add2"])&&
		isset($_POST["city"])&&
		isset($_POST["pin"])&&
		isset($_POST["country"])&&
		isset($_POST["state"])&&
		isset($_POST["tno1"])&&
		isset($_POST["tno2"])&&
		isset($_POST["contactname"])&&
		isset($_POST["cnameno"])&&
		isset($_POST["fax"])&&
		isset($_POST["email"]) &&
		isset($_POST["url"])&&
		isset($_POST["payterm"])&&
		isset($_POST["paymethod"])&&
		isset($_POST["price"])&&
		isset($_POST["area"])&&
		isset($_POST["type"])&&
		isset($_POST["landmark"])
		)
	{
		$flattitlev = $_POST["flat_title"];
		$add1v = $_POST["add1"];
		$add2v = $_POST["add2"];
		$cityv = $_POST["city"];
		$pinv = $_POST["pin"];
		$countryv = $_POST["country"];
		$statev = $_POST["state"];
		$tno1v = $_POST["tno1"];
		$tno2v = $_POST["tno2"];
		$contactnamev = $_POST["contactname"];
		$cnamenov = $_POST["cnameno"];
		$faxv = $_POST["fax"];
		$emailv = $_POST["email"];
		$urlv = $_POST["url"];
		$paytermv = $_POST["payterm"];
		$paymethodv = $_POST["paymethod"];
		$pricev = $_POST["price"];
		$areav = $_POST["area"];
		$typev = $_POST["type"];
		$landmarkv = $_POST["landmark"];
		if(!empty($flattitlev)&&
			!empty($add1v)&&
			!empty($add2v)&&
			!empty($cityv)&&
			!empty($pinv)&&
			!empty($countryv)&&
			!empty($statev)&&
			!empty($tno1v)&&
			!empty($tno2v)&&
			!empty($contactnamev)&&
			!empty($cnamenov)&&
			!empty($faxv)&&
			!empty($emailv)&&
			!empty($urlv)&&
			!empty($paytermv)&&
			!empty($paymethodv)&&
			!empty($pricev)&&
			!empty($areav)&&
			!empty($typev)&&
			//!empty($pinmapv)&&
			!empty($landmarkv)
			)
		{
			$username = $_SESSION['user'];
			$addr1=$_GET['addr'];
			$lat1=$_GET['lat'];
			$lng1=$_GET['lng'];
			$addr=mysql_real_escape_string($addr1);
			$lat=mysql_real_escape_string($lat1);
			$lng=mysql_real_escape_string($lng1);
			
			
			include 'Scripts/mysqlconnect.php';
			$query1="INSERT INTO `flat_finder`.`flatdetails` (`ID`,`FlatTitle`, `Area`, `Landmark`, `Type`, `Price`, `PayTerm`, `PayMethod`,`Views`,`Username`) VALUES (NULL,'$flattitlev', '$areav', '$landmarkv', '$typev', '$pricev', '$paytermv', '$paymethodv',0,'$username');";
			$query2="INSERT INTO `flat_finder`.`contactdetails` (`FlatCode`, `Telephone1`, `Telephone2`, `ContactPerson`, `ContactPersonno.`, `FAX`, `Email`, `Website`) VALUES (NULL, '$tno1v', '$tno2v', '$contactnamev', '$cnamenov', '$faxv', '$emailv', '$urlv');";
			$query4="INSERT INTO `flat_finder`.`mapin` (`FlatCode`, `Username`, `Addr`, `Lat`, `Lng`) VALUES (NULL, '$username', '$addr', '$lat', '$lng');";
			$query5="INSERT INTO `flat_finder`.`addressdetails` (`FlatCode`, `AddressLine1`, `AddressLine2`, `City`, `Pin`, `Country`, `State`) VALUES (NULL, '$add1v', '$add1v', '$cityv', '$pinv', '$countryv', '$statev');";
			$query6="SELECT ID FROM `flat_finder`.`flatdetails` WHERE `FlatTitle`='$flattitlev';";
			
			if(mysql_query($query1,$conn)&&mysql_query($query2,$conn)&&mysql_query($query5,$conn))
			{
				echo "yo";
				$query_run=mysql_query($query6);
				while ($query_rows = mysql_fetch_assoc($query_run))
				{
					$id = $query_rows['ID'];
				}
				echo 'Congratulation, Your Flat ID has been Created...<br>Flat Code is'.$id.'<br><br><br><br>';
			}
			else
				echo "Problem Writing to Database";
		}
		else 
			echo "Some fields are still to be filled";
	}
	else
	{
		echo 'Fill your form properly';
	}
	
?>
<?php
if(isset($_POST['Submit']))
{
	$target_dir = "uploads/";
	$target_file = $target_dir.$id.'.jpg';
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) 
	{
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	echo $target_file;
	// Check file size
	if ($_FILES["image"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif"&& $imageFileType != "pdf" && $imageFileType != "tif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.<br>";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
}?>
<form action="printin.php" target='_parent' method="POST">
	<input type="submit" value="Print your Form">
	<br>
	Done added...
	<input type="hidden" value="<?php echo $id;?>" name="code">
</form>


<?php
$type=$_POST['seller'];
$user=$_POST['username'];
$pass=$_POST['password1'];
	$mysqli=new MySQLi("localhost","root","","flat_finder");
	if($mysqli->connect_errno){
		echo "Failed to connect to MySQL:(" . $mysqli->connect_errno . ") ".$mysqli->connect_error;
	}
	if(!($stmt=$mysqli->prepare("SELECT Password FROM info WHERE Username=? AND BuyerSeller=?"))){
		echo "Prepare failed : (" . $mysqli->errno . ")".$mysqli->error;
	}
	if(!($stmt->bind_param('ss',$user,$type))){
		echo "Binding failed : (" .$stmt->errno.")".$stmt->error;
	}
	if(!($stmt->execute())){
		echo "Execution failed : (".$stmt->errno.")".$stmt->error;
	}
	if(!($stmt->bind_result($pswd))){
		echo "Binding result failed : (".$stmt->errno.")".$stmt->error;
	}
	
	$count=0;
		while($stmt->fetch())
		{
			$hash=$pswd;
			if(password_verify($pass,$hash))
			{	
				$count=1;
				/*if(!strcmp($ty,"eller"))
				{
					$check=0;
				}
				else
				{
					$check=1;
				}*/
			}
		}
		if($count==1)
		{
			session_start();
			$_SESSION['status']="Active";
			$_SESSION['user']=$user;
			if($type==="Seller")
			{
				header('Location:sellerportal.php');
			}
			else
			{
					header('Location:buyer.php');
			}
		}
		else
		{
			header('Location:login_page.php');
		}
?>
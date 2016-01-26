<?php
$type=$_POST['seller'];
$user=$_POST['username'];
$pass=$_POST['password1'];

	$con=mysqli_connect("localhost","root","","flat_finder");
	
		$query=mysqli_query($con,"SELECT * FROM info WHERE username='" . $user . "' AND permission='" . $type . "'");
		$count=0;
		while($row=mysqli_fetch_assoc($query))
		{
			$hash=$row['password'];
			if(password_verify($pass,$hash))
			{	
				$count=1;
			}
		}
		if($count==1)
		{
			session_start();
			$_SESSION['status']="Active";
			$_SESSION['user']=$user;
			header('Location:logged_in.php');
		}
		else
		{
			header('Location:login_page.php');
		}

?>
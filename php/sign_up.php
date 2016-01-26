
<?php
//the php file to sign up the users and store the data in the databse if the info is correct
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$user=$_POST['username'];
$pass=$_POST['password1'];
$pan=$_POST['pan'];
$contact=$_POST['contact'];
$addr=$_POST['addr'];
$gender=$_POST['gender'];
$seller=$_POST['seller'];
$captcha=$_POST['captcha'];
session_start();
if($captcha!=$_SESSION['digit'])
{
	echo $_SESSION['digit'];
	header('Location:sign_up_page.php?stat=6');
}
else if(!empty($user))
{
	$con=mysqli_connect("localhost","root","","flat_finder");
	//mysql_select_db("maps");
	$query1=mysqli_query($con,"SELECT * FROM info WHERE username='$user'");//checks for duplicate entry of username
	$query2=mysqli_query($con,"SELECT * FROM info WHERE email='$email'");
	if(mysqli_num_rows($query1)>=1)
	{
		header('Location:sign_up_page.php?stat=4');
	}
	else if(mysqli_num_rows($query2)>=1)
	{
		header('Location:sign_up_page.php?stat=7');
	}
	else
	{
		$con1=mysqli_connect("localhost","root","","flat_finder");
		//mysql_select_db("maps");
		$hash=password_hash($pass,PASSWORD_DEFAULT);
		$query="INSERT INTO info(FirstName,MiddleName,LastName,EmailId,Username,Password,Pan,Contact,PerAddr,Gender,BuyerSeller) VALUES('$fname',$mname','$lname','$email','$user','$hash','$pan','$contact','$addr','$gender','$seller')";//query to create the user and save the corresponding info in database
		$result=mysqli_query($con1,$query);
		if($result)
		{
			$_SESSION['status']="active";
			$_SESSION['user']=$user;
			header('Location:login_page.php');
		}
		else
		{
			echo $result;
			//header('Location:sign_up_page.php?stat=5');
		}
	}
}
?>
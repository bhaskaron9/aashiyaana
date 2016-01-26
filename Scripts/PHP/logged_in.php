<?php
session_start();
if(!isset($_SESSION['user']))
{
	header('Location:login_page.php');
}
?>
<!doctype html>
<html>
<head>
<title>Flat Finder</title>
<link rel="icon" 
      type="image/png" 
      href="../../Images/1.png">
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
LOGGED IN PAGE OF USER
<?php
	echo $_SESSION['user'];
?>
<a href="logout.php">&nbsp;logout</a>

<body>
</body>
</html>
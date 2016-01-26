<!DOCTYPE html>
<html lang="en">
<head>
  <title>Flat Finder</title>
  <link rel="icon" 
      type="image/png" 
      href="../../Images/1.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
<?php
	session_start();
	if(isset($_SESSION['user']))
	{
		header('Location:logged_in.php');
	}
?>
<div class="container">
  <div class="jumbotron">
    <h1>LOGIN</h1>
  </div>
  <div class="row">
    <div class="col-sm-8">
		Not registered yet?<a href="sign_up_page.php">Sign Up</a>
		<form method="POST" action="login.php">
        	<div>
            	<label for="seller_buyer">Seller or Buyer</label>
				 Seller <input type="radio"  id="seller" name="seller" value="Seller" checked>
                 Buyer <input type="radio" id="buyer" name="seller" value="Buyer">
            </div>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
			</div>
			<div class="form-group">
				<label for="password1">Password</label>
				<input type="password" class="form-control" id="password1" name="password1" placeholder="Password" required>
			</div>
			
			<button type="submit" class="btn btn-default">Login</button>
		</form>
    </div>
  </div>
</div>
</body>
</html>

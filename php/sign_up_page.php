<?php
	if(isset($_SESSION['user']))
	{
		header('Location:logged_in.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Flat Finder</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <style type="text/css">
  #l1,#captcha,#captcha_img{
  display:inline;
  vertical-align:text-middle;
  }
  </style>
</head>
<body>
<div class="container">
<div class="jumbotron">
	<h1>SIGN UP</h1>
</div>
  <div class="row">
    <div class="col-sm-8">
		Already a user? <a href="login_page.php">Sign in</a> </br>
        <div style="color:red;">
			<?php
			if(isset($_GET['stat']))
			{
			$stat=$_GET['stat'];
			if($stat==4)
			{
				echo "Username already exists. Choose another!";
				
			}
			else if($stat==6)
			{
				echo "Incorrect entry of captcha!";
				
			}
			else if($stat==5)
			{
				echo "Error! Please try again.";
				
			}
			else if($stat==7)
			{
				echo "Email already exists";
				
			}}
			?>
           </div>
		<form method="POST" action="sign_up.php" class="form-group">
        	<div class="form-group">
				<label for="fname">First Name<span style="color:red;">*</span></label>
				<input type="text" class="form-control" id="fname" name="fname" placeholder="First Name"  style="width:50%;" required>
			</div>
			<div class="form-group">
				<label for="mname">Middle Name</label>
				<input type="text" class="form-control" id="mname" name="mname" placeholder="MIddle Name" style="width:50%;">
			</div>
			<div class="form-group">
				<label for="lname">Last Name<span style="color:red;">*</span></label>
				<input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" style="width:50%;" required>
			</div>
			
			<div class="form-group">
				<label for="email">Email-Id<span style="color:red;">*</span></label>
				<input type="email" class="form-control" id="email" name="email" placeholder="example@abc.com" style="width:50%;" required>
            </div>
			<div class="form-group">
				<label for="username">Username<span style="color:red;">*</span></label>
				<input type="text" class="form-control" id="username" name="username" placeholder="Username" style="width:50%;" required>
			</div>
			<div class="form-group">
				<label for="password1">Password<span style="color:red;">*</span></label>
				<input type="password" class="form-control" id="password1" name="password1" placeholder="Password" style="width:50%;" minlength="8" required>
			</div>
            <div class="form-group">
				<label for="password2">Confirm-Password<span style="color:red;">*</span></label>
				<input type="password" class="form-control" id="password2" name="password2" placeholder="Retype Password" style="width:50%;" min="8" required>
			</div>
            <div class="form-group">
            	<label for="pan">PAN No.<span style="color:red;">*</span></label>
                <input type="tel" class="form-control" id="pan" name="pan" placeholder="PAN Number" style="width:50%;" required>
            </div>
            <div class="form-group">
            	<label for="contact">Contact No.<span style="color:red;">*</span></label>
                <input type="tel" class="form-control" id="contact" name="contact" placeholder="Contact" style="width:50%;" required>
            </div>
             <div class="form-group">
            	<label for="address">Permanent Address<span style="color:red;">*</span></label>
                <input type="text/area" class="form-control" id="addr" name="addr" placeholder="Permanent Address" style="width:50%;" required>
            </div>
            
            <div>
				<label for="gender">Gender<span style="color:red;">*	</span></label>
				 Male <input type="radio"  id="gender_male" name="gender" value="Male" checked>
                 Female <input type="radio" id="gender_female" name="gender" value="Female">
                 Other <input type="radio" id="gender_other" name="gender" value="Other">
                
			</div>
            <div>
            	<label for="seller_buyer">Seller or Buyer<span style="color:red;">*	</span></label>
				 Seller <input type="radio"  id="seller" name="seller" value="Seller" checked>
                 Buyer <input type="radio" id="buyer" name="seller" value="Buyer">
            </div>
			<div class="form-group">
				<label for="captcha2" id="l1">Enter the text:<span style="color:red;">*</span></label>
				<input type="text" class="form-control" id="captcha" name="captcha" placeholder="Enter the text" style="width:160px;" required/>
				    <img id="captcha_img" src="captcha.php" width="100" height="50" border="1" alt="CAPTCHA">
			</div>
			<button type="submit" class="btn btn-default" id="btn">Sign Up</button>
            
		</form>
    </div>
  </div>
</div>
</body>
</html>

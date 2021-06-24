

<!DOCTYPE html>
<html>
<head>
	<title>
		WigalCom:: Create New Account
	</title>

	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="view" content="width-device-width, initial-scale-1" >
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

</head>
<body>

	<div class="signin-form">
		<form  method="post">
			<div class="form-header">
			<img  class="logo" src="./images/wigal.png"><br>
			<p>New Wigal Worker</p>
			</div>
			<div class="form-group">
				<br><br>
				<label class="labels">First Name</label><br>
				<input type="text" class="form-control" name="user_name" placeholder="first name *Frank" autocomplete="on" required>

			</div>
			<div>
				<label class="labels">Position</label><br>
				<input type="text" class="form-control" name="position" placeholder="position" autocomplete="off" required>

			</div>
			<div class="form-group">
				
				<label class="labels">Email</label><br>
				<input type="email" class="form-control" name="user_email" placeholder="someone@site.com" autocomplete="off" required>

			</div>

			<div class="form-group">
				<label class="labels">Password</label><br>
				<input type="password" class="form-control" name="user_password" placeholder="Password" autocomplete="off" required>

			</div>
			
			<div class="form-group">
				<label class="labels">Varify Password</label><br>
				<input type="password" class="form-control" name="vpass" placeholder="retype password" autocomplete="off" required>

			</div>

			<div class="form-group">
				<label class="checkbox-inline"><input type="checkbox" name="" required> I accept the<a href="#"> Terms of Use </a> &amp;<a href="#">Privacy Policy</a></label>

			</div>
			

			<div class="form-group">
				<button   type="submit" class="btn" name="submit" >Signup</button>
				
			</div>

			<div class="loginme">
				<a href="index.php"><button type="submit" name="sign_up" >Login</button></a>
				
			<?php  include("signup-user.php")   ?> 
		</form>
	
	</div>

</body>
</html> 
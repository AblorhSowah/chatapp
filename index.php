<!DOCTYPE html>
<html>
<head>
	<title>
		WigalCom
	</title>

	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="view" content="width-device-width, initial-scale-1" >
    <link rel="stylesheet" type="text/css" href="css/signin.css">

</head>
<body>
	<div class="signin-form">
		<form  method="post">
			<div class="form-header">
			<img  class="logo" src="./images/wigal.png"><br>
			<p>Login to chat work mate</p>
			</div>
			<div class="form-group">
				<br><br>
				<label class="labels">Email</label><br>
				<input type="email" class="form-control" name="email" placeholder="someone@site.com" autocomplete="off" required>

			</div>

			<div class="form-group">
				<label class="labels">Password</label><br>
				<input type="password" class="form-control" name="pass" placeholder="Password" autocomplete="off" required>

			</div>
			<div class="labels">Forgot password? <a href="forgot_php.php">Click Here</a></div><br>

			<div class="form-group">
				<button   type="submit" class="btn" name="sign_in" value="submit">Sign in</button>
				
			</div>
		<?php  include("login-user.php")   ?> 


		</form>
		<div class="text-center small" style="color: white;" > Don't have an account? <a href="register.php"> Create one</a>
			
		</div>
	</div>

</body>
</html>
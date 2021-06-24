<?php

include("include/connection.php");

 if(isset($_POST['submit'])){


$name = htmlentities(mysqli_real_escape_string($con, $_POST['user_name']));  
$position  = htmlentities(mysqli_real_escape_string($con, $_POST['position']));
$email     = htmlentities(mysqli_real_escape_string($con, $_POST['user_email']));
$pass  =htmlentities(mysqli_real_escape_string($con, $_POST['user_password']));
$vpass =htmlentities(mysqli_real_escape_string($con, $_POST['vpass']));
$rand      = rand(1, 2);


if($name==''){

	echo" <script> alert('we can not varify your name')
	</script>";

}


if(strlen($pass) <2){

	echo"<script>alert('Password should be minimum 5 characters')</script>";
	
}


if(!$pass== $vpass){

echo"<script>alert('password do not match')</script>";
	
}


$check_eamil= "select * from users WHERE user_email='$email'";
$run_email= mysqli_query($con, $check_eamil);

$check= mysqli_num_rows($run_email);

if($check >0){

	echo"<script>alert('Email is ready taken')</script>";
	echo"<script>window.open('register.php', '_self'])</script>";
	
}


if ($rand==1){
	$profile_pic= "images/wall.jpg";
}
elseif ($rand ==2) {
	$profile_pic = "images/p.jpg";
}

$insert = "INSERT INTO users(user_name, Position, user_email, user_pass, user_profile) VALUES('$name', '$position', '$email', '$pass', '$profile_pic')";

$query = mysqli_query($con, $insert);

;
if($query){

	echo"<script>Swal.fire('Account Created login')</script>";
	echo" <script> window.open('login.php,' '_self')</script>";

}else{


echo"<script>alert('registration failed, try again ')</script>";
	echo" <script> window.open('register.php,' '_self')</script>";


}

}

?>
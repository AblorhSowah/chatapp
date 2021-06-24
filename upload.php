

<!DOCTYPE html>
<?php 
session_start();
include("./include/find_friends_function.php");
include("./include/header.php");

if (!isset($_SESSION['user_email'])) {
  header("Location:index.php");
}
else { ?> 
<html>
<head>
  <title>Account Settings</title>


   <meta charset="utf-8">
    <meta name="view" content="width-device-width, initial-scale-1" >

<link rel="stylesheet" type="text/css" href="css/account.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudeflare.com/ajax/libs/popper/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<style>

	.card{
		box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
		max-width: 400px;
		max-height: 400px;
		margin: auto;
		text-align: center;
		font-family: arial;

	}
	.card img{
		color: grey;
		font-size: 18px;

	}
	.title{
		color: grey;
		font-size: 18px;
	}
	button{
		border:none;
		outline: 0;
		display: inline-block;
		padding: 9px;
		color:  white;
		background-color: #2a5d84;
		text-align: center;
		cursor: pointer;
		width: 200px;
		font-size:18px;
		margin-left: 100px;
	}
	#update_profile{

		position: absolute;
		cursor: pointer;
		padding: 10px;
		border-radius: 4px;
		color: white;
		background-color: #000;
	}
	label{

		padding: 7px;
		display: table;
		color: #fff;
	}
input[type="file"]{
	display: none;
}
</style>
</head>
<body>
<?php



		$user =$_SESSION['user_email'];
			$get_user ="select * from users where user_email='$user'";
			$run_user =mysqli_query($con, $get_user);
			$row =mysqli_fetch_array($run_user);

			$user_name = $row['user_name'];
			$user_profile = $row['user_profile'];

			echo"

				<div class='card'>
						<img src='$user_profile'>
						<h1>$user_name</h1>
						<form method='post' enctype='multipart/form-data'>
						<label id='update_profile'><i class='fa fa-circle-o' aria-hidden='true '></i>Select Profile
						<input type='file' name='u_image' size='60'>
						</label>
						<button id='button_profile' name='update'>&nbsp;&nbsp;&nbsp;<i class='fa fa-heart' aria-hidden='true'></i>Update Profile Now</button>
				</form>
				</div><br><br>

				<button ><a style='color:white;' href='include/account_settings.php'>BACK</a></button>

			";


	       if(isset($_POST['update']))

	       {


             $u_image = $_FILES['u_image']['name'];
             $image_temp =$_FILES['u_image']['tmp_name'];
             $random_number = rand(1,100);

             if($u_image=='')
             {

             	echo "<script>alert('please select profile')</script>";
				echo "<script>window.open('upload.php', '_self')</script>";
             }
             else
            {
             	move_uploaded_file($image_temp, "images/$u_image.$random_number");
             	$update="update users set user_profile = 'images/$u_image.$random_number' where user_email = '$user'";
             	$run = mysqli_query($con, $update);

             	if ($run)
             	 {

             	echo "<script>alert('Your Profile Is Update!')</script>";
				echo "<script>window.open('upload.php', '_self')</script>";


             		# code...
             	 }



             }





	      }
	      ?>
</body>
</html>
<?php }?>
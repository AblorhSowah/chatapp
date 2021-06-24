


<!DOCTYPE html>
<?php 
session_start();
include("./include/find_friends_function.php");

if (!isset($_SESSION['user_email'])) {
	header("Location:index.php");
	

}
else { ?> 

	
<html>
<head>
	<title>Find Friends</title>


	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="view" content="width-device-width, initial-scale-1" >


		 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="css/find_friends.css">
<!-- Latest compiled JavaScript -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
	<nav class="navbar">
		<div><img  class="logo" src="./images/wigal.png"></div>
     	<a class="navbar-brand" >
		<?php
           $user = $_SESSION['user_email'];
           $get_user = "select * from users where user_email='$user'";
           $run_user = mysqli_query($con, $get_user);
           $row = mysqli_fetch_array($run_user);

 
           $user_name = $row['user_name'];
           echo" <a   style='float:left; color: #2a5d84; font-size:40px; ' class='fa fa-dashcube' href='home2.php?user_name=$user_name'><u></u></a>"; 
		?>
   </a>
			<ul class="navbar-nav">
				<li><a class="fa fa-gear fa-spin"  style="color: #2a5d84;text-decoration: none;font-size:20px;" href="include/account_settings.php"></a></li>
			</ul>
		</nav><br>
		<div class="row">
			<div class="col-sm-4">
			</div>
		<form class="searh_form">
			<span class="search"><input type="text" name="search_query" placeholder="Search Friends" autocomplete="off" required></span>
			<button class="btn" type="submit" name="search_btn">Search</button>
		</form>
		</div>
		<div class="col-sm-4">
		</div>
		<div><br><br><br>
			<?php search_user(); ?>
</body>
</html>
<?php } ?>

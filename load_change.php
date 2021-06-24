<!DOCTYPE html>
<html>
<head>
	<title></title>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>

<body>



<?php

session_start();
include("include/connection.php");





			$user =$_SESSION['new_user_email'];
			$get_user ="select * from users where user_email='$user'";
			$run_user =mysqli_query($con, $get_user);
			$row =mysqli_fetch_array($run_user);

			$user_name = $row['user_name'];
			$user_position = $row['Position'];
			$user_email = $row['user_email'];
			$user_pass = $row['user_pass'];
			$user_profile = $row['user_profile'];
			$user_id=$row['User_id'];



 
$_POST['update']  =$_SESSION['new_update'];    
$user_name_new = $_SESSION['new_name'];
$email_new =     $_SESSION['new_email'];
$position_new=   $_SESSION['new_position'];

if(isset($_POST['update']))
{

		$update_sender = mysqli_query($con, "UPDATE users_chats SET sender_username ='$user_name_new' where sender_username='$user_name'");
			$update_receiver = mysqli_query($con, "UPDATE users_chats SET receiver_username='$user_name_new' where  receiver_username='$user_name'");
		 
		 $update = "update users set user_name = '$user_name_new', user_email = '$email_new', Position = '$position_new' where User_id='$user_id'";

		 $run= mysqli_query($con, $update);
							#selecting messages from the data db

}

?>

</body>
</html>

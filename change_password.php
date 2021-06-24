

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
    

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="css/pass_change.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudeflare.com/ajax/libs/popper/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

</head>
<body>

	<div class="row">
		<div class="col-sm-2">	
		</div>
		<div class="col-sm-8">
		<form action="" method="post" enctype="multipart/form-data">
				<table class="table table-bordered table-hover" >
					<tr align="center">
						<td colspan="6" class="active"><h2>Change Password</h2><br>
							<div class="right-sliderbar-img" >
									<img src="<?php 
										$user =$_SESSION['user_email'];
										$get_user ="select * from users where user_email='$user'";
										$run_user =mysqli_query($con, $get_user);
										$row =mysqli_fetch_array($run_user);
										$user_profile = $row['user_profile'];
		                               if(isset($user_profile)){echo"$user_profile";} ?>">
								<br><br> &nbsp;&nbsp;<label><?php echo"$user_name "?></label>
			                </div>	


						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Current Password</td>
						<td>
							<input type="Password" id="mypass" name="current_pass" class="form-control" required placeholder="current password">
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">New Password</td>
						<td>
							<input type="Password" id="mypass" name="u_pass1" class="form-control" required placeholder="New Password">
						</td>
					</tr> 
					<tr>
						<td style="font-weight: bold;">confirm  Password</td>
						<td>
							<input type="Password" id="mypass" name="u_pass2" class="form-control" required placeholder="Confirm Password">
						</td>
					</tr>
					<tr align="center">
						<td colspan="6">	
							<input type="submit"  name="change" value="change" class="btn btn-info" />
						</td>
					</tr>
				</table>
		</form>
  <?php

  if(isset($_POST['change'])){
  	$cur_pass = $_POST['current_pass'];
  	$pass1 = $_POST['u_pass1'];
  	$pass2 = $_POST['u_pass2'];



		$user =$_SESSION['user_email'];
		$get_user ="select * from users where user_email='$user'";
		$run_user =mysqli_query($con, $get_user);
		$row =mysqli_fetch_array($run_user);

		$user_profile = $row['user_profile'];
		$user_password = $row['user_pass'];
		$user_name = $row['user_name'];



if ($cur_pass !== $user_password) {
	echo "
<div class='alert alert-danger'> 
<strong> Your old password did not match</strong>
 </div><br>

	     ";
	# code...
}

if($pass1 != $pass2){
echo "
<div class='alert alert-danger' > 
<strong> Your new password didn't match with confirm password</strong>
 </div>
 ";

}

if (strlen($pass1)  <5 AND strlen($pass2) <5) {
	echo "
<div class='alert alert-danger'> 
<strong>Use more than 5 charactors</strong>
 </div>
 ";

	# code...
}

if ($pass1 == $pass2 AND $cur_pass == $user_password) {

	$update_pass = mysqli_query($con, "UPDATE users SET user_pass='$pass1' where user_email='$user'");

	echo "
<div class='update'> 
<strong>Your password is updated</strong>
 </div>
 ";
	# code...
}
			# code...
		
}


  ?>
	</div>

	<div class="col-sm-2"> 
	</div>
</div>
</body>
</html>
<?php }?>
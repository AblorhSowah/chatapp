

<!DOCTYPE html>
<?php 
session_start();
include("find_friends_function.php");
include("header.php");

function reload(){
echo "<meta http-equiv='refresh' content='2'>";
	
}

if (!isset($_SESSION['user_email'])) {
  header("Location:index.php");
}
else { ?> 
<html>
<head>
  <title>Account Settings</title>


   <meta charset="utf-8">
    <meta name="view" content="width-device-width, initial-scale-1" >


     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="css/account.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudeflare.com/ajax/libs/popper/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

</head>
<body>
	<div class="row">
		<div class="col-sm-2">
		</div>

		<?php
			$user =$_SESSION['user_email'];
			$get_user ="select * from users where user_email='$user'";
			$run_user =mysqli_query($con, $get_user);
			$row =mysqli_fetch_array($run_user);

			$user_name = $row['user_name'];
			$user_position = $row['Position'];
			$user_email = $row['user_email'];
			$user_pass = $row['user_pass'];
			$user_profile = $row['user_profile'];
			$user_id=$row['User_id'];

		?>
		<div class="col-sm-8">
			<form action="" method="post" enctype="multipart/form-data">
				<table class="table table-bordered table-hover">
					<tr align="center">
						<td colspan="6" class="active"><h2>Change Settings</h2></td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Change Your Username</td>
						<td>
							<input type="text" name="u_name" class="form-control" required value="<?php echo$user_name;?>">
						</td>
					</tr>
					<tr><td></td><td><a class="btn btn-default"  style="text-decoration: none; font-size: " href="../upload.php"><i class="fa fa-user" aria-hidden="true"></i> Change Profile</a></td></tr>

					<tr>
						<td style="font-weight: bold;"> Change Your Email</td>
						<td>
							<input type="email" name="u_email" class="form-contol" required value="<?php echo $user_email;?>">
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;"> Change Your Position</td>
						<td>
							<input type="text" name="u_position" class="form-contol" required value="<?php echo $user_position;?>">
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Forgotten Password</td>
						<td>
							<button type="button" class="btn btn-default"
							data-toggle="modal" data-target="#myModal">Forgotten Password</button>
						</td>
						<div id="myModal" class="modal fade" role="dailog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body">
										<form action="recovery.php?id=<?php echo $user_id; ?>" method="post" id="f">
										<strong>What is your best friend's name?</strong>
										<textarea class="form-control" col="83" row="4" name="content" placeholder="friend name"></textarea><br>
										<input class="btn btn-default" type="submit" name="sub" value="submit" style="width: 100px;"><br><br>
										<pre>Answer the above question, we will ask you this if you forget your <br> Password. </pre><br><br>
										</form>
										<?php
											if (isset($_POST['sub'])) 
											{
												$bfn = htmlentities($_POST['content']);
												if ($bfn=="")
												 {
													echo "<script>alert('Please Enter Something.')</script>";
													echo "<script>window.open('account_settings.php', '_self')</script>";
													exit();
												}
												else 
												{
													$update = "update users set forgotten_answer='$bfn' where user_email='$user'";
													$run = mysqli_query($con, $update);

													if($run)
													{
														echo "<script>alert('working...')</script>";
													echo "<script>window.open('account_settings.php', '_self')</script>";
													

													}
													else
													{

                                                   echo "<script>alert('Error While Undating Information')</script>";
													echo "<script>window.open('account_settings.php, '_self')</script>";
													
													}
												}


												}

										?>
									</div>
									<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>

								</div>
							</div>
						</div>
					</tr>
					<tr><td></td><td><a class="btn btn-default"  style="text-decoration: none;font-size: 15px;" href="../change_password.php"><i class="fa fa-key fa-fw" aria-hidden="true"></i></a><h6 class="ab">Change Password</h6></td></tr>

					<tr align="center">
						<td colspan="6">
							<input type="submit" name="update" value="update" class="btn btn-info">
						</td>
					</tr>

				</table>
			</form>
			<?php
			if(isset($_POST['update']))
			{

$user_name_new =htmlentities($_POST['u_name']);
$email_new = htmlentities($_POST['u_email']);
$position_new= htmlentities($_POST['u_position']);




 $update_sender = mysqli_query($con, "UPDATE users_chats SET sender_username ='$user_name_new' where sender_username='$user_name'");
 $update_receiver = mysqli_query($con, "UPDATE users_chats SET receiver_username='$user_name_new' where  receiver_username='$user_name'");
		 
		 $update = "update users set user_name = '$user_name_new', user_email = '$email_new', Position = '$position_new' where User_id='$user_id'";
	

		 $run= mysqli_query($con, $update);

 if($run)
 {


 echo"<script>Swal.fire('$user_name updated')</script>";	
echo "<script>window.open('account_settings.php, '_self')</script>";


 }
reload();
			}

			?>
		</div>
		<div class="col-sm-2">
		</div>
	</div>
</body>
</html>
<?php } ?>
<?php

$emailname="";
$emailname=$_SESSION['user_email'];

$con = mysqli_connect("localhost", "root", "", "wigalcom");

$user = "select * from users";

$run_user =mysqli_query($con, $user);

echo "<div><p class='email'> $emailname </p></div>";
while ($row_user= mysqli_fetch_array($run_user))
 {

	$user_id = $row_user['User_id'];
	$user_name = $row_user['user_name'];
	$user_profile = $row_user['user_profile'];
	$login = $row_user['log_in'];
	$user_email = $row_user['user_email'];


if ($emailname==$user_email)
 {
	continue;
	# code...
}


	


	echo "
<li>

     <div class='chat-left-img'>
		<img src='$user_profile'>
		</div>
		<div class='chat-left-detail'>
		<p> <a href='home2.php?user_name=$user_name'>$user_name</a></p>";

if ($login=='Online')
{
	

	echo"<span ><i class='fa fa-circle' aria-hidden='true'></i><h9 class='on'> Online</h9></span>";
	# code...
}
else
{

echo"<span class='on'><i class='fa fa-circle-o' aria-hidden='true'></i><h9> Offline </h9></span>";
}

"
  	</div>
</li>

";

  }


?>

<?php

$con = mysqli_connect("localhost", "root", "", "wigalcom") or die("connection failed");

function search_user(){

	global $con;

	if (isset($_GET['search_btn'])) 
	{
		$search_query = htmlentities($_GET['search_query']);
		$get_user = "select * from users where user_name like '%$search_query%' or user_id like '%$search_query%'";

	}
	else 
	{
$get_user = "SELECT * from users order by user_id, user_name ASC ";
    }

    $run_user = mysqli_query($con, $get_user);

while ($row_user=mysqli_fetch_array($run_user)) 
{
	$user_name = $row_user['user_name'];
	$user_profile = $row_user['user_profile'];
	$position = $row_user['Position'];
	$user_email = $row_user['user_email'];
	


$me="";
$me=$_SESSION['user_email'];
if ($me==$user_email) {
	continue;
	# code...
}


	//dispaly infor

	echo "

<div class='card' style='align=right'>
<img src='$user_profile'>
<h1>$user_name</h1>
<p class='title'>$position</p>
<form method='post'>
<p class='chat'><button name='add'>Chat with $user_name</button></p>
</form>
</div><br><br>

	";

	if (isset($_POST['add'])) 
	{
echo"
<script>window.open('home2.php?user_name=$user_name', '_self')</script>";

		
	}
}
	
}

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<div><label class="fa fa-cogs"   style='color:white; font-size:40px;'></label>
     	<a class="navbar-brand" >
		<?php
           $user = $_SESSION['user_email'];
           $get_user = "select * from users where user_email='$user'";
           $run_user = mysqli_query($con, $get_user);
           $row = mysqli_fetch_array($run_user);

 
           $user_name = $row['user_name'];
           echo" <a  style='float:left; color: #2a5d84; font-size:40px; ' class='fa fa-dashcube' href='../home2.php?user_name=$user_name'><u>MyChat</u></a>"; 
		?>
   </a>
   </div>
		</nav>
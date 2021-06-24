<!DOCTYPE html>

<?php 
session_start();
include("include/connection.php");

if (!isset($_SESSION['user_email'])) {
	header("Location:index.php");
	# code...
}
else { ?>
	
<html>
<head>
	<?php
function resend(){
	echo '
	<meta http-equiv="refresh" content="0">';
}
?>
	<title> Wigal Chat App</title>

	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
   <meta name="viewport" content="width=1280, initial-scale=1">

		 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="css/home2.css">
<!-- Latest compiled JavaScript -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



</head>
<body>
	
<?php			
				
$conn = mysqli_connect("localhost", "root", "", "wigalcom");

		$get_username = $_SESSION['user_email'];
		$get_user = "select * from users where user_email='$get_username'";

		$run_user = mysqli_query($conn, $get_user);
		$row_user = mysqli_fetch_array($run_user);

		$username = $row_user['user_name'];
		$_SESSION['username'] = $row_user['user_name'];
		$user_profile_image = $row_user['user_profile'];
        $profile_user =  $row_user['user_name']; 

 ?>


	<div class="container main-section">

<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
  <div>
 			<div class="right-sliderbar-img" >
	<img src="<?php echo"$user_profile_image"; ?>"><br><br>
	<br><br> &nbsp;&nbsp;<label><?php echo"$profile_user"?></label>
			</div>		
</div><br>
 	
		<li><i ><a style="font-size: 20px;" class="fa fa-cogs" href="include/account_settings.php"> Account</a></i></li><br>
		<li><i><a style="font-size: 20px;" class="fa fa-search" href="find_friends.php"> Search Users</a></i></li><br><br>	
		<br><li><i><a style="font-size: 20px; " class="fa fa-admin"  href="about.html"><i class="fa fa-info-circle" aria-hidden="true"></i>
About</a></i></li>	

</div>
		<div class="row">
			<div  class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
			<div class="input-group searchbox">
               <button class="w3-button w3-teal w3-xlarge"  onclick="w3_open()">☰</button>
				<div><img  class="logo" src="./images/wigal.png"></div>
				<div class="input-group-btn">
					<center><a href="find_friends.php"><button id="search" class="btn btn-default search-icon" name="search-user" type="submit">search user <i class="fa fa-search"></i> </button></a></center>

					
				</div>
			</div>
			<div class="left-chat">
				<ul>
					<?php include("include/get_user_data.php"); ?>
				</ul>
			</div>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
			<div class="row">
				<!-- getting the user datails-->
				<?php
				$user = $_SESSION['user_email'];
				$get_user = "select * from users where user_email='$user'";
				$run_user = mysqli_query($con, $get_user);
				$row = mysqli_fetch_array($run_user);

				$user_id = $row['User_id'];
				$user_name =$row['user_name'];

               $_SESSION['user_name']=$row['user_name'];

				?>
				<!-- getting user data on which user click -->
				<?php
				    	
                if(isset($_GET['user_name'])){
					global $con;

					$get_username = $_GET['user_name'];
					$get_user = "select * from users where user_name='$get_username'";

					$run_user = mysqli_query($con, $get_user);
					$row_user = mysqli_fetch_array($run_user);

					$username = $row_user['user_name'];
					$_SESSION['username'] = $row_user['user_name'];
					$user_profile_image = $row_user['user_profile'];
					
				 }


					$total_messages = "select * from users_chats where (sender_username ='$user_name' AND receiver_username='$username') OR (receiver_username='$user_name' AND sender_username='$username')";
					$run_messages = mysqli_query($con, $total_messages);
					$total= mysqli_num_rows($run_messages);

				?>
				<div class="col-md-12 right-header">
					<div class="right-header-img">
						<img src="<?php echo"$user_profile_image"; ?>">
					</div>
					<div class="right-header-detail">
						<form method="post">
							<p><?php echo "$username"; ?></p>
							<span><label style="background-color: orange; padding: 5px; border-radius: 90px; color: white;"><?php echo $total; ?></label> messages</span>&nbsp; &nbsp;
							<button name="logout" class="btn btn-danger">logout</button>

		                </form>

					<!--  logout button-->

						<?php
				      	 	if (isset($_POST['logout'])) {
								 $update_msg = mysqli_query($con, "UPDATE users set log_in='offline' WHERE user_email='$user'");
					            header("Location:logout.php");
				 
					            exit();
					      	 	}
      	 	?>
					</div>
				</div>
			</div>
			<div class="row">
				<div id="scrolling_to_bottom" class="col-md-12 right-header-contentChat">
	

				</div>
			</div>
		
			<!-- script ------------------------------------->
 <script type="text/javascript">


    	function reload()
    	{

xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET", "load-messages.php", false);
xmlhttp.send(null);
document.getElementById("scrolling_to_bottom").innerHTML=xmlhttp.responseText;

    	}
reload();
 setInterval(function(){
 	reload();
 	


 }, 2000);



    </script>
			<div class="row">
			<div class="col-md-12 right-chat-textbox">
				<form method="post">
					<!-- text field to type message-->
       		        <input autocomplete="off" type="text" name="msg_content" placeholder="write your maessage.........">
       		        <!--   button to send message-->
       		         <button  class="btn" name="submit"><i class="fa fa-telegram" aria-hidden="true"></i></button>

				</form>
				<!-- the plugin for the video, audio n file-->
<nav class="menu">
   <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open" />
   <label class="menu-open-button" for="menu-open">
    <span class="lines line-1"></span>
    <span class="lines line-2"></span>
    <span class="lines line-3"></span>
  </label>


   <a href="https://www.sharedrop.io/" onclick="window.open('https://www.sharedrop.io/', 'newwindow', 'width=700,height=500'); return false;" class="menu-item blue"> <i class="fa fa-file"></i> </a>

   <a href="http://localhost:9000"  onclick="window.open('http://localhost:9000', 'newwindow', 'width=900,height=700'); return false;" class="menu-item green"> <i class="fa fa-video-camera"></i> </a>
   <a href="#" class="menu-item lightblue"> <i class="fa fa-microphone"></i> </a>
</nav>

			</div>
		</div>
	</div>
</div>
<!-- vlidating message -->
  <?php 
	 if (isset($_POST['submit'])) 
	 {
	 	
			 $msg = htmlentities($_POST['msg_content']);
   				if($msg =="")
   				{
   				 echo "
		               <div class='alert alert-danger'>
		 			  <strong><center>Message was unable to send (empty)</center></strong>  
		               </div>
		                   ";
		               }

     else if(strlen($msg) > 100)
     {
			echo "
			  <div class='alert alert-danger'>
			    <strong><center>Message is too long. use only 100 charactors </center></strong>
			  </div>

			  ";
      }
     else{



			      $insert = "insert into users_chats(sender_username, receiver_username, msg_content, msg_status, msg_date) values ('$user_name', '$username', '$msg', 'unread', NOW())";


			    $run_insert = mysqli_query($con, $insert);
			   

			    
			     }
	      }
     
     ?>
    <!-- scroll bar for the chat content-->

   <script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>


<script type="text/javascript">
	
	$('#btn').click(function(){
		
		$('#menu').toggle('fast');
	});

</script>


 
	<script type="text/javascript">
		$(document).ready(function(){
		$('#scrolling_to_bottom').animate({
		scrollTop: $('#scrolling_to_bottom').get(0).scrollHeight}, 10);
//
			var height = $(window).height();
			$('.left-chat').css('height', (height - 92) + 'px');
			$('.right-header-contentChat').css('height', (height - 163) + 'px');
		});
	</script>
<script type="text/javascript">
var siteWidth = 1280;
var scale = screen.width /siteWidth
document.querySelector('meta[name="viewport"]').setAttribute('content', 'width='+siteWidth+', initial-scale='+scale+'');
</script>


</body>
</html>
<script ></script>
<?php } ?>
<?php
session_start();
include("include/connection.php");

              $user = $_SESSION['user_email'];

  			 $user_name	=  $_SESSION['user_name'];
			 $username  =  $_SESSION['username']; 
			 


			 	
					$update_msg = mysqli_query($con, "UPDATE users_chats SET msg_status='read' WHERE sender_username ='$username' AND receiver_username='$user_name'");
					#selecting messages from the data db

					$sel_msg = "select * from users_chats where (sender_username='$user_name' AND receiver_username='$username') OR (receiver_username='$user_name' AND sender_username='$username') ORDER by 1 ASC";

					$run_msg = mysqli_query($con, $sel_msg);

					while ($row = mysqli_fetch_array($run_msg))
					 {
#retreiving details 
						$sender_username = $row['sender_username'];
						$receiver_username =$row['receiver_username'];
					    $msg_content = $row['msg_content'];
					    $msg_date = $row['msg_date'];    
			 	?>


					<ul class="back">
						<!-- chatting from the sender n the receiver -->
		       	<?php
					if($user_name == $sender_username AND $username ==$receiver_username )
					  {
					echo "
					<li>
					     <div class='rightside-right-chat'>
					        <span> $sender_username<small> $msg_date</small> </span><br><br>
					        <p>$msg_content</p>
					    </div>
					</li>

					";
				}
		        	else if($user_name == $receiver_username AND $username == $sender_username )
						{

							echo "
							<li>
							     <div class='rightside-left-chat'>
							        <span> $sender_username<small> $msg_date</small> </span><br><br>
							        <p>$msg_content</p>
							    </div>
					        </li>


							";
                      }   

             
	      ?>
	
    </ul>
    <?php
 			  }
	?>





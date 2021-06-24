

<?php
$color ="";

if(isset($_POST['submit'])){
 
$color = $_POST['color'];
echo $color;


}

?>

<!DOCTYPE html>
<html>
<head>
	<title>lean</title>
	<script type="text/javascript" src="jquery.js"></script>

	<style type="text/css">
	.table, .table td {
		border: 1px solid black;
		background-color: <?php echo $color . ";" ;?>


	}

	.highlight{

		background-color: orange;
	}

		

	</style>
	
	
</head>
<body>

	<table class="table">
		<tr>
			<td>Home</td>
			<td>Pages</td>
			<td>History</td>
			<td>Navigation</td>

		</tr>

	</table>

	<input style="color: white;  float: right; background-color: darkblue;" type="button" id="btn" value="menu">


	<div class="mian" style="display: none; float: right; background-color: orange; height: 300px; width: 100px;" id="menu">
						
							
				<li><i><a href="#">home</a></i></li>
				<li><i><a href="#">about</a></i></li>		
	</div>


	<iframe src="index.php"></iframe><br>

	<input type="button" id="toggle_message" value="hide">
	<p id="message">h</p><br>




<form method="post">
	<input type="text" name="color" value="<?php echo $color; ?>">
	<button type="submit" name="submit">change</button>

</form>

	<a href="http://www.google.com">google</a><br><br>

<input type="text" id="search_box" name=""><br>

<ul id="name">
	<li>frank sowah</li>
	<li>dela nelson</li>
	<li>jamah sowah</li>
	<li>randy edem</li>

</ul>

<script type="text/javascript">
	$(document).ready(function() {
		$('#search_box').keyup(function() {
     search_box= $(this).val();

      $('#name li').removeClass('highlight');

if (jQuery.trim(search_box)!== '') {
     $("#name li:contains('" + search_box + "')").addClass('highlight');

}

		});



	});

</script>










<script type="text/javascript">
	$(document).ready(function(){
	

</script>



<script type="text/javascript">
	
	$('#btn').click(function(){
		var click_value = $('#btn').attr('value');
		$('#menu').toggle('fast');
	
	if (click_value == 'menu') {
		$('#btn').attr('value', 'here');

	} else if(click_value == 'here'){
       $('#btn').attr('value', 'menu');

	}


	});

</script>


<script type="text/javascript">
	$('p').text('hello hey');

</script>



<script type="text/javascript">
var count = $('*').find('p').length;

</script>


<script type="text/javascript" >
$('#toggle_message').click(function(){
 var get_value = $('#toggle_message').attr('value');
 $('#message').toggle('fast');
 
	if (get_value == 'hide'){
		 $('#toggle_message').attr('value', 'show');
		 $('#message').hide();
	}else if (get_value == 'show') {
		$('#toggle_message').attr('value', 'hide');
	    $('#message').show();
	}

	});
</script>



</body>
</html>
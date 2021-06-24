<!DOCTYPE html>
<html>
<head>
	<title>Video Call</title>
</head>
<body>
	<video id="video"> </video>
	<canvas id="canvas"></canvas><br>
	<button onclivk="snap();">snap</button>
	<script type="text/javascript">
		
		var video = document.getElementById('video');
		var canvas =  document.getElementById('canvas');
		var context =  canvas.getContext('2d');

		navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.oGetUserMedia || navigator.msGetUserMedia;

		if(navigator.getUserMedia){

			navigator.getUserMedia({video:true}, streamWebCam, throwError);
		}

		function streamWebCam(stream) {
			video.src = window.URL.createObjectURL(stream);
			video.play();
			// body...
		}

		function throwError(e){

			alert(e.name);
		}
		function snap (){

			canvas.width = video.clientWidth;
			canvas.height = video.clientheight;
			canvas.drawImage(video, 0, 0);


		}

	</script>

</body>
</html>
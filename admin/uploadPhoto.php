<?php
	$message = '';
	if(isset($_POST['upload']))
	{
		$photo = $_FILES['photo'];
		if($photo && !$photo['error'])
		{
			$name = $photo['name'];
			$type = $photo['type'];
			$path = $photo['tmp_name'];
			$bytes = file_get_contents($path);
			add_photo($name, $type, $bytes);
			$msg = "<div class = 'alert alert-success' style = 'width: 265px;'>New photo has been uploaded.</div>";			
			echo "<script>";
			//go back to viewPhotos page after 3 seconds.
				echo "setTimeout(function(){ document.location = '?p=viewAdmin'; }, 2000);";
			echo "</script>";
		}
		else
		{
			$msg = "<div class = 'alert alert-warning' style = 'width: 265px;'>Invalid File!</div>";
		}
	}
	
	$photos = get_photos();
?>

<html>
<body>
	<div class="container">
	  <div class="row col-md-4">
	   <div class="box">
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input type="file" name="photo" />
				</div>
				<div class="form-group">
					<button class="btn" name="upload">Upload</button>
				</div>
			</form>
			<?php echo $msg; ?>
		</div>
	</div>
  </div>
</body>
</html>
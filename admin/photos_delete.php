<?php
	$message = '';
	
	//we use $_GET because data input came from the URL
	if(isset($_GET['id']))
	{
		$id = trim($_GET['id']);
		$photos = photos_find($id);
		if($photos)
		{
			photos_delete($id);
			$message = "<div class = 'alert alert-success' style = 'width: 350px;'>Selected photo has been successfully deleted.</div>";			
			echo "<script>";
			//go back to viewPhotos page after 3 seconds.
				echo "setTimeout(function(){ document.location = '?p=viewPhotos'; }, 2000);";
			echo "</script>";
		}
		else
		{
			$message = '<b class="text-warning">The specified photos cannot be found.</b>';
		}
		
	}
?>

<html>
<head>
	<title>Delete Photos</title>
</head>
<body>
	<div class="container">
		<p>
			<?php echo $message; ?>
		</p>
		<!--<script>
			//go back to notes list page after 3 seconds.
			
			setTimeout(function(){ document.location = 'viewPhotos.php'; }, 2000);
		</script>-->
	</div>
</body>
</html>
<?php
	$message = '';
	
	//we use $_GET because data input came from the URL
	if(isset($_GET['id']))
	{
		$id = trim($_GET['id']);
		$comments = comments_find($id);
		if($comments)
		{
			comments_delete($id);
			$message = "<div class = 'alert alert-success' style = 'width: 300px;'>Selected comment has been deleted.</div>";
			echo "<script>";
			//go back to viewComments page after 3 seconds.
				echo "setTimeout(function(){ document.location = '?p=viewComments'; }, 2000);";
			echo "</script>";
		}
		else
		{
			$message = $message = "<div class = 'alert alert-success' style = 'width: 300px;'>The specified comment cannot be found.</div>";
		}
	}
?>

<html>
<head>
	<title>Delete Comments</title>
</head>
<body>
	<div class="container">
	
		<h4>Delete Comments</h4>
			<?php echo $message; ?>		
	</div>
</body>
</html>
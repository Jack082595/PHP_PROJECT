<?php	
	$message = '';
	$title = '';
	
	if(!isset($_GET['id']))
	{
		//note id is not specified go back to notes-list page
		header('location: ?p=viewComments');
		exit();
	}
	
	$id = intval($_GET['id']);
	
	//check if button submit is clicked
	if(isset($_POST['submit']))
	{
		$name = trim($_POST['name']);
		$comment = trim($_POST['comment']);
		
		if($name != '' and $comment!= '')
		{
			comments_update($id, $name, $comment);
			$message = "<div class = 'alert alert-success' style = 'width: 300px;'>Selected comment has been updated.</div>";
			echo "<script>";
			//go back to viewComments page after 3 seconds.
				echo "setTimeout(function(){ document.location = '?p=viewComments'; }, 2000);";
			echo "</script>";
		}
		else
		{
			$message = "<div class = 'alert alert-success' style = 'width: 300px;'>Please input name and comments..</div>";
		}
	}
	else 
	{
		//if not submitted we retrieve the data from the database
		$comments = comments_find($id);
		if($comments)
		{
			$name = $comments['name'];
			$comment = $comments['comments']; 
		}
		else
		{
			$message = '<b class="text-error">The specified note record cannot be found.</b>';
		}
	}
?>
<html>
<head>
    <title>Edit Comments!</title>
</head>
	<body>
		<div class="container">
			<h4>Edit Comments</h4>
			<form method="post">
				<div class="form-group">
					<label>Name:</label>
					<input class="form-control" type="text" name="name" value="<?php echo htmlentities($name); ?>" /></label>
				</div>
				<div class="form-group">
					<label>Comments:</label>
					<textarea name="comment" class="form-control" rows="5"><?php echo htmlentities($comment); ?></textarea>
				</div>
				<br>
				<button class="btn" type="submit" name="submit"><i class="glyphicon glyphicon-floppy-disk"> </i> Save</button>
			</form>
			<?php echo $message; ?>
			
		</div>
	</body>
	</html>
		
		
		
        <!-- /.container -->
    </nav>
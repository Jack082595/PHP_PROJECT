<?php
	session_start();
	include('db.php');
	
	$page = 'viewPhotos';
	if(isset($_GET['p']))
		$page = trim($_GET['p']);
	$content = $page.".php";
	
	if(!file_exists($content))
	{
		$content = "viewPhotos.php";
		$page = "viewPhotos";
	}
	
	if(isset($_GET['l']))
	{
		logout();
		header('Location: index.php');
		
	}
	
?>
<html>
  <head>
    <title>Administrator Page</title>
		<link href="bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet" />
		<script src="bootstrap/js/jquery.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>
		
	<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

		<style>

		</style>
  </head>
  <body>
    <!-- Navigation -->
		<div class = "container">
			<nav class = "navbar navbar-default">
				<div class = "container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>                        
						</button>
						<a class="navbar-brand" href="?p=login" style = "color: #AB3334;">Admin</a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class = "nav navbar-nav">
							<li><a href ="?p=photosManager">Photos Manager</a></li>
							<li><a href ="?p=commentsManager">Comments Manager</a></li>
							 <ul class="nav navbar-nav navbar-right">
								<li><a href="?l=true">Log out</a></li>
							</ul>
						</ul>
					</div>
				</div>	
			</nav>
			<div>
				<?php echo $msg; ?>
			</div>
			
			<div class = "main-content">
				<?php include_once($content); ?>
			</div>
    </header>
  </body>
</html>

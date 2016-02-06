<?php
	include '../db.php';
	if($_SESSION['isloginAdmin'] == true)
	{
		$page = 'slideshow';
		if(isset($_GET['p']))
			$page = trim($_GET['p']);
		$content = $page.".php";
		
		if(!file_exists($content))
		{
			$content = "slideshow.php";
			$page = "slideshow";
		}
		
		if(isset($_GET['l']))
		{
			logout();
			header('Location:../');
			
		}
	}
	else
	{
		header('Location:../');
	}
	
?>

<html>
<head>

    <title>Welcome Admin</title>
		<link href="../bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet" />
		<script src="../bootstrap/js/jquery.js"></script>
		<script src="../bootstrap/js/bootstrap.js"></script>
		
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
    <!-- Custom CSS -->
    <link href="../css/admin-home.css" rel="stylesheet"/>
	<style>
			body 
			{	
				background:url(../images/me.jpg); 
				background-position: center;
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-size:cover;
			}
	</style>
</head>
<body>
			
    <div class="brand"><font style="color:black;">Jack Rosios</font></div>
    <div class="address-bar"><font style="color:skyblue;">Lower Tabucanal Poblacion Pardo Cebu City</font></div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Admin</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						<i class="glyphicon glyphicon-film"> </i> Photos Manager<span class="caret"></span></a>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="?p=viewPhotos"><i class="glyphicon glyphicon-th-list"> </i>&nbsp;&nbsp;View Photos</a></li>
							<li class="divider"></li>
							<li><a href="?p=uploadPhoto"><i class="glyphicon glyphicon-plus"> </i>&nbsp;&nbsp;Upload photo</a></li>
						  </ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						<i class="glyphicon glyphicon-th-list"> </i> Comments Manager<span class="caret"></span></a>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="?p=viewComments"><i class="glyphicon glyphicon-th-list"> </i>&nbsp;&nbsp;View Comments</a></li>
						  </ul>
					</li>
					<li>
                        <a href="?l=true"><i class="glyphicon glyphicon-off"> </i>Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	<div class="container">
		<div class="row">
			<?php include_once($content); ?>
		</div>
	</div>	
    <footer style="margin-top:150px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Jack P. Rosios BSIT - 3 2015</p>
                </div>
            </div>
		</div>
    </footer>
</body>

</html>

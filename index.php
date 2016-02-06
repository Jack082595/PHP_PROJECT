<?php
	include('db.php');
	
	$page = 'login';
	if(isset($_GET['p']))
		$page = trim($_GET['p']);
	$content = $page.".php";
	
	if(!file_exists($content))
	{
		$content = "login.php";
		$page = "login";
	}
	
	if(isset($_GET['l']))
	{
		logout();
		header('location: ./');
		
	}
	
?>
<html>
  <head>
    <title>Login Page</title>
		<link href="bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet" />
		<script src="bootstrap/js/jquery.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>
		
    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

		<style>
			.form-signin {
			max-width: 330px;
			padding: 15px;
			margin: 0 auto;
			}
			
			.form-signin .checkbox {
			font-weight: normal;
			}
			
			.form-signin .form-control {
			  position: relative;
			  height: auto;
			  -webkit-box-sizing: border-box;
				 -moz-box-sizing: border-box;
					  box-sizing: border-box;
			  padding: 10px;
			  font-size: 16px;
			}
			
			.form-signin .form-control:focus {
			z-index: 2;
			}
			
			.form-signin input[type="email"] {
			  margin-bottom: -1px;
			  border-bottom-right-radius: 0;
			  border-bottom-left-radius: 0;
			}
			
			.form-signin input[type="password"] {
			  margin-bottom: 10px;
			  border-top-left-radius: 0;
			  border-top-right-radius: 0;
			}
	
			body 
			{	
				background:url(images/me.jpg); 
				background-position: center;
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-size:cover;
			}
			
			.box{
				margin:0 auto; 
				padding:10px 0 10px 0; 
				background-color:#3399ff; 
				border: #fff 2px solid; 
				padding:24px; 
				filter:alpha(opacity=10); 
				-moz-opacity=.7; 
				opacity:.9; 
				border-radius:20px;
			}
			
			
			.form-group {
				max-width: 330px;
				padding: 15px;
				margin: 0 auto;
			}
			hr{max-width: 330px;}
			.comment {color:black;}
			.date {font-size:1.0em;color:green;}
			.name {color:blue;} 
			
			.navbar-nav{
				display:table;
				float:none;
				margin:0 auto;
				table-layout:fixed;
				font-size:1.25em;
				text-transform:uppercase;
				letter-spacing:3px;
			}
			
			.navbar-default {
				border: none;
				background: #fff;
				background: rgba(255,255,255,0.9);
			}
		   .nav>li>a {
				padding:10px;
			}
			@media screen and (min-width: 768px){
			.navbar-header {
				display: none;
			}
		}
		</style>
  </head>
  <body>
    <!-- Navigation -->
		<nav class = "navbar navbar-default" role="navigation">
			<div class = "container">
				<!--<div class = "container-fluid">-->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>                        
						</button>
						<!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
						<a class="navbar-brand" href="#">Jack</a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav">
							<li><a href ="?p=login">Home</a></li>
							<li><a href ="?p=personal">Personal Information</a></li>
							<li><a href ="?p=education">Educational Background</a></li>
							<li><a href ="?p=photos">Photos</a></li>
							<li><a href ="?p=about">About</a></li>
							<li><a href ="?p=contact">Contact</a></li>
						</ul>
					</div>	
			</div><!-- end of container -->
		</nav>
		<?php if ($content == "login.php"): ?> 
			<div class="container">
				<div class="row">
						<?php include_once($content); ?>
				</div>
			</div>

		<?php else: ?>
			<div class="container">		
				<div class="row">
						<?php include_once($content); ?>
				</div>
			</div>
		<?php endif; ?>

		<footer>
			<div class="container">
				<div class="row">
					<div class="navbar-inverse navbar-fixed-bottom" role="navigation">
						<div class="container-fluid">
						<p><center><font style="color:white;">Rosios, Jack P BSIT - 3 &nbsp;&copy; 2015</center></p></font>
						</div>
					</div>	
				</div>
			</div>
		</footer>
  </body>
</html>

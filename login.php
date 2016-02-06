<?php
	ob_start();
	if(isset($_SESSION['isloginAdmin']) && $_SESSION['isloginAdmin'] == true)
		header('Location: admin');    /*It can't be back to the login page once you are log-in and redirect you to admin page */
	
	$msg = '';
	$username = '';
	$password = '';
	
	if(isset($_POST['login']))
	{
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		
		if(login_admin($username,$password))
		{
			if($_SESSION['isloginAdmin'] == true)
			header("location: admin");
		}
		else
		{
			$msg = '<code>Invalid login!</code>';
			header('Refresh: 1');
		}
	}
?>   

   <header id="top" class="header">
        <div class="text-vertical-center">
			  <form class="form-signin" method="post">
				<h2><font style="color:white;">Sign in</font></h2>
				<label for="inputEmail" class="sr-only">Username</label>
				<input type="username" name="username" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
				<div class="checkbox">
				  <label>
					<input type="checkbox" value="remember-me"><font style="color:white;">Remember me</font>
				  </label>
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
			  </form>
			
			<div>
				<?php echo $msg; ?>
			</div>
			
			<div class="navbar-inverse navbar-fixed-bottom" role="navigation">
				<div class="container-fluid">
					<p><center><font style="color:white;">Rosios, Jack P BSIT - 3 &nbsp;&copy; 2015</center></p></font>
				</div>
			</div>	
        </div>
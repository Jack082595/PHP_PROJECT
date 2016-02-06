<?php
	if(isset($_POST['post']))
	{
		$user = trim($_POST['name']);
		$comments = trim($_POST['comments']);
		if(!empty($user) AND !empty($comments))
		{
			add_comment($page, $user, $comments);
		}
	}
	$comments = get_comments($page);
	
?>


<html>
	<head>
		<title>Contact</title>
		<style>
			td{width:120px;}
			.form-group {
				max-width: 330px;
				padding: 15px;
				margin: 0 auto;
			}
			.comment {color:black;}
			.date {font-size:1.0em;color:green;}
			.name {color:blue;} 
		</style>
	</head>
	<body>
		<div class="box text-center">
		<table border="0" align="center" height="150px">
		<caption><b><font style="color:green;">&nbsp;&nbsp;&nbsp;#For more informations, here are my contact details!</font></b></caption>
			<tr>
				<td><center><b>Address</b></center></td>
				<td>Lower Tabucanal Pardo Cebu City</td>
			</tr>
		
			<tr>
				<td><center><b>Contact No:</b></center></td>
				<td>+639239074598
			</tr>
			
			<tr>
				<td><center><b>Email:</b></center></td>
				<td>rosiosjack@gmail.com</td>
			</tr>
			
			<tr>
				<td><center><b>Website:</b></center></td>
				<td>www.rjaxs.com</td>
			</tr>
		
		</table>
		
		<form method="post">
					<div class="form-group">
						<h3>Comments:</h3>
						<input class="form-control" type="text" placeholder="Your Name" name="name" required="required" maxlength="50"/>
					</div>
					<div class="form-group">
						<textarea class="form-control" type="text" placeholder="Your Comment" name="comments" required="required" maxlength="255"/></textarea>
					</div>
					<div class="form-group">
						<!--<input type="text" name="name" required="required" placeholder="Your Name" maxlength="50" />-->
						<!--<input type="text" name="comments" required="required" placeholder="comments" maxlength="255" size="60" />-->
						<center><button class="btn" type="submit" name="post"><i class="glyphicon glyphicon-floppy-disk"></i>Post</button></center>
						<!--<input type="submit" name="post" value="post" />-->
					</div>
					
					<div style="height:400px;overflow-y:auto;">
						<?php foreach($comments as $c): ?>
						<div>
							<hr/>
							<div>						
								<div class="name">
									<?php echo htmlentities($c['name']); ?>
								</div>
								<div class="date">
									<?php echo htmlentities($c['date']); ?>
								</div>
							</div>
							<div class="comment">
								<?php echo htmlentities($c['comments']); ?>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
			</form>	
			</div>
		</div>
	</body>
</html>

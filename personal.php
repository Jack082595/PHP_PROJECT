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
		<!--<style>
			.form-group {
				max-width: 330px;
				padding: 15px;
				margin: 0 auto;
			}
			hr{max-width: 330px;}
			.comment {color:black;}
			.date {font-size:1.0em;color:green;}
			.name {color:blue;} 
		</style>-->
	</head>
	<body>
	<div class="col-lg-12">
		<div class="box text-center">
		<table border="0" height="400" align="center">
		<caption><b><font style="color:green;">&nbsp;&nbsp;&nbsp;Personal Information:</font></b></caption>
			<tr>
				<td align="center"><img src='images/profile.jpg' width=85px height=80px style="border-radius:45px;"></td>
			</tr>
			<tr>
				<td><center><b>Name:</b></center></td>
				<td>Jack P. Rosios</td>
			</tr>
		
			<tr>
				<td><center><b>Age:</b></center></td>
				<td>19 yrs.old</td>
			</tr>
		
			<tr>
				<td><center><b>BirthDate:</b></center></td>
				<td>August 25,1995</td>
			</tr>
			
			<tr>
				<td><center><b>Birthplace:</b></center></td>
				<td>Patin-ay Agusan Del Sur</td>
			</tr>
		
			<tr>
				<td><center><b>Gender:</b></center></td>
				<td>Male</td>
			</tr>
		
			<tr>
				<td><center><b>Address:</b></center></td>
				<td>Lower Tabucanal Poblacion Pardo Cebu City</td>
			</tr>
			
			<tr>
				<td><center><b>Status:</b></center></td>
				<td>Single</td>
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
				</div>
			</form>	
		</div>
	</div>
</div>

	</body>
</html>

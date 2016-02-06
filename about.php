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
	<div style="width:100%; margin:0 auto; padding:10px 0 10px 0; background-color:#3399ff; border: #fff 2px solid; padding:24px; filter:alpha(opacity=10); -moz-opacity=.7; opacity:.9; border-radius:20px;">
		<table border="0" width="520" height="200" align="center">
		<caption><b><font style="color:green;">&nbsp;&nbsp;&nbsp;About the Site</font></b></caption>
			<tr>
				<td>
					<p style="letter-spacing:2px;">&nbsp;&nbsp;&nbsp;Good day everyone! I'm Jack P. Rosios, 19 yrs.old , student of University Of Cebu -  Main Campus taking Bachelor of Science in Information Technology. This<br/>
					 personal site is a requirement for the submission of our final project in PHP2. <br/>
					 &nbsp;&nbsp;&nbsp;The website is develop by the front-end such as HTML, CSS, JAVASCRIPT, and BOOTSTRAP.<br/>
					 The back-end is created through PDO.</p>
				</td>
		
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
	</body>
</html>

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
	$photos = get_photos();
?>

<html>
	<head>
		<style>
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
		<h1>My Album Collection</h1>
	
		<?php foreach($photos as $p): ?>			
			<img src="admin/photo.php?id=<?php echo $p['id']; ?>" height="150" width="150" class="photo" style="padding:10px 10px;"/>
		<?php endforeach; ?>
			
		<div class="album">
			<h3>#Having fun with my friends</h3>
			<div>
				<img src="images/18.jpg" height="60" class="photo" />
				<img src="images/19.jpg" height="60" class="photo" />
				<img src="images/20.jpg" height="60" class="photo" />
				<img src="images/21.jpg" height="60" class="photo" />
				<img src="images/30.jpg" height="60" class="photo" />		
				<img src="images/31.jpg" height="60" class="photo" />
			</div>
		</div>

		<div class="album">
			<h3>#Selfies:-)</h3>
			<div>
				<img src="images/6.jpg" height="60" class="photo" />
				<img src="images/7.jpg" height="60" class="photo" />	
				<img src="images/10.jpg" height="60" class="photo" />		
				<img src="images/8.jpg" height="60" class="photo" />		
				<img src="images/13.jpg" height="60" class="photo" />		
				<img src="images/profile.jpg" height="60" class="photo" />		
			</div>
		</div>
		
		<div class="album">
			<h3>#Overnights</h3>
			<div>
				<img src="images/1.jpg" height="60" class="photo" />
				<img src="images/2.jpg" height="60" class="photo" />			
			</div>
		</div>
		
		<div class="album">
			<h3>#ICT Congress 2k15:-)</h3>
			<div>
				<img src="images/3.jpg" height="60" class="photo" />
				<img src="images/4.jpg" height="60" class="photo" />	
				<img src="images/5.jpg" height="60" class="photo" />			
			</div>
		</div>
		<br/>
		<div id="big" class="hidden" onclick="preview(false);">
			
		</div>
		<div id="cover" class="hidden" onclick="preview(false);">
		
		</div>
		<script>
			function preview(show) 
			{
				var pane = document.getElementById('big');
				pane.innerHTML = '<center><img src="' + this.src + '" style="width:50%;height:50%;"/></center>';		
				var cover = document.getElementById('cover');
				if(show!==false) {
					pane.className = '';		
					cover.className = '';
				}
				else {
					pane.className = 'hidden';
					cover.className = 'hidden';
				}
				
			}
			var imgs = document.images;
			for(var i=0;i<imgs.length;i++)
			{
				if(imgs[i].className =='photo')
					imgs[i].onclick = preview;
			}
		</script>
	<div class="text-center">
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
</body>
</html>
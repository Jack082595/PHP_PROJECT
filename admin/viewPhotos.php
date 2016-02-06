<?php
	$photos = view_photos();
?>

<html>
<head>
	<title>Photos Manager</title>
</head>
<body>
<div class="container">
 <div class="row">
	<div class="box">
		 <div class="col-md-4">
			<h4>View All Photos</h4>
			<?php if(count($photos) > 0): ?>	
					<?php foreach($photos as $n): ?>
					<div>
						<a href="?p=photos_delete&id=<?php echo htmlentities($n['id']); ?>" onclick="return confirm('Are you sure to delete this?');">
							<i class="glyphicon glyphicon-trash"> </i>
						</a>
							<img src="photo.php?id=<?php echo $n['id']; ?>" height="200" width="200" class="photo" style="padding:20px 20px;">
					</div>
					<?php endforeach; ?>
					<?php else: ?>
						<div class="text-warning">You do not have entries yet.</div>
					<?php endif; ?>
		  </div>
		  <div class="col-md-8" style="margin-top:50px;">
			<div id="big" class="hidden" onclick="preview(false);"></div>
			<div id="cover" class="hidden" onclick="preview(false);"></div>
		  </div>	
	 </div><!--end of box-->
 </div>
</div>
	<div>
		<script>
			function preview(show) 
			{
				var pane = document.getElementById('big');
				pane.innerHTML = '<center><img src="' + this.src + '" style="width:70%;height:70%;border-radius:5em;" /></center>';		
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
	</div>
</body>
</html>
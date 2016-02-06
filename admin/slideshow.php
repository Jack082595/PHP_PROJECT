<html>
	<head>
		<!-- bjqs.css contains the *essential* css needed for the slider to work -->
		<link rel="stylesheet" href="../css/bjqs.css">
		<!-- demo.css contains additional styles used to set up this demo page - not required for the slider --> 
		<link rel="stylesheet" href="../css/demo.css">
		
		<!-- load jQuery and the plugin -->
		<script src="../css/js/jquery-1.7.1.min.js"></script>
		<script src="../css/js/bjqs-1.3.min.js"></script>	
	</head>
	<body>
	<div class="container">
			<div class="row">
				<div class="col-lg-4"></div>
					<div class="col-lg-8">
							<!-- Indicators -->
							<!--<ol class="carousel-indicators hidden-xs">
								<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
								<li data-target="#carousel-example-generic" data-slide-to="1"></li>
								<li data-target="#carousel-example-generic" data-slide-to="2"></li>
							</ol>-->
							<!-- Wrapper for slides -->
							<div id="banner-fade">
								<ul class="bjqs">
									<li><img src="../images/10.jpg" alt=""></li>
									<li><img src="../images/13.jpg" alt=""></li>
									<li><img src="../images/25.jpg" alt=""></li>
									<li><img src="../images/7.jpg" alt=""></li>
									<li><img src="../images/29.jpg" alt=""></li>
								</ul>
							</div>
					</div>
			</div>
		</div>
		<!-- /.container -->

					<script class="secret-source">
							jQuery(document).ready(function($) {
					
							$('#banner-fade').bjqs({
								height      : 420,
								width       : 420,
								responsive  : true
							});
					
							});
						</script>


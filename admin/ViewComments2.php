<?php
	session_start();
	include('logout.php');
	$comments = view_comment();
?>

<html>
<head>
	<title>Comments Manager</title>
	<link href="bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet" />
	<script src="bootstrap/js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
</head>
<body>

	<div class="container">
		
		
		<h4>View All Comments</h4>
		<hr/>
	
		<?php if(count($comments) > 0): ?>	
		<table border="0" class="table table-striped table-condensed table-bordered">
			<thead>
				<tr>
					<th width="60"></th>
					<th width="60">ID</th>
					<th width="200">Page</th>
					<th width="200">Name</th>
					<th width="200">Comments</th>
					<th width="200">Date</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($comments as $n): ?>
				<tr>
					<td>
						<a href="?p=comments_edit&id=<?php echo htmlentities($n['id']); ?>">
							<i class="glyphicon glyphicon-pencil"> </i>
						</a>
						<a href="?p=comments_delete&id=<?php echo htmlentities($n['id']); ?>" onclick="return confirm('Are you sure?');">
							<i class="glyphicon glyphicon-trash"> </i>
						</a>
					</td>
					<td><?php echo htmlentities($n['id']); ?></td>
					<td><?php echo htmlentities($n['page']); ?></td>
					<td><?php echo htmlentities($n['name']); ?></td>
					<td><?php echo htmlentities($n['comments']); ?></td>
					<td><?php echo htmlentities($n['date']); ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php else: ?>
		<div class="text-warning">You do not have entries yet.</div>
		<?php endif; ?>
		
	</div>
</body>
</html>
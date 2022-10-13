<?php require_once('include/session.php') ?>
<?php require_once('include/functions.php') ?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">   	
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/adminstyles.css"/>	
		<link rel="stylesheet" href="css/all.min.css"/>			
		<script src="js/jquery-3.6.0.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script> 
		<script src="js/all.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<title>Admin Dashboard</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="sidebar col-md-2">
					<h5 class="mt-2">Mind Blog</h5>
					<ul class="nav nav-pills flex-column nav-list">
						<li class="nav-item"><a class="nav-link active" href="dashboard.php">
						<span class="fas fa-home"></span>&nbsp;Dashboard</a></li>
						<li class="nav-item"><a class="nav-link" href="addnewpost.php">
						<span class="fas fa-file-alt"></span>&nbsp;Add New Post</a></li>
						<li class="nav-item"><a class="nav-link" href="categories.php">
						<span class="fas fa-tags"></span>&nbsp;Categories</a></li> 
						<li class="nav-item"><a class="nav-link" href="dashboard.php">
						<span class="fas fa-comment"></span>&nbsp;Comments</a></li>
						<li class="nav-item"><a class="nav-link" href="dashboard.php">
						<span class="fas fa-user"></span>&nbsp;Manage Admins</a></li>
						<li class="nav-item"><a class="nav-link" href="dashboard.php">
						<span class="fas fa-sign-out-alt"></span>&nbsp;Log Out</a></li>
					</ul> 
				</div>
				<div class="col-md-10">
					<h4 class="mt-2">About</h4>
					<div>
						<?php 
							echo error_message(); 
							echo success_message(); 					
						?>
					</div>
					<p> This is just a random paragraph. I hope you are doing remarkably well as
					a dummy paragraph. So I will sign out now. Goodbye</p>
					<p> This is just a random paragraph. I hope you are doing remarkably well as
					a dummy paragraph. So I will sign out now. Goodbye</p>
					<p> This is just a random paragraph. I hope you are doing remarkably well as
					a dummy paragraph. So I will sign out now. Goodbye</p>
					<p> This is just a random paragraph. I hope you are doing remarkably well as
					a dummy paragraph. So I will sign out now. Goodbye</p>
					<p> This is just a random paragraph. I hope you are doing remarkably well as
					a dummy paragraph. So I will sign out now. Goodbye</p>
					<p> This is just a random paragraph. I hope you are doing remarkably well as
					a dummy paragraph. So I will sign out now. Goodbye</p>
					<p> This is just a random paragraph. I hope you are doing remarkably well as
					a dummy paragraph. So I will sign out now. Goodbye</p>
					<p> This is just a random paragraph. I hope you are doing remarkably well as
					a dummy paragraph. So I will sign out now. Goodbye</p>
					<p> This is just a random paragraph. I hope you are doing remarkably well as
					a dummy paragraph. So I will sign out now. Goodbye</p>
					<p> This is just a random paragraph. I hope you are doing remarkably well as
					a dummy paragraph. So I will sign out now. Goodbye</p>
					<p> This is just a random paragraph. I hope you are doing remarkably well as
					a dummy paragraph. So I will sign out now. Goodbye</p>
					<p> This is just a random paragraph. I hope you are doing remarkably well as
					a dummy paragraph. So I will sign out now. Goodbye</p>
					<p> This is just a random paragraph. I hope you are doing remarkably well as
					a dummy paragraph. So I will sign out now. Goodbye</p>
					<p> This is just a random paragraph. I hope you are doing remarkably well as
					a dummy paragraph. So I will sign out now. Goodbye</p>
					<p> This is just a random paragraph. I hope you are doing remarkably well as
					a dummy paragraph. So I will sign out now. Goodbye</p>
					<p> This is just a random paragraph. I hope you are doing remarkably well as
					a dummy paragraph. So I will sign out now. Goodbye</p>					
				</div>
			</div>
		</div>
		<footer>
			<div class="footer-content">
				<p>MindBlog Ltd &copy; All Rights Reserved </p>
			</div>
		</footer>
	</body>
</html>

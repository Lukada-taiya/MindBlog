<?php require_once('include/db.php') ?>
<?php require_once('include/session.php') ?>
<?php require_once('include/functions.php') ?>
<?php
if(isset($_POST['submit'])) {
	$name = mysqli_real_escape_string($connection,$_POST['name']);  
	date_default_timezone_set("Africa/Abidjan");
	$current_time = Time();
	$datetime = strftime("%B-%d-%Y %H:%M:%S",$current_time);
	$creatorname = 'Hamid Tomson';
	
	if(empty($name)) {
		$_SESSION['error-message'] = "All fields are required";
		redirect("categories.php");
	}elseif(strlen($name) > 99) {
		$_SESSION['error-message'] = "Category name is too long";
		redirect("categories.php");
	}else { 
		global $connection;
		$query = "INSERT INTO category(name,datetime,creatorname) VALUES('$name','$datetime', '$creatorname')";
		$execute = mysqli_query($connection,$query);
		if($execute) {
			$_SESSION['success-message'] = "Category has been successfully created";
			redirect('categories.php');
		}else {
			$_SESSION['error-message'] = "Something went wrong";
			redirect('categories.php');
		}
	}
		
}	

?>
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
					<h4 class="mt-2">Mind Blog</h4>					
					<ul class="nav nav-pills flex-column nav-list">
						<li class="nav-item"><a class="nav-link" href="dashboard.php">
						<span class="fas fa-home"></span>&nbsp;Dashboard</a></li>
						<li class="nav-item"><a class="nav-link" href="addnewpost.php">
						<span class="fas fa-file-alt"></span>&nbsp;Add New Post</a></li>
						<li class="nav-item"><a class="nav-link active" href="categories.php">
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
					<h5 class="mt-2">Manage Categories</h5>	
					<div>
						<?php 
							echo error_message(); 
							echo success_message(); 					
						?>
					</div class="mb-2">				
					<form action="categories.php" method="post" class="category-form"> 
						<fieldset>
							<div class="form-group">
								<label for="name">Name:</label>
								<input name="name" id="name" class="form-control"/>
							</div>
							<div class="form-group mt-2">
								<button class="btn btn-success btn-sm" type="submit" name="submit">Add New Category</button>
							</div>
						</fieldset>
					</form> 
					<div class="table-responsive">
						<table class="table">
						<thead>
							<tr>
								<th>No.</th>
								<th>Name</th>
								<th>Creator</th>
								<th>Date Created</th>
							</tr>
						</thead>
						<tbody>
							<?php	
							global $connection; 
							$query = "SELECT * FROM category ORDER BY datetime DESC";
							$execute = mysqli_query($connection,$query);
							$sId = 0;
							while($data = mysqli_fetch_array($execute)) {
								$name = $data['name'];
								$creator = $data['creatorname'];
								$datetime = $data['datetime'];
								$sId++;
								$id = $sId;
							?> 
							<tr>
								<?php
									$html = "<td>$id</td><td>$name</td><td>$creator</td><td>$datetime</td>";
									echo $html;
								?>									
							</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div><!-- col-md-10 -->
			</div><!-- row -->
		</div><!-- container-fluid -->	
		<footer>
			<div class="footer-content">
				<p>MindBlog Ltd &copy; All Rights Reserved </p>
			</div>
		</footer>	
	</body>
</html>

<?php require_once('include/db.php') ?>
<?php require_once('include/session.php') ?>
<?php require_once('include/functions.php') ?>
<?php
if(isset($_POST['submit'])) {
	$id = $_GET['id'];
	$title = mysqli_real_escape_string($connection,$_POST['title']);
	$body = mysqli_real_escape_string($connection,$_POST['body']);  
	$image = $_FILES['image']["name"];
	$image_loc = "img/post/".basename($image); 
	date_default_timezone_set("Africa/Abidjan");
	$current_time = Time();
	$datetime = strftime("%B-%d-%Y %H:%M:%S",$current_time);
	$admin = 1;
	$category = $_POST['category']; 
	
	if(empty($title) || $category == 0 || empty($body)) {
		$_SESSION['error-message'] = "All fields are required";
		redirect("dashboard.php");
	}elseif(strlen($title) > 99) {
		$_SESSION['error-message'] = "Category name is too long";
		redirect("dashboard.php");
	}else { 
		global $connection;
		if(empty($image)) {		
			$query = "UPDATE post SET datetime='$datetime', title='$title',body='$body', category_id='$category'
			 WHERE id='$id'";
		}else {
			$query = "UPDATE post SET datetime='$datetime', title='$title',body='$body',image='$image', category_id='$category'
			 WHERE id='$id'";
		}
		$execute = mysqli_query($connection,$query); 
		move_uploaded_file($_FILES['image']['tmp_name'], $image_loc);
		if($execute) {
			$_SESSION['success-message'] = "Post has been successfully updated";
			redirect('dashboard.php');
		}else {
			$_SESSION['error-message'] = "Something went wrong";
			redirect('dashboard.php');
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
					<h5 class="mt-2">Edit Post</h5>	
					<div>
						<?php 
							echo error_message(); 
							echo success_message(); 					
						?>
					</div>	
					<?php	
							global $connection; 
							$idToEdit = $_GET['id'];
							$query = "SELECT post.id,post.title,post.body,post.image,post.datetime,category.name, category.id AS cId
							FROM post
							INNER JOIN category ON post.category_id = category.id WHERE post.id = $idToEdit";
							$execute = mysqli_query($connection,$query); 
							if($data = mysqli_fetch_array($execute)) {
								$title = $data['title'];
								$cat_id = $data['cId'];
								$category = $data['name']; 
								$image = $data['image']; 
								$body = $data['body'];
								//$id = $data['id']; 
							}
						?>  			
					<form class="mb-2" action="editpost.php?id=<?php echo $idToEdit ?>" method="post" enctype="multipart/form-data" class="post-form"> 						
						<fieldset>
							<div class="form-group">
								<label for="title">Title:</label>
								<input value="<?php echo $title ?>" name="title" id="title" class="form-control" placeholder="Enter 
								title"/>
							</div>
							<div class="form-group">
								<label for="image">Image:</label>
								<div class="mb-2">Current: <img src="img/post/<?php echo $image ?>" width="170px" height="80px"/></div>
								<input type="file" name="image" id="image" class="form-control"/>
							</div>
							<div class="form-group">
								<label for="category">Category</label>
								<select name="category" class="form-select">	
									<option value="0">Select Category</option>	
									<?php	
										global $connection; 
										$query = "SELECT * FROM category";
										$execute = mysqli_query($connection,$query); 
										while($data = mysqli_fetch_array($execute)) {
											$name = $data['name'];  
											$id = $data['id']; 
									?>  															
									<option value="<?php echo $id ?>" <?php echo ($id == $cat_id) ? 'selected':''?>><?php echo $name ?> 
									</option> 
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label for="body">Post:</label>
								<textarea rows="10" name="body" id="body" class="form-control"><?php echo $body ?>
								</textarea>
							</div>
							<div class="form-group mt-2">
								<button class="btn btn-success btn-sm" type="submit" name="submit">Edit Post</button>
							</div>
						</fieldset>
					</form> 
					
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

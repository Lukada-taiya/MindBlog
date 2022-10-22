<?php require_once('include/session.php') ?>
<?php require_once('include/functions.php') ?>
<?php require_once('include/db.php') ?>
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
		<div class="nav-element">
			<div style="background-color: #27aae1; height: 10px;" role="navigation">		
			</div>
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				  <div class="container-fluid">
					 <a class="navbar-brand" href="mainpage.php"><span class="h4">MindBlog</span></a>
					 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					 </button>
					 <div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						  <li class="nav-item">
							 <a class="nav-link" href="mainpage.php" target="_blank">Home</a>
						  </li>
						  <li class="nav-item">
							 <a class="nav-link" href="allposts.php" target="_blank">Blog</a>
						  </li>  
						  <li class="nav-item">
							 <a class="nav-link" href="#" target="_blank">About Us</a>
						  </li>  
						  <li class="nav-item">
							 <a class="nav-link" href="#" target="_blank">Services</a>
						  </li>  
						  <li class="nav-item">
							 <a class="nav-link" href="#" target="_blank">Contact Us</a>
						  </li>  
						  <li class="nav-item">
							 <a class="nav-link" href="#" target="_blank">Features</a>
						  </li>  
						</ul>
						<form action="allposts.php" target="_blank" class="d-flex">
						  <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
						  <button class="btn btn-outline-primary" type="submit">Search</button>
						</form>
					 </div>
			  </div>			  	
			</nav>	
			<div class="blue-band" style="background-color: #27aae1; height: 10px;" role="navigation"/>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="sidebar col-md-2"> 
					<ul class="nav nav-pills flex-column nav-list mt-3">
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
					<div>
						<?php 
							echo error_message(); 
							echo success_message(); 					
						?>	
					</div>
					<div>
						<h1>Admin Dashboard</h1>
					</div>
					<div class="table-responsive">
						<table class="table">
						<thead>
							<tr>
								<th>No.</th>
								<th>Title</th>
								<th>Date</th>
								<th>Author</th>
								<th>Category</th>
								<th>Banner</th>
								<th>Comment</th>
								<th>Action</th>
								<th>Details</th>
							</tr>
						</thead>
						<tbody>
							<?php	
							global $connection; 
							$query = "SELECT post.id,post.title,post.body,post.image,post.datetime,category.name, admin.name AS 
								author 
								FROM post
								INNER JOIN category ON post.category_id = category.id
								INNER JOIN admin ON post.admin_id = admin.id
								ORDER BY post.datetime DESC";
							$execute = mysqli_query($connection,$query);
							$sId = 0;
							while($data = mysqli_fetch_array($execute)) { 
								$id = $data['id'];
								$title = $data['title']; 
								$image = $data['image'];
								$category = $data['name'];
								$author = $data['author']; 
								$datetime = $data['datetime'];
								$sId++;
							?> 
							<tr>
								<td><?php echo $sId ?></td>
								<td title="<?php echo $title ?>"><?php echo strlen($title) > 17 ? substr($title,0,17)."...":
								$title ?></td>
								<td title="<?php echo $datetime ?>"><?php echo (strlen($datetime) > 17) ? substr($datetime,0,17)."...":
								$datetime ?></td>
								<td title="<?php echo $author ?>"><?php echo strlen($author) > 17 ? substr($author,0,17)."...":
								$author ?></td>
								<td title="<?php echo $category ?>"><?php echo strlen($category) > 17 ? substr($category,0,17)."...":
								$category ?></td>
								<td><img src="img/post/<?php echo $image ?>" width='170px' height='50px'/></td>
								<td><?php echo "Comment" ?></td>
								<td class="wide-cell">
									<a href="editpost.php?id=<?php echo $id ?>" class='btn btn-warning btn-sm'>Edit</a>
									<a href='deletepost.php' class='btn btn-danger btn-sm'>Delete</a>
								</td>
								<td class="wide-cell">
									<a href="singlepost.php?id=<?php echo $id ?>" target="_blank" class='btn btn-success btn-sm'>Live 
									Preview</a>
								</td>														
							</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<div class="footer-content">
				<p>MindBlog Ltd &copy; All Rights Reserved </p>
			</div>
		</footer>	
		<div style="background-color: #27aae1; height: 10px;" role="navigation"/>
	</body>
</html>

<?php require_once('include/db.php') ?>
<?php require_once('include/session.php') ?>
<?php require_once('include/functions.php') ?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">   	
		<link rel="stylesheet" href="css/bootstrap.min.css"/>			
		<link rel="stylesheet" href="css/all.min.css"/>	
		<link rel="stylesheet" href="css/frontstyles.css"/>		
		<script src="js/jquery-3.6.0.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script> 
		<script src="js/all.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<title>Mind Blog</title>
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
							 <a class="nav-link" href="mainpage.php">Home</a>
						  </li>
						  <li class="nav-item">
							 <a class="nav-link active" aria-current="page" href="allposts.php">Blog</a>
						  </li>  
						  <li class="nav-item">
							 <a class="nav-link" href="#">About Us</a>
						  </li>  
						  <li class="nav-item">
							 <a class="nav-link" href="#">Services</a>
						  </li>  
						  <li class="nav-item">
							 <a class="nav-link" href="#">Contact Us</a>
						  </li>  
						  <li class="nav-item">
							 <a class="nav-link" href="#">Features</a>
						  </li>  
						</ul>
						<form action="allposts.php" class="d-flex">
						  <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
						  <button class="btn btn-outline-primary" type="submit">Search</button>
						</form>
					 </div>
			  </div>			  	
			</nav>	
			<div class="blue-band" style="background-color: #27aae1; height: 10px;" role="navigation"/>
		</div>
		<div class="container">					
			<div class="row mb-5">
			<div class="blog-header mt-5">
					<?php	
							global $connection; 
							/*if(isset($_GET['search'])) {
								$search = $_GET['search']; 
								$query = "SELECT post.id,post.title,post.body,post.image,post.datetime,category.name, admin.name AS 
								author
								FROM post
								INNER JOIN category ON post.category_id = category.id
								INNER JOIN admin ON post.admin_id = admin.id
								WHERE post.datetime LIKE '%$search%' OR post.title LIKE '%$search%' OR post.body LIKE '%$search%'
								OR category.name LIKE '%$search%' OR admin.name LIKE '%$search%'
								ORDER BY post.datetime DESC";
							}else {*/
								$id = $_GET['id'];
								$query = "SELECT post.id,post.title,post.body,post.image,post.datetime,category.name, admin.name AS 
								author 
								FROM post
								INNER JOIN category ON post.category_id = category.id
								INNER JOIN admin ON post.admin_id = admin.id
								WHERE post.id = '$id'
								ORDER BY post.datetime DESC";
							//}
							$execute = mysqli_query($connection,$query); 
							if($data = mysqli_fetch_array($execute)) {
								$id = $data['id'];
								$title = $data['title'];
								$body = $data['body'];
								$image = $data['image'];
								$author = $data['name'];
								$category = $data['author']; 
							?> 
					<h1 class="h1"><?php echo $title ?></h1>
					<p class="lead">A MindBlog Post</p>  
				</div>
				<div class="col-md-8">									
					<div class="post card mb-5"> 
						<img class="card-img-top" src="img/post/<?php echo $image ?>"/> 
						<div class="card-body"> 
							<div class="card-subtitle">
								<h6>Category: <?php echo $category ?></h6>
								<h6>Published By: <?php echo $author ?></h6>		
							</div>													
							<p class="card-text"><?php echo $body; ?></p>														
						</div>
					</div>						
				<?php } ?>
				</div>
				<div class="col-md-3 offset-1">
					Documentation and examples for Bootstrap’s powerful, responsive navigation header, the navbar. Includes support for branding, navigation, and more, including support for our collapse plugin.Documentation and examples for Bootstrap’s powerful, responsive navigation header, the navbar. Includes support for branding, navigation, and more, including support for our collapse plugin.Documentation and examples for Bootstrap’s powerful, responsive navigation header, the navbar. Includes support for branding, navigation, and more, including support for our collapse plugin.Documentation and examples for Bootstrap’s powerful, responsive navigation header, the navbar. Includes support for branding, navigation, and more, including support for our collapse plugin.
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

<?php

	include ("includes/config.php");
	include ("includes/db.php");
	
	$query = "SELECT * FROM categories";
	
	$categories = $db->query($query);
	
	
	
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>BlogCMS</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="css/blog.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
            <a class="blog-header-logo text-dark" href="home.php">Home</a>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="index.php">Tumble</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="text-muted" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
            </a>
            <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a>
          </div>
        </div>
      </header>
	</div>

<!-- Fetch categories headers from database and display them in header -->	
      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
		  
		  <?php if ($categories->num_rows > 0) { 
		  while($row = $categories->fetch_assoc()){
		  ?>	 
<!-- Echo the ID so post with the same categoryID get displayed on same page -->		  
		  <a class="nav-scroller-item" href="index.php?category=<?php echo $row['category_id']; ?>"><?php echo $row['text']; ?></a>
		  <?php }}?>
		  
        </nav>
      </div>
<!-- NOT COMPLETE, want the search bar to stretch across the whole width -->
	    <div class="form-group row">
			<form method="get" action="results.php" class="form-inline">	
			<div class="col-sm-10">
				<input type="text" name="Search" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Search...">
			</div>
		</div>	
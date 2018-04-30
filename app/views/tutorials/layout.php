<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CT310 Tutorials - MySQL and Fuelphp</title>

    <!-- Bootstrap core CSS -->
	<?php echo Asset::css('bootstrap.min.css'); ?>
    
    <!-- Custom fonts for this template -->
    <?php echo Asset::css('font-awesome.min.css'); ?>
    <?php echo Asset::css('https://fonts.googleapis.com/css?family=Montserrat:400,700'); ?>
    <?php echo Asset::css('https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic'); ?>

    <!-- Plugin CSS -->
	<?php echo Asset::css('prism.css'); ?>

    <!-- Custom styles for this template -->
    <?php echo Asset::css('main.min.css'); ?>

    <!-- Bootstrap core JavaScript -->
    <?php echo Asset::js('jquery.min.js'); ?>
    <?php echo Asset::js('bootstrap.bundle.min.js'); ?>

    <!-- Plugin JavaScript -->
	<?php echo Asset::js('jquery.easing.min.js'); ?>
	<?php echo Asset::js('prism.js'); ?>

    <!-- Custom scripts for this template -->
    <?php echo Asset::js('main.min.js'); ?>

  </head>

  <body id="page-top">


    <!-- Header -->
    <header class="masthead bg-primary text-white text-center">
      <div class="container">
        <h1 class="text-uppercase mb-0"><?php echo $title; ?></h1>
      </div>
    </header>
	
	<?php echo $content; ?>
	

	

    <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>Part of CT-310 Course Material</small>
      </div>
    </div>






  </body>

</html>

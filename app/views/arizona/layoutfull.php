<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
		<meta name="description" content="Assignment 2">
		<meta name="author" content="Thomas Sciano Brandon Kidney">
		 <link rel="icon" href="http://webcom.colostate.edu/alumline/files/2014/02/rams-icon-dark.png">
	 </br>
	 </br>
		<title>CT310 Project 2</title>

		<?php echo Asset::css('bootstrap.min.css'); ?>
		<?php echo Asset::css('scrolling-nav.css'); ?>
		<?php echo Asset::js('jquery.min.js'); ?>
		<?php echo Asset::js('scrolling-nav.js'); ?>
		<?php echo Asset::js('jquery.easing.min.js'); ?>
		<?php echo Asset::js('bootstrap.bundle.min.js'); ?>
		<?php echo Asset::css('style.css'); ?>


	</head>
	<body>

		<div id="head">
		</br>
			<h1>CT310 Project 2</h1>
		</div>

		<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #CFB53B;" id="mainNav">
      <div class="container-fluid">
    <a class="nav-link js-scroll-trigger" href="<?php echo Uri::create('arizona/index'); ?>">Home</a>

			<!-- <a class="nav-link js-scroll-trigger" href="<?php echo Uri::create('arizona/a2'); ?>">Painted Desert</a> -->


			 <!-- <li><a href= "http://www.cs.colostate.edu/~tsciano/ct310/index.php/arizona/attraction/7">Pima Air Museum</a></li>

			 <li><a href= "http://www.cs.colostate.edu/~tsciano/ct310/index.php/arizona/attraction/8">About us</a></li> -->



				<?php foreach($attractions as $attr){ ?>
				<li> <a href = <?php echo Uri::create('arizona/attraction/'.$attr['attID']) ?> ><?php echo $attr['attName'];?></a> </li>
				<?php } ?>



				<?php
					$session = Session::instance();
					if($session->get('admin') == 1){
				?>
					<li><a href=<?=Uri::create("arizona/addAttraction.php"); ?>> Add Attraction</a></li>
				<?php } ?>


					<!-- <li><a href=<?=Uri::create("arizona/addAttraction.php"); ?>> Add Attraction</a></li> -->

				<li><a href=<?=Uri::create("arizona/about.php"); ?>>About Us</a></li>


				<?php $session = Session::instance();
					  $username=Session::get('username');
						if(!isset($username)){
							$username = "guest";
				}?>



				<li> <a href=<?=Uri::create("arizona/cart/".$username); ?> >Cart</a></li>
				<ul class="nav navbar-nav navbar-justified">

					<li class="dropdown" id="menuLogin">
										<a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Login</a>
										<div class="dropdown-menu" style="padding:17px;">
									<?php
									$session = Session::instance();
									if(strcmp("",$session->get('username'))==0){ ?>
											<form action=<?=Uri::create("arizona/login"); ?> method="POST">
												<input name="username" id="username" type="text" placeholder="Username">
												<input name="password" id="password" type="password" placeholder="Password"><br>
												<input type="submit" value="login">
											</form>

									<?php } else { ?>
										<form action=<?=Uri::create("arizona/logout"); ?> method="POST">
										<input type="submit" value="logout">
										</form>

									<?php } ?>
										<a href=<?=Uri::create("arizona/forgotPW.php"); ?> >Forgot Password?</a>
										</div>
									</li>
								</ul>

							</div>
						</nav>

		<div id="mainContent">

			<?=$content; ?>
		</div>
		<div id="footer">
			<center>Part of a <a href="https://www.cs.colostate.edu/~ct310/">CT310</a> Course Project </center>
		</div>
	</body>
</html>

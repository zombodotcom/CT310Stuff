<html>
<head>
	<title>Comments</title>

</head>
<body>
	<nav class="navbar navbar-fixed-top">
		<div class="container-fluid">
			<ul class="nav navbar-nav navbar-justified">
	  			<li class="active"><a href="comment.php"> Comments </a></li>
			</ul>
					<ul class="nav navbar-nav navbar-justified">
          			<li class="dropdown" id="menuLogin">
            			<a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Login</a>
                        <div class="dropdown-menu" style="padding:17px;">
<?php
				$session = Session::instance();
				if(strcmp("",$session->get('username'))==0){ ?>
                                <form action="login" method="POST">
                                    <input name="username" id="username" type="text" placeholder="Username">
                                    <input name="password" id="password" type="password" placeholder="Password"><br>
                                    <input type="submit" value="login">
				</form>
				<?php } else { ?>
				<form action="logout" method="POST">
                                    <input name="username" id="username" type="text" placeholder="Username">
                                    <input name="password" id="password" type="password" placeholder="Password"><br>
                                    <input type="submit" value="logout">
				</form>
<?php } ?>

            		</div>
                    		</li>
          	 	 </ul>
		</div>
	</nav>
	<br>
	<br>
	<br>
	<!-- Indicators -->
	<div class="container text-center">
        <h3> Comment if you dare! </h3>
            <?php
                session_start();
                if(Session::get('username')){
            ?>
                    <form action="<?php echo Uri::create('arizona/comments'); ?>" method="POST">
                    <div>
                        <textarea rows="4" cols="50" name="comments" id="comments"></textarea>
                    </div>
                    <input type="submit" value="Submit">
                    </form>
            <?php }?>
            <p>
                <h3>Comments</h3>
                <section id="comment">
                    <?php echo $cvar?>
            </p>
        </session>
	</div>
</body>
</html>

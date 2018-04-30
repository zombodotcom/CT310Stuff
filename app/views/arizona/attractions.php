
<!DOCTYPE html>
<html lang="en">

<head>

<title><?= $title; ?></title>

</head>

<body>

  <?php foreach($attractions as $attr){
  			if($attr['attID'] === $attID){
  	?>
  				<img src="<?php echo "http://www.cs.colostate.edu/~tsciano/ct310/".$attr['imgPath']; ?>">
  		<?php  }
  		}	?>
  	 <?php
  		session_start();
  		$user = Session::get('username');
  		if(!isset($user)){
  			$user = $guest;
  		}
  	?>
  	<br>	<a href="<?php echo Uri::create('arizona/addItem/'.$attID.'/'.$user); ?>"><input type="button" name="addItem" value="+ item to cart" id="addItem"></a>



  	</div>

  	<div class='attrName container text-center'>
  	<br>

  	<?php foreach($attractions as $attr){
  		if($attr['attID'] === $attID){ ?>

  		<h3><?php echo $attr['attName'];?> </h3>
  	<br> <?php
  			// echo $attr['$dsc'];
  		}
  	}?>

    <div class='attrName container text-center'>
	<br>

	<?php foreach($attractions as $attr){
		if($attr['attID'] === $attID){ ?>

		<h3><?php echo $attr['attName'];?> </h3>
	<br> <?php
			echo $attr['dsc'];
		}
	}?>

  	</div>
  	</div>




  	<!-- Indicators -->
  	<div class="container text-center">

  			<?php

  				echo "Welcome, ".$user;
  				if(Session::get('username')){
              ?>
                      <form method="POST">
                      <div>
                          <textarea rows="5" cols="30" name="comments" id="comments"></textarea>
                      </div>
                      <input type="submit" value="Submit">
                      </form>
  			<?php }?>

        <h3> Comments! </h3> <br>

              <p>
                  <h3>Comments</h3>
                  <section id="comment">

  				<?php
  				foreach($comText as $comment){
  					if($comment['attID'] === $attID){
  						echo $comment['comText'];
  				}		?>
  				<br>
  				<?php if(Session::get('username') === "tsciano" || Session::get('username') === "brandok" || Session::get('username') === "ct310" || Session::get('username') === "aaronadmin"  ){ ?>
  						<a  href="<?php echo Uri::create('arizona/deleteComment/'.$comment['attID'].'/'.$comment['commentID']); ?>"><input type="button" name="deleteComment" value="delete" id="deleteComment"></a>

  						<form method="POST" action="<?php echo Uri::create('arizona/updateComment/'.$comment['attID'].'/'.$comment['commentID']); ?>">
          	        		<textarea rows="1" cols="20" name="updateComment" id="updateComment"></textarea>
  							<input type="submit" value="edit"></a>
  						</form>

  				<?php 	}
  				} ?>
              </p>
          </session>
  	</div>
  </body>
  </html>

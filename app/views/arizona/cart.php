<html>
<head>

	<title> WELCOME TO THE CART</title>

</head>
<body>

	<div class="container">
	  <h3>CARTS ON CARTS</h3>
		<p>
			Heres yo stuff:
		<br>
<?php
		session_start();
		$username = Session::get('username');
		$message = "You wanted dis stuff:";
		if(!isset($username)){
			$username = "guest";
		}
?>
		<?php
			foreach($cart as $item){
					echo $item['attractionName'];
		?>
					<a  href="<?php echo Uri::create('arizona/deleteItem/'.$item['itemID'].'/'.$username); ?>"><input type="button" name="deleteComment" value="delete" id="deleteComment"></a> 								<br>
		<?php		}	?>
	   </p>


		<script>
			function clickAlert(){
				alert("Email has been sent.");
			}
		</script>

	   <form method="post" >
		Name: 	<input type="text" name="name"><br>
		Email:	<input required type="text" name="email"><br>
				<input type="submit" value="Request Brochure" onclick="clickAlert()" >

		</form>


</div>
</body>
</html>

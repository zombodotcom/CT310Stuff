<h2>
	<a href="<?=Uri::create('arizona/index'); ?>">Attractions</a>
</h2>
<div class="h2Content">
	login to Add Attraction!
	<!-- if (Session::get('username')){} -->
	<form method="post" action="http://cs.colostate.edu/~tsciano/ct310/index.php/arizona/addAttraction">

		<br>
		<br>
		<label for id="id"> Attraction Name </p>
			<input type="text" name="attName"><br><br>
	<label for id="id"> Description </p>
				<input type="text" name="dsc">
			<br />
			<label for id="id">image Path </p>
						<input type="text" name="imgPath">


					<br />
			 <!-- <br>

			<p>Upload an Image </p> -->
			<!-- <input type="file" value="Upload Image" name="imgPath" id="imgPath"> -->


			<input type="submit" value="Submit Attraction">
		</form>
		</div>
<!--


create table attractions (
attID int NOT NULL AUTO_INCREMENT,
attName varchar(256),
dsc text,
imgPath varchar(256),
PRIMARY KEY(attID)
); -->

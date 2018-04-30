<section class="code-section" id="code-section">
  <div class="container">
	<form action="../saveEditTutorialParagraph" method="POST" style="padding-bottom:130px" enctype="multipart/form-data">

	  <input type='hidden' value="<?php echo $paragraph['tutorialParagraphID']?>" name="id" />
		
	  <div class="form-group">
	    <label for="paragraph-text">Paragraph Text</label>
	    <textarea class="form-control" id="paragraph-text" name="paragraph-text" rows="5"><?php echo $paragraph['tutorialParagraphText']?></textarea>
	  </div>

	  <div style="text-align:center">
		  <img src="<?php echo $paragraph['tutorialParagraphImage']?>">
	  </div>
		
	  <div class="form-group">
		<label for="paragraph-image">Upload Image</label>
		<input type="file" class="form-control-file" name="paragraph-image">
	  </div>

	  <div class="form-group">
	    <label for="paragraph-code">Code Block</label>
	    <textarea class="form-control" id="paragraph-code" name="paragraph-code" rows="5"><?php echo $paragraph['tutorialParagraphCode']?></textarea>
	  </div>

	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
  </div>
</section>
<script>

</script>

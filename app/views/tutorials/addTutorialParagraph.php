<section class="code-section" id="code-section">
  <div class="container">
	<form action="saveTutorialParagraph" method="POST" style="padding-bottom:130px" enctype="multipart/form-data">
	  <div class="form-group">
	    <label for="tutorial-id">Tutorial</label>
	    <select class="form-control" id="tutorial-id" name="tutorial-id">
	      <?php
		foreach($tutorials as $key=>$tutorial)
		{
			?><option value="<?php echo $tutorial['tutorialID'];?>"><?php echo $tutorial['tutorialName']; ?></option><?php
		}
	      ?>
	    </select>
	  </div>
	  
	  <div class="form-group">
	    <label for="tutorial-section">Tutorial Section</label>
	    <select class="form-control" id="tutorial-section" name="tutorial-section">
	      <?php
		foreach($sections as $key=>$section)
		{
			?><option value="<?php echo $section['tutorialSectionID'];?>"><?php echo $section['tutorialSectionName']; ?></option><?php
		}
	      ?>
	    </select>
	  </div>
	
		
	  <div class="form-group">
	    <label for="paragraph-text">Paragraph Text</label>
	    <textarea class="form-control" id="paragraph-text" name="paragraph-text" rows="5"></textarea>
	  </div>

	  <div class="form-group">
		<label for="paragraph-image">Upload Image</label>
		<input type="file" class="form-control-file" name="paragraph-image">
	  </div>

	  <div class="form-group">
	    <label for="paragraph-code">Code Block</label>
	    <textarea class="form-control" id="paragraph-code" name="paragraph-code" rows="5">
&lt;code class="language-php">
			Enter code here
&lt;/code>
	
	    </textarea>
	  </div>

	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
  </div>
</section>
<script>
$(document).ready(function(){
	//add a listener to the change event of ('#tutorial-id')
	$('#tutorial-id').change(function(){
		
		//get the ID of the current selectbox('#tutorial-id'). Note: $(this) here referes to the object this listener is attached to. Here its $('#tutorial-id')
		$tutorial_id = $(this).val();
		
		//make a POST ajax call to getSectionsForTutorialJSON and pass the 'tutorial_id' as 'id'. In the action, $_POST['id'] will return the tutorial ID 
		$.post( "getSectionsForTutorialJSON", {id:$tutorial_id},function(response) {
		    
		    //clear the old <option> entries in the tutorial section select box
		    $('#tutorial-section').empty();
		    
		    //Convert the response string to a parse-able JSON object
		    response = JSON.parse(response);
			
			//for every entry, create a new <option> inside $('#tutorial-section'). The response is an object hence we need the following loop to parse that
		    for (var key in response) {
			if (response.hasOwnProperty(key)) {
				$('#tutorial-section').append($('<option>').attr('value',response[key].tutorialSectionID).html(response[key].tutorialSectionName));
			}
		    }
		});
	});
});
</script>

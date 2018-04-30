<section class="code-section" id="code-section">
  <div class="container">
	<form action="saveTutorialSection" method="POST" style="padding-bottom:130px">
	  <div class="form-group">
	    <label for="exampleFormControlSelect1">Tutorial</label>
	    <select class="form-control" id="exampleFormControlSelect1" name="tutorial-id">
	      <?php
		foreach($tutorials as $key=>$tutorial)
		{
			?><option value="<?php echo $tutorial['tutorialID'];?>"><?php echo $tutorial['tutorialtitle']; ?></option><?php
		}
	      ?>
	    </select>
	  </div>
	  
	  <div class="form-group">
		<label for="tutorial-title">Tutorial Section Name</label>
		<input type="text" class="form-control" id="tutorial-title" name="tutorial-name" placeholder="Enter tutorial title">
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
  </div>
</section>

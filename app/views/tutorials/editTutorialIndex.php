<section class="code-section" id="code-section">
  <div class="container">
	
	<div style="margin:20px">
		<h2 class="text-center text-uppercase text-secondary mb-0" style="margin-bottom:10px !important">Edit Tutorials</h2>

		<ul class="list-group">
		  <?php foreach($tutorials as $tutorial) {?>
			<li class="list-group-item"><a href="<?php echo "editTutorialPage/".$tutorial['tutorialID'];?>" ><?php echo $tutorial['tutorialName'];?></a></li>
		  <?php } ?>
		</ul>
	</div>
	
	
  </div>
</section>
<script>

</script>

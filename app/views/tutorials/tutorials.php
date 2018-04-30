<section class="code-section" id="code-section">
  <div class="container">
	
	<div style="margin:20px">
		<h2 class="text-center text-uppercase text-secondary mb-0" style="margin-bottom:10px !important">Tutorials</h2>

		<ul class="list-group">
		  <?php foreach($tutorials as $tutorial) {?>
			<li class="list-group-item"><a href="<?php echo "getTutorialPage/".$tutorial['tutorialID'];?>" ><?php echo $tutorial['tutorialName'];?></a></li>
		  <?php } ?>
		</ul>
	</div>
	
	<div style="margin:20px">
		<h2 class="text-center text-uppercase text-secondary mb-0" style="margin-bottom:10px !important">Admin Pages</h2>

		<ul class="list-group">

			<li class="list-group-item"><a href="addTutorial" >Admin - Add Tutorial</a></li>
			<li class="list-group-item"><a href="addTutorialSection" >Admin - Add Tutorial Section</a></li>
			<li class="list-group-item"><a href="addTutorialParagraph" >Admin - Add Tutorial Paragraphs</a></li>
			<li class="list-group-item"><a href="editTutorials" >Admin - Edit Tutorial</a></li>

		</ul>
	</div>
	
  </div>
</section>
<script>

</script>

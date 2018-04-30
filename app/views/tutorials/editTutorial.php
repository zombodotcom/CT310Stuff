<?php
	foreach($tutorialSections as $key=>$tutorialSection)
	{
	$tutorialParagraphs = $tutorialSection['tutorialParagraphs'];
	?>
	<section class="code-section" id="code-section">
      <div class="container">
		<h2 class="text-center text-uppercase text-secondary mb-0">
			<input type="text" class="section-name" section-id="<?=$tutorialSection['tutorialSectionID'];?>" value="<?=$tutorialSection['tutorialSectionName']?>"/>
			<button type="button" class="btn btn-primary edit-section-button" tutorial-section-id="<?=$tutorialSection['tutorialSectionID'];?>">Edit Title</button>
			<button type="button" class="btn btn-danger delete-section-button" tutorial-section-id="<?=$tutorialSection['tutorialSectionID'];?>">Delete Section</button>
		</h2>
		<hr>
		<?php
		foreach($tutorialParagraphs as $tutorialParagraph)
		{
			?>
			<div class="tutorial-paragraph">
			<div class="tutorial-buttons" style="text-align:center">
				<button type="button" class="btn btn-primary edit-tutorial-button" tutorial-paragraph-id="<?php echo $tutorialParagraph['tutorialParagraphID']?>">Edit Paragraph</button>
				<button type="button" class="btn btn-danger delete-tutorial-button" tutorial-paragraph-id="<?php echo $tutorialParagraph['tutorialParagraphID']?>">Delete Paragraph</button>	
			<?php
			if(isset($tutorialParagraph['tutorialParagraphText']))
			{
				?>
				<div>
					<?php echo $tutorialParagraph['tutorialParagraphText'];?>
				</div>
				<?php
			}
			
			if(isset($tutorialParagraph['tutorialParagraphText']))
			{
				?><div style="text-align:center;margin:15px"><img src='<?php echo $tutorialParagraph['tutorialParagraphImage']; ?>'></img></div><?php 
			}
			
			if(isset($tutorialParagraph['tutorialParagraphCode']))
			{
				?><pre><?php
					echo $tutorialParagraph['tutorialParagraphCode'];?>
				</pre><?php
			}
			?>
			</div><?php
		}?>
	  </div>
	</section>
	<?php
	}
	?>
<script>
$(document).ready(function(){
	
	$('.delete-tutorial-button').click(function(){
		$tutorialParagraphId = $(this).attr('tutorial-paragraph-id');
		$.post( "../deleteParagraph", {id:$tutorialParagraphId},function(result) {
			alert("Tutorial Successfully Deleted");
			location.reload();
		});
	});
	
	
	$('.edit-tutorial-button').click(function(){
		$tutorialParagraphId = $(this).attr('tutorial-paragraph-id');
		location.href = "../editTutorialParagraph/"+$tutorialParagraphId;
	});
	
	$('.edit-section-button').click(function(){
		$tutorialSectionId = $(this).attr('tutorial-section-id');
		$newTitle = $(this).siblings('input').val();
		$.post( "../editTutorialSection", {id:$tutorialSectionId,title:$newTitle},function(result) {
			alert("Tutorial Section Successfully Edited");
			location.reload();
		});
	});
	
	$('.delete-section-button').click(function(){
		$tutorialSectionId = $(this).attr('tutorial-section-id');
		$.post( "../deleteSection", {id:$tutorialSectionId},function(result) {
			alert("Tutorial Successfully Deleted");
			location.reload();
		});
	});
	
});
	
</script>

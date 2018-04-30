<?php
	foreach($tutorialSections as $key=>$tutorialSection)
	{
	$tutorialParagraphs = $tutorialSection['tutorialParagraphs'];
	?>
	<section class="code-section" id="code-section">
      <div class="container">
		<h2 class="text-center text-uppercase text-secondary mb-0"><?=$tutorialSection['tutorialSectionName']?></h2>
		<hr>
		<?php
		foreach($tutorialParagraphs as $tutorialParagraph)
		{
			if(isset($tutorialParagraph['tutorialParagraphText']))
			{
				echo $tutorialParagraph['tutorialParagraphText'];
			}
			
			if(isset($tutorialParagraph['tutorialParagraphText']))
			{
				?><div style="text-align:center;margin:15px"><img src=' <?php echo $tutorialParagraph['tutorialParagraphImage']; ?> '></img></div><?php 
			}
			
			if(isset($tutorialParagraph['tutorialParagraphCode']))
			{
				?><pre><?php
					echo $tutorialParagraph['tutorialParagraphCode'];?>
				</pre><?php
			}
		}?>
	  </div>
	</section>
	<?php
	}
	?>

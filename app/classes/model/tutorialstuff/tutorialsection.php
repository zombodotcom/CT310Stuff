<?php 

namespace Model\Tutorialstuff;


class Tutorialsection extends \Orm\Model
{
	protected static $_properties = array('tutorialSectionID', 'tutorialSectionName', 'tutorialID');
	protected static $_table_name = 'tutorialSections';
	protected static $_primary_key = array('tutorialSectionID');

	protected static $_has_many = array('tutorialParagraphs' => array(
	    'model_to' => 'Model\Tutorialstuff\TutorialParagraph',
	    'key_from' => 'tutorialSectionID',
	    'key_to' => 'tutorialSectionID',
	    'cascade_save' => true,
	    'cascade_delete' => true,
	    // there are some more options for specific relation types
	));
}


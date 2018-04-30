<?php

namespace Model\Tutorialstuff;

class Tutorial extends Orm\Model
{
	//columns from tutorial table
	protected static $_properties = array('tutorialID', 'tutorialName', 'tutorialtitle');

	//tutorial table name
	protected static $_table_name = 'tutorials';

	//tutorial table primary key
	protected static $_primary_key = array('tutorialID');

	//mapping for relationship with child table(tutorialSections)
	protected static $_has_many = array('tutorialsection' => array(  //here tutorialsection corresponds to the name of the key of the 'section object' in this tutorial object

		//name of the child table
	    'model_to' => 'Model\Tutorialstuff\Tutorialsection',

	    //name of the primary key in the tutorial table
	    'key_from' => 'tutorialID',

	    //name of the foreign key in the tutorialSections table
	    'key_to' => 'tutorialID',

	    //this automatically saves a 'tutorialsection' as well if present while saving a tutorial object
	    'cascade_save' => true,

	    //this automatically deletes all 'tutorialsection' as well if present while saving a tutorial object
	    'cascade_delete' => true,
	));
}

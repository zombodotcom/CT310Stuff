<?php

use Model\Tutorialstuff;

class Controller_Tutorial extends Controller
{
	/**
	 * Shows a list of all Courses
	 */

	public function action_addTutorial()
	{
		//load the layout
		$layout = View::forge('tutorials/layout');

		//set a title for the layout
		$layout->set_safe('title',"Add a Tutorial");
		
		//load the addTutorial View
		$addTutorialView = View::forge('tutorials/addTutorial');

		//forge the view into the layout
		$layout->content = Response::forge($addTutorialView);

		return $layout;
	}

	public function post_saveTutorial()
	{
		//get the tutorial name and title that were sent by the form
		$tutorialName = $_POST['tutorial-name'];
		$tutorialtitle = $_POST['tutorial-title'];

		//create a new 'tutorial' model. NOTE: We now have to use the fully qualified namespace for this model.
		$newTutorial = new Model\Tutorialstuff\Tutorial();

		//Set our name and title in the model.
		$newTutorial->tutorialName = $tutorialName;
		$newTutorial->tutorialtitle = $tutorialtitle;

		//save the ORM object
		$newTutorial->save();

		//load the layout
		$layout = View::forge('tutorials/layout');

		//set a title for the layout
		$layout->set_safe('title',"Add a Tutorial");

		//load the addTutorial View
		$addTutorialView = View::forge('tutorials/addTutorial');

		//forge the view into the layout
		$layout->content = Response::forge($addTutorialView);

		return $layout;
	}

	public function action_addTutorialSection()
	{
		//run a select query to find all 'tutorials'. This is needed by the view to create a select box.
		$tutorials = Model\Tutorialstuff\Tutorial::find('all');

		$layout = View::forge('tutorials/layout');

		$layout->set_safe('title',"Add a Tutorial Section");

		$addTutorialSectionView = View::forge('tutorials/addTutorialSection');

		//set_safe the 'tutorials' into the view
		$addTutorialSectionView->set_safe('tutorials',$tutorials);

		$layout->content = Response::forge($addTutorialSectionView);

		return $layout;
	}
	public function post_saveTutorialSection()
	{
		$tutorialid = $_POST['tutorial-id'];
		$tutorialSectiontitle = $_POST['tutorial-name'];


		$newTutorialSection = new Model\Tutorialstuff\TutorialSection();
		$newTutorialSection->tutorialID = $tutorialid;
		$newTutorialSection->tutorialSectionName = $tutorialSectiontitle;

		//save the ORM object
		$newTutorialSection->save();

		$layout->saved_ascontent = Response::redirect('tutorial/addTutorialSection');

	}
	public function action_addTutorialParagraph()
	{
		//find all the tutorials. this is to populate the tutorials select box
		$tutorials = Model\Tutorialstuff\Tutorial::find('all');

		//finds onlt the first tutorial. This is for the first time the page loads
		$subQuery = Model\Tutorialstuff\Tutorial::find('first',array('select' => array('tutorialID')));

		//this is the cascading query. It uses $subQuery['tutorialID'] from the previous query in its where clause
		$tutorialSections = Model\Tutorialstuff\Tutorialsection::find('all', array(
		    'where' => array(
			array('tutorialID', $subQuery['tutorialID']),
		    ),
		));

		$layout = View::forge('tutorials/layout');

		$layout->set_safe('title',"Add a Tutorial Paragraph");

		$addTutorialParagraphView = View::forge('tutorials/addTutorialParagraph');

		//set_safe the tutorials
		$addTutorialParagraphView->set_safe('tutorials',$tutorials);

		////set_safe the sections
		$addTutorialParagraphView->set_safe('sections',$tutorialSections);

		$layout->content = Response::forge($addTutorialParagraphView);

		return $layout;
	}

	public function post_getSectionsForTutorialJSON()
	{
		//get the tutorial ID
		$tutorialid = $_POST['id'];

		//find all the tutorial sections
		$tutorialSections = Model\Tutorialstuff\Tutorialsection::find('all', array(
		    'where' => array(
			array('tutorialID', $tutorialid ),
		    ),
		));

		//convert the PHP object to a JSON object. If you need a JSON array, you have to manually convert the PHP object to a PHP array before calling to_json();
		$tutorialSections_JSON = Format::forge($tutorialSections)->to_json();

		//return the JSON
		return $tutorialSections_JSON;
	}

	public function post_saveTutorialParagraph()
	{
		 //get the sectionID, paragraph text and paragraph code from the input
		 $tutorialSectionid = $_POST['tutorial-section'];
		 $paragraphText = $_POST['paragraph-text'];
		 $paragraphCode = $_POST['paragraph-code'];
		 $imageFileName="";

		 //replace all < to &lt; except for the code tag (replace back)
		 $paragraphCode = str_replace("<", "&lt;", $paragraphCode);

		 $paragraphCode = str_replace("&lt;code", "<code", $paragraphCode);

		 $paragraphCode = str_replace("&lt;/code", "</code", $paragraphCode);


		 //set the config for our Upload class. Here DOCROOT corresponds to the directory which contains your index.php. I wanted to save my images inside assets/img hence I appended that
		 $config = array(
			'path' => DOCROOT.'/assets/img',
			'randomize' => true,
			'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
		 );

		 //load the config file
		 Upload::process($config);

		 //if Upload is valid, save it
		 if (Upload::is_valid())
		 {
		 	 Upload::save();

		 	 //extract the filename of the stored image using the array returned by get_files(). Optinally append the fully qualified path to it. Do not do this is your projects
			 $imageFileName = '../../../assets/img/'.Upload::get_files()[0]['saved_as'];
		 }


		//create the paragraph object and set all values
		$newTutorialParagraph = new Model\Tutorialstuff\Tutorialparagraph();
		$newTutorialParagraph->tutorialSectionID = $tutorialSectionid;
		$newTutorialParagraph->tutorialParagraphCode = $paragraphCode;
		$newTutorialParagraph->tutorialParagraphText = $paragraphText;
		$newTutorialParagraph->tutorialParagraphImage = $imageFileName;

		//save the ORM object
		$newTutorialParagraph->save();

		$layout->content = Response::redirect('tutorial/addTutorialParagraph');


	}

	public function action_getTutorialPage($tutorialID)
	{

		//get the tutorial using the passed tutorial ID
		$tutorial = Model\Tutorialstuff\Tutorial::find('first', array(
		    'where' => array(
			array('tutorialID', $tutorialID ),
		    ),
		));

		//get the title
		$tutroialTitle = $tutorial['tutorialtitle'];

		//get the sections
		$tutorialSections = Model\Tutorialstuff\Tutorialsection::find('all', array(
		    'where' => array(
			array('tutorialID', $tutorialID ),
		    ),
		));


		$layout = View::forge('tutorials/layout');

		$layout->set_safe('title',$tutroialTitle);

		$tutorialPage = View::forge('tutorials/tutorialPage');

		$tutorialPage->set_safe('tutorialSections',$tutorialSections);

		$layout->content = Response::forge($tutorialPage);

		return $layout;

	}

	public function action_editTutorialPage($tutorialID)
	{
		$tutorial = Model\Tutorialstuff\Tutorial::find('first', array(
		    'where' => array(
			array('tutorialID', $tutorialID ),
		    ),
		));


		$tutroialTitle = $tutorial['tutorialtitle'];

		$tutorialSections = Model\Tutorialstuff\Tutorialsection::find('all', array(
		    'where' => array(
			array('tutorialID', $tutorialID ),
		    ),
		));


		$layout = View::forge('tutorials/layout');

		$layout->set_safe('title',$tutroialTitle);

		$tutorialPage = View::forge('tutorials/editTutorial');

		$tutorialPage->set_safe('tutorialSections',$tutorialSections);

		$layout->content = Response::forge($tutorialPage);

		return $layout;
	}

	public function action_deleteParagraph()
	{
		$paragraphID = $_POST['id'];

		$paragraph = Model\Tutorialstuff\TutorialParagraph::find($paragraphID);
		$paragraph->delete();

		return "Success";
	}

	public function action_editTutorialSection()
	{
		$id = $_POST['id'];
		$title = $_POST['title'];

		$section = Model\Tutorialstuff\Tutorialsection::find($id);
		$section->tutorialSectionName = $title;
		$section->save();

		return "Success";
	}

	public function action_deleteSection()
	{
		$paragraphID = $_POST['id'];

		$paragraph = Model\Tutorialstuff\Tutorialsection::find($paragraphID);
		$paragraph->delete();

		return "Success";
	}

	public function action_editTutorialParagraph($id)
	{

		$paragraph = Model\Tutorialstuff\TutorialParagraph::find($id);

		$layout = View::forge('tutorials/layout');

		$layout->set_safe('title',"Edit Tutorial Paragraph");

		$editTutorialSectionView = View::forge('tutorials/editTutorialParagraph');

		$editTutorialSectionView->set_safe('paragraph',$paragraph);

		$layout->content = Response::forge($editTutorialSectionView);

		return $layout;
	}

	public function post_saveEditTutorialParagraph()
	{
		$id = $_POST['id'];
		$tutorialParagraphText = $_POST['paragraph-text'];
		$tutorialParagraphCode = $_POST['paragraph-code'];

		$tutorialParagraphCode = str_replace("<", "&lt;", $tutorialParagraphCode);

		$tutorialParagraphCode = str_replace("&lt;code", "<code", $tutorialParagraphCode);

		$tutorialParagraphCode = str_replace("&lt;/code", "</code", $tutorialParagraphCode);

		$imageFileName=NULL;

		$config = array(
			'path' => DOCROOT.'/assets/img',
			'randomize' => true,
			'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
		);

		Upload::process($config);

		if (Upload::is_valid())
		{
			Upload::save();
			$imageFileName = '../../../assets/img/'.Upload::get_files()[0]['saved_as'];
		}


		$section = Model\Tutorialstuff\TutorialParagraph::find($id);
		$section->tutorialParagraphText = $tutorialParagraphText;
		$section->tutorialParagraphCode = $tutorialParagraphCode;
		$section->tutorialParagraphImage = $imageFileName;
		$section->save();

		return "Success";

	}

	public function action_index()
	{
		//get all tutorilas
		$tutorials = Model\Tutorialstuff\Tutorial::find('all');

		$layout = View::forge('tutorials/layout');

		$layout->set_safe('title',"CT-310 Tutorials");

		$tutorialView = View::forge('tutorials/tutorials');

		$tutorialView->set_safe("tutorials",$tutorials);

		$layout->content = Response::forge($tutorialView);

		return $layout;
	}

	public function action_editTutorials()
	{
		$tutorials = Model\Tutorialstuff\Tutorial::find('all');

		$layout = View::forge('tutorials/layout');

		$layout->set_safe('title',"CT-310 Tutorials");

		$tutorialView = View::forge('tutorials/editTutorialIndex');

		$tutorialView->set_safe("tutorials",$tutorials);

		$layout->content = Response::forge($tutorialView);

		return $layout;
	}


}

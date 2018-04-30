<?php
use Model\arizona;

class Controller_Arizona extends Controller
{

	protected static $_properties = array('attID', 'attName', 'dsc', 'imgPath');
	protected static $_table_name = 'attractions';
	protected static $_primary_key = array('attnID');


		public function post_saveTutorial()
		{
			//get the tutorial name and title that were sent by the form
			$attName = $_POST['attName'];
			$dsc = $_POST['dsc'];

			//create a new 'tutorial' model. NOTE: We now have to use the fully qualified namespace for this model.
			$newTutorial = new arizona;

			//Set our name and title in the model.
			$newTutorial->attName = $attName;
			$newTutorial->dsc = $dsc;

			//save the ORM object
			$newTutorial->save();

			//load the layout
			$layout = View::forge('arizona/layoutfull');

			//set a title for the layout
			$layout->set_safe('title',"Add a Tutorial");

			//load the addTutorial View
			$addTutorialView = View::forge('arizona/addAttraction');

			//forge the view into the layout
			$layout->content = Response::forge($addTutorialView);

			return $layout;
		}


	 public function action_index()
 	{
 		//load the layout
 		$layout = View::forge('arizona/layoutfull');

 		//load the view
 		$content = View::forge('arizona/index');

			$layout->content = Response::forge($content);

		 $Arizona = new arizona();

	 $attractions = Arizona::getAttraction();

			 $layout->set_safe("attractions", $attractions);

	 $layout->content = Response::forge($content);
	 return $layout;
 	}



	public function action_attraction($attID){
		$layout = View::forge('arizona/layoutfull');

		$content = View::forge('arizona/attractions');

		$Arizona = new arizona();

	 $attractions = Arizona::getAttraction();

	 $attName = Arizona::getAttractionName($attID);
	 $content->set_safe('attID', $attID);

	 $layout->set_safe("attractions", $attractions);
	 $content->set_safe("attractions", $attractions);
	 $layout->set_safe("guest","guest");
	 $content->set_safe("guest","guest");
	 $comText=Input::post("comments");

	 if(isset($comText)){
			arizona::inputComments($comText,$attID);

		}

		$comText = Arizona::getComments($attID);


		$content->set_safe("comText", $comText);

	$content->set_safe("title", $attName[0]['attName']);
	$layout->content = Response::forge($content);

	return $layout;

	}

	public function action_about()
	{
		$layout = View::forge('arizona/layoutfull');

		$content = View::forge('arizona/about');

		$layout->content = Response::forge($content);
		$Arizona =  new arizona();

		$attractions = Arizona::getAttraction();

		$layout->set_safe("attractions", $attractions);

		$layout->content = Response::forge($content);


		return $layout;
	}
	public function action_contact()
	{
		$layout = View::forge('arizona/layoutfull');

		$content = View::forge('arizona/contact');

		$post=Input::post("comments");

		if(isset($post))
		{
			$cvar=$post;
		}
		else{
			$cvar="";
		}
		$content->set_safe("cvar",$cvar);
		$layout->content = Response::forge($content);


		return $layout;
	}
	public function action_loggedin()
	{
		$layout = View::forge('arizona/layoutfull');

		$content = View::forge('arizona/loggedin');
		$layout->content = Response::forge($content);


		return $layout;
	}


	public function action_logout()
	{
		$session = Session::instance();
			$session->destroy();
			$layout = View::forge('arizona/layoutfull');
			$content = View::forge('arizona/index');
			$arizona = new arizona();

			$attractions = arizona::getAttraction();
			$layout->set_safe("attractions", $attractions);


			$layout->content = Response::forge($content);
			return $layout;

	}

public function post_addAttraction(){

	$config = array(
	    		'path' => 'assets/img/',
	    		'randomize' => true,
	    		'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
				);


$Arizona = new arizona();
$layout = View::forge('arizona/layoutfull');
	$content = View::forge('arizona/addAttraction');
			$layout->content = Response::forge($content);
			$attractions = Arizona::getAttraction();
			$attName = Input::post("attName");
			$dsc = Input::post("dsc");
			$imgPath = Input::post("imgPath");
			// $picture = Input::post("picture");
			// Upload::process($config);
			// if(Upload::is_Valid()){
			// 	Upload::save();
			// 	$imgName = Upload::get_files()[0]['saved_as'];
			// 	$imgPath = 'assets/img/'. $imgName;
			// 	//print_r(Upload::get_files());
			// //	print_r(Upload::get_files()[0]['saved_as']);
			// //	print($imgName);
			// 	Arizona::addAttraction($attName, $dsc, $imgPath);
			// 	Response::redirect("arizona/addAttraction");
			// }
			Arizona::addAttraction($attName, $dsc, $imgPath);
			Response::redirect("arizona/addAttraction");
		}


		public function action_addAttraction()
		{
			$arizona = new arizona();

				$layout = View::forge('arizona/layoutfull');

			$content = View::forge('arizona/addAttraction');

			$attractions = Arizona::getAttraction();

				$layout->set_safe("attractions", $attractions);

				$layout->content = Response::forge($content);

			return $layout;
}






public function action_login(){

		$username = Input::post('username');

		$password = Input::post('password');

		$Arizona = new arizona();

		$users = arizona::getUsers();
		$status = false;
		foreach( $users as $user){
			if($user['password'] === md5($password)){
				Session::set('username', $user['username']);
				$status = true;

				if($user['pwrLvl'] == 'admin'){
					Session::set('admin', 1);
				}
			}
		}

			if($status)	{
				Response::redirect("Arizona/index.php");
			}
			else{
			Response::redirect("https://html5zombo.com/");
			}
	}

	public function action_addItem($attID, $username){

			$Arizona = new arizona();
				 $attName = Arizona::getAttractionName($attID);
			Arizona::addItem($attID, $username, ($attName[0]['attName']));
		   	Response::redirect('arizona/cart/'.$username);
		}

		public function action_deleteComment($attID, $commentID){
				$Arizona = new arizona();
				Arizona::deleteComment($commentID);
			   	Response::redirect('arizona/attraction/'.$attID);
			}


			public function action_updateComment($attID, $commentID){
		$Arizona = new arizona();
		$updatedComment = Input::post("updateComment");
		if(isset($updatedComment)){
			Arizona::updateComment($commentID, $updatedComment);
		}
	   	Response::redirect('arizona/attraction/'.$attID);
	}




	public function action_forgotPW(){

	        $layout = View::forge('arizona/layoutfull');
	        $content = View::forge('arizona/forgotPW');
			$Arizona = new arizona();
			$attractions = arizona::getAttraction();
			$layout->set_safe("attractions", $attractions);

			$layout->content = Response::forge($content);
			return $layout;

		}
		public function post_forgotPW()
		{
			$name = Input::post('name');
			$email = Input::post('email');
			$Arizona = new arizona();
			$token = arizona::getToken($email);
			mail($email, "Reset Password From arizona", "token is: " . ($token[0]['token']));
			Response::redirect('Arizona/forgotPW');
		}
		public function action_resetPW(){

	        $layout = View::forge('arizona/layoutfull');
	        $content = View::forge('arizona/resetPW');
			$Arizona = new arizona();
			$attractions = arizona::getAttraction();
			$layout->set_safe("attractions", $attractions);

			$layout->content = Response::forge($content);
			return $layout;

		}

		public function post_resetPW()
		{
			$newPW = Input::post('newPW');
			$email = Input::post('email');
			$Arizona = new arizona();
			Arizona::resetPW($email, md5($newPW));

			Response::redirect('arizona/welcome');
		}

		public function post_resetPWPage()
		{
			$tokenEntered = Input::post('token');
			$email = Input::post('email');
			$Arizona = new arizona();
			$token = arizona::getToken($email);
			if ( $tokenEntered === $token[0]['token']){

				Response::redirect('arizona/resetPW');
			}else{
				Response::redirect('arizona/wrongToken');
			}
		}



		public function action_wrongToken(){

	        $layout = View::forge('arizona/layoutfull');
	        $content = View::forge('arizona/index');
			$Arizona = new arizona();
			$attractions = arizona::getAttraction();
			$token = Input::post('token');
			$layout->set_safe("attractions", $attractions);

			$layout->content = Response::forge($content);
			return $layout;

		}


}

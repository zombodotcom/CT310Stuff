<?php // wrap in php
namespace Model;
class Arizona extends \Orm\Model
{
	// protected static $_properties = array('tutorialID', 'tutorialName', 'tutorialtitle');

	public function __construct($id = null)
	{
	}
//get attractiions from the db


//Add a new attraction;
public static function addAttraction($attName, $dsc, $imgPath){
	$query = \DB::insert('attractions');
			$query->set(array(
				// 'attID' => $attID,
				'attName' => $attName,
				'dsc' => $dsc,
				'imgPath' => $imgPath,
				)) -> execute();
}
//get the attraction from the database;
	public static function getAttraction(){
        $result = \DB::select('*')->from('attractions')->as_assoc()->execute();
		return $result;
	}

//grab the att from the DB using the ATT ID int 0-whatever
	public static function getAttractionName($attID){
		$result = \DB::select('attName')->from('attractions')->where('attID', $attID)->execute();
		return $result;
	}

//get a description of the attraction
	public static function getdsc(){
		$result = \DB::select('dsc')->from('attractions')->as_assoc()->execute();
		return $result;
	}


//get the image of the attractions

	public static function getAttImg(){
		$result = \DB::select('imgPath')->from('attractions')->as_assoc()->execute();
		return $result;
	}


//get the attraction id from the database
	public static function getAttID(){
		$result = \DB::select('attID')->from('attractions')->as_assoc()->execute();
		return $result;
	}



	//get comments for an attraction ID
	public static function getComments($attID){
		$result = \DB::select('*')->from('comments')->where('attID', $attID)->as_assoc()->execute();
		return $result;
	}


	//input commments into an attraction ID in the DB;
	public static function inputComments($comText, $attID){
		$query = \DB::insert('comments');
		$query->set(array(
			'comText' => $comText,
			'attID' => $attID,
		)) -> execute();
	}


	// destroy a comment with a comment ID;
	public static function deleteComment($commentID){
		$query = \DB::delete('comments');
		$query->where('commentID',$commentID) -> execute();
	}



	// update a comment ID;
	public static function updateComment($commentID, $updatedComment){
		$query = \DB::update('comments');
		$query->set(array(
			'comment' => $updatedComment,

		));
		$query->where('commentID',$commentID) -> execute();
	}


	//grab users from the database
	public static function getUsers(){
		$users = \DB::select('*')->from('users')->as_assoc()->execute();
		return $users;
	}


// add stuff to the cart to that username;;
	public static function addItem($attID, $username, $attName){
		$query = \DB::insert('cart');
		$query->set(array(
			'attID' => $attID,
			'username' => $username,
			'attName' => $attName,
		)) -> execute();
	}


//Delete something from the cart;
	public static function deleteItem($itemID){
		$query = \DB::delete('cart');
		$query->where('itemID',$itemID) -> execute();
	}


//get the cart for that user from the DB;
	public static function getCart($username){
		$result = \DB::select('*')->from('cart')->where("username", $username)->as_assoc()->execute();
		return $result;
	}



	//get items from the DB for that user;
	public static function getItems($username){
		$result = \DB::select('attName','itemID')->from('cart')->where("username", $username)->as_assoc()->execute();
		return $result;
	}

//Destroy the cart and start over;
	public static function deleteCart($username){
		$query = \DB::delete('cart');
		$query->where('username',$username) -> execute();
	}



	// get a token for email;
	public static function getToken($email){
		$result = \DB::select('token')->from('users')->where("email", $email)->as_assoc()->execute();
		return $result;
	}
	public static function resetPW($email, $newPW){
		$query = \DB::update('users');
		$query->set(array(
			'password' => $newPW,

		));
		$query->where('email', $email) -> execute();
	}
}
?>

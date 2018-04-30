<?php
/**
 * Demo for CT310
 */
class Controller_Login extends Controller
{
	/**
	 * Shows a list of all demo items
	 */
	
	public function action_loginForm()
	{
		$status = 'success';

		$content = View::forge('login/login');

		$content -> set_safe('status',$status);

		return $content;
	}

	public function action_checkLogin()
	{
		
		$username = Input::post('username');

		$password = Input::post('password');


		if($username === 'ct310' && md5($password) === '48f2f942692b08ec9de1ef9ada5230a3')
		{
			Session::create(); 
			
			Session::set('username', $username);
			
			Session::set('userid', 12345);

			$content = View::forge('login/success');

			return $content;
		}
		else 
		{

			$content = View::forge('login/login');
			
			$content->set_safe('status','error');

			return $content;
		}
	
	}

	public function action_printUserDetails()
	{
		$session = Session::instance(); 
		
		$username = $session->get('username');

		$id = $session->get('userid');
		
		if(isset($username) && isset($id))
		{

			$content = View::forge('login/print');
		
			$content->set_safe('username',$username);
	
			$content->set_safe('id',$id);
		
			return $content;
		
		}
		else
		{
			$content = View::forge('login/notLoggedIn');
		
			return $content;
		}
		
	}

	public function action_logout()
	{
		$session = Session::instance(); 

		$session->destroy();

		$content = View::forge('login/logout');

		return $content;
	}

}

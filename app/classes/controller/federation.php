<?php
use Model\Ormfedmodel;

class Controller_Federation extends Controller
{
	public function action_status()
	{
        $status['status'] = "open";
        return json_encode($status);
	}

	public function action_allstatus()
	{
        $layout = View::forge('federation/allstatus');

		return $layout;
	}
	public function action_derp()
	{
				$layout = View::forge('federation/derp');
				// $attraction = Ormfedmodel::find($id, array('select' => array('attID', 'attName', 'dsc', 'state')));
        // $temp = array();
        // $temp['id'] = $attraction['attID'];
        // $temp['name'] = $attraction['attName'];
        // $temp['desc'] = $attraction['dsc'];
        // $temp['state'] = $attraction['state'];
        // return json_encode($temp);

		return $layout;
	}





		public function action_addItem($attID, $username){

				$Federation = new federation();
					 $attName = Federation::getAttractionName($attID);
				Federation::addItem($attID, $username, ($attName[0]['attName']));
			   	Response::redirect('federation/cart/'.$username);
			}

			public function action_deleteComment($attID, $commentID){
					$federation = new federation();
					Federation::deleteComment($commentID);
				   	Response::redirect('federation/attraction/'.$attID);
				}


				public function action_updateComment($attID, $commentID){
			$Federation = new federation();
			$updatedComment = Input::post("updateComment");
			if(isset($updatedComment)){
				Federation::updateComment($commentID, $updatedComment);
			}
		   	Response::redirect('federation/attraction/'.$attID);
		}



	public function action_map()
	{
        $layout = View::forge('federation/map');

		return $layout;
	}
	public function action_fullmap3()
	{
				$layout = View::forge('federation/fullmap3');

		return $layout;
	}
	public function action_fullmap2()
	{
				$layout = View::forge('federation/fullmap2');

		return $layout;
	}
	public function action_derpAttractions()
	{
        $layout = View::forge('federation/derpAttractions');

		return $layout;
	}


	public function action_fullmap()
	{
        $layout = View::forge('federation/fullmap');

		return $layout;
	}

	public function action_listing()
	{
        $attraction = Ormfedmodel::find('all', array('select' => array('attID', 'attName', 'state')));

        $attArray = array();
        foreach ($attraction as $i){
            $temp = array();
            $temp['id'] = $i['attID'];
            $temp['name'] = $i['attName'];
            $temp['state'] = $i['state'];
            $attArray[] = $temp;
        }
        return json_encode($attArray);
	}

    public function action_attraction($id)
	{
        $attraction = Ormfedmodel::find($id, array('select' => array('attID', 'attName', 'dsc', 'state')));
        $temp = array();
        $temp['id'] = $attraction['attID'];
        $temp['name'] = $attraction['attName'];
        $temp['desc'] = $attraction['dsc'];
        $temp['state'] = $attraction['state'];
        return json_encode($temp);
	}

public function action_attrimage($id)
	{
        $image = Ormfedmodel::find($id, array('select' => array('imgPath')));
        if($image['imgPath'] == ""){
            return "No Image found";
        }
        $response = Response::forge(file_get_contents(Asset::get_file($image['imgPath'],'img')));
        $response -> set_header('Content-Type', 'image/jpeg');

        return $response;
	}

	public function action_loggedin()
	{
		$layout = View::forge('federation/derp');

		$content = View::forge('federation/derp');
		$layout->content = Response::forge($content);


		return $layout;
	}


	public function action_logout()
	{
		$session = Session::instance();
			$session->destroy();
			$layout = View::forge('federation/derp');
			$content = View::forge('federation/derp');
			$federation = new federation();

			$attractions = federation::getAttraction();
			$layout->set_safe("attractions", $attractions);


			$layout->content = Response::forge($content);
			return $layout;

	}



	public function action_login(){

			$username = Input::post('username');

			$password = Input::post('password');

			$Federation = new federation();

			$users = federation::getUsers();
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
					Response::redirect("federation/derp.php");
				}
				else{
				Response::redirect("https://html5zombo.com/");
				}
		}



}

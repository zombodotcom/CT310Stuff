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
}

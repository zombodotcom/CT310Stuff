<?php
use Model\OrmMigrations;



class Controller_Migrations extends Controller
{


  public function action_loginForm()
  {
    $status = 'success';

    $content = View::forge('migrations/login');

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

      $content = View::forge('migrations/success');

      return $content;
    }

    if($username === 'tsciano' && md5($password) === '58fd9edd83341c29f1aebba81c31e257')
    {
      Session::create();

      Session::set('username', $username);

      Session::set('userid', 311);

      $content = View::forge('migrations/success');

      return $content;
    }

    else
    {

      $content = View::forge('migrations/login');

      $content->set_safe('status','error');

      return $content;
    }

  }

  public function action_logout()
  {
    $session = Session::instance();

    $session->destroy();

    $content = View::forge('migrations/logout');

    return $content;
  }

  // public function action_migrate()
  // {
  //   $migversion=$_POST['migversion'];
  //

  //
  //   echo $migversion;
  //   return $layout;
  // }
  //
  public function post_migrate()
  {
    //get the tutorial name and title that were sent by the form
    $layout = View::forge('migrations/layoutfull');
    $content= View::forge('migrations/index');
    $layout->set_safe('title',"Migrations!");
    $layout->content = Response::forge($content);

    $migversion = $_POST['migversion'];

    //create a new 'tutorial' model. NOTE: We now have to use the fully qualified namespace for this model.
    $newTutorial = new Migrations();

    //Set our name and title in the model.
    $newTutorial->migversion = $migversion;


    //save the ORM object
    $newTutorial->save();

    return $layout;
  }


  public function action_index()
  {
    // Migrate::version(0);


    // $userid = Session::get('userid');
    // if ( $userid === false )
    // {
    // echo "no user is logged in";
    // }
    // else {
      // $migversion
      if (isset($_POST['migversion']))
      {
          $migversion = $_POST['migversion'];
          Migrate::version($migversion);
          }



$layout = View::forge('migrations/layoutfull');

$content= View::forge('migrations/index');

$layout->set_safe('title',"Migrations!");

// $tablecontent = \DB::query('select * from migration')-> execute();

// $content->set_safe('tablecontent',$tablecontent);

$layout->content = Response::forge($content);
return $layout;

}






}
?>

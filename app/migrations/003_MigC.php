<?php
namespace Fuel\Migrations;
class MigC
{


  function up(){

    \DBUtil::modify_fields('test', array(
          'email' => array('type' => 'text'),
    ));

  }

  function down(){
    \DBUtil::add_fields('test', array(
      'email' => array('constraint' => 50, 'type' => 'varchar'),
    ));
  }
}

<?php 
namespace Fuel\Migrations;
class MigA
{


  function up(){
    \DBUtil::create_table('test', array(
            'id' => array('constraint' => 11, 'type' => 'int'),
            'fName' => array('type' => 'text'),
            'mName' => array('type' => 'text'),
            'lName' => array('type' => 'text'),
            'email' => array('constraint' => 50, 'type' => 'varchar'),
            'color' => array('type' => 'text'),
            'password' => array('constraint' => 125, 'type' => 'varchar'),
        ), array('id'));
  }
  function down(){
    \DBUtil::drop_table('test');

  }
}

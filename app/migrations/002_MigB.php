<?php
namespace Fuel\Migrations;
class MigB
{


  function up(){

    \DBUtil::drop_fields('test', 'color');

  }

  function down(){
    \DBUtil::add_fields('test', array(
      'color' => array('type' => 'text'),
    ));
  }
}

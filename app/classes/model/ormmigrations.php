<?php
namespace Model;
class Ormmigrations extends \Orm\Model
{
  protected static $_properties = array('id','fName','mName','lName','email','color','password');
  protected static $_table_name = 'test';
  protected static $_primary_key = array('id');
}

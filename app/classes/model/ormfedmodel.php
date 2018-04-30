<?php
namespace Orm;
namespace Model;

class Ormfedmodel extends \Orm\Model
{
	protected static $_properties = array('attID', 'attName', 'dsc', 'imgPath', 'state');
	protected static $_table_name = 'attractions';
	protected static $_primary_key = array('attID');
}


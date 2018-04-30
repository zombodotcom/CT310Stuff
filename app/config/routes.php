<?php
return array(
	'_root_'  => 'arizona/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route

	'index(/:name)?' => array('arizona/index', 'name' => 'index'),
);

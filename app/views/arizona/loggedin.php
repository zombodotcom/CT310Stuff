<?php


if(!(Session::get(['username'])))
	echo "You must log in to view this page. login <a href='login.php'>here</a>";
else {

echo " Click <a href='logout.php'>here</a> to logout.";

}
?>

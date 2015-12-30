<?php
//site specific configuration declartion
define( 'BASE_PATH', 'localhost/twitter');
define( 'DB_HOST', 'localhost' );
define( 'DB_USERNAME', 'root');
define( 'DB_PASSWORD', 'klawi77');
define( 'DB_NAME', 'cndeals');
define( 'HOME_PAGE', 'index.php');
define( 'SITE_TITLE', 'Fashion You!');


function __autoload($class)
{
	$parts = explode('_', $class);
	$path = implode(DIRECTORY_SEPARATOR,$parts);
	require_once $path . '.php';
}


?>
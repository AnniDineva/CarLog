<?php
//с тези 3 фукции се прави да излизат грешките на PHP-то
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//зареждаме autoloader класа
include('../src/_autoloader.class.php');

$_autoloaderClass = new _autoloader();


?>

<?php 
$host = 'localhost';
$user = 'root';
$password = '';

$db = 'homebutler';

if (!mysql_connect($host, $user, $password) || !mysql_select_db($db)) {
	# code...
	die(mysql_error());
}
 ?>
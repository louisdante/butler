<?php 
ob_start();
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];

function logged_in(){
	return(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) ? true :false;
}
function proctect_page(){
	if (logged_in()===false) {
		# code...
		header('signin.php');
		exit();
	}
}
/*
function loggedin(){
	if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
	# code...
	return true;
}else{
	return false;
}
}
*/
function getuserfield($field){
$query = "SELECT `$field` FROM `users` WHERE `id` ='".$_SESSION['user_id']."'";
if ($query_run = mysql_query($query)) {
	# code...
	if ($query_result = mysql_result($query_run, 0, $field)) {
		# code...
		return $query_result;
	}
}
}
 ?>
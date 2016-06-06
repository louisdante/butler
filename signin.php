<?php
require 'includes/connect.inc.php';
require 'includes/core.inc.php';
$title = 'Signin | Butlers';
if (logged_in()) {
	# code...
	header('Location: makeorder.php');
}else if (!logged_in()) {
	# code...
	require 'includes/head.php';
require 'includes/header.php';

include 'includes/loginform.inc.php';

			

require 'includes/footer.php';
}

 ?>

		
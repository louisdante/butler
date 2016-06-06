<?php 

require 'includes/connect.inc.php';
require 'includes/core.inc.php';
proctect_page();
$title = 'Make| Order';
require 'includes/head.php';



	# code...
$welcome_msg = getuserfield('firstname').'  '.getuserfield('lastname');
$loggout = '<a href="loggout.php" class="button special">Sign Out</a>';

require 'includes/orderbody.inc.php';
require 'includes/footer.php';
 ?>
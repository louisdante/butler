<?php
require 'includes/core.inc.php';
require 'includes/connect.inc.php';
$title = 'Signup | Butlers';
require 'includes/head.php';
require 'includes/header.php';


if (!logged_in()) {
	if (isset($_POST['firstname']) &&
		isset($_POST['lastname']) &&
		isset($_POST['email']) &&
		isset($_POST['password']) &&
		isset($_POST['confirm_password']) &&
		isset($_POST['address']) &&
		isset($_POST['phone']) &&
		isset($_POST['phone_2'])) {
		# code...
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$username =$_POST['email'];
			$password = $_POST['password'];
			$confirm_pass = $_POST['confirm_password'];
			$password_hash = md5($password);
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$phone_2 = $_POST['phone_2'];

			if (!empty($firstname) && 
				!empty($lastname) && 
				!empty($username) &&
				!empty($password) &&  
				!empty($confirm_pass) && 
				!empty($address) && 
				!empty($phone) && 
				!empty($phone_2)

				) {
				# code...
				if ($password != $confirm_pass) {
					# code...
					$message = 'passwords did not match';
				}else{
					//check if the user exists...
					$query = "SELECT `username` FROM `users` WHERE `username` = '$username'";
					$query_run = mysql_query($query);
					if (mysql_num_rows($query_run) == 1) {
						# code...
						$message = "The username ".$username." already exits";
					}else{
						//Start registration process..
						$query = "INSERT INTO `users` VALUES ('','".mysql_real_escape_string($username)."','".mysql_real_escape_string($password_hash)."','".mysql_real_escape_string($firstname)."','".$lastname."',
							'".mysql_real_escape_string($address)."','".mysql_real_escape_string($phone)."','".mysql_real_escape_string($phone_2)."')";
					}	if ($query_run = mysql_query($query)) {
						# code...
						header('Location: register_success.php');
					}else{
						$message = 'Sorry we couldn\'t register you at this time. Try agin later';
					}
				}
				
			}else{
				$message = 'All fields are required';
			}
	}
?>
	


			<!-- Main -->
				<article id="main">

					<header class="special container">
						<span class="icon fa-envelope"></span>
						<h2>Register</h2>
						<p>Use the form below to register to gain access to the upload area.</p>
						<p><span style="color: red;"><?php echo @$message ?></span></p>
					</header>

					<!-- One -->
						<section class="wrapper style4 special container 75%">

							<!-- Content -->
								<div class="content">
									<form method="post" action="signup.php">
										<div class="row 50%">
											<div class="6u 12u(mobile)">
												<input type="text" name="firstname" placeholder="First Name" value="<?php echo @$firstname; ?>" />
											</div>
											
											<div class="6u 12u(mobile)">
												<input type="text" name="lastname" placeholder="Last Name" value="<?php echo @$lastname; ?>" />
											</div>
										</div>
										<div class="row 50%">
											<div class="4u 12u(mobile)">
												<input type="email" name="email" placeholder="Email Address" value="<?php echo @$username; ?>"/>
											</div>
											<div class="4u 12u(mobile)">
												<input type="password" name="password" placeholder="Password"  />
											</div>
										
										
										<div class="4u 12u(mobile)">
												<input type="password" name="confirm_password" placeholder="Confirm Password" "/>
											</div>
										</div>
										<div class="row 50%">
											<div class="6u 12u(mobile)">
												<input type="text" name="address" placeholder="Office Address" value="<?php echo @$address; ?>"/>
											</div>
											<div class="3u 12u(mobile)">
												<input type="text" name="phone" placeholder="Office No" value="<?php echo @$phone; ?>"/>
											</div>
											<div class="3u 12u(mobile)">
												<input type="text" name="phone_2" maxlength="14" placeholder="Office No-2" value="<?php echo @$phone_2; ?>" />
											</div>
										</div>
										<div class="row">
											<div class="12u">
												<ul class="buttons">
													<li><input type="submit" class="special" value="Register" /></li>
												</ul>
											</div>
										</div>
									</form>
								</div>

						</section>

				</article>
<?php
	}else if(loggedin()){

	$message = "<strong>Hey...</strong>You are already logged in";

//<!-- Main -->
			echo $form = '<!-- Main -->
				<article id="main">

					<header class="special container">
						
					</header>
						<!-- One -->
						<section class="wrapper style2 container special-alt">
							<div class="row 50%">
								<div class="8u 12u(narrower)">

									<header>
										<h3>'.@$message.'</h3>
									</header>
									<p>Please sign out to login as a different user.</p>
									

								</div>
								<div class="4u 12u(narrower) important(narrower)">

									<ul class="featured-icons">
										
										<li><span class="icon fa-cart-arrow-down"><span class="label">Feature 6</span></span></li>
									</ul>

								</div>
							</div>
						</section>';
				}
?>
<?php 
require 'includes/footer.php';
 ?>
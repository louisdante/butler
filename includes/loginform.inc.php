<?php 

if (isset($_POST['email']) && isset($_POST['password'])) {
	# code...
	$username = $_POST['email'];
	$password = $_POST['password'];
	$password_hash = md5($password);
	if (!empty($username) && !empty($password)) {
		# code...
		$query = "SELECT `id` FROM `users` WHERE `username` = '$username' AND `password` = '$password_hash'";
			if ($query_run = mysql_query($query)) {
				# code...
				$query_num_rows = mysql_num_rows($query_run);
				if ($query_num_rows == 0) {
					# code...
					$message= "invalid username/password combination";
				}else if($query_num_rows == 1){
						
					echo $user_id = mysql_result($query_run,0,'id');
					$_SESSION['user_id'] = $user_id;
					header('Location: makeorder.php');
 				}

			}
		
	}else{
		$message = "You must supply a username and password";
	}
}


 ?>



<!-- Main -->
				<article id="main">

					<header class="special container">
						<span class="icon fa-envelope"></span>
						<h2>Welcome to Butlers</h2>
						<p>Sign In to proceed</p>
						<p style="color: #ED1F71;"><?php echo @$message; ?></p>
					</header>

					<!-- One -->
						<section class="wrapper style4 special container 75%">

							<!-- Content -->
								<div class="content">
									<form method="post" action="<?php echo $current_file; ?>">
										<div class="row 50%">
											<div class="6u 12u(mobile)">
												<input type="email" name="email" placeholder="Email Address" />
											</div>
											
											<div class="6u 12u(mobile)">
												<input type="password" name="password" placeholder="Password" />
											</div>
										</div>
										
										
										<div class="row">
											<div class="12u">
												<ul class="buttons">
													<li><input type="submit" class="special" value="Login" /></li>
												</ul>
											</div>
											
										</div>
									</form>
								</div>

						</section>

				</article>
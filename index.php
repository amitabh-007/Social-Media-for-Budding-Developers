<!DOCTYPE html>
<html>
	<head>
		<meta ame="viewport" content="width=device-width, initial-scale=1">
		<title>Sign In</title>
		<link rel="stylesheet" href="style3.css">
	</head>
	<body>
		<section>
			<div class="imgBx">
				<img src="ads1.png">
			</div>
			<div class="contentBx">
				<div class="formBx">
					<h2>Sign In</h2>
							  <?php if (isset($_GET['error'])): ?>
		<error><?php echo $_GET['error']; ?></error>
	<?php endif ?>
	<?php if (isset($_GET['success'])): ?>
            <success><?php echo $_GET['success']; ?></success>
        <?php endif ?>
					<form method='POST' action='login.php'>
						<div class="inputBx">
							<span>Username</span>
							<input type="text" name="uname">
						</div>
						<div class="inputBx">
							<span>Password</span>
							<input type="password" name="pwd">
						</div>
						<div class="remember">
							<label><input type="checkbox" name="remember"> Remember Me</label>
						</div>
						<div class="inputBx">
							<input type="submit" value="Log in" name="sub">
						</div>
						<div class="inputBx">
							<p>Don't have an account? <a href="signup.php">Sign Up</a></p>
						</div>
					</form>
				</div>
			</div>

		</section>
	</body>
</html>
<!-- Authors: Fred Morsy and Yifan He-->
<?php
	//We need to have a session started on ALL pages
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>ScratchBot</title>
	<!--<link rel="stylesheet" type="text/css" href="bootstrap.css">-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<li><a href="index.php"><h2>ScratchBot</h2></a></li>
			</ul>
			<div class="nav-login">
				<?php
					//If the user is logged in ("u_id" does exist), then we display the logout form
					if (isset($_SESSION['u_id'])) {
						echo '<form action="includes/logout.inc.php" method="POST">
							<button type="submit" name="submit">Logout</button>
						</form>';
					}
					//If the user is not logged in ("u_id" doesn't exist), then we display the login form
					else {
						echo '<form action="includes/login.inc.php" method="POST">
							<input type="text" name="uid" placeholder="Username/e-mail">
							<input type="password" name="pwd" placeholder="password">
							<button type="submit" name="submit">Login</button>
						</form>
						<a href="signup.php">Sign up</a>';
					}
				?>
			</div>
		</div>
	</nav>
</header>
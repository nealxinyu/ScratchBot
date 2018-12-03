<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>ScratchBot</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">ScratchBot</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="help.php">Help</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                    //If the user is logged in
                    if (isset($_SESSION['u_id'])) {
                        echo '
                        <li><a href="user.php">'.$_SESSION['u_uid'].'</a></li>
                        <li>
                            <form action="includes/logout.inc.php" method="POST">
                                <button type="submit" name="submit" class="btn btn-outline-danger" style="margin-top: 8px;">Logout</button>
                            </form>
                        </li>';
                    }
                    //If the user is not logged in
                    else {
                        echo '
                        <li><a href="signup.php">Sign up</a></li>
                        <li><a href="login.php">Login</a></li>
                        ';
                    }
                ?>
            </ul>
        </div>
    </nav>

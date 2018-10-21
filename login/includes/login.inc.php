<!-- Authors: Fred Morsy and Yifan He-->
<?php

	//First we start a session
	session_start();

	//We then check if the user has clicked the login button
	if (isset($_POST['submit'])) {

		//Then we include the database connection
		include_once 'dbh.inc.php';
		//And we get the data from the login form
		$uid = $_POST['uid'];
		$pwd = $_POST['pwd'];

		//Error handlers
		//Error handlers are important to avoid any mistakes the user might have made when filling out the form!
		//Check if inputs are empty
		if (empty($uid) || empty($pwd)) {
			header("Location: ../index.php?login=empty");
			exit();
		}
		else {
			//Check if username exists in the database USING PREPARED STATEMENTS
			$sql = "SELECT * FROM users WHERE user_uid=?";
			//Create a prepared statement
			$stmt = mysqli_stmt_init($conn);
			//Check if prepared statement fails
			if(!mysqli_stmt_prepare($stmt, $sql)) {
			    header("Location: ../index.php?login=error");
			    exit();
			}
			//If the prepared statement didn't fail, then continue
			else {
				//Bind parameters/data to the placeholder (?) in our $sql
				mysqli_stmt_bind_param($stmt, "s", $uid);

				//Run query in database
				mysqli_stmt_execute($stmt);

				//Get results from query
	      $result = mysqli_stmt_get_result($stmt);

				//If we had a result, which means the username does exist, then assign the database row data to $row.
				if ($row = mysqli_fetch_assoc($result)) {
					//De-hashing the password using the password provided by the user, and the password from the database, to see if they match.
					$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
					//If they didn't match!
					if ($hashedPwdCheck == false) {
						header("Location: ../index.php?login=error");
						exit();
					}
					//If they did match!
					elseif ($hashedPwdCheck == true) {
						//Set SESSION variables and log user in
						$_SESSION['u_id'] = $row['user_id'];
						$_SESSION['u_first'] = $row['user_first'];
						$_SESSION['u_last'] = $row['user_last'];
						$_SESSION['u_email'] = $row['user_email'];
						$_SESSION['u_uid'] = $row['user_uid'];
						header("Location: ../index.php?login=success");
						exit();
					}
	      } else {
	        header("Location: ../index.php?login=error");
				exit();
	      }
			}
		}

		//Close the prepared statement
		mysqli_stmt_close($stmt);

	} else {
		header("Location: ../index.php?login=error");
		exit();
	}
?>
<?php
	//We then check if the user has clicked the signup button
	if (isset($_POST['submit'])) {

		//Then we include the database connection
		include_once 'dbh.inc.php';
		//And we get the data from the signup form
		$first = $_POST['first'];
		$last = $_POST['last'];
		$email = $_POST['email'];
		$uid = $_POST['uid'];
		$pwd = $_POST['pwd'];

		//Error handlers
		//Error handlers are important to avoid any mistakes the user might have made when filling out the form!
		//Check for empty fields
		if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
			header("Location: ../signup.php?signup=empty");
			exit();
		} else {
			//Check if input characters are valid
			if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
				header("Location: ../signup.php?signup=invalid");
				exit();
			} else {
				//Check if email is valid
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					header("Location: ../signup.php?signup=invalid-email");
					exit();
				} else {
					//Check if username exists USING PREPARED STATEMENTS
					$sql = "SELECT * FROM users WHERE user_uid=?";
					//Create a prepared statement
					$stmt = mysqli_stmt_init($conn);
					//Check if prepared statement fails
					if(!mysqli_stmt_prepare($stmt, $sql)) {
					    header("Location: ../index.php?login=error");
					    exit();
					} else {
						//Bind parameters to the placeholder
						//The "s" means we are defining the placeholder as a string
						mysqli_stmt_bind_param($stmt, "s", $uid);

						//Run query in database
						mysqli_stmt_execute($stmt);

						//Check if user exists
						mysqli_stmt_store_result($stmt);
						$resultCheck = mysqli_stmt_num_rows($stmt);
						if ($resultCheck > 0) {
							header("Location: ../signup.php?signup=usertaken");
							exit();
						} else {
							//Hashing the password
							$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
							//Insert the user into the database
							$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd)
							VALUES (?, ?, ?, ?, ?);";
							//Create second prepared statement
							$stmt2 = mysqli_stmt_init($conn);

							//Check if prepared statement fails
							if(!mysqli_stmt_prepare($stmt2, $sql)) {
							    header("Location: ../index.php?login=error");
							    exit();
							} else {
								//Bind parameters to the placeholder
								mysqli_stmt_bind_param($stmt2, "sssss", $first, $last, $email, $uid, $hashedPwd);

								//Run query in database
								mysqli_stmt_execute($stmt2);
								header("Location: ../login.php?signup=success");
								exit();
							}
						}
					}
				}
			}
		}

		//Close first statement
		mysqli_stmt_close($stmt);
		//Close second statement
		mysqli_stmt_close($stmt2);

	} else {
		header("Location: ../signup.php");
		exit();
	}
?>

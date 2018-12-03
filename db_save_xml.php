<?php
session_start();

if(isset($_SESSION['u_id'])) {
  if(isset($_POST['xml'])) {
    $server = "db4free.net";
    $username = "scratchbot";
    $password = "qaz123wsx";
    $dbname = "scratchbot";

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO `blocks` (content, botName, user_id)
    VALUES ('".$_POST['xml']."','".$_POST['botName']."',".$_SESSION['u_id'].");";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }
}

?>

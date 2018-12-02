<?php
session_start();

if(isset($_SESSION['u_id'])) {
  if(isset($_POST['orderType']) && isset($_POST['orderFood'])) {
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

    $sql = "INSERT INTO `order` (orderPhone, orderEmail, orderFood, orderType, orderName, orderAddress, user_id)
    VALUES ('".$_POST['orderPhone']."','".$_POST['orderEmail']."','".$_POST['orderFood']."','".$_POST['orderType']."','".$_POST['orderName']."','".$_POST['orderAddress']."','".$_SESSION['u_id']."')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }
}
?>

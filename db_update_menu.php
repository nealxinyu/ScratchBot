<?php
session_start();

if (isset($_SESSION['u_id'])) {
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

  $sql = "INSERT INTO menu
    (`user_id`, `menu`)
  VALUES
    (".$_SESSION['u_id'].", `".$_POST['menuContent']."`)
  ON duplicate KEY UPDATE
    `menu` = VALUES(`menu`);"


  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo $row["menu"];
      }
  } else {
      echo "0 results";
  }
  $conn->close();
} else {
    echo "please login";
}


?>

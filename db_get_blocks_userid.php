<?php
session_start();

if (isset($_POST['botId'])) {
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

  $sql = "SELECT content, user_id FROM `blocks` WHERE botId=".$_POST['botId'];
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo $row["content"];
          echo "<split>";
          echo $row["user_id"];
      }
  } else {
      echo "0 results";
  }
  $conn->close();
} else {
    echo "please post";
}


?>

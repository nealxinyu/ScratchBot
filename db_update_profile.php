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

  $sql = "SELECT menu FROM `menudata` WHERE user_id=".$_SESSION['u_id'];
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

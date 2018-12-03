<?php

if (isset($_POST['user_id'])) {
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

  $sql = "SELECT `restaurantName`,`restaurantPhone`,`restaurantAddress` FROM `users` WHERE user_id=".$_POST['user_id'];
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo $row["restaurantName"];
          echo ",";
          echo $row["restaurantPhone"];
          echo ",";
          echo $row["restaurantAddress"];
      }
  } else {
      echo "0 results";
  }
  $conn->close();
} else {
    echo "please login";
}

?>

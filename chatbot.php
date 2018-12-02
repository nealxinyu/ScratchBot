<?php
	include_once 'header.php';
?>

<style>
	<?php include 'css/menu.css'; ?>
</style>
	
<?php

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

  $sql = "SELECT botName, botId FROM blocks WHERE user_id=".$_SESSION['u_id'];
  $result = $conn->query($sql);
  
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	  echo $row['botName'] . " " .$row["botId"];
  }
} else {
    
    echo "<h2>Oops, looks like don't have a Chatbot...</h2>";
    echo "<h2>Click here to type a create a new Chatbot <a href=\"uploadmenu.php\">Click Here<br></a></h2>";  //php要改
}

  $conn->close();
?>

<?php
	include_once 'footer.php';
?>
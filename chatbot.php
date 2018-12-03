<?php
	include_once 'header.php';
?>

<style>
	<?php include 'css/menu.css'; ?>
</style>
<div class="container">
  <div class="row">
    <div class="col-md-3 ">
      <?php
      // Display a message when the user logs in
        if (isset($_SESSION['u_id'])) {
          echo  "<h2>".($_SESSION['u_uid']."</h2>");
        }
      ?>
         <div class="list-group ">
              <a href="user.php" class="list-group-item list-group-item-action ">Profile</a> 

              <a href="viewmenu.php" class="list-group-item list-group-item-action ">View Menu</a>
              <a href="uploadmenu.php" class="list-group-item list-group-item-action">Edit Menu</a>
              <a href="chatbot.php" class="list-group-item list-group-item-action active">Saved ChatBot</a>
              <a href="order.php" class="list-group-item list-group-item-action">Order</a> 
 
            </div> 
    </div>
    <div class="col-md-9">
	

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
	  //echo $row['botName'] . " " .$row["botId"];
	  echo "<a href=\"bot.php?botId=". $row["botId"] ."\">".$row['botName']."</a><br>";
  }
} else {
    
    echo "<h2>Oops, looks like don't have a Chatbot...</h2>";
    echo "<h2>Click here to type a create a new Chatbot <a href=\"uploadmenu.php\">Click Here<br></a></h2>";  //php要改
}

  $conn->close();
?>
</div>


<?php
	include_once 'footer.php';
?>
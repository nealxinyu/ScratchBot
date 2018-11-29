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

  $sql = "SELECT menu FROM menudata WHERE user_id=".$_SESSION['u_id'];
  $result = $conn->query($sql);
  //echo ($result);
  //echo json_decode($result);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      //echo $row["menu"] . "<br>";
      $result_decode = json_decode($row["menu"], true);
      //$test = '[{"name": "Burger", "price": "$6.99"}, {"name": "Egg","price": "$3.99"}]';
      //echo $test;
      //$test_decode = json_decode($test, true);
      //print_r($res); Array
      //var_dump($res);
      //$character = json_decode($row["menu"]);
      //echo $character->name;
      foreach ($result_decode as $key => $value) {
        echo $value["name"] . "," . $value["price"] . "<br>";
      }
    }
} else {
    echo "0 results";
}

  $conn->close();


?>


<?php
	include_once 'footer.php';
?>
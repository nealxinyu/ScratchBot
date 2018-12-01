<?php // Create a database connection.
$dbhost = "db4free.net";
$dbuser = "scratchbot";
$dbpass = "qaz123wsx";
$dbname = "scratchbot";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

//Test if connection occurred.
if (mysqli_connect_errno()) {
die("Database connection failed: " .
mysqli_connect_error() .
" (" . mysqli_connect_errno() . ")"
);
}

//Perform database query
$name = $_POST['menu'];
$user = $_POST['user_id'];
//echo $name;
//echo $user;

//$title = $_POST['title'];
//$body = $_POST['body'];
$userString = $_POST['menu'];
$myArray = explode(', ', $userString); 
$jsonString = "[{\"name\": " . "\"" . $myArray[0] . "\"" . "," . "\"price\": " . "\"" . $myArray[1] . "\"" . "}]";

//This function will clean the data and add slashes.
// Since I'm using the newer MySQL v. 5.7.14 I have to addslashes
$name = mysqli_real_escape_string($connection, $name);
$user = mysqli_real_escape_string($connection, $user);
//$body = mysqli_real_escape_string($connection, $body);

//This should retrive HTML form data and insert into database
//$query  = "INSERT INTO menudata (menu, user_id) VALUES ('".$_POST["menu"]."','".$_POST["user_id"]."');";
$query  = "INSERT INTO menudata (menu, user_id) VALUES ('". $jsonString ."','".$_POST["user_id"]."');";
//$query = "UPDATE `menudata` SET `menu` = '[{\"name\": \"Peking Duck\",\"price\": \"$26.99\"}, {\"name\": \"Duck\",\"price\": \"$16.99\"}]' WHERE `menudata`.`menu_id` = 25";
//$query = "UPDATE menudata SET menu = CONCAT($jsonString, $jsonString[0]) WHERE user_id = ".$_POST["user_id"]."";
        $result = mysqli_query($connection, $query);
        //Test if there was a query error
        if (empty($result)) {
            //echo $jsonString;

            header("Location: /uploadmenufail.php");
            //echo "<script> window.alert(\"Please input valid dish!!!\")</script>";
            exit;
        } else if ($result) {
            //SUCCESS
        //header('Location: activity.php');
            //echo "Success<br>";
            //$bool = true;
            //while ($bool == true) {
            //    header("Location: /uploadmenu.php");
            //}
            //echo $jsonString;
            header("Location: /viewmenu.php");
            exit;
        } else {
            //FAILURE
            header("Location: /uploadmenu.php");
            echo "<script>function myFunction() {alert(Please input valid menu!!!);}</script>";

            die("Database query failed. " . mysqli_error($connection)); 
            //last bit is for me, delete when done
        }

mysqli_close($connection);
?>

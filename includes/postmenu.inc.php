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

//This function will clean the data and add slashes.
// Since I'm using the newer MySQL v. 5.7.14 I have to addslashes
$name = mysqli_real_escape_string($connection, $name);
$user = mysqli_real_escape_string($connection, $user);
//$body = mysqli_real_escape_string($connection, $body);

//This should retrive HTML form data and insert into database
$query  = "INSERT INTO menudata (menu, user_id) 
            VALUES ('".$_POST["menu"]."','".$_POST["user_id"]."');";

        $result = mysqli_query($connection, $query);
        //Test if there was a query error
        if ($result) {
            //SUCCESS
        //header('Location: activity.php');
            //echo "Success<br>";
            header("Location: /viewmenu.php");
        } else {
            //FAILURE
            die("Database query failed. " . mysqli_error($connection)); 
            //last bit is for me, delete when done
        }

mysqli_close($connection);
?>

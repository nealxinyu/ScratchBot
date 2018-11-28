<?php include "header.php"?>
<?php
	$name = ''; // store dishName
	$price = ''; // store dishPrice

	function clean_text($string) {
		$string = trim($string);
		$string = stripslashes($string);
		$string = htmlspecialchars($string);
		return $string;
	}
	if (isset($_POST["submit"])) {
		include_once 'dbh.inc.php';
		$name = clean_text($_POST["dishName"]);
		$price = clean_text($_POST["dishPrice"]);
	}
	$file_open = fopen("menudata.csv", "a+");
	$num_rows = count(file("menudata.csv")); //count the rows of file returned
	if ($num_rows > 1) {
		$nums_rows = ($num_rows - 1) + 1;
	}
	$form_data = array("Number" => $num_rows, "Name" => $name, "Price" => $price); //store info as an array in csv file
	fputcsv($file_open, $form_data);
	$name = ''; //after submit the name, clear the name;
	$price = '';
?>

<form method="POST">
	<img class="mb-4" src="chat.svg" alt="" width="150" height="150">

  	<h1 class="h3 mb-3 font-weight-normal">Please Enter the Menu</h1>

  	<input type="text" name="dishName" class="form-control" placeholder="Enter the Name of the Dish" required>
  	<input type="text" name="dishPrice" class="form-control" placeholder="Enter the Price of the Dish" required>

	<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Submit</button>

</form>

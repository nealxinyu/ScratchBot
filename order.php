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

              <a href="viewmenu.php" class="list-group-item list-group-item-action">View Menu</a>
              <a href="uploadmenu.php" class="list-group-item list-group-item-action">Edit Menu</a>
              <a href="chatbot.php" class="list-group-item list-group-item-action">Saved ChatBot</a>
              <a href="order.php" class="list-group-item list-group-item-action active">Order</a>
              <a type="button" href="/editblocks.php" style="width:100%; margin-top:20px" class="btn btn-success btn-lg">Create your bot !</a>
            </div>
		</div>

		<center>
    		<div class="col-md-9">
    			<h3>Saved Orders</h3>
    			<table class="table" border="1">
  				<thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">OderId</th>
				      <th scope="col">OrderType</th>
				      <th scope="col">OrderFood</th>
				      <th scope="col">OrderName</th>
				      <th scope="col">OrderAddress</th>
				      <th scope="col">OrderEmail</th>
				      <th scope="col">OrderPhone</th>
				      <th scope="col">OrderTime</th>
				    </tr>
  				</thead>
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

	    $sql = "SELECT * FROM `order` WHERE user_id = ".$_SESSION['u_id'];
    	$result = $conn->query($sql);
    	//echo $result;
    	//echo $sql;
    	$inc = 1;
    	if ($result->num_rows > 0) {
      // output data of each row
    		//echo "here";
    		/*echo "<center>" .
		        		"<div class=\"col-md-9\">" .
		        			"<h3>Saved Orders:</h3>" .
							    "<table class=\"table\">" .
							    	"<thead>" .
							    		"<tr>".
							    			"<th scope=\"col\">#</th>".
							    			"<th scope=\"col\">orderId</th>".
							    			"<th scope=\"col\">orderType</th>".
							    			"<th scope=\"col\">orderFood</th>".
							    			"<th scope=\"col\">orderName</th>".
							    			"<th scope=\"col\">orderAddress</th>".
							    			"<th scope=\"col\">orderPhone</th>".
							    			"<th scope=\"col\">orderTime</th>".
							    		"</tr>".
							    	"</thead>" .
							    "</table>" .
							"</div>" .
						"</center>";
						*/
						$inc = 1;
	      	while($row = $result->fetch_assoc()) {
	        //echo $row["menu"] . "<br>";
	      		//echo ""

	        	echo //"<center>" .
		        	//	"<div class=\"col-md-9\">" .
		        	//		"<h3>Saved Orders:</h3>" .
					//		    "<table class=\"table\">" .
					//		    	"<thead>" .
					//		    		"<tr>".
					//		    			"<th scope=\"col\">#</th>".
					//		    			"<th scope=\"col\">orderId</th>".
					//		    			"<th scope=\"col\">orderType</th>".
					//		    			"<th scope=\"col\">orderFood</th>".
					//		    			"<th scope=\"col\">orderName</th>".
					//		    			"<th scope=\"col\">orderAddress</th>".
					//		    			"<th scope=\"col\">orderPhone</th>".
					//		    			"<th scope=\"col\">orderTime</th>".
					//		    		"</tr>".
					//		    	"</thead>" .

							        "<tbody>" .
							        	"<tr>" .
							        		"<th scope=\"row\">" . $inc . "</th>" .
							        			"<td>" . $row["orderId"] . "</td>" .
							        			"<td>" . $row["orderType"] . "</td>" .
							        			"<td>" . $row["orderFood"] . "</td>" .
							        			"<td>" . $row["orderName"] . "</td>" .
							        			"<td>" . $row["orderAddress"] . "</td>" .
							        			"<td>" . $row["orderPhone"] .  "</td>" .
							        			"<td>" . $row["orderEmail"] .  "</td>" .
							        			"<td>" . $row["orderTime"] . "</td>" .
							       		"</tr>" .
							        "</tbody>";

	        $inc += 1;
	    }
  	} else {
  		echo "else here";
  	}

	 ?>
				</table>
			</div>
		</center>

	<!--<?php

	/*
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

	    $sql = "SELECT * FROM `order` WHERE user_id = ".$_SESSION['u_id'];
    	$result = $conn->query($sql);
    	//echo $result;
    	//echo $sql;
    	$inc = 1;
    	if ($result->num_rows > 0) {
      // output data of each row
    		//echo "here";
    		/*echo "<center>" .
		        		"<div class=\"col-md-9\">" .
		        			"<h3>Saved Orders:</h3>" .
							    "<table class=\"table\">" .
							    	"<thead>" .
							    		"<tr>".
							    			"<th scope=\"col\">#</th>".
							    			"<th scope=\"col\">orderId</th>".
							    			"<th scope=\"col\">orderType</th>".
							    			"<th scope=\"col\">orderFood</th>".
							    			"<th scope=\"col\">orderName</th>".
							    			"<th scope=\"col\">orderAddress</th>".
							    			"<th scope=\"col\">orderPhone</th>".
							    			"<th scope=\"col\">orderTime</th>".
							    		"</tr>".
							    	"</thead>" .
							    "</table>" .
							"</div>" .
						"</center>";
						*/
	      	//while($row = $result->fetch_assoc()) {
	        //echo $row["menu"] . "<br>";
	      		//echo ""

	        	/*echo "<center>" .
		        		"<div class=\"col-md-9\">" .
		        			"<h3>Saved Orders:</h3>" .
							    "<table class=\"table\">" .
							    	"<thead>" .
							    		"<tr>".
							    			"<th scope=\"col\">#</th>".
							    			"<th scope=\"col\">orderId</th>".
							    			"<th scope=\"col\">orderType</th>".
							    			"<th scope=\"col\">orderFood</th>".
							    			"<th scope=\"col\">orderName</th>".
							    			"<th scope=\"col\">orderAddress</th>".
							    			"<th scope=\"col\">orderPhone</th>".
							    			"<th scope=\"col\">orderTime</th>".
							    		"</tr>".
							    	"</thead>" .
							        "<tbody>" .
							        	"<tr>" .
							        		"<th scope=\"row\">" . $inc . "</th>" .
							        			"<td>" . $row["orderId"] . "</td>" .
							        			"<td>" . $row["orderType"] . "</td>" .
							        			"<td>" . $row["orderName"] . "</td>" .
							        			"<td>" . $row["orderAddress"] . "</td>" .
							        			"<td>" . $row["orderPhone"] .  "</td>" .
							        			"<td>" . $row["orderEmail"] .  "</td>" .
							        			"<td>" . $row["orderTime"] . "</td>" .
							       		"</tr>" .
							        "</tbody>" .
							    "</table>" .
		        			"</div>" .
	        			"</center>";

	    }
  	} else {
  		echo "else here";
  	}
	*/
	    ?>

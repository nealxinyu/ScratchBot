<?php
	include_once 'header.php';
?>
<style>
	<?php include 'css/menu.css'; ?>
</style>
<!--
<div class="jumbotron">

	<div class="container">
		<div class="col-sm-3">
		<h2>Home</h2> 	
		<?php
		// Display a message when the user logs in
			//if (isset($_SESSION['u_id'])) {
			//	echo  "<h2>".($_SESSION['u_uid']."</h2>");
			//}
		?>
		<a href="viewmenu.php">View Menu</a>
		<br>
		<a href="uploadmenu.php">Upload Menu</a>
		<br>
		<a href="chatbot.php">ChatBot</a>
		</div>
	</div>
</div>
-->
<?php
    $server = "db4free.net";
    $username = "scratchbot";
    $password = "qaz123wsx";
    $dbname = "scratchbot";

    $userId;
    $userFirst;
    $userLast;
    $userEmail;
    $restaurantName;
    $restaurantPhone;
    $restaurantAddress;
    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE user_id=".$_SESSION['u_id'];
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        //echo $row["menu"] . "<br>";
        //echo "<h1>" . $row["restaurantName"] . "</h1>";
        $userId = $row["user_id"];
        $userFirst = $row["user_first"];
        $userLast = $row["user_last"];
        $userEmail = $row["user_email"];
        $restaurantName = $row["restaurantName"];
        $restaurantPhone = $row["restaurantPhone"];
        $restaurantAddress = $row["restaurantAddress"];

        //echo $restaurantName;
      }
    }
?>
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
		      <a href="user.php" class="list-group-item list-group-item-action active">Profile</a> 
              <a href="viewmenu.php" class="list-group-item list-group-item-action">View Menu</a>
              <a href="uploadmenu.php" class="list-group-item list-group-item-action">Edit Menu</a>
              <a href="chatbot.php" class="list-group-item list-group-item-action">Saved ChatBot</a> 
            </div> 
		</div>
		<div class="col-md-9">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-12">
		                    <h4>Your Profile</h4>
		                    <hr>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-12">
		                    <form>
                              <div class="form-group row">
                                
                                <div class="col-8">
                                 
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">First Name: </label> 
                                <div class="col-8">
                                  
								<input id="firstname" name="firstname" placeholder= "<?php echo $userFirst?>" class="form-control here" type="text" value="<?php echo $userFirst?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Last Name</label> 
                                <div class="col-8">
                                  <input id="lastname" name="lastname" placeholder= "<?php echo $userLast?>" class="form-control here" type="text" value="<?php echo $userLast?>">
                                </div>
                              </div>
                              
                              <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Email</label> 
                                <div class="col-8">
                                  <input id="email" name="email" placeholder= "<?php echo $userEmail?>" class="form-control here" type="text" value="<?php echo $userEmail?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="restaurantName" class="col-4 col-form-label">Restaurant Name</label> 
                                <div class="col-8">
                                  <input id="restaurantName" name="restaurantName" placeholder= "<?php echo $restaurantName?>" class="form-control here" type="text" value="<?php echo $restaurantName ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="restaurantPhone" class="col-4 col-form-label">Restaurant Phone</label> 
                                <div class="col-8">
                                  <input id="restaurantPhone" name="restaurantPhone" placeholder= "<?php echo $restaurantPhone?>" class="form-control here" type="text" value="<?php echo $restaurantPhone ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="restaurantAddress" class="col-4 col-form-label">Restaurant Address</label> 
                                <div class="col-8">
                                  <input id="restaurantAddress" name="restaurantAddress" placeholder= "<?php echo $restaurantAddress?>" class="form-control here" type="text" value="<?php echo $restaurantAddress ?>">
                                </div>
                              </div>
                              
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button onclick="getUserInfo()"name="submit" type="submit" class="btn btn-primary">Update My Profile</button>
                                </div>
                              </div>
                            </form>
		                </div>
		            </div>
		            
		        </div>
		    </div>
		</div>
	</div>
</div>
<?php
	include_once 'footer.php';
?>

<script>
function getUserInfo() {
    var firstName = document.getElementById("firstname").value;
	var lastName = document.getElementById("lastname").value;
	var email = document.getElementById("email").value;
	var restaurantName = document.getElementById("restaurantName").value;
	var restaurantPhone = document.getElementById("restaurantPhone").value;
	var restaurantAddress = document.getElementById("restaurantAddress").value;
	
	
	console.log(firstName);
	console.log(lastName);
	console.log(email);
	console.log(restaurantName);
	console.log(restaurantPhone);
	console.log(restaurantAddress);
}
</script>


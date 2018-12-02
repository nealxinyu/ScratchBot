<?php
	include_once 'header.php';
?>

<style>
	<?php include 'css/menu.css'; ?>
</style> 

<script src="uploadmenu.js"></script>
<!--
<div class="jumbotron container">
  
  <center>
  		<p>
  			<form action ="includes/postmenu.inc.php" method = "post">
    	        <fieldset>
                
	                <h2>Enter Menu and Price:</h2> <br><br>
                	<input type="text" name="menu" id = "menu" placeholder="Item&Price"><br><br>
    	            <input type="number" name="user_id" id = "user_id" placeholder="Your ID"><br><br>
	                <form action="viewmenu.php" method="get">
                		<input class="btn btn-primary btn-lg" type="submit" name = "submit" id="submit">
                		<br/>
                	</form>

            	</fieldset>
			</form>

  		</p>
	</center>  
-->
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
              <a href="uploadmenu.php" class="list-group-item list-group-item-action active">Edit Menu</a>
              <a href="chatbot.php" class="list-group-item list-group-item-action">Saved ChatBot</a> 
            </div> 
		</div>		
		<div class="col-md-9">

	<form action ="includes/postmenu.inc.php" method = "post">
    <table id="myTable" class=" table order-list">
     	<form action ="includes/postmenu.inc.php" method = "post">

		    <thead>
		        <tr>
		            <td>Name</td>
		            <td>Price</td>
		            
		        </tr>
		    </thead>
		    <tbody>

		        <tr id = "myRow">
		            <td class="col-sm-3 " id="myTd">	
		                <input id="menu0" name="menu" placeholder="Item Name" class="form-control">
		            </td>
		            <td class="col-sm-3 price">
		                <input id="price0" name="price" placeholder="Price" class="form-control">
		            </td>
		            
		            <td class="col-sm-2"><a class="deleteRow"></a>

		            </td>
		        </tr>
		    </tbody>

		    <tfoot>
		        <tr>
		            <td colspan="5" style="text-align: left;">
		                <input type="button" class="btn btn-lg btn-block " id="addrow" value="Add Row" />
		                <center>
		                	<br>
		                	<form action="viewmenu.php" method="get">

		                		<input class="btn btn-primary btn-lg" type="submit" name = "submit" id="submit">
		                	</form>
		                </center>
		            </td>
		        </tr>
		        <tr>
		        </tr>
		    </tfoot>
	</form>
</table>
</div>
</form>
</div>



<!--<form action ="includes/postmenu.inc.php" method = "post">
            <fieldset>
                
                Enter Menu and Price: <br><br>
                <input type="text" name="menu" id = "menu" placeholder="Item&Price"><br><br>
                <input type="number" name="user_id" id = "user_id" placeholder="Your ID"><br><br>
                <form action="viewmenu.php" method="get">
                	<input type="submit" name = "submit" id="submit">
                	<br/>
                </form>

            </fieldset>
</form>-->
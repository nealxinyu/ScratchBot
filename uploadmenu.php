<?php
	include_once 'header.php';
?>

<style>
	<?php include 'css/menu.css'; ?>
</style>

<script src="uploadmenu.js"></script>

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

    <table id="myTable" class=" table order-list">

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
		                <input onclick="addRow()" type="button" class="btn btn-lg btn-block " id="addrow" value="Add Row" />
		                <center>
		                	<br>
		                		<input onclick="updateMenu()" class="btn btn-primary btn-lg" type="submit" name = "submit" id="submit">
		                </center>
		            </td>
		        </tr>
		        <tr>
		        </tr>
		    </tfoot>
</table>
</div>
</div>

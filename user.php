<?php
	include_once 'header.php';
?>
<style>
	<?php include 'css/menu.css'; ?>
</style>
<div class="jumbotron container">

	<div class="container">
		<div class="col-sm-3">
		<h2>Home</h2> 	
		<?php
		// Display a message when the user logs in
			if (isset($_SESSION['u_id'])) {
				echo  "<h2>".($_SESSION['u_uid']."</h2>");
			}
		?>
		<a href="viewmenu.php">View Menu</a>
		<br>
		<a href="uploadmenu.php">Upload Menu</a>
		<br>
		<a href="chatbot.php">ChatBot</a>
		</div>
	</div>
</div>
<?php
	include_once 'footer.php';
?>
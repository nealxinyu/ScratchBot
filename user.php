<?php
	include_once 'header.php';
?>

<div class="container">
	<h2>Home</h2>
	<?php
		// Display a message when the user logs in
		if (isset($_SESSION['u_id'])) {
			echo  "<h2>".($_SESSION['u_uid']."</h2>");
		}
	?>
</div>

<?php
	include_once 'footer.php';
?>

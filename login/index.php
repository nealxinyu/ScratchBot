<!-- Authors: Fred Morsy and Yifan He-->
<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Home</h2>
		<?php
			// Display a message when the user logs in
			if (isset($_SESSION['u_id'])) {
				echo  ($_SESSION['u_uid']." is logged in!");
			}
		?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>

<?php
	include_once 'header.php';
?>

<style>
	<?php include 'css/menu.css'; ?>
</style> 
<form action ="includes/postmenu.inc.php" method = "post">
            <fieldset>
                
                Enter Menu and Price: <br><br>
                <input type="text" name="menu" id = "menu" placeholder="Item&Price"><br><br>
                <input type="number" name="user_id" id = "user_id" placeholder="Your ID"><br><br>
                <form action="viewmenu.php" method="get">
                	<input type="submit" name = "submit" id="submit">
                	<br/>
                </form>

            </fieldset>
</form>
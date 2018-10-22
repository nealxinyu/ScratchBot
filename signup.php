<?php include_once 'header.php'; ?>
<style>
	<?php include 'css/signup.css'; ?>
</style>

<form class="form-signup" action="includes/signup.inc.php" method="POST">

  <img class="mb-4" src="chat.svg" alt="" width="150" height="150">

  <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>

  <input type="text" name="first" class="form-control" placeholder="Firstname" required autofocus>
  <input type="text" name="last" class="form-control" placeholder="Lastname" required>
  <input type="text" name="email" class="form-control" placeholder="E-mail" required>
  <input type="text" name="uid" class="form-control" placeholder="Username" required>
  <input type="password" name="pwd" class="form-control" placeholder="Password" required>

  <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign up</button>

</form>


<?php include_once 'footer.php'; ?>

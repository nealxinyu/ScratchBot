<?php include_once 'header.php'; ?>
<style>
  <?php include 'css/login.css'; ?>
</style>

<form class="form-login" action="includes/login.inc.php" method="POST">

  <img class="mb-4" src="chat.svg" alt="" width="150" height="150">

  <h1 class="h3 mb-3 font-weight-normal">Please login</h1>

  <input type="text" name="uid" id="inputEmail" class="form-control" placeholder="Username/Email address" required autofocus>
  <input type="password" name="pwd" id="inputPassword" class="form-control" placeholder="Password" required="">

  <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Login</button>

</form>

<?php include_once 'footer.php'; ?>

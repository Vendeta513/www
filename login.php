<?php
  require('includes/url.php');
  session_start();

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['name'] == "Keen" && $_POST['password'] == "secret") {

      $_SESSION['is_logged_in'] = true;
      redirect("/index.php");
    }else {
      $error = "incorrect log in.";
    }
  }
?>


<?php require("includes/header.php"); ?>

<?php if(! empty($error)): ?>
  <p><?= $error ?></p>
<?php endif; ?>

<h2>Log in</h2>
<form method="post">
  <div>
    <label for="name">Name:</label>
    <input type="text" name="name" id="name">
  </div>
  <div>
    <label for="pass">Password:</label>
    <input type="password" name="password" id="pass">
  </div>
  <div>
    <button>Log in</button>
  </div>
</form>
<?php require("includes/footer.php"); ?>

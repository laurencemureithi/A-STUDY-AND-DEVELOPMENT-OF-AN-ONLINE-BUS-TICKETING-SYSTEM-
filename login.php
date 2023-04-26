<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $mysqli = require __DIR__ . "/db_connect.php";

  // Login code
  $username = isset($_POST['username']) ? $_POST['username'] : '';
  $password = isset($_POST['password']) ? $_POST['password'] : '';

  $sql = "SELECT * FROM users WHERE username = '$username'";
  $result = $mysqli->query($sql);

  if ($result->num_rows > 0) {


    // User exists, check user type and password
    $row = $result->fetch_assoc();
    if ($row['user_type'] == '2' && $password=$row['password']) {

      echo "Login successful";
      // User login
      session_start();
      $_SESSION['user_type'] = '2';
      $_SESSION['user_id'] = $row['id'];
      // Redirect to user dashboard
     if (isset($_SESSION['user_type'])) {

      header('Location:account.php');}
      exit();
    } else {
      $is_invalid = true;
    }
  } else {
    $is_invalid = true;
  }

  $mysqli->close();
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style/auth.css">
  <?php include('header.php'); ?>
  <style>
  form {
  background: rgba(255, 255, 255, 0.6);
  box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
  backdrop-filter: blur(2.5px);
  -webkit-backdrop-filter: blur(2.5px);
  border-radius: 10px;
  padding: 20px 20px;
  border: 1px solid rgba(255, 255, 255, 0.18);
  width: 40%;
  margin: auto;
}

@media screen and (max-width:768px) {
  form {
    width: 90%;
  }
}

  </style>

</head>

<body>

    <?php if ($is_invalid): ?>
      <em>Invalid username or password.</em>
    <?php endif; ?>

    <form class="form" method="post">
    <h1>Login</h1>

      <label for="username" class="form-label">Username</label>
      <input class="form-control" name="username" id="username"
         required>

      <label for="password" class="form-label">Password</label>
      <input class="form-control" type="password" name="password" id="password" required>

      <div>
        <input type="checkbox" name="remember" id="remember">
        <label class="form-label" for="remember">Remember me</label>
      </div>

      <button class="btn btn-primary">Log in</button>
      <br>
      Don't have an account? <a href="signup.php">Register</a>

    </form>
  
</body>

</html>

<?php
require_once('user.php');
$user = new User();

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username']; 
  $email = $_POST['email']; 
  $password = $_POST['password'];

  // Check if the user already exists
      if ($user->user_exists($username)) {
          $message = "Username already exists. Please use a new one.";
      } else {
          // Check password length
          if (strlen($password) < 8) {
              $message = "Password must at Least 8 characters!";
          }
          // Check for at least one number
          elseif (!preg_match("#[0-9]+#", $password)) {
              $message = "Password must at Least 1 number!";
          }
          // Check for at least one uppercase letter
          elseif (!preg_match("#[A-Z]+#", $password)) {
              $message = "Password must at east 1 Capital Letter!";
          }
          // Check for at least one lowercase letter
          elseif (!preg_match("#[a-z]+#", $password)) {
              $message = "Password at Least 1 lowercase Letter!";
          }
          // all conditions are met, create user
          else {
              $user->create_user($username, $email, $password);
              header("Location: login.php?message=success");
              exit;
          }
      }
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
</head>
<body>
  <h1>Register</h1>
  <?php if ($message): ?>
    <p><?= htmlspecialchars($message) ?></p>
  <?php endif; ?>
  <form method="POST" action="userRegistration.php">
    Username: <input type="text" name="username" required><br> 
    Email: <input type="email" name="email" required><br> 
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" value="Register">
  </form>
</body>
</html>

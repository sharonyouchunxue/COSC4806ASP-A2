<?php
require_once('user.php');
$user = new User();

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username']; 
  $email = $_POST['email']; 
  $password = $_POST['password'];

  if ($user->user_exists($username)) {
    $message = "Username already exists. Please use a new one.";
  } else {
    if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password)) {
      $message = "Password must be at least 8 characters, at least one uppercase letter, one lowercase letter and one number.";
    } else {
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

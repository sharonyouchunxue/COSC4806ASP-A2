<?php
session_start();
require_once('user.php');

// Check if user is authenticated
if (!isset($_SESSION['authenticated'])) {
    header('Location: login.php');
    exit;
}

// Fetch the list of users
$user = new User();
$user_list = $user->get_all_users();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sharon</title>
</head>
<body>
  <h1>Assignment2</h1>
  <p>Welcome, <?= htmlspecialchars($_SESSION['username']) ?></p>

  <h2>All Users</h2>
  <pre>
    <?php print_r($user_list); ?>
  </pre>

  <footer>
    <p><a href="logout.php">Click here to logout</a></p>
  </footer>
</body>
</html>

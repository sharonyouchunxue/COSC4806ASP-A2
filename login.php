<?php 
 session_start();
 // Check for error attempt and display error message
 $error_message = "";
 if (isset($_GET['error']) && $_GET['error'] == 'invalid') {
     $error_message = "This is incorrect username or password. Please try again.";
 }

$success_message = "";
if (isset($_GET['message']) && $_GET['message'] == 'success') {
    $success_message = "User registered successfully!";
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
  </head>

  <body>
    <h1>Login Form</h1>
    <?php if ($error_message): ?>
        <div style="color: red;">
            <?= htmlspecialchars($error_message); ?>
        </div>
    <?php endif; ?>

    <?php if ($success_message): ?>
        <div style="color: green;">
            <?= htmlspecialchars($success_message); ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="/validate.php">
      <label for="username">Username:</label><br>
      <input type="text" id="username" name="username"><br>
      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password"><br><br>
      <input type="submit" value="Submit">
      <p>New User? <a href="userRegistration.php">Click here to register an account</a></p>
    </form> 

  </body>
</html>
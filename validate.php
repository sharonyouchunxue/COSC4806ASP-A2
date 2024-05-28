<?php

 session_start();
require_once('user.php');

 // $valid_username = "sharon";
 // $valid_password = "password";
 // $username = $_REQUEST['username'];
 // $_SESSION['username'] = $username;
 // $password = $_REQUEST['password'];

$user = new User();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
}
    if ($user->authenticate_user($username, $password)) {
      $_SESSION['authenticated'] = true;
      $_SESSION['username'] = $username;
      header('Location: index.php'); // Redirect to the index page
      exit;
 // if($valid_username == $username && $valid_password == $password){
 //   $_SESSION['authenticated'] = 1;
 //   header('location: /');
 //    //echo "success";
 } else {

   if(!isset($_SESSION['failed_attempts'])){
     $_SESSION['failed_attempts'] = 1;
   } else {
     $_SEESSION['failed_attempts'] = $_SESSION['failed_attempts'] + 1;
   }

   //redirect to login.php page
   // echo "This is unsuccessful attempt number: " . $_SESSION['failed_attempts'];
   header('Location: /login.php?error=invalid&failed_attempts=' . $_SESSION['failed_attempts']);
 }

?>
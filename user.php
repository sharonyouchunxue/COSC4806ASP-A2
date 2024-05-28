<?php

require_once('database.php');

Class User{
  public function get_all_users() {
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM users");
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC); 
    return $rows;
  }

  //function to create new user
  public function create_user($username, $email, $password) {
    $db = db_connect();
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $statement = $db->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $statement->bindParam(':username', $username);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':password', $hashed_password);
    $statement->execute();
  }

  //function to check if user exists
  public function user_exists($username) {
    $db = db_connect();
    $statement = $db->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
    $statement->bindParam(':username', $username);
    $statement->execute();
    return $statement->fetchColumn() > 0;
  }

  //function to authenticate user
  public function authenticate_user($username, $password){
    $db = db_connect();
    $statement = $db->prepare("SELECT password FROM users WHERE username = :username");
    $statement->bindParam(':username', $username);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    if ($row && password_verify($password, $row['password'])) {
      return true;
    } else {
      return false;
    }
  }

}
?>
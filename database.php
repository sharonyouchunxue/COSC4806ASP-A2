<?php

require_once('config.php');

function db_connect(){
  try {
    $dbh = new PDO(
      'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_DATABASE, DB_USER, DB_PASSWORD);
    return $dbh;
  } catch (PDOException $e) {
    //we should set a global variable here so we know db is down
  }
}

?>

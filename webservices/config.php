<?php
  define('BASE_PATH', 'http://127.0.0.1:1234/AngularCRUD/webservices');
  define('DB_HOST','127.0.0.1');
  define('DB_NAME','angularcrud');
  define('DB_USERNAME','angularcrud');
  define('DB_PASSWORD','angularcrud');
  $con = new mysqli(DB_HOST,DB_NAME,DB_USERNAME,DB_PASSWORD);
  if(mysqli_connect_errno()){
    echo ('Failed to connect' .mysqli_connect_errno());
    exit();
  }
?>
<?php 
  include_once('config.php');
  $title = $_POST['title'];
  $description = $_POST['description'];
  $published_on = date('Y-m-d');
  $query = "INSERT INTO tbl_posts(title, description, published_on) VALUES('$title','$description','$published_on')";
  
  if($con->query($query) == TRUE){
    echo "Post Added succesfully!";
  }
  else
  {
    echo("Error description: " . mysqli_error($con));
    echo "Failed to add Post!";
  }
  header('Access-Control-Allow-Origin: *');
?>
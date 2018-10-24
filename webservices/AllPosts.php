<?php 
  include_once('config.php');
  $sql = "SELECT * FROM tbl_posts ORDER BY id DESC";
  $query = $con->query($sql);
  if($query->num_rows > 0 ){
     while ($row = $query->fetch_array()) {
        $id = $row['id'];
        $title = $row['title'];
        $description = $row['description'];
        $published_on = $row['published_on'];
        $result[] = array('id'=>$id, 'title'=>$title, 'description'=>$description, 'published_on'=>$published_on);
     }
     $json = array('status' => 1 , 'info'=>$result);
  }
  else{
    $json = array('status' => 0 , 'msg'=>'No Record Found!');
  }
  @mysqli_close();
  // header('Content-type: application/json');
  header('Access-Control-Allow-Origin: *');
  echo json_encode($json);

?>
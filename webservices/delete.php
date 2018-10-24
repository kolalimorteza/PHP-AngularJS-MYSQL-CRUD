<?php 
include_once('config.php');
$id = $_GET['id'];
if (!empty($id)) {
  $sql = "DELETE FROM tbl_posts WHERE id= $id";
  $query = $con->query($sql);
  if ($query) {
    $result = array("status" => 1, "msg"=>"Post Deleted successfully!");
  } else {
    echo("Error description: " . mysqli_error($con));
    $result = array('status' => 1, 'msg' => 'Failed to Deleted!');
  }
  @mysqli_close();
    // header('Content-type: application/json');
  header('Access-Control-Allow-Origin: *');
  echo json_encode($result);
}
?>
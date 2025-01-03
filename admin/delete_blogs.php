<?php
include '../config/constants.php';


$id = $_GET['id'];
$image = $_GET['image'];

// delete image 
if ($image != "") {
  $path = "blog/img/" . $image;
  $remove = unlink($path);
  if ($remove == false) {
    echo 'Failed to remove client image';
    header('Location' . SITEURL . '/admin/add_blogs.php');
    die();
  }
}


// delete the data from data base 

$sql = "DELETE FROM blog WHERE id=$id";
$result = mysqli_query($conn, $sql);

if ($result == true) {
  header("Location: manage_blogs.php");
} else {
  echo "Error .. fail to delete the data";
}

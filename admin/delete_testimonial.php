<?php
include '../config/constants.php';


$id = $_GET['id'];
$client_img = $_GET['client_img'];

// delete image 
if ($client_img != "") {
  $path = "testimonial/img/" . $client_img;
  $remove = unlink($path);
  if ($remove == false) {
    echo 'Failed to remove client image';
    header('Location' . SITEURL . '/admin/manage_testimonials.php');
    die();
  }
}


// delete the data from data base 

$sql = "DELETE FROM testimonial WHERE id=$id";
$result = mysqli_query($conn, $sql);

if ($result == true) {
  header("Location: manage_testimonials.php");
} else {
  echo "Error .. fail to delete the data";
}

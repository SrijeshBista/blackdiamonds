<?php
include '../config/constants.php';


$id = $_GET['id'];

$sql = "UPDATE inquires SET
status = 'completed'
WHERE id = $id";

$result = mysqli_query($conn, $sql);

if ($result == true) {
  header("Location: inquiries.php");
} else {
  echo "ERROR... Failed to delete the data";
}

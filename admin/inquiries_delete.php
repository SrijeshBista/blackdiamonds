<?php
include '../config/constants.php';

$id = $_GET['id'];

// delete the data 
$sql = "DELETE FROM appointment WHERE id=$id";
$result = mysqli_query($conn, $sql);

if ($result == true) {
  header("Location: appointment.php");
} else {
  echo "ERROR....Failed to delete the data";
}

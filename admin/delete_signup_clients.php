<?php
include '../config/constants.php';

$id = $_GET['id'];

$sql = "DELETE FROM clients_details WHERE id=$id";
$result = mysqli_query($conn, $sql);

if ($result == true) {
  header("Location:signup_clients");
} else {
  echo "Error .. fail to delete to data";
}

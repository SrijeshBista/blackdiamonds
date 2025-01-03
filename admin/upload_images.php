<?php
include '../config/constants.php';

$response = ['success' => false, 'images' => []];

if (!empty($_FILES['gallery']['name'][0])) {
  $uploadDir = '../gallery/img/';
  foreach ($_FILES['gallery']['name'] as $key => $name) {
    $tmpName = $_FILES['gallery']['tmp_name'][$key];
    $uploadPath = $uploadDir . basename($name);

    if (move_uploaded_file($tmpName, $uploadPath)) {
      $response['images'][] = $name;
    }
  }

  $response['success'] = true;
}

echo json_encode($response);

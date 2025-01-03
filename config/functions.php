<?php








// login value ---- function 

function index_loginval($conn)
{
  if (isset($_SESSION['email'])) {
    $id = $_SESSION['email'];
    $query = "SELECT * FROM user WHERE email = '$id' limit 1";

    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
      $index_user_data = mysqli_fetch_assoc($result);
      return $index_user_data;
    }
  }
}

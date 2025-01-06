<?php







function index_loginval($conn)
{
  if (isset($_SESSION['email'])) {
    $id = $_SESSION['email'];
    $query = "SELECT * FROM user WHERE email = '$id' LIMIT 1";

    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
      return mysqli_fetch_assoc($result);
    }
  }
  return false; // Return false if no session or user not found
}

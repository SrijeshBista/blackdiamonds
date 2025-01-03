<?php include '../config/constants.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];
  if (!empty($email) && !empty($password)) {
    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password' LIMIT 1";
    $result = mysqli_query($conn, $query);
    if ($result) {
      if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        if ($user_data['password'] == $password) {
          $id = $_SESSION['email'] = $user_data['email'];
          header("Location: dashboard.php");
          die;
        }
        echo '<script>alert("Wrong Password")</script>';
      }
    }
    echo '<script>alert("Wrong Username or Password")</script>';
  } else {
  }
}


?>
<?php include 'includes/header.php'; ?>




<div class="admin-index-page">

  <div class="admin-login-box">
    <div class="content">
      <h2 class="section-heading">Login</h2>
      <img src="../images/logo.png" alt="">
    </div>


    <form action="" method="POST">
      <input type="email" name="email" placeholder="Enter Email Address"> <br>
      <input type="password" name="password" placeholder="Enter Password"> <br>
      <input class="btn-primary" type="submit" value="Done">
    </form>
  </div>
</div>




<?php include 'includes/footer.php'; ?>
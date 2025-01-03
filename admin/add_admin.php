<?php include '../config/constants.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $fname = $_POST['fname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $user_type = $_POST['user_type'];

  if (!empty($fname) && !empty($email) &&  !empty($password) && !empty($user_type)) {

    $query = "INSERT INTO user(name, email, password, user_type) VALUES ('$fname','$email', '$password','$user_type')";

    mysqli_query($conn, $query);
    header("Location: manage_admin.php");
  } else {
    echo "<alert>Enter valid informations!</alert>";
  }
}




?>


<?php include 'includes/header.php'; ?>
<section class="backend-page ">
  <?php include 'includes/nav.php'; ?>
  <div class="page">
    <h2 class="section-heading">Add Admin</h2>



    <div class="add-admin-form">
      <form method="POST">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="fname">Name</label>
            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Name">
          </div>
          <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
          </div>
          <div class="form-group col-md-6">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
          </div>


          <div class="form-group col-md-6">
            <label for="user-type">Choose Roles</label>
            <select id="user-type" class="form-control" name="user_type">
              <option selected>Choose the role</option>
              <option value="admin">Admin</option>
              <option value="editor">Editor</option>
            </select>
          </div>
        </div>




        <button type="submit" class=" btn-done">Add Admin / Editor</button>
      </form>
    </div>

  </div>





</section>

<?php include 'includes/footer.php'; ?>
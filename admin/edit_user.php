<?php include '../config/constants.php';

$id = $_GET['id'];
$query2 = "SELECT * FROM user WHERE id= $id";
$result = mysqli_query($conn, $query2);

$row = mysqli_fetch_assoc($result);
$fname = $row['name'];
$email = $row['email'];
$password = $row['password'];
$user_type = $row['user_type'];

// for update 
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $fname = $_POST['fname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $user_type = $_POST['user_type'];

  if (!empty($fname) && !empty($email) &&  !empty($password) && !empty($user_type)) {

    $query = "UPDATE user SET name = ' $fname ', email = ' $email ', password = ' $password ',user_type = ' $user_type ' WHERE id = ' $id '";

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
    <h2 class="section-heading">Edit Admin</h2>



    <div class="add-admin-form">
      <form method="POST">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="fname">Name</label>
            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Name" value="<?php echo $fname ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php echo $email ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="<?php echo $password ?>">
          </div>


          <div class="form-group col-md-6">
            <label for="user-type">Choose Roles</label>
            <select id="user-type" class="form-control" name="user_type">
              <option selected value="<?php echo $user_type ?>"><?php echo $user_type ?></option>
              <option value="admin">Admin</option>
              <option value="editor">Editor</option>
            </select>
          </div>
        </div>




        <button type="submit" class=" btn-done">Edit User</button>
      </form>
    </div>

  </div>





</section>

<?php include 'includes/footer.php'; ?>
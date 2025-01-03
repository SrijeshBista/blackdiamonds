<?php
include("./partial/header.php");

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php"); // Redirect to login if not logged in
  exit();
}

// Get user details from the session
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];
$user_phone = $_SESSION['user_phone'];

// Handle form submission for updating details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Initialize error message
  $error_message = '';
  $success_message = '';

  // Get the new details from the form
  $new_phone = !empty($_POST['phone']) ? $_POST['phone'] : $user_phone;
  $new_email = !empty($_POST['email']) ? $_POST['email'] : $user_email;
  $new_password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;

  // Prepare SQL query to update user details
  $sql = "UPDATE clients_details SET phone = ?, email = ?";

  // If password is set, update it as well
  if ($new_password) {
    $sql .= ", password = ?";
  }

  $sql .= " WHERE id = ?";

  // Prepare statement
  if ($stmt = $conn->prepare($sql)) {
    if ($new_password) {
      // Bind parameters if password is included in the update
      $stmt->bind_param("sssi", $new_phone, $new_email, $new_password, $user_id);
    } else {
      // Bind parameters without password
      $stmt->bind_param("ssi", $new_phone, $new_email, $user_id);
    }

    // Execute statement and check if update is successful
    if ($stmt->execute()) {
      // Update session values if the database update is successful
      $_SESSION['user_phone'] = $new_phone;
      $_SESSION['user_email'] = $new_email;
      if ($new_password) {
        $_SESSION['user_password'] = $new_password; // Update password in session (if needed)
      }
      $success_message = "Your details have been updated successfully.";
    } else {
      $error_message = "Error updating details. Please try again.";
    }

    // Close statement
    $stmt->close();
  } else {
    $error_message = "Database error: Unable to prepare update statement.";
  }
}

?>
<section id="profile">
<div class="profile-main">
  <div class="client_profile" >
    <div class="container">
      <h2>Your <span>Profile </span></h2>
      <ul>
        <li class="details">Name: <span><?php echo htmlspecialchars($user_name); ?></span></li>
        <li class="details">Mobile No: <span><?php echo htmlspecialchars($user_phone); ?></span></li>
        <li class="details">Email: <span><?php echo htmlspecialchars($user_email); ?></span></li>
        <li class="details"><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
  <div class="form_area">
    <div class="container">
      <h2>Change <span>Details</span></h2>
      <?php if (isset($success_message)): ?>
        <p class="success"><?php echo $success_message; ?></p>
      <?php endif; ?>
      <?php if (isset($error_message)): ?>
        <p class="error"><?php echo $error_message; ?></p>
      <?php endif; ?>
      <form action="" method="POST">
        <div class="form_group">
          <label for="phone">Change Mobile Number</label> <br>
          <input type="number" name="phone" id="phone" placeholder="New Phone Number" value="<?php echo htmlspecialchars($user_phone); ?>">
        </div>

        <div class="form_group">
          <label for="email">Change Email</label> <br>
          <input type="email" name="email" id="email" placeholder="New Email" value="<?php echo htmlspecialchars($user_email); ?>">
        </div>

        <div class="form_group">
          <label for="password">Change Password</label> <br>
          <input type="password" name="password" id="password" placeholder="New Password">
        </div>

        <button type="submit">Update Details</button>
      </form>
    </div>
  </div>
</div>
</section>
<?php
include("./partial/footer.php");
?>
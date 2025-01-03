<?php include '../config/constants.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $fname = $_POST['fname'];
  $destination = $_POST['destination'];
  $client_message = $_POST['client_message'];

  // for image
  if (isset($_FILES['client_img']['name'])) {
    $client_img = $_FILES['client_img']['name'];

    if ($client_img != "") {
      // rename image
      // get extension of selected image
      $tmp = explode('.', $client_img);
      $ext = end($tmp);


      // create new name for image
      $client_img = "testimonial-" . rand(00000, 99999) . "." . $ext;

      // upload image
      // get src path and destination path

      // source path is current location of the image
      $src = $_FILES['client_img']['tmp_name'];

      // destination path for the image to be uploaded
      $dst = "testimonial/img/" . $client_img;

      // finally upload the food image
      $upload = move_uploaded_file($src, $dst);

      // checking
      if ($upload == false) {

        header("Location: add_testimoials.php");
        $_SESSION['upload'] = '<script> alert("Failed to upload the image"); </script>';

        die();
      }
    }
  } else {
    $eventImg = ""; //deafult value
  }






  if (!empty($fname) && !empty($destination) && !empty($client_message) && !empty($client_img)) {
    $query = "INSERT INTO testimonial (name, destination, client_img , client_message) VALUES('$fname','$destination','$client_img', '$client_message')";
    mysqli_query($conn, $query);
    header("Location: add_testimonials.php");
  } else {
    echo "<alert> Enter valid information! </alert>";
  }
}

?>


<?php include 'includes/header.php'; ?>
<section class="backend-page ">
  <?php include 'includes/nav.php'; ?>
  <div class="page">
    <h2 class="section-heading">Add Testimonials</h2>





    <div class="add-admin-form">
      <form method="POST" enctype="multipart/form-data">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="fname">Name</label>
            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Name">
          </div>
          <div class="form-group col-md-6">
            <label for="destination">Destination</label>
            <input type="text" class="form-control" id="destination" placeholder="Enter client destination" name="destination">
          </div>

          <div class="form-group col-md-6">
            <label for="upload-image">Upload image</label>
            <input type="file" class="form-control" id="upload-image" placeholder="Upload client's Image" name="client_img">
          </div>

          <div class="form-group col-md-6">
            <label for="textarea">Client Messages...</label>
            <textarea class="form-control" id="textarea" name="client_message" rows="3"></textarea>
          </div>
          <div class="form-group"><button type="submit" class=" btn-done">Add Testimonial</button></div>

        </div>





      </form>
    </div>

  </div>

</section>

<?php include 'includes/footer.php'; ?>
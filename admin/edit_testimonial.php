<?php include '../config/constants.php';


// get data from database through id 

$id = $_GET['id'];
$sql = "SELECT * FROM testimonial WHERE id=$id";

$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$name = $row['name'];
$destination = $row['destination'];
$client_message = $row['client_message'];
$client_img = $row['client_img'];






if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $fname = $_POST['fname'];
  $destination = $_POST['destination'];
  $client_message = $_POST['client_message'];
  $current_img = $_POST['current_img'];


  // for image

  $new_img = $_FILES['client_img']['name'];

  if ($new_img != "") {
    // rename image
    // get extension of selected image
    $tmp = explode('.', $new_img);
    $ext = end($tmp);


    // create new name for image
    $new_img = "testimonial-" . rand(00000, 99999) . "." . $ext;

    // upload image
    // get src path and destination path

    // source path is current location of the image
    $src = $_FILES['client_img']['tmp_name'];

    // destination path for the image to be uploaded
    $dst = "./testimonial/img/" . $new_img;

    // finally upload the food image
    $upload = move_uploaded_file($src, $dst);

    // checking
    if ($upload == false) {

      header("Location: manage_testimonials.php");
      $_SESSION['upload'] = '<script> alert("Failed to upload the image"); </script>';

      die();
    }
  } else {
    $new_img = $current_img;
  }







  if (!empty($fname) && !empty($destination) && !empty($client_message) && !empty($new_img)) {


    $query = "UPDATE testimonial SET name = '$fname', destination = '$destination', client_message = '$client_message', client_img = '$new_img' WHERE id = $id";



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
    <h2 class="section-heading">Edit Testimonials</h2>





    <div class="add-admin-form">
      <form method="POST" enctype="multipart/form-data">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="fname">Name</label>
            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Name" value="<?php echo $name; ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="destination">Destination</label>
            <input type="text" class="form-control" id="destination" placeholder="Enter client destination" name="destination" value="<?php echo $destination; ?>">
          </div>

          <div class="form-group col-md-6">
            <label for="upload-image">Current Image</label>
            <img id="uploadPreview" src="<?php echo SITEURL; ?>admin/testimonial/img/<?php echo $client_img ?>" alt="" style="border-radius: 5px; width: 100px;;height: auto;">
          </div>

          <div class="form-group col-md-6">
            <label for="uploadImage">Upload image</label>
            <input type="file" class="form-control inputfile" id="uploadImage" placeholder="Upload client's Image" name="client_img" onchange=" PreviewImage();">
          </div>

          <input type="hidden" name="current_img" value="<?php echo $client_img; ?>">

          <div class="form-group col-md-6">
            <label for="textarea">Client Messages...</label>
            <textarea class="form-control" id="textarea" name="client_message" rows="3"><?php echo $client_message ?></textarea>
          </div>
          <div class=" form-group"><button type="submit" class=" btn-done">Edit Testimonial</button></div>

        </div>





      </form>
    </div>

  </div>

</section>




<script type="text/javascript">
  function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
  };
</script>

<?php include 'includes/footer.php'; ?>
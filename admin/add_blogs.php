<?php include '../config/constants.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $content = mysqli_real_escape_string($conn, $_POST['content']);


  // for image
  if (isset($_FILES['image']['name'])) {
    $image = $_FILES['image']['name'];

    if ($image != "") {
      // rename image
      // get extension of selected image
      $tmp = explode('.', $image);
      $ext = end($tmp);

      // create new name for image
      $image = "blog-" . rand(00000, 99999) . "." . $ext;

      // upload image
      // get src path and destination path

      // source path is current location of the image
      $src = $_FILES['image']['tmp_name'];

      // destination path for the image to be uploaded
      $dst = "blog/img/" . $image;

      // finally upload the image
      $upload = move_uploaded_file($src, $dst);

      // checking
      if ($upload == false) {
        $_SESSION['upload'] = '<script> alert("Failed to upload the image"); </script>';
        header("Location: add_blogs.php");
        die();
      }
    }
  } else {
    $image = ""; // default value
  }

  // Check for empty fields and correct the variable name typo
  if (!empty($title) && !empty($content)  && !empty($image)) {
    $query = "INSERT INTO blog (title, image, content,date) VALUES('$title', '$image','$content',NOW())";
    mysqli_query($conn, $query);
    header("Location: add_blogs.php");
  } else {
    echo "<script> alert('Enter valid information!'); </script>";
  }
}
?>


<?php include 'includes/header.php'; ?>
<section class="backend-page ">
  <?php include 'includes/nav.php'; ?>
  <div class="page">
    <h2 class="section-heading">Add Blog</h2>





    <div class="add-admin-form">
      <form method="POST" enctype="multipart/form-data">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="title">Blog Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Blog Title">
          </div>













          <div class="form-group col-md-6">
            <label for="upload-image">Upload Destination Image</label>
            <input type="file" class="form-control" id="upload-image" name="image">
          </div>

          <textarea id="editor" class="form-control" placeholder="Write your blog post here..." rows="8" name="content"></textarea><br>


          <div class="form-group"><button type="submit" class=" btn-done">Add Blog</button></div>





        </div>





      </form>
    </div>

  </div>

</section>


<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script>
  ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
      console.error(error);
    });
</script>

<?php include 'includes/footer.php'; ?>
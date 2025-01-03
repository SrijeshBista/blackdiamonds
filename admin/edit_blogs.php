<?php include '../config/constants.php';

// getting data from database 

$id = $_GET['id'];
$sql = "SELECT * FROM blog WHERE id = $id";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$title = $row['title'];
$content = $row['content'];
$image = $row['image'];
$current_img = $image;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $content = mysqli_real_escape_string($conn, $_POST['content']);


  // for image
  // for image
  $new_img = $_FILES['image']['name'];

  if ($new_img != "") {
    // rename image
    $tmp = explode('.', $new_img);
    $ext = end($tmp);

    // create new name for image
    $new_img = "blog-" . rand(00000, 99999) . "." . $ext;

    // upload image
    $src = $_FILES['image']['tmp_name'];
    $dst = "./blog/img/" . $new_img;

    // upload the image
    $upload = move_uploaded_file($src, $dst);

    if ($upload == false) {
      header("Location: add_blogs.php");
      $_SESSION['upload'] = '<script> alert("Failed to upload the image"); </script>';
      die();
    }
  } else {
    $new_img = $current_img; // use current image if no new image is uploaded
  }

  // Check for empty fields and correct the variable name typo
  if (!empty($title) && !empty($content)  && !empty($image)) {
    $query = "UPDATE blog SET title = '$title', content = '$content',  image = '$new_img' WHERE id = '$id'";
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
    <h2 class="section-heading">Edit Blog</h2>





    <div class="add-admin-form">
      <form method="POST" enctype="multipart/form-data">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="title">Blog Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Blog Title" value="<?php echo $title; ?>">
          </div>













          <div class="form-group col-md-6">
            <label for="upload-image">Upload Destination Image</label>
            <input type="file" class="form-control" id="upload-image" name="image">


          </div>

          <textarea id="editor" class="form-control" placeholder="Write your blog post here..." rows="8" name="content"><?php echo $content; ?></textarea><br>


          <div class="form-group"><button type="submit" class=" btn-done">Edit Blog</button></div>





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
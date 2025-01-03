<?php include '../config/constants.php'; ?>


<?php include 'includes/header.php'; ?>
<section class="backend-page ">
  <?php include 'includes/nav.php'; ?>
  <div class="page">
    <h2 class="section-heading">Manage Blogs</h2>

    <div class="inquiries_content">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Blog Title</th>
            <th scope="col">Date</th>
            <th scope="col">Image</th>
            <th scope="col">Manage</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $sql = "SELECT * FROM blog";

          $result = mysqli_query($conn, $sql);
          $count = mysqli_num_rows($result);

          $sn = 1;
          if ($count > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['id'];
              $title = $row['title'];
              $date = $row['date'];
              $image = $row['image'];

          ?>




              <tr>
                <th scope="row"><?php echo $sn++; ?></th>
                <td><?php echo ucfirst($title)  ?></td>
                <td><?php echo $date ?></td>


                <td> <img src="./blog/img/<?php echo $image ?>" alt=""> </td>

                <td class="btn-row ">

                  <a href="<?php echo SITEURL; ?>admin/edit_blogs.php?id=<?php echo $id; ?>" class="btn-done">Edit</a>
                  <a href="<?php echo SITEURL; ?>admin/delete_blogs.php?id=<?php echo $id; ?>&image=<?php echo $image ?>" class="btn-red">Delete</a>
                </td>

              </tr>
          <?php
            }
          }


          ?>





        </tbody>
      </table>
    </div>

  </div>

</section>

<?php include 'includes/footer.php'; ?>
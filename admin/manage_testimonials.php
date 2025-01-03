<?php include '../config/constants.php'; ?>


<?php include 'includes/header.php'; ?>
<section class="backend-page ">
  <?php include 'includes/nav.php'; ?>
  <div class="page">
    <h2 class="section-heading">Manage Testimonials</h2>

    <div class="inquiries_content">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Client Destination</th>
            <th scope="col">Client Image</th>
            <th scope="col">Client Message</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $sql = "SELECT * FROM testimonial";

          $result = mysqli_query($conn, $sql);
          $count = mysqli_num_rows($result);

          $sn = 1;
          if ($count > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['id'];
              $name = $row['name'];
              $client_img = $row['client_img'];
              $destination = $row['destination'];
              $client_message = $row['client_message'];

          ?>




              <tr>
                <th scope="row"><?php echo $sn++; ?></th>
                <td><?php echo ucfirst($name)  ?></td>
                <td><?php echo $destination ?></td>
                <td> <img src="./testimonial/img/<?php echo $client_img ?>" alt=""> </td>
                <td><?php echo $client_message ?></td>

                <td class="btn-row ">

                  <a href="<?php echo SITEURL; ?>admin/edit_testimonial.php?id=<?php echo $id; ?>" class="btn-done">Edit</a>
                  <a href="<?php echo SITEURL; ?>admin/delete_testimonial.php?id=<?php echo $id; ?>&client_img=<?php echo $client_img ?>" class="btn-red">Delete</a>
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
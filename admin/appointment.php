<?php include '../config/constants.php'; ?>






<?php include 'includes/header.php'; ?>
<section class="backend-page ">
  <?php include 'includes/nav.php'; ?>
  <div class="page">
    <h2 class="section-heading">Appointment</h2>
    <div class="inquiries_content">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col">Service</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>

          <?php
          // create sql query to get all data 
          $sql = "SELECT * FROM appointment WHERE status = 'processing'";
          $result = mysqli_query($conn, $sql);

          $count = mysqli_num_rows($result);
          $sn = 1;

          if ($count > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['id'];
              $name = $row['fname'];
              $phone = $row['phone'];
              $email = $row['email'];

              $date = $row['date'];
              $time = $row['time'];
              $service = $row['service'];


          ?>



              <tr>
                <th scope="row"><?php echo $sn++; ?></th>
                <td><?php echo ucfirst($name); ?></td>
                <td><?php echo $phone; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $date; ?></td>
                <td><?php echo $time; ?></td>
                <td><?php echo $service; ?></td>
                <td class="btn-row ">
                  <a href="<?php echo SITEURL; ?>admin/appointment_done.php?id=<?php echo $id; ?> " class="btn-done">Done</a>
                  <a href="<?php echo SITEURL; ?>admin/appointment_delete.php?id=<?php echo $id; ?>" class="btn-red">Delete</a>
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
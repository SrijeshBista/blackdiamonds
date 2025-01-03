<?php include '../config/constants.php'; ?>
<?php include 'includes/header.php'; ?>
<section class="backend-page ">
  <?php include 'includes/nav.php'; ?>
  <div class="page">
    <h2 class="section-heading">Manage Admin</h2>




    <div class="inquiries_content">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">User Type</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $sql = "SELECT * FROM user";

          $result = mysqli_query($conn, $sql);
          $count = mysqli_num_rows($result);

          $sn = 1;
          if ($count > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['id'];
              $name = $row['name'];
              $email = $row['email'];
              $user_type = $row['user_type'];

          ?>




              <tr>
                <th scope="row"><?php echo $sn++; ?></th>
                <td><?php echo ucfirst($name)  ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $user_type ?></td>

                <td class="btn-row ">

                  <a href="<?php echo SITEURL; ?>admin/edit_user.php?id=<?php echo $id; ?>" class="btn-done">Edit</a>
                  <a href="<?php echo SITEURL; ?>admin/delete_user.php?id=<?php echo $id; ?>" class="btn-red">Delete</a>
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
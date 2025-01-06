<?php include 'includes/header.php';
include '../config/constants.php'; ?>
<section class="backend-page ">
  <?php include 'includes/nav.php'; ?>
  <div class="page">
    <h2 class="section-heading">Dashboard</h2>
    <div class="dashboard-row">






      <div class="dashboard-item">

        <?php
        $sql = "SELECT  * FROM user";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        ?>


        <i class="fa-solid fa-users-viewfinder"></i>
        <h2 class="section-heading"><?php echo $count ?></h2>
        <h3 class="section-title">Admin</h3>
      </div>
      <div class="dashboard-item">
        <?php
        $sql = "SELECT  * FROM blog";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        ?>
        <i class="fa-solid fa-blog"></i>
        <h2 class="section-heading">
          <?php echo $count ?>
        </h2>
        <h3 class="section-title">Blogs</h3>
      </div>
      <div class="dashboard-item">
        <?php
        $sql = "SELECT  * FROM clients_details";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        ?>
        <i class="fa-solid fa-arrows-down-to-people"></i>
        <h2 class="section-heading">
          <?php echo $count ?>
        </h2>
        <h3 class="section-title">Sigup Clients</h3>
      </div>
      <div class="dashboard-item">
        <?php
        $sql = "SELECT * FROM appointment WHERE status='processing'";

        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        ?>
        <i class="fa-solid fa-calendar-check"></i>
        <h2 class="section-heading">
          <?php echo $count ?>
        </h2>
        <h3 class="section-title">New Appointments</h3>
      </div>
      <div class="dashboard-item">
        <?php
        $sql = "SELECT * FROM inquires WHERE status='processing'";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        ?>
        <i class="fa-solid fa-share"></i>
        <h2 class="section-heading">
          <?php echo $count ?>
        </h2>
        <h3 class="section-title">New Inquiries</h3>
      </div>

    </div>
  </div>

</section>

<?php include 'includes/footer.php'; ?>
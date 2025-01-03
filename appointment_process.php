<?php
include('./config/constants.php');
include('./config/functions.php');




if ($_SERVER['REQUEST_METHOD'] == "POST") {

  // collect form data 
  $fname = $_POST['fname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $service = $_POST['service'];

  // validate that all field are filled 

  if (!empty($fname) && !empty($email) && !empty($phone) && !empty($date) && !empty($time) && !empty($service)) {

    // sql query to insert data into the inqiries table 
    $query = "INSERT INTO appointment(fname, phone, email,date, time, service) VALUES ('$fname', '$phone', '$email', '$date','$time','$service')";

    // execute the query 
    if (mysqli_query($conn, $query)) {
      // redirect to the thank you page on success 
      header("Location: thanks.php");
      exit();
    } else {
      // handle query execution failure 
      echo "<script>alert('Failed to submit inquiry. Please try again.');</script>";
    }
  } else {
    echo "<script>alert('Enter valid information!');</script>";
  }
}

<?php
include('./config/constants.php');
include('./config/functions.php');




if ($_SERVER['REQUEST_METHOD'] == "POST") {

  // collect form data 
  $fname = $_POST['fname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];

  // validate that all field are filled 

  if (!empty($fname) && !empty($email) && !empty($phone) && !empty($message)) {

    // sql query to insert data into the inqiries table 
    $query = "INSERT INTO inquires(name, phone, email, message, created_on ) VALUES ('$fname', '$phone', '$email', '$message', NOW() )";

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

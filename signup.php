<?php
include("partial/header.php")
?>

<!-- header end  -->
<!-- signup start  -->
<section id="login-page form-page">
    <div class="container">
        <div class="login-main signup-main">
            <div class="background">
                <img src="./img/gif-II.gif" alt="">
                <img src="./img/aboutimg.png" alt="">
                <img src="./img/service1.png" alt="">
                <img src="./img/gif-IV.gif" alt="">
                <img src="./img/service2.png" alt="">
                <img src="./img/gif-III.gif" alt="">
                <img src="./img/gif-II.gif" alt="">
                <img src="./img/aboutimg.png" alt="">
                <img src="./img/service1.png" alt="">
                <img src="./img/gif-IV.gif" alt="">
                <img src="./img/service2.png" alt="">
                <img src="./img/gif-III.gif" alt="">
                <div class="bg"></div>

            </div>


            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $f_name = $_POST['f_name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $password = $_POST['password'];


                if (!empty($f_name) && !empty($email) && !empty($phone) &&  !empty($password)) {
                    $query = "INSERT INTO clients_details(f_name,email, phone, password, created_at) VALUES ('$f_name', '$email', '$phone','$password', NOW())";

                    if (mysqli_query($conn, $query)) {
                        header("Location: login.php");
                        exit();
                    } else {
                        echo "<script> alert('Failed to submit details, please try again.') </script>";
                    }
                } else {
                    echo "<script> alert(' Enter valid information')   </script>";
                }
            }

            ?>




            <div class="login-form signup-form">
                <h1>Sign up</h1>
                <form action="" method="POST">
                    <input type="text" name="f_name" placeholder="Full Name"> <br>

                    <input type="email" name="email" placeholder="Enter your email"> <br>
                    <input type="number" name="phone" placeholder="Enter your Phone Number"> <br>
                    <input type="Password" name="password" placeholder="Enter your Password">
                    <br>

                    <div class="button">
                        <button class="login-buttons">signup</button>
                    </div>
                    <div class="register">
                        <p class="signup-btn"><a href="./login.php">Login Now</a></p>
                    </div>
                </form>
            </div>



        </div>

    </div>
</section>
<!-- signup end   -->
<!-- footer start  -->
<?php
include("./partial/footer.php")
?>
<!-- footer end   -->
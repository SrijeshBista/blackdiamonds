<?php
include("./partial/header.php");

$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $query = "SELECT * FROM clients_details WHERE email = ? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if ($password === $user['password']) {
                // Set session data
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['f_name']; // First name
                $_SESSION['user_email'] = $user['email']; // Email
                $_SESSION['user_phone'] = $user['phone']; // Phone number

                // Redirect to index.php after successful login
                header("Location: index.php");
                exit();
            } else {
                $errorMessage = "Invalid email or password.";
            }
        } else {
            $errorMessage = "No account found with this email.";
        }
    } else {
        $errorMessage = "Please fill in all fields.";
    }
}

?>

<section id="login-page">
    <div class="container">
        <div class="login-main">
            <div class="background">
                <!-- Background images -->
                 <img src="./img/gif-II.gif" alt="">
                 <img src="./img/gif-IV.gif" alt="">
                 <img src="./img/gif-V.gif" alt="">
                 <img src="./img/gif-II.gif" alt="">
                 <img src="./img/gif-IV.gif" alt="">
                 <img src="./img/gif-V.gif" alt="">
                 <img src="./img/gif-II.gif" alt="">
                 <img src="./img/gif-IV.gif" alt="">
                 <img src="./img/gif-V.gif" alt="">
                 <img src="./img/gif-II.gif" alt="">
                 <img src="./img/gif-IV.gif" alt="">
                 <img src="./img/gif-V.gif" alt="">
                 <img src="./img/big-gif-I.gif" alt="">
                 <img src="./img/gif-II.gif" alt="">
                 <img src="./img/gif-IV.gif" alt="">
                 <img src="./img/gif-V.gif" alt="">
                 <div class="bg"></div>
            </div>
            <div class="login-form">
                <h1>Login</h1>
                <form action="" method="POST">
                    <?php if ($errorMessage): ?>
                        <p style="color: red;"><?= htmlspecialchars($errorMessage); ?></p>
                    <?php endif; ?>
                    <input type="email" placeholder="Enter your email" name="email" required> <br>
                    <div class="pass">
                        <input type="password" placeholder="Enter your Password" name="password" required>
                        <button id="show-password" type="button"><i class="fa-regular fa-eye"></i></button>
                    </div>
                    <br>
                    <div class="button">
                        <input type="submit" class="login-buttons" value="Login"></input>
                    </div>
                    <div class="register">
                        <p class="signup-btn"><a href="./signup.php">Signup Your Account?</a></p>
                        <p><a href="#">Forgot Password?</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    // Toggle password visibility
    document.getElementById('show-password').addEventListener('click', function(e) {
        e.preventDefault();
        const passwordInput = document.querySelector('input[name="password"]');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
</script>

<?php
include("./partial/footer.php");
?>
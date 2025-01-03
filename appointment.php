<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start(); 

include("./partial/header.php");

// Check if session has started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Validate user login
$index_user_data = index_loginval($conn);

// Redirect if not logged in
if (!$index_user_data) {
    header("Location: ./login.php");
    exit; // Stop script execution after redirection
}

// Safely extract user data
$email_login = $index_user_data['email'] ?? null;
$user_type = $index_user_data['user_type'] ?? null;

// Optional: Handle case where user data is incomplete
if (!$email_login || !$user_type) {
    die("User data is incomplete. Please contact support.");
}
ob_end_flush();
?>
<!-- header end  -->
<section id="appointment-section">
    <div class="container">
        <div class="login-main appointment-main">
            <div class="background bg-gif">
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
                <div class="bg"></div>
            </div>
            <div class="appointment-form login-form">
                <h2>Book Your Appointment</h2>
                <form id="appointmentForm" action="appointment_process" method="POST">
                    <!-- Full Name -->
                    <input type="text" id="name" placeholder="Full Name" name="fname" required><br>

                    <!-- Email -->
                    <input type="email" id="email" placeholder="Your Email" name="email"><br>
                    <span id="emailError" class="error-message"></span><br>

                    <!-- Phone -->
                    <input type="tel" id="phone" placeholder="Your Phone" name="phone" required><br>
                    <span id="phoneError" class="error-message"></span><br>

                    <!-- Appointment Date -->
                    <input type="date" id="appointmentDate" required>
                    <!-- Appointment Time -->
                    <input type="time" id="appointmentTime" name="time" required><br>

                    <!-- Service Type -->
                    <select id="service" required name="service">
                        <option value="">Select a Service</option>
                        <option value="Haircut">Hair Work</option>
                        <option value="Nail Work">Nail Work</option>
                        <option value="Make up">Make up</option>
                        
                    </select><br>

                    <!-- Submit Button -->
                    <div class="buttons">
                        <input type="submit" id="submitButton" class="primary-btn">
                    </div>
                </form>

            </div>



        </div>

    </div>
</section>

<?php
include("./partial/footer.php")
?>
<!-- footer end   -->
<script>
    const nameField = document.getElementById('name');
    const emailField = document.getElementById('email');
    const phoneField = document.getElementById('phone');
    const appointmentDate = document.getElementById('appointmentDate');
    const appointmentTime = document.getElementById('appointmentTime');
    const serviceField = document.getElementById('service');
    const emailError = document.getElementById('emailError');
    const phoneError = document.getElementById('phoneError');
    const submitButton = document.getElementById('submitButton');

    // Validate email
    function validateEmail() {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailField.value.trim() === '') {
            emailError.textContent = ''; // Hide error if empty
        } else if (!emailRegex.test(emailField.value.trim())) {
            emailError.textContent = 'Enter a valid email address.';
        } else {
            emailError.textContent = ''; // Clear error if valid
        }
        checkFormValidity();
    }

    // Validate phone
    function validatePhone() {
        const phoneRegex = /^\d{10}$/;
        if (phoneField.value.trim() === '') {
            phoneError.textContent = ''; // Hide error if empty
        } else if (!phoneRegex.test(phoneField.value.trim())) {
            phoneError.textContent = 'Enter a valid 10-digit phone number.';
        } else {
            phoneError.textContent = ''; // Clear error if valid
        }
        checkFormValidity();
    }

    // Check if all required fields are valid
    function checkFormValidity() {
        if (
            nameField.value.trim() !== '' &&
            emailField.value.trim() !== '' &&
            phoneField.value.trim() !== '' &&
            appointmentDate.value !== '' &&
            appointmentTime.value !== '' &&
            serviceField.value !== '' &&
            emailError.textContent === '' &&
            phoneError.textContent === ''
        ) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    }

    // Add event listeners
    emailField.addEventListener('blur', validateEmail);
    phoneField.addEventListener('blur', validatePhone);
    nameField.addEventListener('input', checkFormValidity);
    appointmentDate.addEventListener('change', checkFormValidity);
    appointmentTime.addEventListener('change', checkFormValidity);
    serviceField.addEventListener('change', checkFormValidity);
</script>
<style>
    #appointment-section{
        padding-top: 10%;
    }
    .error-message {
        color: red;
        font-size: 0.9em;
    }

    #submitButton:disabled {
        background-color: #ccc;
        cursor: not-allowed;
    }

    #appointment-section {
        font-family: Arial, sans-serif;
        margin: 20px auto;
        width: 100%;
    }

    #appointmentForm input,
    #appointmentForm select {
        width: 100%;
        margin-bottom: 10px;
        padding: 10px;


    }

   

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }
</style>
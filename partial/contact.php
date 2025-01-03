<!-- contact section start  -->
<section id="contact-us" style="padding-bottom: 60px;">
    <div class="container">
        <div class="contact-title">
            <h1 class="t-up" data-aos="fade-right">Contact</h1>
            <h1 class="t-down" data-aos="fade-left">Us</h1>
        </div>
        <div class="contact-main">
            <div class="contact-img">
                <img src="./img/contact.png">
            </div>
            <div class="form">
                <form id="contactForm" action="contact_process.php" method="POST">
                    <input type="text" id="fullName" placeholder="FULL NAME" name="fname" required><br>

                    <input type="email" id="email" name="email" placeholder="YOUR EMAIL" required><br>
                    <span id="emailError" class="error-message"></span><br>

                    <input type="tel" id="phone" placeholder="YOUR PHONE" name="phone" required><br>
                    <span id="phoneError" class="error-message"></span><br>

                    <textarea name="message" name="message" id="message" placeholder="YOUR MESSAGE HERE" required></textarea><br>

                    <div class="buttons">
                        <input type="submit" id="submitButton" class="secondary-btn contact-btn-I">
                    </div>
                </form>  
                <div class="contact-button">
                    <p>OR</p><button class="primary-btn contact-btn-II">Book an appointment </button>
                </div>
                <div class="contact-login-btn">
                    <p>YOU NEED TO LOGIN TO BOOK AN APPOINTMENT </p>
                    <p><a href="login.php">LOGIN</a> OR <a href="signup.php">SIGNUP</a></p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- contact section end  -->
<script>
    const email = document.getElementById('email');
    const phone = document.getElementById('phone');
    const emailError = document.getElementById('emailError');
    const phoneError = document.getElementById('phoneError');
    const submitButton = document.getElementById('submitButton');
    const fullName = document.getElementById('fullName');
    const message = document.getElementById('message');

    // Function to validate email
    function validateEmail() {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email.value.trim() === '') {
            emailError.textContent = ''; // Hide error if empty
        } else if (!emailRegex.test(email.value.trim())) {
            emailError.textContent = 'Enter a valid email address.';
        } else {
            emailError.textContent = ''; // Clear error if valid
        }
        checkFormValidity();
    }

    // Function to validate phone
    function validatePhone() {
        const phoneRegex = /^\d{10}$/;
        if (phone.value.trim() === '') {
            phoneError.textContent = ''; // Hide error if empty
        } else if (!phoneRegex.test(phone.value.trim())) {
            phoneError.textContent = 'Enter a valid 10-digit phone number.';
        } else {
            phoneError.textContent = ''; // Clear error if valid
        }
        checkFormValidity();
    }

    // Check if all required fields are valid
    function checkFormValidity() {
        if (
            fullName.value.trim() !== '' &&
            email.value.trim() !== '' &&
            phone.value.trim() !== '' &&
            message.value.trim() !== '' &&
            emailError.textContent === '' &&
            phoneError.textContent === ''
        ) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    }

    // Add event listeners
    email.addEventListener('blur', validateEmail);
    phone.addEventListener('blur', validatePhone);
    fullName.addEventListener('input', checkFormValidity);
    message.addEventListener('input', checkFormValidity);
</script>

<style>
    .error-message {
        color: red;
        font-size: 0.9em;
    }

    #submitButton:disabled {
        background-color: #ccc;
        cursor: not-allowed;
    }
</style>
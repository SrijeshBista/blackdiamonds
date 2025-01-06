<?php
include("./partial/header.php");

// Redirect to login if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ./login.php");
    exit;
}

$user_data = index_loginval($conn);
$user_email = $_SESSION['user_email'];
?>

<section id="appointment-section">
    <div class="container">
        <div class="login-main appointment-main">
            <div class="appointment-form login-form">
                <h2>Book Your Appointment</h2>
                <form id="appointmentForm" action="appointment_process.php" method="POST">
                    <input type="text" id="name" placeholder="Full Name" name="fname" required>

                    <input type="email" id="email" placeholder="Your Email" name="email" value="<?php echo "$user_email" ?>" readonly>
                    <input type="tel" id="phone" placeholder="Your Phone" name="phone" required>
                    <input type="date" id="appointmentDate" name="date" required>
                    <input type="time" id="appointmentTime" name="time" required>
                    <select id="service" name="service" required>
                        <option value="">Select a Service</option>
                        <option value="Haircut">Hair Work</option>
                        <option value="Nail Work">Nail Work</option>
                        <option value="Make up">Make up</option>
                    </select>
                    <div class="buttons">
                        <input type="submit" id="submitButton" class="primary-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
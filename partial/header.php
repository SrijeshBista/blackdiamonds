<?php
include('./config/constants.php');
include('./config/functions.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$userLoggedIn = false;
if (isset($_SESSION['user_id'])) {
    $userLoggedIn = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blackdimond</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="stylesheet" href="./css/common.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="./apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon-16x16.png">
    <link rel="manifest" href="./site.webmanifest">
    <script src="./js/script.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


</head>

<body>

    <header>
        <div class="container">
            <div class="nav-main">
                <div class="logo">
                    <a href="index.php"><img src="./img/logo.png" alt=""></a>
                </div>
                <div class="nav-bar">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="service.php">Service</a></li>
                        <li><a href="gallery-page.php">Gallery</a></li>
                        <li><a href="aboutpage.php">About us</a></li>
                        <li><a href="blog.php">Blogs</a></li>
                        <li><a href="academy.php">Academy</a></li>
                        <li><a href="contactpage.php">Contact</a></li>
                    </ul>
                </div>

                <div class="appointment-btn">
                    <a href="<?= $userLoggedIn ? 'appointment.php' : 'login.php' ?>">
                        <div id="cta-button" class="cta-button">
                            <i class="fa-solid fa-calendar-days"></i>
                            <span>Book Appointment</span>
                        </div>
                    </a>
                    <div class="header-login">
                        <?php if ($userLoggedIn): ?>
                            <a href="profile.php"><button class="primary-btn loginbtn"> <i class="fa-solid fa-user"></i> <span> Profile</span></button></a>
                        <?php else: ?>
                            <a href="login.php"><button class="primary-btn loginbtn"> <i class="fa-solid fa-user"></i><span> Login </span></button></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
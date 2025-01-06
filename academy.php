<!-- header start  -->
<?php
include("./partial/header.php")
?>
<!-- header end  -->
<!-- blog start  -->
<section id="blog-page">
    <div class="bigcontainer">
        <div class="academy-main">
            <div class="academy-img">
                <img src="./img/gif-VI.gif" alt="">
            </div>
            <div class="academy-right">
                <div class="academy-heading ">
                    <h1 class="t-up">Our</h1>
                    <h1 class="t-down">Academy</h1>
                </div>
                <p>Empowering Beauty Enthusiasts, Transforming Futures

                    At Black Diamond Academy, we nurture talent and inspire passion for the beauty and wellness industry. Whether you’re starting your career or enhancing your skills, our academy provides comprehensive training programs designed to equip you with the knowledge and confidence to succeed.

                </p>
                <br>
                <h2>Why Choose Black Diamond Academy?</h2>
                <ul>
                    <li>Expert Trainers: Learn from industry professionals with years of experience. </li>
                    <li>Hands-On Training: Practical sessions to perfect your skills.</li>
                    <li>Modern Curriculum: Stay ahead with the latest beauty trends and techniques.</li>
                    <li>State-of-the-Art Facilities: Train in a professional, salon-like environment.</li>
                    <li>Certification & Placement: Receive a recognized certificate and job assistance upon completion.</li>
                </ul>

            </div>
        </div>
</section>
<!-- blog end  -->
<!-- inqure section start  -->
<section id="form-section">
    <div class="bigcontainer">
        <div class="academy-form-main">
            <div class="academy-form-left">
                <div class="academy-title">
                    <h1 class="t-up"> Inqure </h1>
                    <h1 class="t-down"> Now </h1>
                </div>
                <div class="academy-forms">
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
                </div>
            </div>
            <div class="academy-form-right">

                <img src="./img/kid-img.png" alt="">

            </div>
        </div>
    </div>
</section>

<!-- inqure section end   -->

<!-- footer start  -->
<?php
include("./partial/footer.php")
?>
<!-- footer end   -->
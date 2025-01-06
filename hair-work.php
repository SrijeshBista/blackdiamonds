<!-- hair section start  -->
<div class="container">
    <div class="work-main">
        <div class="hair-left">
            <img src="./img/service-page-I.png" alt="">
        </div>
        <div class="hair-right">
            <div class="hair-title">
                <h1 class="t-up">Hair</h1>
                <h1 class="t-down">Works</h1>
                </h1>





                <div class="hair-des" style="font-size: 16px;">
                    <p>Transform your tresses with our range of expert hair care services. At Black Diamond Family Salon & Beauty Lounge, we bring your hair dreams to life.</p>
                    <ul>
                        <li>Haircuts: Precision cuts tailored to suit your face shape and style.</li>
                        <li>Hair Coloring: From bold, vibrant shades to subtle balayage and highlights, let your hair reflect your personality.</li>
                        <li>Hair Treatments: Restore vitality with our keratin treatments, deep-conditioning hair spas, and scalp therapies.</li>
                        <li>Styling: Perfect looks for every occasion—be it sleek, voluminous, or playful curls.</li>
                    </ul>
                    <p>Let us turn your hair into a masterpiece that complements your individuality!</p>

                </div>
                <div class="buttons">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <button class="primary-btn hair-work-btn-I"><a href="appointment.php">Book Appointment</a></button>
                    <?php else: ?>
                        <button class="primary-btn hair-work-btn-I"><a href="login.php">Book Appointment</a></button>
                    <?php endif; ?>



                    <button class="secondary-btn hair-work-btn-II"><a href="gallery-page.php">See Gallery</a></button>
                </div>
            </div>
        </div>
    </div>
    <!-- hair section ends -->
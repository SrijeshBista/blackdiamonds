<!-- nail work start  -->
<div class="container">
    <div class="work-main nail-work-main">
        <div class="nail-work-left">
            <div class="nail-work-title">
                <h1 class="t-up">Nails</h1>
                <h1 class="t-down">Works</h1>
            </div>
            <div class="nail-work-des">
                <p>Pamper your hands and feet with indulgent care at Black Diamond Family Salon & Beauty Lounge. Our nail services offer more than just beauty—they ensure health and hygiene too!</p>
                <ul>
                    <li>Manicure & Pedicure: Cleanse, exfoliate, and moisturize for soft, beautiful hands and feet.</li>
                    <li>Nail Art: Creative and trendy designs to showcase your unique style.</li>
                    <li>Nail Extensions: Achieve perfect length and shape with premium-quality extensions.</li>
                    <li>Gel & Acrylic Nails: Long-lasting, glossy nails that elevate your look.</li>
                </ul>
                <p>Walk out with nails that are as polished as your personality!</p>
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
        <div class="nail-work-right">
            <img src="./img/work-img.png" alt="">
        </div>
    </div>
</div>

<!-- nail work end  -->
 <!-- banner section start  -->
 <section id="banner">
     <div class="container ">
         <div class="banner-main">
             <div class="banner-background">
                 <img src="./img/banner-bg.png" alt="">
             </div>
             <div class="banner-left">
                 <div class="bold-heading">
                     <h3>
                         Feel Beautiful,<br>
                         <span>Be Confident.</span>
                     </h3>
                 </div>
                 <div class="banner-button">
                     <?php if (isset($_SESSION['user_id'])): ?>
                         <button class="primary-btn banner-btn-I"><a href="appointment.php">Book Now</a></button>
                         <button class="secondary-btn banner-btn-II"><a href="service.php">Our Work</a></button>
                     <?php else: ?>


                         <button class="primary-btn banner-btn-I"><a href="login.php">Book Now</a></button>
                         <button class="secondary-btn banner-btn-II"><a href="service.php">Our Work</a></button>

                     <?php endif; ?>
                 </div>

             </div>

             <div class="gif">
                 <div class="gif-column">
                     <div class="big-gif">
                         <img src="./img/big-gif-I.gif" alt="">
                     </div>
                     <div class="small-gif secondary-gif">
                         <img src="./img/gif-II.gif" alt="">
                     </div>
                 </div>
                 <div class="gif-column">
                     <div class="small-gif">
                         <img src="./img/gif-III.png" alt="">
                     </div>
                     <div class="big-gif secondary-gif">
                         <img src="./img/gif-IV.gif" alt="">
                     </div>
                 </div>
                 <div class="gif-column">
                     <div class="big-gif">
                         <img src="./img/gif-V.gif" alt="">
                     </div>
                     <div class="small-gif secondary-gif">
                         <img src="./img/gif-VI.gif" alt="">
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- banner section end  -->
<?php
$sql = "SELECT * FROM gallery WHERE feature = 'yes' LIMIT 7"; // Limit to 7 images
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$images = [];

if ($count > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $images[] = $row['gallery_images']; // Store images in an array
    }
}

// Pad the images array if there are less than 7 results
while (count($images) < 7) {
    $images[] = "./admin/gallery/"; // Placeholder image
}
?>

<section id="gallery">
    <div class="gallery-main container">
        <div class="gallery-left">
            <div class="gallery-top">
                <div class="gallery-img">
                    <img src="<?php echo SITEURL; ?>admin/gallery/<?php echo $images[0]; ?>" alt="">
                </div>
                <div class="gallery-img">
                    <img src="<?php echo SITEURL; ?>admin/gallery/<?php echo $images[1]; ?>" alt="">
                </div>
                <div class="gallery-card">
                    <div class="gallery-smallimg">
                        <img src="<?php echo SITEURL; ?>admin/gallery/<?php echo $images[2]; ?>" alt="">
                    </div>
                    <div class="gallery-smallimg">
                        <img src="<?php echo SITEURL; ?>admin/gallery/<?php echo $images[3]; ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="gallery-bottom">
                <div class="gallery-img">
                    <img src="<?php echo SITEURL; ?>admin/gallery/<?php echo $images[4]; ?>" alt="">
                </div>
                <div class="gallery-img">
                    <img src="<?php echo SITEURL; ?>admin/gallery/<?php echo $images[5]; ?>" alt="">
                </div>
                <div class="gallery-img hideable">
                    <img src="<?php echo SITEURL; ?>admin/gallery/<?php echo $images[6]; ?>" alt="">
                </div>
            </div>
        </div>
        <div class="gallery-right">
            <div class="gallery-title">
                <h1 class="t-up" data-aos="fade-right">Our</h1>
                <h1 class="t-down" data-aos="fade-left">Gallery</h1>
            </div>
            <div class="gallery-des">
                <p>Explore our gallery of exceptional work, showcasing the artistry and expertise of Black Diamond Family Salon Academy Beauty Lounge. From stunning hair transformations to flawless makeup, rejuvenating skin treatments, and elegant nail designs, our gallery highlights the dedication and talent of our team. Each image reflects our commitment to excellence in beauty services and education. Be inspired by our creativity and professionalism as we help clients and students achieve their dream looks and skills in the beauty industry.</p>
            </div>
            <div class="buttons">
                <button class="secondary-btn gallery-btn"><a href="gallery-page.php">See More</a></button>
            </div>
        </div>
    </div>
</section>
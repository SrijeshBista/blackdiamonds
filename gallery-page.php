<?php
include("./partial/header.php");

// Fetch all gallery images categorized by type
$sql = "SELECT * FROM gallery";
$result = mysqli_query($conn, $sql);

$galleryImages = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $galleryImages[] = $row; // Store each gallery item
    }
}
?>

<!-- gallery section start -->
<section id="gallery-page">
    <div class="container">
        <div class="gallery-page-main">
            <div class="gallery-page-left">
                <h5 class="category-filter active" data-category="all">All</h5>
                <h5 class="category-filter" data-category="hair_work">Hair Work</h5>
                <h5 class="category-filter" data-category="nail_work">Nail Work</h5>
                <h5 class="category-filter" data-category="makeup">Makeup</h5>
            </div>
            <div class="gallery-page-right" id="gallery-container">
                <?php foreach ($galleryImages as $image): ?>
                    <div class="gallery-img-card" data-category="<?php echo $image['category']; ?>">
                        <img src="<?php echo SITEURL; ?>admin/gallery/<?php echo $image['gallery_images']; ?>" 
                             alt="" class="gallery-image" data-src="<?php echo SITEURL; ?>admin/gallery/<?php echo $image['gallery_images']; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- gallery section end -->

<!-- Modal for image popup -->
<div id="image-modal" class="image-modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="modal-image">
    <div class="modal-controls">
        <span id="prev">&lt;</span>
        <span id="next">&gt;</span>
    </div>
</div>

<script>
    // JavaScript to filter images based on category
    document.querySelectorAll('.category-filter').forEach(button => {
        button.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            const galleryItems = document.querySelectorAll('.gallery-img-card');

            galleryItems.forEach(item => {
                if (category === 'all' || item.getAttribute('data-category') === category) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    // Image popup functionality
    const modal = document.getElementById('image-modal');
    const modalImage = document.getElementById('modal-image');
    const closeBtn = document.querySelector('.close');
    const prevBtn = document.getElementById('prev');
    const nextBtn = document.getElementById('next');
    let currentIndex = 0;

    const galleryImages = Array.from(document.querySelectorAll('.gallery-image'));

    // Open image in modal
    galleryImages.forEach((img, index) => {
        img.addEventListener('click', () => {
            currentIndex = index;
            modal.style.display = 'block';
            modalImage.src = img.dataset.src;
        });
    });

    // Close modal
    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Navigate to previous image
    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + galleryImages.length) % galleryImages.length;
        modalImage.src = galleryImages[currentIndex].dataset.src;
    });

    // Navigate to next image
    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % galleryImages.length;
        modalImage.src = galleryImages[currentIndex].dataset.src;
    });

    // Close modal when clicking outside the image
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });

    document.querySelectorAll('.category-filter').forEach(button => {
    button.addEventListener('click', function() {
        // Remove the 'active' class from all buttons
        document.querySelectorAll('.category-filter').forEach(btn => btn.classList.remove('active'));

        // Add the 'active' class to the clicked button
        this.classList.add('active');

        // Filter images based on category
        const category = this.getAttribute('data-category');
        const galleryItems = document.querySelectorAll('.gallery-img-card');

        galleryItems.forEach(item => {
            if (category === 'all' || item.getAttribute('data-category') === category) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
});
</script>

<style>
    /* Modal styling */
    .category-filter.active{
        color: var(--primary); 
        font-size: 48px;  
    }
    .image-modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        background-color: rgba(0, 0, 0, 0.9);
        align-items: center;
        justify-content: center;
    }
    .image-modal .modal-content {
        max-width: 80%;
        max-height: 80%;
        margin: auto;
        display: block;
        position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);

    }
    .image-modal .close {
        position: absolute;
        top: 20px;
        right: 40px;
        color: white;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
    }
    .modal-controls {
        position: absolute;
        top: 50%;
        width: 100%;
        display: flex;
        justify-content: space-between;
        color: white;
        font-size: 40px;
        cursor: pointer;
        transform: translateY(-50%);
    }
    #prev, #next {
        padding: 0 20px;
        user-select: none;
    }
</style>

<?php
include("./partial/footer.php");
?>

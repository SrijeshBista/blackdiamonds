<?php
include '../config/constants.php';
include './includes/header.php';

// delete image
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    $query = "DELETE FROM gallery WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Image deleted successfully!');</script>";
    } else {
        echo "<script>alert('Error deleting image.');</script>";
    }
    header("Location: manage_gallery.php");
    exit();
}

//  feature image
if (isset($_POST['feature_change']) && isset($_POST['feature_image_id']) && isset($_POST['current_feature_id'])) {
    $current_feature_id = intval($_POST['current_feature_id']); // Currently featured image
    $new_feature_id = intval($_POST['feature_image_id']); // Selected new feature image

    // Set the current featured image to non-featured
    $unset_query = "UPDATE gallery SET feature = 'no' WHERE id = $current_feature_id";
    mysqli_query($conn, $unset_query);

    // Set the selected image as featured
    $set_query = "UPDATE gallery SET feature = 'yes' WHERE id = $new_feature_id";
    $result = mysqli_query($conn, $set_query);

    if ($result) {
        echo "<script>alert('Feature image updated successfully!');</script>";
    } else {
        echo "<script>alert('Error updating feature image.');</script>";
    }
    header("Location: manage_gallery.php?mode=edit_feature");
    exit();
}


$gallery_query = "SELECT * FROM gallery";
$gallery_result = mysqli_query($conn, $gallery_query);
$gallery_images = mysqli_fetch_all($gallery_result, MYSQLI_ASSOC);
?>

<section class="backend-page">
    <?php include 'includes/nav.php'; ?>
    <div class="page">
        <h2 class="section-heading">Manage Gallery</h2>
        <div class="submenu">
            <a href="?mode=manage_images" class="btn-done">Manage Images</a>
            <a href="?mode=edit_feature" class="btn-done">Edit Feature Images</a>
        </div>

        <?php
        $mode = $_GET['mode'] ?? 'manage_images';

        if ($mode === 'manage_images') { ?>
            <div class="gallery-grid">
                <?php foreach ($gallery_images as $image) { ?>
                    <div class="gallery-item">
                        <img src="./gallery/<?php echo $image['gallery_images']; ?>" alt="Image">
                        <p>Category: <?php echo ucfirst($image['category']); ?></p>
                        <p>Featured: <?php echo ucfirst($image['feature']); ?></p>
                        <a href="?delete_id=<?php echo $image['id']; ?>" onclick="return confirm('Are you sure you want to delete this image?');" class="btn-red">Delete</a>
                    </div>
                <?php } ?>
            </div>
            <?php } elseif ($mode === 'edit_feature') { ?>
    <div class="feature-edit-grid">
        <h4>Currently Featured Images</h4>
        <div class="grid-container">
            <?php foreach ($gallery_images as $image) {
                if ($image['feature'] === 'yes') { ?>
                    <div class="feature-edit-item">
                        <img src="./gallery/<?php echo $image['gallery_images']; ?>" alt="Image">
                        <p>Category: <?php echo ucfirst($image['category']); ?></p>
                        <button class="btn-done change-feature-btn" data-feature-id="<?php echo $image['id']; ?>">Change</button>
                    </div>
            <?php }
            } ?>
        </div>
    </div>

    <!-- Popup Modal -->
   <!-- Popup Modal -->
<div id="featureModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h4>Select a Non-Featured Image</h4>
        <form action="" method="POST">
            <!-- Pass the current featured image ID -->
            <input type="hidden" name="current_feature_id" id="currentFeatureId">
            <div class="grid-container">
                <?php foreach ($gallery_images as $image) {
                    if ($image['feature'] === 'no') { ?>
                        <div class="feature-edit-item">
                            <input type="radio" name="feature_image_id" id="image-<?php echo $image['id']; ?>" value="<?php echo $image['id']; ?>">
                            <label for="image-<?php echo $image['id']; ?>">
                                <img src="./gallery/<?php echo $image['gallery_images']; ?>" alt="Image">
                            </label>
                        </div>
                <?php }
                } ?>
            </div>
            <button type="submit" name="feature_change" class="btn-done">Update Feature Image</button>
        </form>
    </div>
</div>

<?php } ?>

    </div>
</section>
<script>
    const modal = document.getElementById("featureModal");
const closeModal = document.querySelector(".close-btn");
const changeFeatureBtns = document.querySelectorAll(".change-feature-btn");
const currentFeatureIdInput = document.getElementById("currentFeatureId");

// Open modal when "Change" button is clicked
changeFeatureBtns.forEach(btn => {
    btn.addEventListener("click", function () {
        const featureId = this.dataset.featureId;
        currentFeatureIdInput.value = featureId; // Set the current featured image ID
        modal.style.display = "block";
    });
});

// Close modal when "X" is clicked
closeModal.addEventListener("click", function () {
    modal.style.display = "none";
});

// Close modal when clicking outside the modal content
window.addEventListener("click", function (event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
});

</script>


<style>
    .submenu {
        margin-bottom: 20px;
    }

    .gallery-grid,
     .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }

    .gallery-item,
    .feature-edit-item {
        text-align: center;
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 5px;
        background: #f9f9f9;
    }

    .gallery-item img,
    .feature-edit-item img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .feature-edit-item input[type="radio"] {
        display: none;
    }

    .feature-edit-item label {
        cursor: pointer;
        display: block;
        position: relative;
        border: 2px solid transparent;
        transition: border 0.3s ease;
    }

    .feature-edit-item input[type="radio"]:checked + label {
        border: 2px solid #007bff;
    }

    .btn-done{
        display: inline-block;
        padding: 8px 16px;
        background:  #2189b3;
        color: #fff;
        border: none;
        text-decoration: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .btn-done:hover{
        background:rgb(14, 77, 102);
        color: white;
    }
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: #fff;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        width: 80%;
        max-width: 600px;
        text-align: center;
    }

    .close-btn {
        float: right;
        font-size: 24px;
        font-weight: bold;
        cursor: pointer;
    }

    .close-btn:hover {
        color: red;
    }
</style>

<?php include 'includes/footer.php'; ?>

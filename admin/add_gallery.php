<?php
include '../config/constants.php';
include './includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Handle uploaded files
    $uploadDir = './gallery/'; // Directory where images will be stored
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $uploadedImages = [];

    if (!empty($_FILES['gallery']['name'][0])) {
        foreach ($_FILES['gallery']['name'] as $key => $name) {
            $tmpName = $_FILES['gallery']['tmp_name'][$key];
            $fileType = $_FILES['gallery']['type'][$key];

            // Check if the file type is allowed
            if (in_array($fileType, $allowedTypes)) {
                $targetFile = $uploadDir . basename($name);

                // Move the file to the gallery folder
                if (move_uploaded_file($tmpName, $targetFile)) {
                    $uploadedImages[] = $name; // Keep track of successfully uploaded files
                } else {
                    echo "<script>alert('Failed to upload image: $name');</script>";
                }
            } else {
                echo "<script>alert('Invalid file type for: $name');</script>";
            }
        }
    }

    // Process form data
    $images_data = $_POST['images_data']; // Contains JSON data for images, categories, and features

    if (!empty($images_data)) {
        $images_array = json_decode($images_data, true);

        foreach ($images_array as $image_entry) {
            $image_name = mysqli_real_escape_string($conn, $image_entry['image']);
            $category = mysqli_real_escape_string($conn, $image_entry['category']);
            $feature = mysqli_real_escape_string($conn, $image_entry['feature']);

            // Ensure the image was uploaded successfully before inserting into the database
            if (in_array($image_name, $uploadedImages)) {
                $query = "INSERT INTO gallery (gallery_images, category, feature) VALUES ('$image_name', '$category', '$feature')";
                $result = mysqli_query($conn, $query);

                if (!$result) {
                    echo "<script>alert('Error while adding image: $image_name');</script>";
                }
            }
        }
        echo "<script>alert('Gallery images added successfully!');</script>";
        header("Location: manage_gallery.php");
        exit();
    } else {
        echo "<script>alert('No valid data to process!');</script>";
    }
}
?>

<section class="backend-page">
    <?php include 'includes/nav.php'; ?>
    <div class="page">
        <h2 class="section-heading">Add Gallery</h2>
        <div class="add-admin-form">
            <form action="" method="POST" enctype="multipart/form-data" id="gallery-form">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="gallery-images">Select Multiple Images</label>
                        <input type="file" class="form-control" id="gallery-images" name="gallery[]" multiple>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="button" class="btn-done" id="preview-images-btn">Preview Images</button>
                    </div>
                </div>

                <div id="image-list-container" class="form-row" style="display: none;">
                    <h4>Manage Selected Images</h4>
                    <ul id="image-list"></ul>
                    <input type="hidden" name="images_data" id="images-data">
                    <div class="form-group">
                        <button type="submit" class="btn-done">Upload and Save Gallery</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    const previewButton = document.getElementById('preview-images-btn');
    const galleryInput = document.getElementById('gallery-images');
    const imageListContainer = document.getElementById('image-list-container');
    const imageList = document.getElementById('image-list');
    const imagesDataInput = document.getElementById('images-data');
    let selectedImages = [];
    let featuredCount = 0;

    previewButton.addEventListener('click', () => {
        const files = galleryInput.files;
        if (files.length === 0) {
            alert('Please select images to preview.');
            return;
        }

        if (files.length > 20) {
            alert('You can select a maximum of 20 images.');
            return;
        }

        selectedImages = [];
        imageList.innerHTML = '';

        Array.from(files).forEach((file, index) => {
            const reader = new FileReader();

            reader.onload = function(e) {
                selectedImages.push(file.name);

                const listItem = document.createElement('li');
                listItem.innerHTML = `
                    <img src="${e.target.result}" alt="${file.name}" style="width: 100px; height: 100px;">
                    <input type="hidden" value="${file.name}">
                    <style> 

                    #image-list > li{
                    margin-top:20px;
            }



                    .form-containers {
                    width:100%;
    display: flex;
    gap: 20px;
}

.form-containers > div {
    flex: 1 1 50%; /* Makes each div take up 50% of the container width */
    display: flex;
    flex-direction: column;
}

                    
                    
                    </style>
                    <div class="form-containers">
                    <div>
                        <label>Category:</label>
                        <select class="form-control category-select">
                            <option value="hair_work">Hair Work</option>
                            <option value="nail_work">Nail Work</option>
                            <option value="makeup">Makeup</option>
                        </select>
                    </div>
                    <div>
                        <label>Feature in Homepage:</label>
                        <select class="form-control feature-select">
                            <option value="no" selected>No</option>
                            <option value="yes">Yes</option>
                        </select>
                    </div>
                    </div>
                `;

                const featureSelect = listItem.querySelector('.feature-select');
                featureSelect.addEventListener('change', () => {
                    if (featureSelect.value === 'yes') {
                        if (featuredCount >= 7) {
                            alert('Only 7 images can be featured on the homepage.');
                            featureSelect.value = 'no';
                        } else {
                            featuredCount++;
                        }
                    } else {
                        featuredCount--;
                    }
                });

                imageList.appendChild(listItem);
            };

            reader.readAsDataURL(file);
        });

        imageListContainer.style.display = 'block';
        prepareData();
    });

    function prepareData() {
        const data = [];
        const items = document.querySelectorAll('#image-list li');
        items.forEach((item) => {
            const image = item.querySelector('input[type="hidden"]').value;
            const category = item.querySelector('.category-select').value;
            const feature = item.querySelector('.feature-select').value;

            data.push({
                image,
                category,
                feature
            });
        });

        imagesDataInput.value = JSON.stringify(data);
    }

    // Update data on selection changes
    document.addEventListener('change', (e) => {
        if (e.target.classList.contains('category-select') || e.target.classList.contains('feature-select')) {
            prepareData();
        }
    });
</script>





<?php include 'includes/footer.php'; ?>
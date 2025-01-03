<!-- header start  -->
<?php
include("./partial/header.php");
?>

<!-- header end  -->
<!-- blog start  -->
<section id="blog-page">
    <div class="bigcontainer">
        <div class="blog-main">
            <div class="blogpostmain">
                <?php
                // Check if the 'id' parameter exists in the query string
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    // Query to fetch the blog post based on the ID
                    $sql = "SELECT * FROM blog WHERE id = $id";
                    $result = mysqli_query($conn, $sql);

                    // Check if the blog exists
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $title = $row['title'];
                        $image = $row['image'];
                        $content = $row['content'];
                ?>
                        <div class="blogpost-title">
                            <h1><?php echo $title; ?></h1>
                        </div>
                        <div class="blogpost-img">
                            <img src="<?php echo SITEURL; ?>admin/blog/img/<?php echo $image; ?>" alt="">
                        </div>
                        <article class="blogpost-content">
                            <p><?php echo nl2br($content); ?></p>
                        </article>
                <?php
                    } else {
                        echo "<p>Blog post not found.</p>";
                    }
                } else {
                    echo "<p>Invalid blog post ID.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- blog end  -->

<!-- footer start  -->
<?php
include("./partial/footer.php");
?>
<!-- footer end   -->
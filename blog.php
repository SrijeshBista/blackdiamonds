<!-- header start  -->
<?php
include("./partial/header.php")
?>
<!-- header end  -->
<!-- blog start  -->
<section id="blog-page">
    <div class="bigcontainer">
        <div class="blog-main">
            <div class="abouts-title">
                <h1 class="t-up">Our</h1>
                <h1 class="t-down">Blog</h1>
            </div>
            <div class="blog-cards">


                <?php
                $sql = "SELECT * FROM blog";
                $result = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $title = $row['title'];
                        $image = $row['image'];
                        $content = $row['content'];
                        $id = $row['id'];



                ?>

                        <div class="card">
                            <div class="blog-card-img">
                                <img src="<?php echo SITEURL; ?>admin/blog/img/<?php echo $image ?>" alt="">
                                <div class="blogimg-overlay"></div>
                            </div>
                            <div class="blog-title">
                                <h3><?php echo $title ?></h3>
                                <p><a href="blogpost.php?id=<?php echo $id; ?>">Read now.</a></p>
                            </div>
                        </div>


                <?php

                    }
                }


                ?>

            </div>
        </div>
    </div>
</section>

<!-- blog end  -->
<!-- footer start  -->
<?php
include("./partial/footer.php")
?>
<!-- footer end   -->
<?php require_once('components/header.php'); ?>

<?php require_once('components/home/home.php'); ?>

<?php require_once('components/home/news.php'); ?>

<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <div class="bg-primary mb-3 mx-auto" style="width: 60px; height: 2px;"></div>
            <h1 class="display-5 mb-5" style="color:#1d2340;">Nos vidéos</h1>
        </div>
        <div class="row g-4">
            <?php require_once('components/home/videos.php'); ?>
        </div>
    </div>
</div>
<!-- Team End -->



<?php require_once('components/footer.php'); ?>
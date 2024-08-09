<?php
// Récupérer la liste des fichiers vidéo dans le dossier "videos"
$videos = array_diff(scandir('videos'), array('..', '.')); ?>

<link rel="stylesheet" href="css/video.css">

<div class="contain">
    <div class="video-player">
        <video id="video" controls>
            <source id="video-source" src="videos/<?php echo $videos[0]; ?>" type="video/mp4">
            Votre navigateur ne supporte pas la lecture de vidéos.
        </video>
        <button id="fullscreen-btn">Plein écran</button>
    </div>
    <div class="playlist">
        <h3>Playlist</h3>
        <ul id="video-list">
            <?php foreach ($videos as $video) : ?>
            <li>
                <a href="#" class="video-item" data-video="videos/<?php echo $video; ?>">
                    <img src="videos/thumbnails/<?php echo pathinfo($video, PATHINFO_FILENAME); ?>.jpg"
                        alt="<?php echo $video; ?>" class="thumbnail">
                    <?php echo $video; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>


<script src="js/video.js"></script>
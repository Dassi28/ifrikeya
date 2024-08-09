document.querySelectorAll('.video-item').forEach(item => {
    item.addEventListener('click', event => {
        event.preventDefault();

        // Changer la source de la vidéo
        const videoSrc = item.getAttribute('data-video');
        const videoElement = document.getElementById('video');
        const videoSource = document.getElementById('video-source');

        videoSource.src = videoSrc;
        videoElement.load();
        videoElement.play();
    });
});

// Fonction pour activer le mode plein écran
document.getElementById('fullscreen-btn').addEventListener('click', () => {
    const videoElement = document.getElementById('video');

    if (videoElement.requestFullscreen) {
        videoElement.requestFullscreen();
    } else if (videoElement.mozRequestFullScreen) { // Firefox
        videoElement.mozRequestFullScreen();
    } else if (videoElement.webkitRequestFullscreen) { // Chrome, Safari et Opera
        videoElement.webkitRequestFullscreen();
    } else if (videoElement.msRequestFullscreen) { // IE/Edge
        videoElement.msRequestFullscreen();
    }
});

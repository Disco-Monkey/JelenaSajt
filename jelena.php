<?php

$imageFolder = 'pics/GalleryJe';

$images = glob($imageFolder . '/*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
include 'headerG.php'; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jelena Gallery</title>
    <link rel="stylesheet" href="style.css"></head>
<body><h1>Jelena Gallery</h1>

<div class="galleryG">
    <?php if (!empty($images)): ?>
        <?php foreach ($images as $index => $img): ?>
            <img src="<?= $img ?>" alt="Gallery image" data-index="<?= $index ?>">
        <?php endforeach; ?>
    <?php else: ?>
        <p>No images found in <?= $imageFolder ?></p>
    <?php endif; ?>
</div>

<!-- Lightbox Viewer -->
<div class="lightbox" id="lightbox">
    <span class="close" onclick="closeLightbox()">&times;</span>
    <img id="lightbox-img" src="" alt="Expanded Image">
    <div class="controls">
        <span onclick="prevImage()">&#10094;</span> <!-- Left arrow -->
        <span onclick="nextImage()">&#10095;</span> <!-- Right arrow -->
    </div>
</div>

<script>
// Setup
const images = document.querySelectorAll('.galleryG img');
const lightbox = document.getElementById('lightbox');
const lightboxImg = document.getElementById('lightbox-img');

let currentIndex = 0;

// Open lightbox
images.forEach((img, index) => {
    img.addEventListener('click', () => {
        currentIndex = index;
        showImage();
        lightbox.style.display = 'flex';
    });
});

// Show image based on currentIndex
function showImage() {
    lightboxImg.src = images[currentIndex].src;
}

// Close lightbox
function closeLightbox() {
    lightbox.style.display = 'none';
}

// Show next image
function nextImage() {
    currentIndex = (currentIndex + 1) % images.length;
    showImage();
}

// Show previous image
function prevImage() {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    showImage();
}

// Close when clicking outside image
lightbox.addEventListener('click', (e) => {
    if (e.target === lightbox) {
        closeLightbox();
    }
});

// Support left/right keyboard keys
document.addEventListener('keydown', (e) => {
    if (lightbox.style.display === 'flex') {
        if (e.key === 'ArrowRight') nextImage();
        if (e.key === 'ArrowLeft') prevImage();
        if (e.key === 'Escape') closeLightbox();
    }
});
</script>


</body>
</html>
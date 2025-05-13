<?php 
include 'data.php';
include 'header.php'; 
?>
    <main>
        <section id="about">
            <h2>About Us</h2>
            <p><?= $about ?></p>
        </section>

        <section id="profPanel">
            <h2>Profs</h2>
            <div class="grid">
                <?php foreach ($Profs as $Prof): ?>
                    <a href="<?= $Prof['link'] ?>" class="panelCard">
                    <div class="panelCard">
                        <h3><?= $Prof['title'] ?></h3>
                        <img src="<?= $Prof['image'] ?>" alt="<?= htmlspecialchars($Prof['title']) ?>">
                        <p><?= $Prof['description'] ?></p>
                    </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="contact">
            <h2>Contact us</h2>
            <div class="contact">
                <p>Email me at <a href="mailto:<?= $contactEmailJe ?>"><?= $contactEmailJe ?></a></p>
                <a href="<?= $contactInsJe ?>"><img src="pics/instagram.png" alt=""></a>
            </div>
            <div class="contact">
                <p>Email me at <a href="mailto:<?= $contactEmailDu ?>"><?= $contactEmailDu ?></a></p>
                <a href="<?= $contactInsDu ?>"><img src="pics/instagram.png" alt=""></a>
            </div>

        </section>
    </main>

    <?php include 'footer.php'; ?>
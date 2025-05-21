<?php
require_once __DIR__ . '/Parts/lang.php';
?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($lang); ?>">
<?php require __DIR__ . '/Parts/head.php'; ?>
<body>
    <?php require __DIR__ . '/Parts/navbar.php'; ?>
    <div class="page-container">
        <section class="about-us">
            <h1 class="titillium-web-bold"><?php echo htmlspecialchars($text[$lang]['about_title']); ?></h1>

            <div class="about-section">
                <div class="about-image">
                    <img src="Images/how-to-install-who-house-water-filter-step-3.jpg" alt="Person installing water filter">
                </div>
                <div class="about-text">
                    <p class="titillium-web-regular">
                        <?php echo htmlspecialchars($text[$lang]['about_p1']); ?>
                    </p>
                </div>
            </div>

            <div class="about-section reverse">
                <div class="about-text">
                    <p class="titillium-web-regular">
                        <?php echo htmlspecialchars($text[$lang]['about_p2']); ?>
                    </p>
                </div>
                <div class="about-image">
                    <img src="Images/ecosoft-bylding.png" alt="Building at dusk">
                </div>
            </div>

            <div class="about-section">
                <div class="about-image">
                    <img src="Images/image6.jpg" alt="Person in factory setting">
                </div>
                <div class="about-text">
                    <p class="titillium-web-regular">
                        <?php echo htmlspecialchars($text[$lang]['about_p3']); ?>
                    </p>
                </div>
            </div>
        </section>
    </div>
    <?php require __DIR__ . '/Parts/footer.php'; ?>
</body>
</html>

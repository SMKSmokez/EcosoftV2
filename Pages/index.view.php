<?php require_once "\\xampp\htdocs\EcosoftV2\Pages/Parts/lang.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php require "\\xampp\htdocs\EcosoftV2\Pages/Parts/head.php";?>
<body>
    <?php require "\\xampp\htdocs\EcosoftV2\Pages/Parts/navbar.php"; ?>
    <div class="page-container">
        <main class="hero" id="hero">
            <section class="hero-text">
                <h1 class="titillium-web-bold"><?php echo $text[$lang]['hero_title']; ?></h1>
                <p class="subtext titillium-web-semibold">
                    <?php echo $text[$lang]['hero_subtext']; ?>
                </p>
            </section>

            <section class="content-row">
                <div class="about-block titillium-web-regular">
                    <p><?php echo $text[$lang]['about_text']; ?></p>
                </div>

                <div class="icon-links">
                    <a href="Products?lang=<?php echo $currentLang; ?>" class="icon-link">
                        <span class="landing-icon"><img src="Images/Icons/products_icon.svg" alt="Products Icon"></span>
                        <p class="titillium-web-regular"><?php echo $text[$lang]['products']; ?></p>
                    </a>
                    <a href="About?lang=<?php echo $currentLang; ?>" class="icon-link">
                        <span class="landing-icon"><img src="Images/Icons/About us - icon.svg" alt="About Us Icon"></span>
                        <p class="titillium-web-regular"><?php echo $text[$lang]['about']; ?></p>
                    </a>
                    <a href="Survey?lang=<?php echo $currentLang; ?>" class="icon-link">
                        <span class="landing-icon"><img src="Images/Icons/contact-icon.svg" alt="Contact Us Icon"></span>
                        <p class="titillium-web-regular"><?php echo $text[$lang]['contact']; ?></p>
                    </a>
                </div>
            </section>
        </main>

        <section class="filter-query">
            <div class="filter-query-split">
                <div class="filter-query-text">
                    <p class="titillium-web-regular">
                        <?php echo $text[$lang]['filter_text']; ?>
                    </p>
                    <p class="filter-query-subtext">
                        <?php echo $text[$lang]['filter_subtext']; ?>
                    </p>
                    <p class="quiz-prompt">
                        <?php echo $text[$lang]['quiz_prompt']; ?>
                    </p>
                </div>
                <div class="filter-query-image">
                    <a href="Survey?lang=<?php echo $currentLang; ?>" class="quiz-button titillium-web-bold"><?php echo $text[$lang]['quiz_button']; ?></a>
                </div>
            </div>
        </section>

        <?php require "\\xampp\htdocs\EcosoftV2\Pages\Parts\\footer.php"; ?>
    </div>
</body>
</html>
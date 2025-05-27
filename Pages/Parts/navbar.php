<?php
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'en';
}

$flagIcons = [
    'en' => 'Images/Icons/us.svg',
    'al' => 'Images/Icons/al.svg',
    'me' => 'Images/Icons/me.svg'
];

$currentLang = $_SESSION['lang'];
$currentFlag = isset($flagIcons[$currentLang]) ? $flagIcons[$currentLang] : $flagIcons['en'];

$currentPage = basename($_SERVER['PHP_SELF']);
?>

<link rel="stylesheet" href="CSS/nav.css?v=1">

<?php if ($currentPage == 'index.php' || $currentPage == '404.php') { ?>

    <!-- Desktop Navbar (unchanged) -->
    <div class="navbar-wrapper desktop-navbar">
        <nav class="navbar transparent">
            <div class="navbar-logo">
                <a href="Home?lang=<?php echo $currentLang; ?>">
                    <img src="Images/Logo/E_F_Logo.svg" alt="Ecosoft Montenegro Logo" class="logo-svg">
                </a>
            </div>
            <div class="navbar-language">
                <div class="language-selector">
                    <img src="<?php echo $currentFlag; ?>" alt="Current Language Flag">
                </div>
                <div class="language-dropdown">
                    <a href="?lang=en" class="language-option" data-lang="en">
                        <img src="Images/Icons/us.svg" alt="American Flag">
                    </a>
                    <a href="?lang=al" class="language-option" data-lang="al">
                        <img src="Images/Icons/al.svg" alt="Albanian Flag">
                    </a>
                    <a href="?lang=me" class="language-option" data-lang="me">
                        <img src="Images/Icons/me.svg" alt="Montenegro Flag">
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <!-- Mobile Navbar -->
    <div class="navbar-wrapper mobile-navbar index-404-layout">
        <nav class="navbar transparent">
            <button class="hamburger-btn" aria-label="Toggle menu">☰</button>
            <div class="navbar-logo">
                <a href="Home?lang=<?php echo $currentLang; ?>">
                    <img src="Images/Logo/E_F_Logo.svg" alt="Ecosoft Montenegro Logo" class="logo-svg">
                </a>
            </div>
            <div class="navbar-language">
                <div class="language-selector">
                    <img src="<?php echo $currentFlag; ?>" alt="Current Language Flag">
                </div>
                <div class="language-dropdown">
                    <a href="?lang=en" class="language-option" data-lang="en">
                        <img src="Images/Icons/us.svg" alt="American Flag">
                    </a>
                    <a href="?lang=al" class="language-option" data-lang="al">
                        <img src="Images/Icons/al.svg" alt="Albanian Flag">
                    </a>
                    <a href="?lang=me" class="language-option" data-lang="me">
                        <img src="Images/Icons/me.svg" alt="Montenegro Flag">
                    </a>
                </div>
            </div>
        </nav>
    </div>

<?php } else { ?>

    <!-- Desktop Navbar -->
    <nav class="navbar" style="box-shadow: 0px 4px 25px 5px rgba(137, 170, 199, 1);">
        <div class="navbar-logo">
            <a href="Home?lang=<?php echo $currentLang; ?>">
                <img src="Images/Logo/E_F_Logo.svg" alt="Ecosoft Montenegro Logo" class="logo-svg">
            </a>
        </div>
        <div class="navbar-icons">
            <a href="Products?lang=<?php echo $currentLang; ?>" class="nav-icon <?php echo ($currentPage == 'products.php' ? 'active' : ''); ?>">
                <img src="Images/Icons/products_icon.svg" alt="Products Icon">
            </a>
            <a href="About?lang=<?php echo $currentLang; ?>" class="nav-icon <?php echo ($currentPage == 'about.php' ? 'active' : ''); ?>">
                <img src="Images/Icons/About us - icon.svg" alt="About Us Icon">
            </a>
            <a href="Survey?lang=<?php echo $currentLang; ?>" class="nav-icon <?php echo ($currentPage == 'survey.php' ? 'active' : ''); ?>">
                <img src="Images/Icons/contact-icon.svg" alt="Contact Us Icon">
            </a>
        </div>
        <div class="navbar-language">
            <div class="language-selector">
                <img src="<?php echo $currentFlag; ?>" alt="Current Language Flag">
            </div>
            <div class="language-dropdown">
                <a href="?lang=en" class="language-option" data-lang="en">
                    <img src="Images/Icons/us.svg" alt="American Flag">
                </a>
                <a href="?lang=al" class="language-option" data-lang="al">
                    <img src="Images/Icons/al.svg" alt="Albanian Flag">
                </a>
                <a href="?lang=me" class="language-option" data-lang="me">
                    <img src="Images/Icons/me.svg" alt="Montenegro Flag">
                </a>
            </div>
        </div>
    </nav>

    <!-- Mobile Navbar -->
    <div class="navbar-wrapper mobile-navbar">
        <nav class="navbar" style="box-shadow: 0px 4px 25px 5px rgba(137, 170, 199, 1);">
            <?php if (!in_array($currentPage, ['index.php', '404.php'])): ?>
                <button class="hamburger-btn" aria-label="Toggle menu">☰</button>
            <?php endif; ?>
            <div class="navbar-logo">
                <a href="Home?lang=<?php echo $currentLang; ?>">
                    <img src="Images/Logo/E_F_Logo.svg" alt="Ecosoft Montenegro Logo" class="logo-svg">
                </a>
            </div>
            <div class="navbar-language">
                <div class="language-selector">
                    <img src="<?php echo $currentFlag; ?>" alt="Current Language Flag">
                </div>
                <div class="language-dropdown">
                    <a href="?lang=en" class="language-option" data-lang="en">
                        <img src="Images/Icons/us.svg" alt="American Flag">
                    </a>
                    <a href="?lang=al" class="language-option" data-lang="al">
                        <img src="Images/Icons/al.svg" alt="Albanian Flag">
                    </a>
                    <a href="?lang=me" class="language-option" data-lang="me">
                        <img src="Images/Icons/me.svg" alt="Montenegro Flag">
                    </a>
                </div>
            </div>
        </nav>

        <!-- Mobile Slide-Out Menu with Icons ONLY -->
        <div class="mobile-slide-menu">
            <a href="Products?lang=<?php echo $currentLang; ?>" class="mobile-nav-link <?php echo ($currentPage == 'products.php' ? 'active' : ''); ?>">
                <img src="Images/Icons/products_icon.svg" alt="Products Icon">
            </a>
            <a href="About?lang=<?php echo $currentLang; ?>" class="mobile-nav-link <?php echo ($currentPage == 'about.php' ? 'active' : ''); ?>">
                <img src="Images/Icons/About us - icon.svg" alt="About Us Icon">
            </a>
            <a href="Survey?lang=<?php echo $currentLang; ?>" class="mobile-nav-link <?php echo ($currentPage == 'survey.php' ? 'active' : ''); ?>">
                <img src="Images/Icons/contact-icon.svg" alt="Contact Us Icon">
            </a>
        </div>
    </div>

<?php } ?>

<script src="JS/navbar.js"></script>

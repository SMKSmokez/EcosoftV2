<?php
session_start();
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'me';
}

// Map languages to flag icons
$flagIcons = [
    'en' => 'Images/Icons/us.svg',
    'al' => 'Images/Icons/al.svg',
    'me' => 'Images/Icons/me.svg'
];

$currentLang = $_SESSION['lang'];
$currentFlag = isset($flagIcons[$currentLang]) ? $flagIcons[$currentLang] : $flagIcons['me'];
?>

<nav class="navbar">
    <div class="navbar-logo">
        <span class="logo-symbol">D</span>
        <div class="logo-text">
            <span class="logo-main titillium-web-bold">ecosoft</span>
            <span class="logo-sub titillium-web-regular">Montenegro</span>
        </div>
    </div>
    <div class="navbar-icons">
        <a href="#products" class="nav-icon">
            <img src="Images/Icons/products_icon.svg" alt="Products Icon">
        </a>
        <a href="about_us.php" class="nav-icon">
            <img src="Images/Icons/About us - icon.svg" alt="About Us Icon">
        </a>
        <a href="#contact" class="nav-icon">
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
<script src="JS/navbar.js"></script>
<?php
session_start();
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'me';
}

$flagIcons = [
    'en' => 'Images/Icons/us.svg',
    'al' => 'Images/Icons/al.svg',
    'me' => 'Images/Icons/me.svg'
];

$currentLang = $_SESSION['lang'];
$currentFlag = isset($flagIcons[$currentLang]) ? $flagIcons[$currentLang] : $flagIcons['me'];

$currentPage = basename($_SERVER['PHP_SELF']);
?>

<?php if ($currentPage == 'index.php') { ?>
    <div class="navbar-wrapper">
        <nav class="navbar transparent">
            <div class="navbar-logo">
                <img src="Images/Logo/E_F_Logo.svg" alt="Ecosoft Montenegro Logo" class="logo-svg">
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
    <nav class="navbar">
        <div class="navbar-logo">
            <img src="Images/Logo/E_F_Logo.svg" alt="Ecosoft Montenegro Logo" class="logo-svg">
        </div>
        <div class="navbar-icons">
            <a href="products.php" class="nav-icon <?php echo ($currentPage == 'products.php' ? 'active' : ''); ?>">
                <img src="Images/Icons/products_icon.svg" alt="Products Icon">
            </a>
            <a href="about_us.php" class="nav-icon <?php echo ($currentPage == 'about_us.php' ? 'active' : ''); ?>">
                <img src="Images/Icons/About us - icon.svg" alt="About Us Icon">
            </a>
            <a href="survey.php" class="nav-icon <?php echo ($currentPage == 'survey.php' ? 'active' : ''); ?>">
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
<?php } ?>
<script src="JS/navbar.js"></script>
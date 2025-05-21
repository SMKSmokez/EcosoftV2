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
$currentFlag = isset($flagIcons[$currentLang]) ? $flagIcons[$currentLang] : $flagIcons['us'];

$currentPage = basename($_SERVER['PHP_SELF']);
?>

<?php if ($currentPage == 'index.php') { ?>
    <link rel="stylesheet" href="CSS/nav.css?v=1">

    <div class="navbar-wrapper">
        <nav class="navbar transparent">
            <div class="navbar-logo">
                <a href="Home?lang=<?php echo $currentLang; ?>"><img src="Images/Logo/E_F_Logo.svg" alt="Ecosoft Montenegro Logo" class="logo-svg"></a>
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
<?php } elseif ($currentPage == '404.php') { ?>
    <link rel="stylesheet" href="CSS/nav.css?v=1">

    <div class="navbar-wrapper">
        <nav class="navbar transparent">
            <div class="navbar-logo">
                <a href="Home?lang=<?php echo $currentLang; ?>"><img src="Images/Logo/E_F_Logo.svg" alt="Ecosoft Montenegro Logo" class="logo-svg"></a>
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
    <link rel="stylesheet" href="CSS/nav.css?v=1">
    <nav class="navbar" style="box-shadow: 0px 4px 25px 5px rgba(137, 170, 199, 1);">
        <div class="navbar-logo">
        <a href="Home?lang=<?php echo $currentLang; ?>"><img src="Images/Logo/E_F_Logo.svg" alt="Ecosoft Montenegro Logo" class="logo-svg"></a>
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
<?php }?>
<script src="JS/navbar.js"></script>
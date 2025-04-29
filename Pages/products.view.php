<!DOCTYPE html>
<html lang="<?php echo $currentLang; ?>">
<?php
session_start();
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'en';
}
$currentLang = $_SESSION['lang'];

require "\\xampp\htdocs\EcosoftV2\config.php";

$searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';
$filterKeyword = isset($_GET['filter']) ? trim($_GET['filter']) : '';

$sql = "SELECT * FROM products WHERE 1=1"; // Base query
$params = [];

if (!empty($searchQuery)) {
    $sql .= " AND (name LIKE :search OR description LIKE :search)";
    $params[':search'] = '%' . $searchQuery . '%';
}

if (!empty($filterKeyword)) {
    $sql .= " AND keywords LIKE :filter";
    $params[':filter'] = '%' . $filterKeyword . '%';
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$filterOptions = ['placeholder'];
?>

<?php require "\\xampp\htdocs\EcosoftV2\Pages/Parts/head.php"; ?>
<body>
    <?php require "\\xampp\htdocs\EcosoftV2\Pages/Parts/navbar.php"; ?>
    <main class="products-page">
        <!-- Search Section -->
        <section class="search-section">
            <div class="search-container">
                <!-- Search Form -->
                <form method="GET" action="" class="search-form" style="display: inline-block;">
                    <input type="text" name="search" class="search-bar titillium-web-regular" placeholder="Search..." value="<?php echo htmlspecialchars($searchQuery); ?>">
                    <input type="hidden" name="lang" value="<?php echo $currentLang; ?>">
                    <button type="submit" style="display: none;">Search</button> <!-- Hidden submit button; search on enter -->
                </form>

                <!-- Filter Form with Dropdown -->
                <form method="GET" action="" class="filter-form" style="display: inline-block; position: relative;">
                    <button class="filter-btn titillium-web-regular">Filter</button>
                    <div class="filter-dropdown";>
                        <?php foreach ($filterOptions as $option): ?>
                            <a href="?filter=<?php echo urlencode($option); ?>&lang=<?php echo $currentLang; ?>" class="filter-option"><?php echo htmlspecialchars($option); ?></a>
                        <?php endforeach; ?>
                        <a href="?lang=<?php echo $currentLang; ?>" class="filter-option">Clear Filter</a>
                    </div>
                    <input type="hidden" name="lang" value="<?php echo $currentLang; ?>">
                </form>

                <!-- Get Your Filter Button -->
                <a href="Survey?lang=<?php echo $currentLang; ?>"><button class="survey-btn titillium-web-regular">Get Your Filter</button></a>
            </div>
            <div class="survey-prompt">
                <p class="survey-title titillium-web-semibold">Not sure which filter is right for you?</p>
                <p class="survey-subtitle titillium-web-light">Before placing your order, take a quick survey—our experts will help match you with the ideal water filter for your home or business.</p>
            </div>
        </section>

        <!-- Product Grid -->
        <section class="product-grid">
            <?php if (count($products) > 0): ?>
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <h3 class="product-name titillium-web-semibold"><?php echo htmlspecialchars($product['name']); ?></h3>
                        <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="Water Filter">
                        <p class="product-description titillium-web-regular"><?php echo htmlspecialchars($product['description']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No products found matching your search or filter criteria.</p>
            <?php endif; ?>
        </section>
    </main>
    <?php require "\\xampp\htdocs\EcosoftV2\Pages/Parts/footer.php"; ?>
    <script src="JS/products.js"></script>
</body>
</html>
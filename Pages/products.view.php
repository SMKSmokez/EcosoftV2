<!DOCTYPE html>
<html lang="<?php echo $currentLang; ?>">
<?php
session_start();
require "\\xampp\htdocs\EcosoftV2\Pages\Parts\lang.php"; // Include lang.php to get $text and $lang
require "\\xampp\htdocs\EcosoftV2\config.php";

$currentLang = $lang; // Use $lang from lang.php (which is set to $_SESSION['lang'])

$searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';
$filterKeyword = isset($_GET['filter']) ? trim($_GET['filter']) : '';

// Fetch all products and gather unique keywords
$keywordsQuery = "SELECT keywords FROM products";
$keywordsStmt = $pdo->prepare($keywordsQuery);
$keywordsStmt->execute();
$keywordsArray = $keywordsStmt->fetchAll(PDO::FETCH_ASSOC);

// Create an array to store unique keywords
$uniqueKeywords = [];
foreach ($keywordsArray as $row) {
    $keywords = explode(',', $row['keywords']);
    foreach ($keywords as $keyword) {
        $trimmedKeyword = trim($keyword);
        if (!in_array($trimmedKeyword, $uniqueKeywords)) {
            $uniqueKeywords[] = $trimmedKeyword;
        }
    }
}

// Prepare the SQL query to filter products based on search and selected keyword
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
                    <button class="filter-btn titillium-web-regular"><?php echo htmlspecialchars($text[$currentLang]['filter']); ?></button>
                    <div class="filter-dropdown">
                        <div class="filter-options">
                            <!-- Dynamically generate filter options based on unique keywords -->
                            <?php foreach ($uniqueKeywords as $keyword): ?>
                                <a href="?filter=<?php echo urlencode($keyword); ?>&lang=<?php echo $currentLang; ?>" 
                                   class="filter-option <?php echo (strtolower($filterKeyword) === strtolower($keyword)) ? 'selected' : ''; ?>">
                                    <?php echo htmlspecialchars(ucwords($keyword)); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                        <div class="clear-filter-wrapper">
                            <a href="?lang=<?php echo $currentLang; ?>" class="filter-option clear-filter"><?php echo htmlspecialchars($text[$currentLang]['clear']); ?></a>
                        </div>
                    </div>
                    <input type="hidden" name="lang" value="<?php echo $currentLang; ?>">
                </form>

                <!-- Get Your Filter Button -->
                <a href="Survey?lang=<?php echo $currentLang; ?>"><button class="survey-btn titillium-web-regular"><?php echo htmlspecialchars($text[$currentLang]['quiz_button_products']); ?></button></a>
            </div>
            <div class="survey-prompt">
                <p class="survey-title titillium-web-semibold"><?php echo htmlspecialchars($text[$currentLang]['survey_title']); ?></p>
                <p class="survey-subtitle titillium-web-light"><?php echo htmlspecialchars($text[$currentLang]['survey_description']); ?></p>
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
                <p><?php echo htmlspecialchars($text[$currentLang]['no_products_found']); ?></p>
            <?php endif; ?>
        </section>
    </main>
    <?php require "\\xampp\htdocs\EcosoftV2\Pages/Parts/footer.php"; ?>
    <script src="JS/products.js"></script>
</body>
</html>
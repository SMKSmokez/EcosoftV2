<?php
session_start();

require_once __DIR__ . '/Parts/lang.php';
require_once __DIR__ . '/../config.php';

$currentLang = $lang;
$langSuffix = $currentLang;

// Fetch keywords for filter dropdown in the selected language
$keywordsQuery = "SELECT keywords_{$langSuffix} AS keywords FROM products";
$keywordsStmt = $pdo->prepare($keywordsQuery);
$keywordsStmt->execute();
$keywordsArray = $keywordsStmt->fetchAll(PDO::FETCH_ASSOC);

$uniqueKeywords = [];
foreach ($keywordsArray as $row) {
    $keywords = explode(',', $row['keywords']);
    foreach ($keywords as $keyword) {
        $trimmedKeyword = trim($keyword);
        if ($trimmedKeyword !== '' && !in_array($trimmedKeyword, $uniqueKeywords)) {
            $uniqueKeywords[] = $trimmedKeyword;
        }
    }
}

// Build SQL query with language-specific columns
$sql = "SELECT id, name, image_url, 
        description_{$langSuffix} AS description, 
        keywords_{$langSuffix} AS keywords
        FROM products WHERE 1=1";

$params = [];

if (!empty($searchQuery = (isset($_GET['search']) ? trim($_GET['search']) : ''))) {
    // Search in name or language-specific description
    $sql .= " AND (name LIKE :search OR description_{$langSuffix} LIKE :search)";
    $params[':search'] = '%' . $searchQuery . '%';
}

if (!empty($filterKeyword = (isset($_GET['filter']) ? trim($_GET['filter']) : ''))) {
    // Filter by language-specific keywords
    $sql .= " AND keywords_{$langSuffix} LIKE :filter";
    $params[':filter'] = '%' . $filterKeyword . '%';
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check if AJAX request
$isAjax = (
    isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
    strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'
);

if ($isAjax) {
    if (count($products) > 0) {
        foreach ($products as $product) {
            echo '<div class="product-card">';
            echo '<h3 class="product-name titillium-web-semibold">' . htmlspecialchars($product['name']) . '</h3>';
            echo '<img src="' . htmlspecialchars($product['image_url']) . '" alt="Water Filter">';
            echo '<p class="product-description titillium-web-regular">' . htmlspecialchars($product['description']) . '</p>';
            echo '</div>';
        }
    } else {
        echo '<p class="titillium-web-semibold" style="text-align: center; grid-column: 1 / -1; font-size: 21px;">' . htmlspecialchars($text[$currentLang]['no_products_found']) . '</p>';
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($currentLang); ?>">
<?php require __DIR__ . '/Parts/head.php'; ?>
<body>
    <?php require __DIR__ . '/Parts/navbar.php'; ?>
    <main class="products-page">
        <!-- Search Section -->
        <section class="search-section">
            <div class="search-container">
                <!-- Search Form -->
                <form method="GET" action="" class="search-form" style="display: inline-block;">
                    <input type="text" name="search" class="search-bar titillium-web-regular" placeholder="Search..." value="<?php echo htmlspecialchars($searchQuery ?? ''); ?>">
                    <input type="hidden" name="lang" value="<?php echo htmlspecialchars($currentLang); ?>">
                    <button type="submit" style="display: none;">Search</button> <!-- Hidden submit button -->
                </form>

                <!-- Filter Dropdown -->
                <form method="GET" action="" class="filter-form" style="display: inline-block; position: relative;">
                    <button class="filter-btn titillium-web-regular"><?php echo htmlspecialchars($text[$currentLang]['filter']); ?></button>
                    <div class="filter-dropdown">
                        <div class="filter-options">
                            <?php foreach ($uniqueKeywords as $keyword): ?>
                                <a href="?filter=<?php echo urlencode($keyword); ?>&lang=<?php echo htmlspecialchars($currentLang); ?>" 
                                   class="filter-option <?php echo (strtolower($filterKeyword ?? '') === strtolower($keyword)) ? 'selected' : ''; ?>">
                                    <?php echo htmlspecialchars(ucwords($keyword)); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                        <?php
                            $queryParams = $_GET;
                            unset($queryParams['filter']);
                            $queryString = http_build_query($queryParams);
                        ?>
                        <div class="clear-filter-wrapper">
                            <a href="?<?php echo htmlspecialchars($queryString); ?>" class="filter-option clear-filter">
                                <?php echo htmlspecialchars($text[$currentLang]['clear']); ?>
                            </a>
                        </div>
                    </div>
                    <input type="hidden" name="lang" value="<?php echo htmlspecialchars($currentLang); ?>">
                </form>

                <!-- Survey Button -->
                <a href="Survey?lang=<?php echo htmlspecialchars($currentLang); ?>">
                    <button class="survey-btn titillium-web-regular"><?php echo htmlspecialchars($text[$currentLang]['quiz_button_products']); ?></button>
                </a>
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
                        <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="Water Filter" loading="lazy">
                        <p class="product-description titillium-web-regular"><?php echo htmlspecialchars($product['description']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p><?php echo htmlspecialchars($text[$currentLang]['no_products_found']); ?></p>
            <?php endif; ?>
        </section>
    </main>
    <?php require __DIR__ . '/Parts/footer.php'; ?>

    <script src="JS/products.js"></script>
</body>
</html>

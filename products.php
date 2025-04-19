<!DOCTYPE html>
<html lang="<?php echo $currentLang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ecosoft Products</title>
    <link rel="stylesheet" href="CSS/nav.css?v=1">
    <link rel="stylesheet" href="CSS/products.css?v=1">
</head>
<body>
    <?php require "navbar.php";?>
    <main class="products-page">
        <!-- Search Section -->
        <section class="search-section">
            <div class="search-container">
                <input type="text" class="search-bar titillium-web-regular" placeholder="Search...">
                <button class="filter-btn titillium-web-regular">Filter</button>
                <button class="survey-btn titillium-web-regular">Get Your Filter</button>
            </div>
            <div class="survey-prompt">
                <p class="survey-title titillium-web-semibold">Not sure which filter is right for you?</p>
                <p class="survey-subtitle titillium-web-light">Before placing your order, take a quick survey—our experts will help match you with the ideal water filter for your home or business.</p>
            </div>
        </section>

        <!-- Product Grid -->
        <section class="product-grid">
            <div class="product-card">
                <h3 class="product-name titillium-web-semibold">Item Name</h3>
                <img src="Images/Filters/placeholder_filters.jpg" alt="Water Filter">
                <p class="product-description titillium-web-regular">Item Description</p>
            </div>
            <div class="product-card">
                <h3 class="product-name titillium-web-semibold">Item Name</h3>
                <img src="Images/Filters/placeholder_filters.jpg" alt="Water Filter">
                <p class="product-description titillium-web-regular">Item Description</p>
            </div>
            <div class="product-card">
                <h3 class="product-name titillium-web-semibold">Item Name</h3>
                <img src="Images/Filters/placeholder_filters.jpg" alt="Water Filter">
                <p class="product-description titillium-web-regular">Item Description</p>
            </div>
            <div class="product-card">
                <h3 class="product-name titillium-web-semibold">Item Name</h3>
                <img src="Images/Filters/placeholder_filters.jpg" alt="Water Filter">
                <p class="product-description titillium-web-regular">Item Description</p>
            </div>
            <div class="product-card">
                <h3 class="product-name titillium-web-semibold">Item Name</h3>
                <img src="Images/Filters/placeholder_filters.jpg" alt="Water Filter">
                <p class="product-description titillium-web-regular">Item Description</p>
            </div>
            <div class="product-card">
                <h3 class="product-name titillium-web-semibold">Item Name</h3>
                <img src="Images/Filters/placeholder_filters.jpg" alt="Water Filter">
                <p class="product-description titillium-web-regular">Item Description</p>
            </div>
        </section>
    </main>
</body>
</html>
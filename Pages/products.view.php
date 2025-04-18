<!DOCTYPE html>
<html lang="<?php echo $currentLang; ?>">
<?php require "Pages/Parts/head.php"?>
<body>
    <?php require "Pages/Parts/navbar.php";?>
    <main class="products-page">
        <!-- Search Section -->
        <section class="search-section">
            <div class="search-container">
                <input type="text" class="search-bar titillium-web-regular" placeholder="Search...">
                <button class="filter-btn titillium-web-regular">Filter</button>
                <a href="survey.php"><button class="survey-btn titillium-web-regular">Get Your Filter</button></a>
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
    <?php require "Pages/Parts/footer.php";?>
</body>
</html>
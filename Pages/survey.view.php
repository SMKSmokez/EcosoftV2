<?php require_once "\\xampp\htdocs\EcosoftV2\Pages/Parts/lang.php"; ?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<?php require "\\xampp\htdocs\EcosoftV2\Pages/Parts/head.php"; ?>
<body>
    <?php require "\\xampp\htdocs\EcosoftV2\Pages/Parts/navbar.php"; ?>
    <div class="page-container">
        <main class="survey-page">
            <section class="survey-section">
                <h1 class="survey-title titillium-web-semibold"><?php echo $text[$lang]['survey_title']; ?></h1>
                <p class="survey-description titillium-web-regular"><?php echo $text[$lang]['survey_description']; ?></p>

                <form class="survey-form">
                    <!-- First Name and Last Name -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="first-name" class="titillium-web-regular"><?php echo $text[$lang]['first_name']; ?>:</label>
                            <input type="text" id="first-name" class="form-input titillium-web-regular" placeholder="<?php echo $text[$lang]['first_name']; ?>">
                            <span class="error-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="last-name" class="titillium-web-regular"><?php echo $text[$lang]['last_name']; ?>:</label>
                            <input type="text" id="last-name" class="form-input titillium-web-regular" placeholder="<?php echo $text[$lang]['last_name']; ?>">
                            <span class="error-message"></span>
                        </div>
                    </div>
                
                    <!-- Phone Number and Address -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone-number" class="titillium-web-regular"><?php echo $text[$lang]['phone_number']; ?>:</label>
                            <input type="text" id="phone-number" class="form-input titillium-web-regular" placeholder="<?php echo $text[$lang]['phone_number']; ?>">
                            <span class="error-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="address" class="titillium-web-regular"><?php echo $text[$lang]['address']; ?>:</label>
                            <input type="text" id="address" class="form-input titillium-web-regular" placeholder="<?php echo $text[$lang]['address']; ?>">
                            <span class="error-message"></span>
                        </div>
                    </div>
                
                    <!-- Number of Bathrooms and Occupants -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="bathrooms" class="titillium-web-regular"><?php echo $text[$lang]['bathrooms']; ?>:</label>
                            <input type="text" id="bathrooms" class="form-input titillium-web-regular" placeholder="<?php echo $text[$lang]['bathrooms']; ?>">
                            <span class="error-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="occupancy" class="titillium-web-regular" title="<?php echo $text[$lang]['occupancy_tooltip']; ?>"><?php echo $text[$lang]['occupancy']; ?>:</label>
                            <input type="text" id="occupancy" class="form-input titillium-web-regular" placeholder="<?php echo $text[$lang]['occupancy']; ?>">
                            <span class="error-message"></span>
                        </div>
                    </div>
                
                    <!-- Water Source -->
                    <div class="form-group centered-group">
                        <label class="titillium-web-regular"><?php echo $text[$lang]['water_source']; ?>:</label>
                        <div class="checkbox-group">
                            <label class="checkbox-label titillium-web-regular">
                                <input type="checkbox" name="water-source" value="well"> <?php echo $text[$lang]['well']; ?>
                            </label>
                            <label class="checkbox-label titillium-web-regular">
                                <input type="checkbox" name="water-source" value="municipal"> <?php echo $text[$lang]['municipal']; ?>
                            </label>
                        </div>
                        <span class="error-message"></span>
                    </div>
                
                    <!-- Electricity Next to Water Meter -->
                    <div class="form-group centered-group">
                        <label class="titillium-web-regular"><?php echo $text[$lang]['electricity']; ?></label>
                        <div class="checkbox-group">
                            <label class="checkbox-label titillium-web-regular">
                                <input type="checkbox" name="electricity" value="yes"> <?php echo $text[$lang]['yes']; ?>
                            </label>
                            <label class="checkbox-label titillium-web-regular">
                                <input type="checkbox" name="electricity" value="no"> <?php echo $text[$lang]['no']; ?>
                            </label>
                            <label class="checkbox-label titillium-web-regular">
                                <input type="checkbox" name="electricity" value="dont-know"> <?php echo $text[$lang]['dont_know']; ?>
                            </label>
                        </div>
                        <span class="error-message"></span>
                    </div>
                
                    <!-- Submit Button -->
                    <button type="submit" class="submit-btn titillium-web-regular"><?php echo $text[$lang]['submit_button']; ?></button>
                </form>
            </section>
        </main>
        <?php require "\\xampp\htdocs\EcosoftV2\Pages\Parts/footer.php"; ?>
    </div>
    <script>
       document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector(".survey-form");
        
        // Localized error messages from lang.php
        const errorMessages = {
            firstName: "<?php echo $text[$lang]['error_first_name']; ?>",
            lastName: "<?php echo $text[$lang]['error_last_name']; ?>",
            phoneNumber: "<?php echo $text[$lang]['error_phone_number']; ?>",
            address: "<?php echo $text[$lang]['error_address']; ?>",
            bathrooms: "<?php echo $text[$lang]['error_bathrooms']; ?>",
            occupancy: "<?php echo $text[$lang]['error_occupancy']; ?>",
            waterSource: "<?php echo $text[$lang]['error_water_source']; ?>",
            electricity: "<?php echo $text[$lang]['error_electricity']; ?>"
        };
    
        // Utility: Show or hide error message
        function showError(element, message) {
            if (!element) return;
            let errorEl;
        
            if (element.classList.contains('form-group')) {
                // For checkbox groups or container elements
                errorEl = element.querySelector(".error-message");
            } else {
                // For input fields
                errorEl = element.parentElement.querySelector(".error-message");
            }
        
            if (errorEl) {
                errorEl.textContent = message;
            }
        }
    
        function clearErrors() {
            document.querySelectorAll(".error-message").forEach(el => el.textContent = "");
        }
    
        form.addEventListener("submit", function (e) {
            e.preventDefault(); // prevent submission for validation
            clearErrors();
            let hasError = false;
        
            // Input fields
            const fields = {
                firstName: document.getElementById("first-name"),
                lastName: document.getElementById("last-name"),
                phoneNumber: document.getElementById("phone-number"),
                address: document.getElementById("address"),
                bathrooms: document.getElementById("bathrooms"),
                occupancy: document.getElementById("occupancy"),
            };
        
            // Validate text fields
            for (const [key, field] of Object.entries(fields)) {
                if (!field.value.trim()) {
                    showError(field, errorMessages[key]);
                    hasError = true;
                }
            }
        
            // Validate water source checkboxes
            const waterSources = document.querySelectorAll("input[name='water-source']");
            const waterSelected = Array.from(waterSources).some(cb => cb.checked);
            if (!waterSelected) {
                showError(waterSources[0].closest(".form-group"), errorMessages.waterSource);
                hasError = true;
            }
        
            // Validate electricity checkboxes
            const electricityOptions = document.querySelectorAll("input[name='electricity']");
            const electricitySelected = Array.from(electricityOptions).some(cb => cb.checked);
            if (!electricitySelected) {
                showError(electricityOptions[0].closest(".form-group"), errorMessages.electricity);
                hasError = true;
            }
        
            if (!hasError) {
                form.submit(); // Submit only if no errors
            }
        });
    });
    </script>
</body>
</html>

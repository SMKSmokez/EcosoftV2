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

    // Utility: Show or hide error
    function showError(input, message) {
        const errorEl = input.parentElement.querySelector(".error-message");
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
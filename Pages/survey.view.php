<!DOCTYPE html>
<html lang="en">
<?php require "\\xampp\htdocs\EcosoftV2\Pages/Parts/head.php"?>
<body>
    <?php require "\\xampp\htdocs\EcosoftV2\Pages/Parts/navbar.php";?>
    <main class="survey-page">
        <section class="survey-section">
            <h1 class="survey-title titillium-web-semibold">Ecosoft Water Filter Survey</h1>
            <p class="survey-description titillium-web-regular">By filling out the provided survey below our team at Ecosoft can help aid you in choosing an appropriate water filtration system for your home or business.</p>
            
            <form class="survey-form">
                <!-- First Name and Last Name -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="first-name" class="titillium-web-regular">First Name:</label>
                        <input type="text" id="first-name" class="form-input titillium-web-regular" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <label for="last-name" class="titillium-web-regular">Last Name:</label>
                        <input type="text" id="last-name" class="form-input titillium-web-regular" placeholder="Last Name">
                    </div>
                </div>

                <!-- Phone Number and Address -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="phone-number" class="titillium-web-regular">Phone Number:</label>
                        <input type="text" id="phone-number" class="form-input titillium-web-regular" placeholder="Phone Number">
                    </div>
                    <div class="form-group">
                        <label for="address" class="titillium-web-regular">Address:</label>
                        <input type="text" id="address" class="form-input titillium-web-regular" placeholder="Address">
                    </div>
                </div>

                <!-- Number of Bathrooms and Occupants -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="bathrooms" class="titillium-web-regular">Number of Bathrooms:</label>
                        <input type="text" id="bathrooms" class="form-input titillium-web-regular" placeholder="Number of Bathrooms">
                    </div>
                    <div class="form-group">
                        <label for="occupancy" class="titillium-web-regular" data-tooltip="Number of people working or living at this location">Occupancy Count:</label>
                        <input type="text" id="occupancy" class="form-input titillium-web-regular" placeholder="Occupancy Count">
                    </div>
                </div>
                <!-- Water Source -->
                <div class="form-group centered-group">
                    <label class="titillium-web-regular">Water Source:</label>
                    <div class="checkbox-group">
                        <label class="checkbox-label titillium-web-regular">
                            <input type="checkbox" name="water-source" value="well"> Well Water
                        </label>
                        <label class="checkbox-label titillium-web-regular">
                            <input type="checkbox" name="water-source" value="municipal"> Municipal Water
                        </label>
                    </div>
                </div>

                <!-- Electricity Next to Water Meter -->
                <div class="form-group centered-group">
                    <label class="titillium-web-regular">Is there electricity next to your water meter?</label>
                    <div class="checkbox-group">
                        <label class="checkbox-label titillium-web-regular">
                            <input type="checkbox" name="electricity" value="yes"> Yes
                        </label>
                        <label class="checkbox-label titillium-web-regular">
                            <input type="checkbox" name="electricity" value="no"> No
                        </label>
                        <label class="checkbox-label titillium-web-regular">
                            <input type="checkbox" name="electricity" value="dont-know"> Don’t Know
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-btn titillium-web-regular">Submit</button>
            </form>
        </section>
    </main>
    <?php require "\\xampp\htdocs\EcosoftV2\Pages/Parts/footer.php";?>
</body>
</html>
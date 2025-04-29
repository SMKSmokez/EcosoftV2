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
                        </div>
                        <div class="form-group">
                            <label for="last-name" class="titillium-web-regular"><?php echo $text[$lang]['last_name']; ?>:</label>
                            <input type="text" id="last-name" class="form-input titillium-web-regular" placeholder="<?php echo $text[$lang]['last_name']; ?>">
                        </div>
                    </div>

                    <!-- Phone Number and Address -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone-number" class="titillium-web-regular"><?php echo $text[$lang]['phone_number']; ?>:</label>
                            <input type="text" id="phone-number" class="form-input titillium-web-regular" placeholder="<?php echo $text[$lang]['phone_number']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="address" class="titillium-web-regular"><?php echo $text[$lang]['address']; ?>:</label>
                            <input type="text" id="address" class="form-input titillium-web-regular" placeholder="<?php echo $text[$lang]['address']; ?>">
                        </div>
                    </div>

                    <!-- Number of Bathrooms and Occupants -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="bathrooms" class="titillium-web-regular"><?php echo $text[$lang]['bathrooms']; ?>:</label>
                            <input type="text" id="bathrooms" class="form-input titillium-web-regular" placeholder="<?php echo $text[$lang]['bathrooms']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="occupancy" class="titillium-web-regular" title="<?php echo $text[$lang]['occupancy_tooltip']; ?>"><?php echo $text[$lang]['occupancy']; ?>:</label>
                            <input type="text" id="occupancy" class="form-input titillium-web-regular" placeholder="<?php echo $text[$lang]['occupancy']; ?>">
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
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="submit-btn titillium-web-regular"><?php echo $text[$lang]['submit_button']; ?></button>
                </form>
            </section>
        </main>
        <?php require "\\xampp\htdocs\EcosoftV2\Pages\Parts/footer.php"; ?>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ecosoft Customer Survey</title>
    <link rel="stylesheet" href="CSS/survey.css">
    <link rel="stylesheet" href="CSS/nav.css">
</head>
<body>
    <?php require "navbar.php";?>
    <main class="survey-page">
        <section class="survey-section">
            <h1 class="survey-title titillium-web-semibold">Ecosoft Customer Survey</h1>
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

                <!-- Number of Bathrooms -->
                <div class="form-group">
                    <label for="bathrooms" class="titillium-web-regular">Number of Bathrooms:</label>
                    <input type="text" id="bathrooms" class="form-input titillium-web-regular" placeholder="Number of Bathrooms">
                </div>

                <!-- Occupancy Count -->
                <div class="form-group">
                    <label for="occupancy" class="titillium-web-regular">Occupancy Count: <span class="form-note titillium-web-light">(Enter total number of people working or living at this location)</span></label>
                    <input type="text" id="occupancy" class="form-input titillium-web-regular" placeholder="Occupancy Count">
                </div>

                <!-- Water Source -->
                <div class="form-group">
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
                <div class="form-group">
                    <label class="titillium-web-regular">Is there electricity next to your water meter?</label>
                    <div class="radio-group">
                        <label class="radio-label titillium-web-regular">
                            <input type="radio" name="electricity" value="yes"> Yes
                        </label>
                        <label class="radio-label titillium-web-regular">
                            <input type="radio" name="electricity" value="no"> No
                        </label>
                        <label class="radio-label titillium-web-regular">
                            <input type="radio" name="electricity" value="dont-know"> Don’t Know
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-btn titillium-web-regular">Submit</button>
            </form>
        </section>
    </main>
</body>
</html>
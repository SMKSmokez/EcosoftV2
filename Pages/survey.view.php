<?php
require_once __DIR__ . '/../bootstrap.php';
require_once __DIR__ . '/../PHPMailer/src/Exception.php';
require_once __DIR__ . '/../PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/Parts/lang.php';

$submissionSuccess = false;
$orderId = null;
$errorMessage = "";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if we have success message from session (after redirect)
if (isset($_SESSION['success']) && $_SESSION['success'] === true) {
    $submissionSuccess = true;
    $orderId = $_SESSION['order_id'] ?? null;
    // Clear only the success flags, NOT the form data, so inputs stay filled
    unset($_SESSION['success'], $_SESSION['order_id']);
}

// Load saved form data from session if available (after redirect or error)
$formData = $_SESSION['form_data'] ?? [
    'first-name' => '',
    'last-name' => '',
    'phone-number' => '',
    'address' => '',
    'bathrooms' => '',
    'occupancy' => '',
    'water-source' => [],
    'electricity' => [],
];

// Do NOT clear form data here — keep it persistent
// unset($_SESSION['form_data']);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get submitted values
    $firstName = $_POST["first-name"] ?? '';
    $lastName = $_POST["last-name"] ?? '';
    $phoneNumber = $_POST["phone-number"] ?? '';
    $address = $_POST["address"] ?? '';
    $bathrooms = $_POST["bathrooms"] ?? '';
    $occupancy = $_POST["occupancy"] ?? '';
    $waterSourceArray = $_POST["water-source"] ?? [];
    $electricityArray = $_POST["electricity"] ?? [];

    // Save raw form data in session to preserve after redirect or errors
    $_SESSION['form_data'] = [
        'first-name' => $firstName,
        'last-name' => $lastName,
        'phone-number' => $phoneNumber,
        'address' => $address,
        'bathrooms' => $bathrooms,
        'occupancy' => $occupancy,
        'water-source' => $waterSourceArray,
        'electricity' => $electricityArray,
    ];

    // Prepare strings for email
    $waterSource = !empty($waterSourceArray) ? ucwords(implode(', ', $waterSourceArray)) : '';
    $electricity = !empty($electricityArray) ? ucwords(implode(', ', $electricityArray)) : '';

    $orderId = uniqid();
    $emailSubject = "$firstName $lastName Water Filter Order ID:$orderId";
    $emailBody = <<<EOD
Order ID: $orderId

Name: $firstName $lastName
Address: $address
Phone Number: $phoneNumber
Bathrooms: $bathrooms
Occupancy Count: $occupancy
Water Source: $waterSource
Electricity: $electricity
EOD;

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'boygamez063+ecol@gmail.com';
        $mail->Password   = 'uhti fqqs bmfs mszb';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('no-reply@ecosoft.local', 'Ecosoft Survey');
        $mail->addAddress('boygamez063@gmail.com');

        $mail->Subject = $emailSubject;
        $mail->Body    = $emailBody;
        $mail->CharSet = 'UTF-8';

        $mail->send();

        // Do NOT clear saved form data on success so fields stay filled
        // unset($_SESSION['form_data']); // <-- Removed this line

        // Set success flash message in session
        $_SESSION['success'] = true;
        $_SESSION['order_id'] = $orderId;

        // Redirect to /Survey to avoid resubmission on reload and keep CSS intact
        header("Location: Survey");
        exit;
    } catch (Exception $e) {
        $errorMessage = "Sorry, your submission could not be sent. Mailer Error: {$mail->ErrorInfo}";
        // $formData is already set from session, so form stays filled on error
    }
}
?>

<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($lang); ?>">
<?php require __DIR__ . '/Parts/head.php'; ?>
<body>
<?php require __DIR__ . '/Parts/navbar.php'; ?>
<div class="page-container">
    <main class="survey-page">
        <section class="survey-section">
            <h1 class="survey-title titillium-web-semibold"><?php echo htmlspecialchars($text[$lang]['survey_title']); ?></h1>
            <p class="survey-description titillium-web-regular"><?php echo htmlspecialchars($text[$lang]['survey_description']); ?></p>

            <?php if ($submissionSuccess && $orderId): ?>
                <p style="color: green; font-size: 18px;">
                    Your survey has been submitted successfully!<br>
                    <strong>Order ID: 
                      <code id="orderId" style="cursor:pointer; user-select: all;" title="Click to copy">
                        <?php echo htmlspecialchars($orderId); ?>
                      </code>
                    </strong><br>
                    Please write it down or copy it for your reference.
                </p>
            <?php elseif ($errorMessage): ?>
                <p style="color: red; font-size: 18px;"><?php echo htmlspecialchars($errorMessage); ?></p>
            <?php endif; ?>

            <form class="survey-form" method="POST" action="">
                <!-- First and Last Name -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="first-name"><?php echo htmlspecialchars($text[$lang]['first_name']); ?>:</label>
                        <input type="text" name="first-name" id="first-name" class="form-input" required
                        value="<?php echo htmlspecialchars($formData['first-name']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="last-name"><?php echo htmlspecialchars($text[$lang]['last_name']); ?>:</label>
                        <input type="text" name="last-name" id="last-name" class="form-input" required
                        value="<?php echo htmlspecialchars($formData['last-name']); ?>">
                    </div>
                </div>

                <!-- Phone and Address -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="phone-number"><?php echo htmlspecialchars($text[$lang]['phone_number']); ?>:</label>
                        <input type="text" name="phone-number" id="phone-number" class="form-input" required
                        value="<?php echo htmlspecialchars($formData['phone-number']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="address"><?php echo htmlspecialchars($text[$lang]['address']); ?>:</label>
                        <input type="text" name="address" id="address" class="form-input" required
                        value="<?php echo htmlspecialchars($formData['address']); ?>">
                    </div>
                </div>

                <!-- Bathrooms and Occupants -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="bathrooms"><?php echo htmlspecialchars($text[$lang]['bathrooms']); ?>:</label>
                        <input type="text" name="bathrooms" id="bathrooms" class="form-input" required
                        value="<?php echo htmlspecialchars($formData['bathrooms']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="occupancy" title="<?php echo htmlspecialchars($text[$lang]['occupancy_tooltip']); ?>"><?php echo htmlspecialchars($text[$lang]['occupancy']); ?>:</label>
                        <input type="text" name="occupancy" id="occupancy" class="form-input" required
                        value="<?php echo htmlspecialchars($formData['occupancy']); ?>">
                    </div>
                </div>

                <!-- Water Source -->
                <div class="form-group centered-group">
                    <label><?php echo htmlspecialchars($text[$lang]['water_source']); ?>:</label>
                    <div class="checkbox-group">
                        <label class="checkbox-label">
                            <input type="checkbox" name="water-source[]" value="well"
                            <?php echo in_array('well', $formData['water-source']) ? 'checked' : ''; ?>> <?php echo htmlspecialchars($text[$lang]['well']); ?>
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="water-source[]" value="municipal"
                            <?php echo in_array('municipal', $formData['water-source']) ? 'checked' : ''; ?>> <?php echo htmlspecialchars($text[$lang]['municipal']); ?>
                        </label>
                    </div>
                </div>

                <!-- Electricity (only one selectable) -->
                <div class="form-group centered-group">
                    <label><?php echo htmlspecialchars($text[$lang]['electricity']); ?></label>
                    <div class="checkbox-group" id="electricity-group">
                        <label class="checkbox-label">
                            <input type="checkbox" name="electricity[]" value="yes"
                            <?php echo in_array('yes', $formData['electricity']) ? 'checked' : ''; ?>> <?php echo htmlspecialchars($text[$lang]['yes']); ?>
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="electricity[]" value="no"
                            <?php echo in_array('no', $formData['electricity']) ? 'checked' : ''; ?>> <?php echo htmlspecialchars($text[$lang]['no']); ?>
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="electricity[]" value="dont-know"
                            <?php echo in_array('dont-know', $formData['electricity']) ? 'checked' : ''; ?>> <?php echo htmlspecialchars($text[$lang]['dont_know']); ?>
                        </label>
                    </div>
                </div>

                <!-- Submit -->
                <button type="submit" class="submit-btn"><?php echo htmlspecialchars($text[$lang]['submit_button']); ?></button>
            </form>
        </section>
    </main>
    <?php require __DIR__ . '/Parts/footer.php'; ?>
</div>

<script>
    // JS to make electricity checkboxes behave like radio buttons (only one selected)
    document.querySelectorAll('#electricity-group input[type="checkbox"]').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                // Uncheck all other checkboxes
                document.querySelectorAll('#electricity-group input[type="checkbox"]').forEach(function(box) {
                    if (box !== checkbox) {
                        box.checked = false;
                    }
                });
            }
        });
    });
    //JS for Order ID Copying
    document.getElementById('orderId')?.addEventListener('click', function() {
        const orderIdText = this.textContent;
        navigator.clipboard.writeText(orderIdText).then(() => {
          const originalTitle = this.title;
          this.title = 'Copied!';
          setTimeout(() => { this.title = originalTitle; }, 1500);
        }).catch(err => {
          alert('Failed to copy order ID. Please copy manually.');
        });
    });
</script>

</body>
</html>

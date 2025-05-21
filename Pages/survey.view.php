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
$errors = [];

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Initialize formData with empty defaults to avoid warnings
$formData = [
    'first-name' => '',
    'last-name' => '',
    'phone-number' => '',
    'address' => '',
    'bathrooms' => '',
    'occupancy' => '',
    'water-source' => [],
    'electricity' => [],
];

// If there is saved form data from previous failed submission, load it
if (isset($_SESSION['form_data'])) {
    $formData = $_SESSION['form_data'];
}

// Handle successful submission flash message
if (isset($_SESSION['success']) && $_SESSION['success'] === true) {
    $submissionSuccess = true;
    $orderId = $_SESSION['order_id'] ?? null;
    unset($_SESSION['success'], $_SESSION['order_id']);
    // Clear form data after success so form resets on page reload
    unset($_SESSION['form_data']);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = trim($_POST["first-name"] ?? '');
    $lastName = trim($_POST["last-name"] ?? '');
    $phoneNumber = trim($_POST["phone-number"] ?? '');
    $address = trim($_POST["address"] ?? '');
    $bathrooms = trim($_POST["bathrooms"] ?? '');
    $occupancy = trim($_POST["occupancy"] ?? '');
    $waterSourceArray = $_POST["water-source"] ?? [];
    $electricityArray = $_POST["electricity"] ?? [];

    // Validate inputs and fill errors
    if (empty($firstName)) {
        $errors['first-name'] = $text[$lang]['error_first_name'];
    }
    if (empty($lastName)) {
        $errors['last-name'] = $text[$lang]['error_last_name'];
    }
    if (empty($phoneNumber)) {
        $errors['phone-number'] = $text[$lang]['error_phone_number'];
    }
    if (empty($address)) {
        $errors['address'] = $text[$lang]['error_address'];
    }
    if (empty($bathrooms)) {
        $errors['bathrooms'] = $text[$lang]['error_bathrooms'];
    }
    if (empty($occupancy)) {
        $errors['occupancy'] = $text[$lang]['error_occupancy'];
    }
    if (empty($waterSourceArray)) {
        $errors['water-source'] = $text[$lang]['error_water_source'];
    }
    if (empty($electricityArray)) {
        $errors['electricity'] = $text[$lang]['error_electricity'];
    }

    if (!empty($errors)) {
        // Save submitted data so form fields are prefilled after errors
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
        // Update local formData variable so form shows latest submitted data
        $formData = $_SESSION['form_data'];
    } else {
        // No validation errors - process form and send mail

        $orderId = 'ORD-' . strtoupper(bin2hex(random_bytes(4)));
        $emailSubject = "$firstName $lastName Water Filter TEST ORDER ID:$orderId";

        $waterSourceStr = ucwords(implode(', ', $waterSourceArray));
        $electricityStr = ucwords(implode(', ', $electricityArray));

        $emailBody = <<<EOD
TEST ORDER
Order ID: $orderId

Name: $firstName $lastName
Address: $address
Phone Number: $phoneNumber
Bathrooms: $bathrooms
Occupancy Count: $occupancy
Water Source: $waterSourceStr
Electricity: $electricityStr
EOD;

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.hostinger.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'no-reply@ecosoftmne.com';
            $mail->Password   = '//,|5Sr2OL`-iSe\Ustc^0l32VN';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('no-reply@ecosoftmne.com', 'Ecosoft Survey');
            $mail->addAddress('ecosoftmne@gmail.com');

            $mail->Subject = $emailSubject;
            $mail->Body    = $emailBody;
            $mail->CharSet = 'UTF-8';

            $mail->send();

            // Save success state and form data to session
            $_SESSION['success'] = true;
            $_SESSION['order_id'] = $orderId;
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

            header("Location: Survey");
            exit;
        } catch (Exception $e) {
            $errorMessage = "Sorry, your submission could not be sent. Mailer Error: {$mail->ErrorInfo}";
            // Save form data in session so user does not lose input
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
            $formData = $_SESSION['form_data'];
        }
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
                    <?php echo htmlspecialchars($text[$lang]['survey_success']); ?><br>
                    <strong><?php echo htmlspecialchars($text[$lang]['order_id']); ?>
                      <code id="orderId" style="cursor:pointer; user-select: all;" title="<?php echo htmlspecialchars($text[$lang]['order_id_hint']); ?>">
                        <?php echo htmlspecialchars($orderId); ?>
                      </code>
                    </strong><br>
                    <?php echo htmlspecialchars($text[$lang]['please_copy']); ?>
                </p>
            <?php elseif ($errorMessage): ?>
                <p style="color: red; font-size: 18px;"><?php echo htmlspecialchars($errorMessage); ?></p>
            <?php endif; ?>

            <form class="survey-form" method="POST" action="">
                <!-- First and Last Name -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="first-name"><?php echo htmlspecialchars($text[$lang]['first_name']); ?>:</label>
                        <input type="text" name="first-name" id="first-name" class="form-input"
                               value="<?php echo htmlspecialchars($formData['first-name']); ?>">
                        <?php if (!empty($errors['first-name'])): ?>
                            <p class="error-message"><?php echo htmlspecialchars($errors['first-name']); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="last-name"><?php echo htmlspecialchars($text[$lang]['last_name']); ?>:</label>
                        <input type="text" name="last-name" id="last-name" class="form-input"
                               value="<?php echo htmlspecialchars($formData['last-name']); ?>">
                        <?php if (!empty($errors['last-name'])): ?>
                            <p class="error-message"><?php echo htmlspecialchars($errors['last-name']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Phone and Address -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="phone-number"><?php echo htmlspecialchars($text[$lang]['phone_number']); ?>:</label>
                        <input type="text" name="phone-number" id="phone-number" class="form-input"
                               value="<?php echo htmlspecialchars($formData['phone-number']); ?>">
                        <?php if (!empty($errors['phone-number'])): ?>
                            <p class="error-message"><?php echo htmlspecialchars($errors['phone-number']); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="address"><?php echo htmlspecialchars($text[$lang]['address']); ?>:</label>
                        <input type="text" name="address" id="address" class="form-input"
                               value="<?php echo htmlspecialchars($formData['address']); ?>">
                        <?php if (!empty($errors['address'])): ?>
                            <p class="error-message"><?php echo htmlspecialchars($errors['address']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Bathrooms and Occupants -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="bathrooms"><?php echo htmlspecialchars($text[$lang]['bathrooms']); ?>:</label>
                        <input type="text" name="bathrooms" id="bathrooms" class="form-input"
                               value="<?php echo htmlspecialchars($formData['bathrooms']); ?>">
                        <?php if (!empty($errors['bathrooms'])): ?>
                            <p class="error-message"><?php echo htmlspecialchars($errors['bathrooms']); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="occupancy" title="<?php echo htmlspecialchars($text[$lang]['occupancy_tooltip']); ?>"><?php echo htmlspecialchars($text[$lang]['occupancy']); ?>:</label>
                        <input type="text" name="occupancy" id="occupancy" class="form-input"
                               value="<?php echo htmlspecialchars($formData['occupancy']); ?>">
                        <?php if (!empty($errors['occupancy'])): ?>
                            <p class="error-message"><?php echo htmlspecialchars($errors['occupancy']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Water Source -->
                <div class="form-group centered-group">
                    <label><?php echo htmlspecialchars($text[$lang]['water_source']); ?>:</label>
                    <div class="checkbox-group">
                        <label class="checkbox-label">
                            <input type="checkbox" name="water-source[]" value="well"
                                <?php echo in_array('well', (array)$formData['water-source']) ? 'checked' : ''; ?>>
                            <?php echo htmlspecialchars($text[$lang]['well']); ?>
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="water-source[]" value="municipal"
                                <?php echo in_array('municipal', (array)$formData['water-source']) ? 'checked' : ''; ?>>
                            <?php echo htmlspecialchars($text[$lang]['municipal']); ?>
                        </label>
                    </div>
                    <?php if (!empty($errors['water-source'])): ?>
                        <p class="error-message"><?php echo htmlspecialchars($errors['water-source']); ?></p>
                    <?php endif; ?>
                </div>

                <!-- Electricity -->
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
                            <input type="checkbox" name="electricity[]" value="dont_know"
                            <?php echo in_array('dont_know', $formData['electricity']) ? 'checked' : ''; ?>> <?php echo htmlspecialchars($text[$lang]['dont_know']); ?>
                        </label>
                    </div>
                    <?php if (!empty($errors['electricity'])): ?>
                        <p class="error-message"><?php echo htmlspecialchars($errors['electricity']); ?></p>
                    <?php endif; ?>
                </div>

                <!-- Submit -->
                <button type="submit" class="submit-btn"><?php echo htmlspecialchars($text[$lang]['submit_button']); ?></button>
            </form>
        </section>
    </main>
    <?php require __DIR__ . '/Parts/footer.php'; ?>
</div>

<script>
    // Electricity checkbox logic (like radio buttons)
    document.querySelectorAll('#electricity-group input[type="checkbox"]').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                document.querySelectorAll('#electricity-group input[type="checkbox"]').forEach(function(box) {
                    if (box !== checkbox) box.checked = false;
                });
            }
        });
    });

    // Order ID copy
    document.getElementById('orderId')?.addEventListener('click', function() {
        const orderIdText = this.textContent;
        navigator.clipboard.writeText(orderIdText).then(() => {
            const originalTitle = this.title;
            this.title = 'Copied!';
            setTimeout(() => { this.title = originalTitle; }, 1500);
        }).catch(() => {
            alert('Failed to copy order ID. Please copy manually.');
        });
    });
</script>
</body>
</html>

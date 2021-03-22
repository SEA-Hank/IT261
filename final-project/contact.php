<?php
include "./includes/config.php";
include "./includes/formTools.php";
$isStick = true;
$showError = $_SERVER["REQUEST_METHOD"] === 'POST';
$form_config = array(
    "firstName" => array(
        "display" => "First Name",
        "msg" => "Please enter your first name",
        "htmlType" => "text",
        "placeholder" => "first name"
    ),
    "lastName" => array(
        "display" => "Last Name",
        "msg" => "Please enter your last name",
        "htmlType" => "text",
        "placeholder" => "last name"
    ),
    "phone" => array(
        "display" => "Phone Number",
        "msg" => array(
            "isEmpty" => "Please enter your phone number",
            "isPhoneNumber" => "Invalid format! xxx-xxx-xxxx"
        ),
        "htmlType" => "text",
        "placeholder" => "xxx-xxx-xxxx"
    ),
    "email" => array(
        "msg" => "Please enter your email",
        "htmlType" => "text",
        "placeholder" => "email"
    ),
    "gender" => array(
        "msg" => "Please check one gender",
        "htmlType" => "radio",
        "options" => array(
            "Female" => "female",
            "Male" => "male",
            "Other" => "other"
        )
    ),
    "cities" => array(
        "display" => "Which cities are you interested in?",
        "msg" => "Please select at least one",
        "htmlType" => "checkbox",
        "options" => array(
            "Dallas-Fort Worth" => "Dallas-Fort Worth",
            "Grand Rapids" => "Grand Rapids",
            "Nashville" => "Nashville",
            "Winston-Salem" => "Winston-Salem",
            "Jacksonville" => "Jacksonville",
            "Port St. Lucie" => "Port St. Lucie",
            "Asheville" => "Asheville",
            "Lancaster" => "Lancaster",
            "Sarasota" => "Sarasota",
            "Fort Myers" => "Fort Myers",
        )
    ),
    "time" => array(
        "display" => "When you will live in the retire cities?",
        "msg" => "Please select one",
        "htmlType" => "select",
        "options" => array(
            "Select One" => "",
            "In Summer" => "In Summer",
            "In Winter" => "In Winter",
            "Vacation" => "Vacation",
            "Half Year" => "Half Year",
            "Resident" => "Resident"
        )
    ),
    "comments" => array(
        "msg" => "How can we help you?",
        "htmlType" => "textarea",
    ),
    "agree" => array(
        "display" => 'Agree to Private Policy',
        "msg" => "You must agree!",
        "htmlType" => "radio",
        "options" => array(
            "agree" => "agree",
        )
    )
);
$form_status = checkFieldsStatus($form_config);

if ($form_status["isReady"]) {
    date_default_timezone_set('America/Los_Angeles');
    foreach ($form_config as $key => $value) {
        $_SESSION[$key] = $form_status[$key];
    }

    $toEmail = "horicky7@gmail.com";
    $toTeacherEmail = "szemeo@mystudentswa.com";
    $subject = "Thank for filling out the form " . date('m/d/y');

    $body = getEmailContent();

    $emailHeader = 'From: <no-reply@seahank.com>' . "\r\n";
    $emailHeader .= "Reply-To: $customerEmail" . "\r\n";
    // $emailHeader = array(
    //     "From" => "<no-reply@seahank.com>",
    //     "Reply-To" => $customerEmail
    // );

    mail($toTeacherEmail, $subject, $body, $emailHeader);
    mail($toEmail, $subject, $body, $emailHeader);
    redirect("thanks.php");
}

include "./includes/header.php";
?>

<div id="contact-wrapper">
    <div>
        <p id="contact-title">Get In Touch</p>
        <form id="contact-form" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
            <?php
            generateFormFileds($form_config, $form_status);
            ?>
            <p class="btn-wrapper"> <input id="submit-btn" type="submit" name="contact_submit" value="Submit"></p>
            <p class="p-buttons">
                <a href="./contact.php">Reset</a>
            </p>
        </form>
    </div>
    <div>
    </div>
</div>
<?php include "./includes/footer.php" ?>
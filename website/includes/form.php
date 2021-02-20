<?php include dirname(__FILE__) . "/formTools.php" ?>
<?php
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
            "isPhoneNumber" => "Invalid format!"
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
    "frameworks" => array(
        "display" => "Which PHP frameworks are you interested in?",
        "msg" => "Please select at least one",
        "htmlType" => "checkbox",
        "options" => array(
            "Laravel" => "Laravel",
            "CakePHP" => "CakePHP",
            "CodeIgniter" => "CodeIgniter",
            "Zend" => "Zend",
            "Yii2" => "Yii2",
        )
    ),
    "position" => array(
        "display" => "Which level position are you looking for?",
        "msg" => "Please select position",
        "htmlType" => "select",
        "options" => array(
            "Select One" => "",
            "Junior developer" => "Junior developer",
            "Middle developer" => "Middle developer",
            "Senior developer" => "Senior developer"
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
    session_start();
    date_default_timezone_set('America/Los_Angeles');
    foreach ($form_config as $key => $value) {
        $_SESSION[$key] = $form_status[$key];
    }

    $toEmail = "horicky7@gmail.com";
    $toTeacherEmail = "oszemeo@mystudentswa.com";
    $subject = "Thank for filling out the form " . date('m/d/y');

    $body = getEmailContent();

    $emailHeader = 'From: <no-reply@seahank.com>' . "\r\n";
    $emailHeader .= "Reply-To: $customerEmail" . "\r\n";
    // $emailHeader = array(
    //     "From" => "<no-reply@seahank.com>",
    //     "Reply-To" => $customerEmail
    // );

    mail($toTeacherEmail, $subject, $body, $emailHeader);
    redirect("thanks.php");
}


function builtForm()
{
    global $form_config;
    global $form_status;
?>
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
        <fieldset>
            <?php
            generateFormFileds($form_config, $form_status);
            ?>
            <p class="p-buttons">
                <input type="submit" value="Send it">
                <input type="button" onclick="javascript:window.location.href='<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>'" value="Reset">
            </p>
        </fieldset>
    </form>
<?php
} ?>
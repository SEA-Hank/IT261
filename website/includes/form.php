<?php include dirname(__FILE__) . "/formTools.php" ?>
<?php
$isStick = true;
$showError = $_SERVER["REQUEST_METHOD"] === 'POST';
$form_config = array(
    "firstName" => array(
        "display" => "First Name",
        "msg" => "Please enter your first name",
        "htmlType" => "text",
    ),
    "lastName" => array(
        "display" => "Last Name",
        "msg" => "Please enter your last name",
        "htmlType" => "text"
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
        "htmlType" => "text"
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
        "display" => "PHP Frameworks that you're interested in",
        "msg" => "Which PHP frameworks would are you interested in?",
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
            "Junior developer" => "Junior",
            "Middle developer" => "Middle",
            "Senior developer" => "Senior"
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

if (false && $form_status["isReady"]) {

    $toEmail = "horicky7@gmail.com";

    $subject = "Test email for my form " . date('m/d/y');
    $firstName = $form_status['firstName'];
    $lastName = $form_status['lastName'];
    $customerEmail = $form_status['email'];
    $gender = $form_status['gender'];
    $comments = $form_status['comments'];
    $region = $form_status['region'];
    $wines = implode(", ", $form_status['wines']);
    $phone = $form_status['phone'];

    $body = "First and Last Name:  $firstName $lastName" . PHP_EOL;
    $body .= "Email is: $customerEmail" . PHP_EOL;
    $body .= "Phone Number is: $phone" . PHP_EOL;
    $body .= "Gender is: $gender" . PHP_EOL;
    $body .= "Coments is: $comments" . PHP_EOL;
    $body .= "Favorite Region: $region" . PHP_EOL;
    $body .= "Favorite Wines: $wines" . PHP_EOL;


    $emailHeader = 'From: <no-reply@seahank.com>' . "\r\n";
    $emailHeader .= "Reply-To: $customerEmail" . "\r\n";
    // $emailHeader = array(
    //     "From" => "<no-reply@seahank.com>",
    //     "Reply-To" => $customerEmail
    // );

    mail($toEmail, $subject, $body, $emailHeader);

    header("Content-type: text/html; charset=utf-8");
    header('Location:thx.php');
    exit;
}
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
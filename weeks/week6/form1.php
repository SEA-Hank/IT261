<?php include "../../formTools.php" ?>
<?php
$isStick = true;
$showError = $_SERVER["REQUEST_METHOD"] === 'POST';
$form_config = array(
    "firstName" => array(
        "display" => "First Name",
        "msg" => "Please enter your first name",
        "htmlType" => "text",
        "isnumeric" => false
    ),
    "lastName" => array(
        "display" => "Last Name",
        "msg" => "Please enter your last name",
        "htmlType" => "text"
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
    "wines" => array(
        "msg" => "What, no wines...???",
        "htmlType" => "checkbox",
        "options" => array(
            "Cabernet" => "cab",
            "Merlot" => "merlot",
            "Syrah" => "syrah",
            "Malbec" => "malbec",
            "Shiraz" => "shiraz",
        )
    ),
    "region" => array(
        "msg" => "Please select your region",
        "htmlType" => "select",
        "options" => array(
            "Select One" => "",
            "Northwes" => "Northwes",
            "Southwest" => "Southwest",
            "Midwest" => "Midwest",
            "Northeast" => "Northeast",
            "South" => "South",
        )
    ),
    "comments" => array(
        "msg" => "How can we help you?",
        "htmlType" => "textarea",
    ),
    "agree" => array(
        "msg" => "You must agree!",
        "htmlType" => "radio",
        "options" => array(
            "agree" => "agree",
        )
    )
);

$form_status = checkFieldsStatus($form_config);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>First Form</title>
</head>

<body>
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
        <fieldset>
            <?php
            generateFormFileds($form_config, $form_status);
            ?>
            <input id="submit-btn" type="submit" value="Send it!">
            <p><a href="">Reset</a></p>
        </fieldset>
    </form>
    <?php
    if ($form_status["isReady"]) {
        echo "isReady";
        $toEmail = "horicky7@gmail.com";


        $subject = "Test email for my form 1, " . date('m/d/y');
        $firstName = $form_status['firstName'];
        $lastName = $form_status['lastName'];
        $customerEmail = $form_status['email'];
        $gender = $form_status['gender'];
        $comments = $form_status['comments'];
        $region = $form_status['region'];

        $body = "Hello, $firstName $lastName" . PHP_EOL;
        $body .= "Your email is: $customerEmail" . PHP_EOL;
        $body .= "Your gender is: $gender" . PHP_EOL;
        $body .= "Your coments is: $comments" . PHP_EOL;
        $body .= "Favorite Region: $region" . PHP_EOL;
        try {
            mail($toEmail, $subject, $body);
        } catch (exception $e) {
        } finally {
            header('Location:thx.php');
        }
    }
    ?>
</body>

</html>
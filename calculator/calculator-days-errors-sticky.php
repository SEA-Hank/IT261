<?php
$efficiency_config = array(
    "Terrible" => 20,
    "Good" => 30,
    "Excellent" => 40,
);
$form_config = array(
    "name" => array(
        "msg" => "Please fill out your name",
        "isnumeric" => false
    ),
    "miles" => array(
        "msg" => "Please fill out valid distance",
        "isnumeric" => true
    ),
    "hours" => array(
        "msg" => "Please fill out valid hours",
        "isnumeric" => true
    ),
    "price" => array(
        "msg" => "Please select the price",
        "isnumeric" => true
    ),
    "efficiency" => array(
        "msg" => "Please select the efficiency",
        "isnumeric" => false
    )
);
$price_config = array(3.00, 3.50, 4.00);
function getparameters($field)
{
    return isset($_POST[$field]) ? $_POST[$field] : "";
};
function checkFieldsStatus()
{
    global $form_config;
    $form_info = array("errorMsg" => array());
    foreach ($form_config as $key => $config) {
        $formVar = getparameters($key);
        if (empty($formVar) || ($config["isnumeric"] ? !is_numeric($formVar) : false)) {
            array_push($form_info["errorMsg"], $config["msg"]);
        }
        $form_info[$key] = $formVar;
    }
    return $form_info;
}
$form_info  = checkFieldsStatus();

$name = $form_info["name"];
$miles = $form_info["miles"];
$price = $form_info["price"];
$efficiency = $form_info["efficiency"];
$hours = $form_info["hours"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculator-days-errors-sticky</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        h1 {
            text-align: center;
            font-size: 35px;
            padding: 20px 0px;
        }

        form {
            width: 570px;
            margin: 0px auto;
        }

        .message-box {

            width: 550px;
            margin: 0px auto;
            border: 1px solid;
            margin-top: 20px;
            padding: 10px;
        }

        fieldset {
            padding: 10px;
            background-color: beige;
        }

        label {
            display: block;
            font-size: 25px;
            font-weight: bolder;
            padding: 5px 0px;
        }

        .form-input {
            height: 25px;
            width: 300px;
            padding: 0px 10px;
        }

        li {
            list-style: none;
            font-weight: 600;
            font-size: 20px;
            padding: 5px 0px;
        }

        input[type=radio] {
            height: 20px;
            width: 20px;
            vertical-align: middle;
        }

        .prices-label {
            display: inline;
            cursor: pointer;
            vertical-align: middle;
        }

        .p-buttons {
            padding: 15px 0px 0px 0px;
        }

        select {
            height: 25px;
            width: 150px;
        }

        input[type=submit],
        input[type=button] {
            padding: 5px 10px;
            cursor: pointer;
        }

        input[type=button] {
            margin-left: 5px;
        }

        .note-title,
        .note-message {
            text-align: center;
            padding: 5px 0px;
            font-size: 20px;
            /* font-weight: bolder; */
        }

        .note-title {
            color: red;
            font-size: 30px;
            font-weight: bolder;
        }

        nav {
            position: absolute;
            top: 100px;
            left: 100px;
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a href="./calculator.php">calculator.php</a></li>
            <li><a href="./calculator-days.php">calculator-days.php</a></li>
            <li><a href="./calculator-days-errors.php">calculator-days-errors.php</a></li>
            <li><a href="./calculator-days-errors-sticky.php">calculator-days-errors-sticky.php</a></li>
        </ul>
    </nav>
    <h1>Our Trip Calculator</h1>
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <fieldset>
            <label>Your Name</label>
            <input placeholder="name" type="text" name="name" value="<?= $name ?>" class="form-input">
            <label>How many miles will you be driving?</label>
            <input placeholder="numeric only" type="text" name="miles" value="<?= $miles ?>" class="form-input">
            <label>How many hours per day would you like to be driving?</label>
            <input placeholder="numeric only" type="text" name="hours" class="form-input" value="<?= $hours ?>">
            <label>Price per gallon</label>
            <ul>
                <?php foreach ($price_config as $key => $value) { ?>
                    <li><input type="radio" name="price" id="price-<?= $key ?>" value="<?= $value ?>" <?= $price == $value ? "checked" : "" ?>> <label class="prices-label" for="price-<?= $key ?>">$<?= number_format($value, 2)  ?></label></li>
                <?php } ?>
            </ul>
            <label>Fuel Efficiency</label>
            <select name="efficiency" id="">
                <option value="">Select Fuel Efficiency</option>
                <?php foreach ($efficiency_config as $key => $value) { ?>
                    <option <?= $efficiency == $key ? "selected" : "" ?> value="<?= $key ?>"><?= $key ?></option>
                <?php } ?>
            </select>
            <p class="p-buttons"><input type="submit" value="Calculate"> <input type="button" onclick="javascript:window.location.href='<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>'" value="Reset"> </p>
        </fieldset>
    </form>

    <?php


    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        if (count($form_info["errorMsg"]) === 0) {
            $cost = number_format($miles / $efficiency_config[$efficiency] * $price, 2);
            $speed = 65;
            $total_hours = number_format($miles / $speed, 2);
            $day = ceil($total_hours / $hours);
    ?>
            <div class="message-box">
                <p class="note-title">Calculator Results</p>
                <p class="note-message"><?= $name ?>, you will be driving <b><?= $miles ?> miles</b></p>
                <p class="note-message">Your vehicle has <?= $efficiency ?> efficiency rating <b><?= $efficiency_config[$efficiency] ?> miles per gallon</b></p>
                <p class="note-message">Your price per gallon is <b>$<?= $price ?></b></p>
                <p class="note-message">Your total cost for gas will be <b>$ <?= $cost ?> dollars</b></p>
                <p class="note-message">Your drive <b><?= $hours ?> hours per day, and <?= $speed ?> miles per hours</b></p>
                <p class="note-message">Your will be driving a total of<b> <?= $total_hours ?> hours equating to <?= $day ?> days</b></p>
            </div>
        <?php } else { ?>
            <div class="message-box">
                <p class="note-title">Error!</p>
                <?php foreach ($form_info["errorMsg"] as $msg) { ?>
                    <p class="note-message"><i><?= $msg ?></i></p>
                <?php } ?>
            </div>
    <?php }
    }
    ?>

</body>

</html>
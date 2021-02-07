<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculator-days</title>
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
    <script>

    </script>
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
            <input placeholder="name" type="text" name="name" class="form-input">
            <label>How many miles will you be driving?</label>
            <input placeholder="numeric only" type="text" name="miles" class="form-input">
            <label>How many hours per day would you like to be driving?</label>
            <input placeholder="numeric only" type="text" name="hours" class="form-input">
            <label>Price per gallon</label>
            <ul>
                <li><input type="radio" name="price" id="price-1" value="3.00"> <label class="prices-label" for="price-1">$3.00</label> </li>
                <li><input type="radio" name="price" id="price-2" value="3.50"> <label class="prices-label" for="price-2">$3.50</label> </li>
                <li><input type="radio" name="price" id="price-3" value="4.00"> <label class="prices-label" for="price-3">$4.00</label> </li>
            </ul>
            <label>Fuel Efficiency</label>
            <select name="efficiency" id="">
                <option value="">Select Fuel Efficiency</option>
                <option value="Terrible">Terrible</option>
                <option value="Good">Good</option>
                <option value="Excellent">Excellent</option>
            </select>
            <p class="p-buttons"><input type="submit" value="Calculate"> <input type="button" onclick="javascript:window.location.href='<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>'" value="Reset"> </p>
        </fieldset>
    </form>

    <?php
    $efficiency_rate_array = array(
        "Terrible" => 20,
        "Good" => 30,
        "Excellent" => 40,
    );
    function checkFieldsStatus(...$fields)
    {
        foreach ($fields as $value) {
            if (empty($value)) {
                return false;
            }
        }
        return true;
    }
    function getparameters($field)
    {
        return isset($_POST[$field]) ? $_POST[$field] : "";
    };
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        $name = getparameters("name");
        $miles = getparameters("miles");
        $price = getparameters("price");
        $efficiency = getparameters("efficiency");
        $hours = getparameters("hours");
        if (checkFieldsStatus($miles, $price, $efficiency, $hours, $name) && is_numeric($miles) && is_numeric($hours)) {
            $cost = number_format($miles / $efficiency_rate_array[$efficiency] * $price, 2);
            $speed = 65;
            $total_hours = number_format($miles / $speed, 2);
            $day = ceil($total_hours / $hours);
    ?>
            <div class="message-box">
                <p class="note-title">Calculator Results</p>
                <p class="note-message"><?= $name ?>, you will be driving <b><?= $miles ?> miles</b></p>
                <p class="note-message">Your vehicle has <?= $efficiency ?> efficiency rating <b><?= $efficiency_rate_array[$efficiency] ?> miles per gallon</b></p>
                <p class="note-message">Your price per gallon is <b>$<?= $price ?></b></p>
                <p class="note-message">Your total cost for gas will be <b>$ <?= $cost ?> dollars</b></p>
                <p class="note-message">Your drive <b><?= $hours ?> hours per day, and <?= $speed ?> miles per hours</b></p>
                <p class="note-message">Your will be driving a total of<b> <?= $total_hours ?> hours equating to <?= $day ?> days</b></p>
            </div>
        <?php } else { ?>
            <div class="message-box">
                <p class="note-title">Error!</p>
                <p class="note-message">Please fill out the form with valid data completely!</p>
            </div>
    <?php }
    }
    ?>

</body>

</html>
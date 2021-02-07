<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculator</title>
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
            width: 500px;
            margin: 0px auto;
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

        #miles {
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
    <h1>Our Calculator</h1>
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <fieldset>
            <label>How many miles will you be driving?</label>
            <input placeholder="numeric only" type="text" name="miles" id="miles">
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
        //echo $_SERVER["REQUEST_METHOD"];
        $miles = getparameters("miles");
        $price = getparameters("price");
        $efficiency = getparameters("efficiency");
        if (checkFieldsStatus($miles, $price, $efficiency) && is_numeric($miles)) {
            $cost = number_format($miles / $efficiency_rate_array[$efficiency] * $price, 2);
    ?>
            <p class="note-title">Calculator Results</p>
            <p class="note-message">You have driven <?= $miles ?> miles</p>
            <p class="note-message">Your vehicle has <?= $efficiency ?> efficiency rating <?= $efficiency_rate_array[$efficiency] ?> miles per gallon</p>
            <p class="note-message">Your price per gallon is $<?= $price ?></p>
            <p class="note-message">Your total cost for gas will be $ <?= $cost ?> dollars</p>
        <?php } else { ?>
            <p class="note-title">Error!</p>
            <p class="note-message">Please enter a valid distance, price per gallon and efficiency</p>
    <?php }
    }
    ?>

</body>

</html>
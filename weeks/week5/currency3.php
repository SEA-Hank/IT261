<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Currency Form</title>
    <style>
        * {
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
        }

        fieldset {
            padding: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type=text],
        input[type=email] {
            width: 100%;
            margin-bottom: 10px;
        }

        input[type=radio] {
            margin-right: 5px;
        }

        form ul {
            margin-left: 20px;
            list-style-type: none;
            margin-bottom: 10px;
        }

        .box {
            width: 400px;
            margin: 20px auto;
            background-color: beige;
            padding: 10px;
        }

        .error {
            color: red;
            margin: 0px auto;
            width: 450px;
            text-align: center;
        }

        select {
            display: block;
            margin-bottom: 10px;
        }

        p {
            padding: 5px 0px;
        }
    </style>
</head>

<body>

    <?php
    function getPostParams($field)
    {
        return isset($_POST[$field]) ? $_POST[$field] : "";
    }
    $name = getPostParams("name");
    $email = getPostParams("email");
    $amount = getPostParams("amount");
    $currency = getPostParams("currency");
    $bank =  getPostParams("bank");
    $array_currency =  array(
        "Rubles" => 0.013,
        "Canadian" => 0.76,
        "Pounds" => 1.28,
        "Euros" => 1.18,
        "Yen" => 0.0094
    );
    $array_bank = array(
        "" => "Select one!",
        "boa" => "Bank of America",
        "chase" => "Chase",
        "becu" => "Boeing Credit Union",
        "mattress" => "Mattress"

    );
    ?>
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"])  ?>" method="post">
        <fieldset> <label>Name</label>
            <input type="text" name="name" value="<?= $name ?>">
            <label>Email</label>
            <input type="email" name="email" value="<?= $email ?>">
            <label>How much money do you have?</label>
            <input type="text" name="amount" value="<?= $amount ?>">
            <label>Choose your currency</label>
            <ul>
                <?php foreach ($array_currency as $key => $value) { ?>
                    <li> <input type="radio" name="currency" <?= $currency == $value ? "checked" : "" ?> value="<?= $value ?>"><?= $key ?></li>
                <?php } ?>
            </ul>
            <label>Banking Institution</label>
            <select name="bank" id="bank">
                <?php foreach ($array_bank as $key => $value) { ?>
                    <option <?= $bank == $key ? "selected" : "" ?> value="<?= $key ?>"><?= $value ?></option>
                <?php } ?>
            </select>
            <input type="submit" value="Convert it!">
            <p><a href="">Reset</a></p>
        </fieldset>
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $isFeildsReady = true;
        $formFields = array(
            "name" => "Please fill out your name!",
            "email" => "Please fill out your email!",
            "amount" => "Please fill out your amount or amount is not a number!",
            "currency" => "Choose your currency",
            "bank" => "Please choose your banking institution"
        );

        foreach ($formFields as $key => $value) {
            if (
                empty($_POST[$key]) ||
                ($key === "amount" && !is_numeric($_POST[$key]))
            ) {
                echo  "<p class='error'>$value</p>";
                $isFeildsReady = false;
            }
        }
        if (
            $isFeildsReady
            && is_numeric(($_POST['currency']))
        ) {
            $total = $amount * $currency;
            $totalFormat = number_format($total, 2); ?>

            <div class="box">
                <h2>Hello <?= $name ?></h2>
                <p>You now Have $<?= $totalFormat ?> American Dollars and we will be depositing it in <?= $array_bank[$bank] ?></p>
                <p>We will be sending you an email at <a href="mailto:<?= $email ?>"><?= $email ?></a> </p>
            </div>
    <?php }
    } ?>
</body>

</html>
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
    </style>
</head>

<body>
    <form action="" method="post">
        <fieldset> <label>Name</label>
            <input type="text" name="name">
            <label>Email</label>
            <input type="email" name="email">
            <label>How much money do you have?</label>
            <input type="text" name="amount">
            <label>Choose your currency</label>
            <ul>
                <li> <input type="radio" name="currency" value="0.013">Rubles</li>
                <li> <input type="radio" name="currency" value="0.76">Canadian</li>
                <li> <input type="radio" name="currency" value="1.28">Pounds</li>
                <li> <input type="radio" name="currency" value="1.18">Euros</li>
                <li> <input type="radio" name="currency" value="0.0094">Yen</li>
            </ul>
            <label>Banking Institution</label>
            <select name="bank" id="bank">
                <option value="">Select one!</option>
                <option value="boa">Bank of America</option>
                <option value="chase">Chase</option>
                <option value="becu">Boeing Credit Union</option>
                <option value="mattress">Mattress</option>
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
            $name = $_POST['name'];
            $email = $_POST['email'];
            $amount = $_POST['amount'];
            $currency = $_POST['currency'];
            $bank = $_POST['bank'];
            $total = $amount * $currency;
            $totalFormat = number_format($total, 2); ?>

            <div class="box">
                <h2>Hello <?= $name ?></h2>
                <p>You now Have $<?= $totalFormat ?> American Dollars and we will be depositing it in <?= $bank ?></p>
                <p>We will be sending you an email at <?= $email ?></p>
            </div>

    <?php }
    } ?>
</body>

</html>
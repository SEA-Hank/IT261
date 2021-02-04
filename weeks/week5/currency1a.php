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
            "currency" => "Choose your currency"
        );

        foreach ($formFields as $key => $value) {
            $errorMsg = "";
            if (
                empty($_POST[$key])
                //|| ($key === "amount" && !is_numeric($_POST[$key]))
            ) {
                $errorMsg = "<p class='error'>$value</p>";
                $isFeildsReady = false;
            }
            //echo $errorMsg;
        }
        if (!$isFeildsReady) {
            echo '<p class="error">Please fill out all of the fields!</p>';
        } elseif (
            $isFeildsReady
            && is_numeric(($_POST['currency']))
            && is_numeric(($_POST['amount']))
        ) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $amount = $_POST['amount'];
            $currency = $_POST['currency'];
            $total = $amount * $currency; ?>

            <div class="box">
                <h2>Hello <?= $name ?></h2>
                <p>You Have $<?= $total ?></p>
            </div>
    <?php } else {
            echo '<p class="error">amount is not a number</p>';
        }
    } ?>
</body>

</html>
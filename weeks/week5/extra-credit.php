<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extra Credit Currency Form</title>
    <style>
        * {
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            font-size: 35px;
        }

        form {
            max-width: 500px;
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
            width: 500px;
            margin: 20px auto;
            padding: 10px;
            border-radius: 3px;
            box-shadow: 1px 1px 2px 1px rgba(0, 0, 0, 0.2);
        }

        .happy {
            background-color: #1687a7;
        }

        .sad {
            background-color: #cdd0cb;
        }

        .error {
            color: red;
            margin: 0px auto;
            width: 450px;
            text-align: center;
            ;
        }

        select {
            display: block;
            margin-bottom: 10px;
        }

        p {
            padding: 5px 0px;
        }

        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 1px 1px 2px 1px rgba(0, 0, 0, 0.2);
        }

        .orange {
            background-color: #eb5e0b;
        }

        iframe {
            margin-top: 10px;
        }

        .valid {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Extra Credit Currency Assignment</h1>
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

            <p> <input class="button" type="submit" value="Convert it!"> <a class="button orange" href="">Reset</a></p>
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
                echo "<p class='error'><i>$value</i></p>";
                $isFeildsReady = false;
            }
        }
        if (
            $isFeildsReady
            && is_numeric(($_POST['currency']))
        ) {
            $total = $amount * $currency;
            $totalFormat = number_format($total, 2);
            $message = "";
            $class = "";
            $video = "";
            if ($total > 2000) {
                $video = "https://www.youtube.com/embed/VGXd9i8mONw";
                $class = "happy";
                $message = "I'm a happy camper, because I have $ $totalFormat American Dollars in $array_bank[$bank], and I am going to watch basketball games";
            } else {
                $video = "https://www.youtube.com/embed/HNT6WElv9Yw";
                $class = "sad";
                $message = "I'm not happy because I only have $ $totalFormat American Dollars in $array_bank[$bank], and I am going to watch football games";
            }
    ?>
            <div class="box <?= $class ?>">
                <?= $message ?>
                <iframe width="480" height="315" src="<?= $video ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
    <?php }
    } ?>
    <p class="valid"><a href="http://validator.w3.org/check?uri=referer" target="_blank"><i>HTML VALID</i></a></p>
    <p class="valid"><a href="https://jigsaw.w3.org/css-validator/check?uri=referer" target="_blank"><i>CSS VALID</i></a></p>
</body>

</html>
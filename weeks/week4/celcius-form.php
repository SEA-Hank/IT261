<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/celciusForm.css">
    <title>Our Celcius Form</title>
</head>

<body>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'])  ?>" method="post">
        <fieldset>
            <legend>Our Ceclius Form</legend>
            <label>Enter your Celcius value</label>
            <input type="text" name="cel">
            <input type="submit" value="Convert it!">
            <p><a href="">Reset</a></p>
        </fieldset>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['cel'])) {
            $cel = $_POST['cel'];
            $far = ($cel * 9 / 5) + 32;
        }
        if ($far <= 32) {
            echo "<p class='cool'>$far is mighty cold!!!</p>";
        } elseif ($far <= 50) {
            echo "<p class='not-cool'>$far is not that cold!!!</p>";
        } elseif ($far <= 80) {
            echo "<p class='hot'>$far is getting HOT!!!</p>";
        } else {
            echo "<p class='hot'>$far is a cooker!!!";
        }
    }
    ?>
</body>

</html>
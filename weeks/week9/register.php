<?php
include('config.php');
include('../../formTools.php');
include('server.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Register Today</title>
</head>

<body>
    <h2>Register Today</h2>
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
        <fieldset>
            <?php
            generateFormFileds($form_config, $form_status);
            ?>
            <p> <input id="submit-btn" type="submit" name="reg_user" value="Register"></p>
            <p><a href="">Reset</a></p>
            <?php include('errors.php') ?>
        </fieldset>
    </form>
    <p class="login-p"><a href="login.php">Already a Member? Please Login!</a></p>
</body>

</html>
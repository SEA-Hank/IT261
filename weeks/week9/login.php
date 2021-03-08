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
    <title>Login Page</title>
</head>

<body>
    <h2>Login Page</h2>
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
        <fieldset>
            <?php
            generateFormFileds($form_config, $form_status);
            ?>
            <p> <input id="submit-btn" type="submit" name="login_user" value="Login"></p>
            <p><a href="">Reset</a> <a style="margin-left:30px" href="register.php">Register</a> </p>
            <?php include('errors.php') ?>
        </fieldset>
    </form>
</body>

</html>
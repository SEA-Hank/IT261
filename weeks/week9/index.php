<?php
session_start();
if (!isset($_SESSION['UserName'])) {
    header('Location:login.php');
    exit();
}

if (isset($_GET["logout"])) {
    session_destroy();
    unset($_SESSION['UserName']);
    header('Location:login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>

<body>
    <h1><?= htmlentities($_SESSION["success"])  ?></h1>
    <p>Hello,<?= htmlentities($_SESSION["UserName"])   ?></p>
    <p><a href="index.php?logout=1">logout</a></p>
    <h1>Welcome to our home page!</h1>
</body>

</html>
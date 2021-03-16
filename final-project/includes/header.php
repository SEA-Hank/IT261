<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/login.css">
    <title><?= $pageTitle ?></title>
</head>

<body>
    <header>
        <div id="login-wrapper">
            <?php if (isset($_SESSION['UserName'])) : ?>
                <span id="span-login-info">Hello, <b><?= $_SESSION["UserName"] ?></b></span>
                <span id="span-logout"> <a href="./login.php?logout=y">logout</a></span>
            <?php endif; ?>
            <span id="span-label">Best cities for retirees</span>
        </div>
        <div id="menu-wrapper">
            <nav>
                <ul>
                    <?php foreach ($nav  as $key => $value) : ?>
                        <li><a href="<?= $key ?>"><?= $value ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </header>
    <main>
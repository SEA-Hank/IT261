<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css?v=03082021">
    <title><?= $pageTitle ?></title>
</head>

<body>
    <div id="wrapper">
        <header>
            <div id="headContent">
                <img src="./images/php-logo.png" alt="php-logo">
                <nav>
                    <ul>
                        <?php foreach ($nav as $key => $value) { ?>
                            <li><a class="<?= $key == THIS_PAGE ? "selected" : "" ?>" href="./<?= $key ?>"><?= $value ?></a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </header>
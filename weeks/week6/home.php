<?php
define('THIS_PAGE', basename($_SERVER["PHP_SELF"]));

$nav["home.php"] = 'Home';
$nav["about.php"] = 'About';
$nav["daily.php"] = 'Daily';
$nav["people.php"] = 'People';
$nav["contact.php"] = 'Contact';
$nav["gallery.php"] = 'Gallery';


function makeLinks($nav)
{
    foreach ($nav as $key => $value) {
?>
        <li><a <?= $key == THIS_PAGE ? "class=\"active\"" : "" ?> href="<?= $key ?>"><?= $value ?></a></li>
<?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing my Index page with a Function for my NAV!</title>
    <style>
        .active {
            color: red;
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <?php makeLinks($nav); ?>
        </ul>
    </nav>
</body>

</html>
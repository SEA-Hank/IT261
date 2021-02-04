<?php
date_default_timezone_set('America/Los_Angeles');
$todayDate = date("H:i A");

echo date('Y');
echo '<br>';
echo date('l');
echo '<br>';

if (isset($_GET['today'])) {
    $today = $_GET["today"];
} else {
    $today = "Thursday"; //date('l');
}

echo 'today is ' . $today;
echo '<br>';

switch ($today) {
    case "Thursday":
        $coffe = 'Thursday is my latte day';
        $pic = './images/latte.jpg';
        $alt = 'Latte';
        $content = "This will be my latte content!!!";
        $background = 'pink';
        break;
    case "Friday":
        $coffe = 'Friday is my coffe day';
        $pic = './images/coffee.jpg';
        $alt = 'Coffe';
        $content = "This will be my Americano content!!!!";
        $background = 'yellow';
        break;
    case "Saturday":
        $coffe = 'Saturday is my Pumpkin Latte day';
        $pic = './images/pumpkin.jpg';
        $alt = 'Pumpkin Latte';
        $content = "This will be my Pumpkin Latte content!!!!";
        $background = '#0099CC';
        break;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>switch</title>
    <style>
        .pbg {
            background-color: <?= $background ?>;
        }

        img {
            width: 300px;

        }
    </style>
</head>

<body class="pbg">
    <h1> <?php
            if ($todayDate <= 11) {
                echo 'Good Morning! <br>';
            } elseif ($todayDate <= 15) {
                echo 'Good Afternoon! <br>';
            } else {
                echo 'Good Evening! <br>';
            }
            echo $coffe ?> </h1>
    <img src="<?= $pic ?>" alt="<?= $alt ?>" />
    <p><?= $content ?></p>
    <h2>Check out our daily specials below!</h2>
    <ul>
        <li><a href="switch.php?today=Thursday">Thursday</a></li>
        <li><a href="switch.php?today=Friday">Friday</a></li>
        <li><a href="switch.php?today=Saturday">Saturday</a></li>
    </ul>
</body>

</html>
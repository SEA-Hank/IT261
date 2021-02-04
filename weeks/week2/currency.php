<?php
$ruble = 10007;
$rubleFriendly = number_format($ruble * 0.013, 2);

$sterling = 500;
$sterlingFriendly = number_format($sterling * 1.28, 2);

$canada = 5000;
$canadaFriendly = number_format($canada * 0.79, 2);

$euros = 1200;
$eurosFriendly = number_format($euros * 1.18, 2);

$yen = 2000;
$yenFriendly = number_format($yen * 0.0094, 2);

$total = $ruble * 0.013 + $sterling * 1.28 + $canada * 0.79 + $euros * 1.18 + $yen * 0.0094;
$totalFriendly = number_format($total, 2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 300px;
            margin: 0 auto;
            border-collapse: collapse;
        }

        td {
            border: 1px solid #ccc;
            padding: 5px;
        }

        th {
            border: 1px solid #ccc;
            padding: 5px;
            background-color: beige;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>Money</th>
            <th>Dollars</th>
        </tr>
        <tr>
            <td>Rubles</td>
            <td><?= '$' . $rubleFriendly ?></td>
        </tr>
        <tr>
            <td>Seterling</td>
            <td><?= '$' . $sterlingFriendly ?></td>
        </tr>
        <tr>
            <td>Canada</td>
            <td><?= '$' . $canadaFriendly ?></td>
        </tr>
        <tr>
            <td>Euro</td>
            <td><?= '$' . $eurosFriendly ?></td>
        </tr>
        <tr>
            <td>Yen</td>
            <td><?= '$' . $yenFriendly ?></td>
        </tr>
        <tr>
            <th>Total</th>
            <th><?= '$' . $totalFriendly ?></th>
        </tr>
    </table>
</body>

</html>
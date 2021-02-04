<?php
$ruble = 10007;
$rubleFriendly = number_format($ruble * 0.013, 2);

$sterling = 500;
$sterlingFriendly = number_format($sterling * 1.28, 2);

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
    </table>
</body>

</html>
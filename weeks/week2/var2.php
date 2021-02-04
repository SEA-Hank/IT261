<?php
// $a = 20;
// $b = 30;
// $c = $a + $b;

// echo $c;
// echo '<br>';

// $a = 20;
// $b = 30;
// $c = $a * $b;

// echo $c;
// echo '<br>';

$money = 100;
$money /= 7;
echo '$money --> ' . $money;
echo '<br>';
$moneyFriendly = floor($money);
echo 'floor($money) --> ' . $moneyFriendly;
echo '<br>';
$moneyFriendly = ceil($money);
echo 'ceil($money) --> ' . $moneyFriendly;
echo '<br>';

$celcius = 14;
$far = ($celcius * 9 / 5) + 32;
//echo $far;
echo 'celcius --> ' . $celcius . ';     far --> ' . $far;
echo '<br>';
$farFriendly = floor($far);
echo '$farFriendly = floor($far) --> ' . $farFriendly;
echo '<br>';

$canada = 1000;
$canada *= 0.79;
echo '$canada *= 0.79 --> ' . $canada;

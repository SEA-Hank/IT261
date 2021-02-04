<?php
$temp = '75';
if ($temp <= 60) {
    echo 'It\'s not too hot';
} else {
    echo 'It could be hot!<br>';
}

$temp = '80';
if ($temp <= 60) {
    echo 'It\'s not too hot';
} elseif ($temp <= 70) {
    echo 'It\'s getting warmer<br>';
} elseif ($temp <= 80) {
    echo "it's getting really hot";
} else {
    echo 'and the temperature is unknown!';
}
echo '<br>';

$salary = '200000';
if ($salary == 200000) {
    echo "I'm happy";
}

echo '<br>';

$sales = 745000;
if ($sales <= 500000) {
    $salary *= 1;
} elseif ($salary <= 750000) {
    $salary *= 1.05;
} elseif ($salary >= 800000) {
    $salary *= 1.10;
} else {
    echo 'No bonus';
}

echo "salary is " . $salary;

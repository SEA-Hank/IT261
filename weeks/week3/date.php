<?php
echo "date(\"Y\") --> " . date("Y");
echo '<br>';


echo 'date("H:i A") --> ' . date("H:i A");
echo '<br>';

echo 'date("h:i A") --> ' . date("h:i A");
echo '<br>';


date_default_timezone_set('America/Los_Angeles');

echo '<br>';
echo 'date("h:i A") --> ' . date("h:i A");
echo '<br>';


$todayDate = date("H:i A");
echo '$todayDate --> ' . $todayDate;
echo '<br>';
if ($todayDate <= 11) {
    echo 'Good Morning!';
} elseif ($todayDate <= 15) {
    echo 'Good Afternoon!';
} else {
    echo 'Good Evening!';
}

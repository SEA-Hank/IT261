<?php
// $celcius = 14;

// $far = ($celcius * 9 / 5) + 32;
// echo $far;
for ($celcius = 0; $celcius <= 100; $celcius += 5) {
    $far = ($celcius * 9 / 5) + 32;
    echo '' . $celcius . '  &nbsp;&nbsp;' . $far . '<br>';
}

<?php
$vegetables[] = 'spinach';
$vegetables[] = 'broccoli';
$vegetables[] = 'asparagus';
$vegetables[] = 'kale';
echo $vegetables;


function getArray($delimiter, $string)
{
    return explode($delimiter, $string);
}

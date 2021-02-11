<?php
function sayHello()
{
    echo 'Hello PHP Function!!!';
}
sayHello();
echo '<br>';

function sayHello2($name)
{
    echo "Hello " . $name;
}

sayHello2('Hank');
echo '<br>';
sayHello2('Casey');
echo '<br>';
sayHello2('Frank');
echo '<br>';


function sayHello3($name, $age)
{
    echo "Hello " . $name . ", and you are " . $age . " years old";
}

sayHello3('Hank', 18);
echo '<br>';
sayHello3('Casey', 20);
echo '<br>';
sayHello3('Frank', 22);
echo '<br>';
echo '<h2>Math problems</h2>';

function cube($n)
{
    $cubing = $n * $n * $n;
    echo ($cubing);
}
cube(15);
echo '<br>';
function celciusConverter($temp)
{
    $far = $temp * 9 / 5 + 32;
    echo $far;
}
celciusConverter(5);
echo '<br>';


echo '<h2>Area and volume math problem</h2>';

function areaVolume($val1, $val2, $val3)
{
    $area = $val1 * $val2;
    $vol = $val1 * $val2 * $val3;
    return array($area, $vol);
}
$res = areaVolume(10, 5, 2);
echo '<b>Area:</b> ' . $res[0];
echo '<br>';
echo '<b>Volume:</b> ' . $res[1];
echo '<br>';


list($myArea, $myVolume) = areaVolume(10, 5, 2);
echo 'myArea --> ' . $myArea;
echo '<br>';
echo 'myVolume --> ' . $myVolume;

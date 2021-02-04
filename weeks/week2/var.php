<?php
$name = "hank";
echo 'this is a rainy and windy day!';
echo '<br>';
echo $name;

$name = "yingheng";
$name = "yingheng he";
echo '<br>';
echo $name;
echo '<br>';

$firstNmae = 'Hank';
$lastName = "He";
echo $firstNmae . ' ' . $lastName;

echo '<br>';
echo '' . $firstNmae . ' ';
echo '<br>';
echo "$firstNmae";
echo '<br>';

$name = "hank";
$name .= " he";
echo $name;
echo '<br>';

$x = 20;
$y = 25;
$z = $x + $y;
echo $z;
echo '<br>';

$x = 20;
$x += 25;
echo $x;

echo '<br>';

$a = 100;
$a /= 7;
$afriendly = number_format($a, 2);
echo $a;
echo '<br>';
echo $afriendly;

echo '<br>';
echo date('Y');
echo '<br>';
// $name = array();
// $name[] = "hank";
// $name[] = "NHa";
// $name[] = "Olga";
// $name[] = "Daetri";
// $name[] = "Zach";
// echo $name;
echo '<br>';
$dairy[] = "milk";
$dairy[] = "cheese";
$dairy[] = "ice cream";
$dairy[] = "yougurt";

echo '<br>';
print_r($dairy);

$nav[] = 'Home';
$nav[] = "About";
$nav[] = "Daily";
$nav[] = "Contact";
$nav[] = "Gallery";

echo '<br>';
echo $nav[0];
$nav = array(
    'index.php' => 'HOME',
    'about.php' => 'About',
    'daily.php' => 'Daily',
    'contact.php' => 'Contact',
    'gallery.php' => 'Gallery'
);
$nav = [
    'index.php' => 'HOME',
    'about.php' => 'About',
    'daily.php' => 'Daily',
    'contact.php' => 'Contact',
    'gallery.php' => 'Gallery'
];
echo '<br>';
print_r($nav);

$show = "The Crown";
$showActor = "Olivia Coleman";
$showGenre = "Historical Fiction";
echo '<br>';
echo '<br>';
echo "Show: $show;<br> show actor: $showActor;<br> show genre: $showGenre;";

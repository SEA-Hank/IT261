<?php
$dice = rand(1, 6);
echo $dice;
echo '<br>';

$dice1 = rand(1, 6);
$dice2 = rand(1, 6);

if ($dice1 == $dice2) {
    echo 'You win, you have a double!';
} else {
    echo 'You lose!!!';
}
echo '<br>';
$photos = array('photo1', 'photo2', 'photo3', 'photo4', 'photo5');
$index = rand(1, 4);
$image = './images/' . $photos[$index] . '.jpg';
echo "<img src='$image' alt='$image' />";

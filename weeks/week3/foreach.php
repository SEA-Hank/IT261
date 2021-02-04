<?php

$show = array(
    'Name' => 'Handmaid\'s Tale',
    "Actor" => 'Elizabeth Moss',
    'Genre' => "Drama",
    "Author" => "Margaret Atwood"
);

//name is the key, and the actual name is the value
foreach ($show as $key => $value) {
    echo '<b>' . $key . ':</b> ' . $value . ' <br>';
}

$nav["index.php"] = "Home";
$nav['about.php'] = "About";
$nav["daily.php"] = "Daily";
$nav["gallery.php"] = "Gallery";
$nav["Contact.php"] = "Contact";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>
        <?php
        foreach ($nav as $key => $value) {
            echo '<li><a href="' . $key . '">' . $value . '</a></li>';
        }
        ?>
    </ul>
</body>

</html>
<?php
include 'databaseTools.php';
define("THIS_PAGE", basename($_SERVER["PHP_SELF"]));

$nav = array(
    "index.php" => "Home",
    "about.php" => "about",
    "daily.php" => "Daily",
    "people.php" => "People",
    "contact.php" => "Contact",
    "gallery.php" => "Gallery",
);

switch (THIS_PAGE) {
    case "index.php":
        $pageTitle = "Home page of our Website Project";
        break;
    case "about.php":
        $pageTitle = "About page of our Website Project";
        break;
    case "daily.php":
        $pageTitle = "Daily page of our Website Project";
        break;
    case "people.php":
        $pageTitle = "People page of our Website Project";
        break;
    case "contact.php":
        $pageTitle = "Contact page of our Website Project";
        break;
    case "gallery.php":
        $pageTitle = "Gallery page of our Website Project";
        break;
    case "thanks.php":
        $pageTitle = "thanks page of our Website Project";
        break;
    default:
        $pageTitle = "Hank's Website Project";
        break;
}

function randImages($folder, $min = 1, $max = 5)
{
    $index = rand($min, $max);
    return "./images/$folder/pic_$index.jpg";
}

function redirect($url)
{
    header("Content-type: text/html; charset=utf-8");
    header("Location:$url");
    exit();
}

function getEmailContent()
{
    if (!array_key_exists('firstName', $_SESSION)) {
        redirect('contact.php');
    }
    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];
    $customerEmail = $_SESSION['email'];
    $phone = $_SESSION['phone'];
    $gender = $_SESSION['gender'];
    $comments = $_SESSION['comments'];
    $frameworks = implode(", ", $_SESSION['frameworks']);
    $position = $_SESSION['position'];

    $body = "First and Last Name:  $firstName $lastName" . PHP_EOL;
    $body .= "Email is: $customerEmail" . PHP_EOL;
    $body .= "Phone Number is: $phone" . PHP_EOL;
    $body .= "Gender is: $gender" . PHP_EOL;
    $body .= "Coments is: $comments" . PHP_EOL;
    $body .= "Favorite Position: $position" . PHP_EOL;
    $body .= "Favorite frameworks: $frameworks" . PHP_EOL;
    return $body;
}

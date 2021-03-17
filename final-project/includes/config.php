<?php
session_start();
include 'databaseTools.php';
define("THIS_PAGE", basename($_SERVER["PHP_SELF"]));


$nav = array(
    "index.php" => "Home",
    "switch.php" => "SWITCH",
    "citys.php" => "CITYS",
    "contact.php" => "CONTACT",
    "about.php" => "ABOUT",
    "login.php" => "LOGIN"
);

switch (THIS_PAGE) {
    case "index.php":
        $pageTitle = "home page";
        break;
    case "switch.php":
        $pageTitle = "switch page";
        break;
    case "citys.php":
        $pageTitle = "citys page";
        break;
    case "contact.php":
        $pageTitle = "contact page";
        break;
    case "about.php":
        $pageTitle = "about page";
        break;
    case "thanks.php":
        $pageTitle = "thanks page";
        break;
    case "login.php":
        $pageTitle = "login page";
        break;
    case "register.php":
        $pageTitle = "register page";
        break;
    default:
        $pageTitle = "final project page";
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
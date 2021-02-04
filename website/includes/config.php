<?php
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
}

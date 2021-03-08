<?php
if ($_SERVER['SERVER_NAME'] === "localhost") {
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "root");
    define("DB_NAME", "IT261");
} else {
    define("DB_HOST", "162.241.224.56");
    define("DB_USER", "seahankc_it261");
    define("DB_PASSWORD", "123456789Qwer!");
    define("DB_NAME", "seahankc_it261");
}

define("DEBUG", TRUE);

// include('credentials.php');

function myError($myFile, $myLine, $errorMsg)
{
    if (defined('DEBUG') && DEBUG) {
        echo 'Error in file: <b> ' . $myFile . ' </b> on line: <b> ' . $myLine . ' </b>';
        echo 'Error message: <b> ' . $errorMsg . '</b>';
        die();
    } else {
        echo ' Houston, we have a problem!';
        die();
    }
}

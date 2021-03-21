<?php
include "./includes/config.php";
include "./includes/header.php";
?>
<div id="index-wrapper">
    <p id="index-title">Welcome to my home page</p>
    <div id="content-wrapper">
        <div>
            <img src="<?= randImages("index") ?>" alt="index-page-image">
        </div>
        <div>
            <ul>
                <li><a href="./cities.php">Retired cities</a></li>
                <li><a href="./contact.php">Contact us</a></li>
                <li><a href="./index.php">Switch page</a></li>
            </ul>
        </div>
    </div>
</div>
<?php include "./includes/footer.php" ?>
<?php
include "./includes/config.php";
$body = getEmailContent();
include "./includes/header.php";
?>
<div id="thanks-wrapper">
    <h1>Thanks for your Information</h1>
    <pre><?= htmlentities($body)  ?></pre>
    <div>
        <img src="./images/thanks.jpeg" alt="">
    </div>
</div>
<?php include "./includes/footer.php" ?>
<?php session_start(); ?>
<?php include "./includes/config.php" ?>
<?php $body = getEmailContent(); ?>
<?php include './includes/header.php' ?>
<main id="thanks">
    <div class="content">
        <h1>Thanks for your Information</h1>
        <pre><?= htmlentities($body)  ?></pre>
    </div>
</main>
<?php include './includes/footer.php' ?>
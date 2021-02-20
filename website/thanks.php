<?php include "./includes/config.php" ?>
<?php include './includes/header.php' ?>
<?php session_start() ?>
<main id="thanks">
    <div class="content">
        <h1>Thanks for your Information</h1>
        <pre><?= getEmailContent() ?></pre>
    </div>
</main>
<?php include './includes/footer.php' ?>
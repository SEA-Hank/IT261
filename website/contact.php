<?php include "./includes/config.php" ?>
<?php include "./includes/form.php" ?>
<?php include './includes/header.php' ?>
<main id="contact">
    <div class="mainWrapper">
        <div class="main-left">
            <h1>
                Please fill out the form
            </h1>
            <?php builtForm() ?>
        </div>
        <aside class="main-right">
            <h1>
                The Popular PHP Framework
            </h1>
            <img src="<?= randImages('php') ?>" alt="">
        </aside>
    </div>
</main>
<?php include './includes/footer.php' ?>
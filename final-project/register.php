<?php
include "./includes/config.php";
include "./includes/formTools.php";
include "./includes/server.php";
include "./includes/header.php";
?>
<div id="register-wrapper">
    <p>Sign Up</p>
    <div id="register-form-wrapper">
        <form id="register-form" autocomplete="off" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
            <?php
            generateFormFileds($form_config, $form_status);
            ?>
            <?php include "./includes/errors.php" ?>
            <p class="btn-wrapper"> <input id="submit-btn" type="submit" name="reg_user" value="register"></p>
        </form>
        <div id="register-image">
            <img src="./images/register.jpeg" alt="register-image">
        </div>
    </div>
</div>
<?php include "./includes/footer.php" ?>
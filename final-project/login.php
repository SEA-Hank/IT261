<?php
include "./includes/config.php";
include "./includes/formTools.php";
include "./includes/server.php";
if (isset($_GET["logout"])) {
    session_destroy();
    unset($_SESSION['UserName']);
}
$reg_succeeded = isset($_SESSION['reg_succeeded']);
unset($_SESSION['reg_succeeded']);
include "./includes/header.php";
?>
<div id="login-wrapper">
    <div id="login-image-wrapper">
        <img src="./images/login.jpeg" alt="login">
    </div>
    <div id="login-form-wrapper">
        <?php if ($reg_succeeded) : ?>
            <p>Register <span>succeeded</span>, please login !</p>
        <?php endif; ?>
        <form id="login-form" autocomplete="off" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
            <?php
            generateFormFileds($form_config, $form_status);
            ?>
            <?php include "./includes/errors.php" ?>
            <p class="btn-wrapper"> <input id="submit-btn" type="submit" name="login_user" value="Login"></p>
            <p class="btn-wrapper-2">Not registered? <a href="register.php">Create an account</a> </p>
        </form>
    </div>
</div>
<?php include "./includes/footer.php" ?>
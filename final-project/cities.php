<?php
include "./includes/config.php";

$sql  = "select ID, name, state, special_feature from cities";
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or
    die(myError(__FILE__, __LINE__, mysqli_connect_error()));

$result = mysqli_query($link, $sql)  or
    die(myError(__FILE__, __LINE__, mysqli_error($link)));

include "./includes/header.php";
?>
<div id="cities-wrapper">
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <div class="city-wrapper">
            <div> <img src="./images/cities/<?= $row["ID"] ?>.jpeg" alt=""> </div>
            <div>
                <p class="city-name"><?= $row["name"] ?>, <?= $row["state"] ?></p>
                <p><b>Special Feature:</b> <?= $row["special_feature"] ?></p>
                <p class="city-info"> <a href="./city-view.php?id=<?= $row["ID"] ?>">More Information</a> </p>
            </div>
        </div>
    <?php endwhile;
    mysqli_free_result($result);
    mysqli_close($link); ?>
</div>
<?php include "./includes/footer.php" ?>
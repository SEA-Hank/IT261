<?php include "./includes/config.php" ?>
<?php include './includes/header.php' ?>
<?php
$SQL = "select ID,name from keyboards";

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or
    die(myError(__FILE__, __LINE__, mysqli_connect_error()));

$result = mysqli_query($link, $SQL)  or
    die(myError(__FILE__, __LINE__, mysqli_error($link)));

function getImage($name)
{
    return str_replace(" ", "_", $name) . ".jpg";
}
?>
<main id="keyborads">
    <div class="content">
        <ul>
            <?php while ($row = mysqli_fetch_assoc($result)) :
                $name = $row["name"];
                $id = $row["ID"]
            ?>
                <li>
                    <p class="image-wrapper">
                        <img src="./images/keyboards/<?= getImage($name) ?>" alt="<?= $name ?>">
                    </p>
                    <p class="keyboard-name">
                        <a href="keyboard-view.php?id=<?= $id ?>"><?= $name ?></a>
                    </p>
                </li>
            <?php endwhile;
            mysqli_free_result($result);
            mysqli_close($link); ?>
        </ul>
    </div>
</main>
<?php include './includes/footer.php' ?>
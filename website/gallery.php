<?php include "./includes/config.php" ?>
<?php
$SQL = "select * from park";

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or
    die(myError(__FILE__, __LINE__, mysqli_connect_error()));

$result = mysqli_query($link, $SQL)  or
    die(myError(__FILE__, __LINE__, mysqli_error($iConn))); ?>
<?php include './includes/header.php' ?>
<main id="gallery">
    <div class="content">
        <?php $rowIndex = 0;
        if (mysqli_num_rows($result) > 0) : ?>
            <table>
                <?php while ($row = mysqli_fetch_assoc($result)) :
                    $name = $row["name"];
                    $description = $row["description"];
                    $image = $row["image"];
                ?>
                    <tr class="<?= $rowIndex % 2 == 0 ? "gallery-tr" : "gallery-tr-2" ?>">
                        <td><img src="./images/gallery/group1/<?= $image ?>.jpeg" alt="<?= $name ?>"></td>
                        <td class="gallery-name"><?= $name ?></td>
                        <td class="gallery-description"><?= $description ?></td>
                        <td><img src="./images/gallery/group2/<?= $image ?>.jpeg" alt="<?= $name ?>"></td>
                    </tr>
                    <?php $rowIndex += 1; ?>
                <?php endwhile;
                mysqli_free_result($result);
                mysqli_close($link); ?>
            </table>
        <?php else : ?>
            <div class="nodata">NO DATA</div>
        <?php endif; ?>
    </div>
</main>
<?php include './includes/footer.php' ?>
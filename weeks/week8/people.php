<?php include "config.php";
$SQL = "SELECT * FROM people";

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or
    die(myError(__FILE__, __LINE__, mysqli_connect_error()));

$result = mysqli_query($link, $SQL)  or
    die(myError(__FILE__, __LINE__, mysqli_error($iConn)));


if (mysqli_num_rows($result) > 0) :
    while ($row = mysqli_fetch_assoc($result)) : ?>
        <ul>
            <li>For more information about <a href="people-view.php?id=<?= $row["ID"] ?>"><?= $row['firstName'] ?></a></li>
            <li><b>First Name:</b><?= $row['firstName'] ?></li>
            <li><b>Last Name:</b><?= $row['lastName'] ?></li>
            <li><b>Occupation:</b><?= $row['occupation'] ?></li>
        </ul>
    <?php endwhile;
else : ?>
    <ul>
        <li>NO DATA</li>
    </ul>
<?php endif; ?>
<?php
mysqli_free_result($result);
mysqli_close($link);
?>
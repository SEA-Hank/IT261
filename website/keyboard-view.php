<?php
include "./includes/config.php";
$id =  isset($_GET["id"]) ? $_GET["id"] : "";
if (empty($id)) {
    redirect('keyboards.php');
}

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or
    die(myError(__FILE__, __LINE__, mysqli_connect_error()));

$id = mysqli_real_escape_string($link, $id);

$SQL = "select * from keyboards where ID = " . $id;

$result = mysqli_query($link, $SQL)  or
    die(myError(__FILE__, __LINE__, mysqli_error($link)));

if (mysqli_num_rows($result) == 0) {
    mysqli_free_result($result);
    mysqli_close($link);
    redirect('keyboards.php');
}

$row = mysqli_fetch_assoc($result);
$name = $row["name"];
// $brand  = $row["brand"];
// $modelnumber = $row["modelnumber"];
// $weight = $row["weight"];
// $dimensions = $row["dimensions"];
// $color = $row["color"];
// $price = $row["price"];
// $size = $row["size"];
// $keytype = $row["keytype"];
function getImage($name)
{
    return str_replace(" ", "_", $name) . ".jpg";
}
?>
<?php include './includes/header.php' ?>
<main id="keyborad-view">
    <div class="content">
        <div id="kb-view-left">
            <img src="./images/keyboards/<?= getImage($name) ?>" alt="<?= $name ?>">
        </div>
        <div id="kb-view-right">
            <p><?= $name ?></p>
            <table>
                <?php foreach ($row as $key => $value) :
                    if ($key == "ID" || $key == "name") {
                        continue;
                    }

                ?>
                    <tr>
                        <td class="td-label"><?= ucfirst($key) ?></td>
                        <td class="td-value"><?= $value ?></td>
                    </tr>
                <?php endforeach;
                mysqli_free_result($result);
                mysqli_close($link); ?>
            </table>
        </div>
    </div>
</main>
<?php include './includes/footer.php' ?>
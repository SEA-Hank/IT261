<?php
include "./includes/config.php";
$id = isset($_GET["id"]) ? $_GET["id"] : "";
if (empty($id)) {
    redirect("./cities.php");
}
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or
    die(myError(__FILE__, __LINE__, mysqli_connect_error()));

$id = mysqli_real_escape_string($link, $id);
$sql  = "select * from cities where ID = " . $id;

$result = mysqli_query($link, $sql)  or
    die(myError(__FILE__, __LINE__, mysqli_error($link)));

if (mysqli_num_rows($result) == 0) {
    mysqli_free_result($result);
    mysqli_close($link);
    redirect("./cities.php");
}

$cityInfo = mysqli_fetch_assoc($result);

include "./includes/header.php";
?>
<div id="city-view-wrapper">
    <p id="city-title"><?= $cityInfo["name"] ?>, <?= $cityInfo["state"] ?></p>
    <div id="image-wrapper">
        <img src="./images/cities/<?= $cityInfo["ID"] ?>.jpeg" alt="<?= $cityInfo["name"] ?>">
    </div>
    <div id="features">
        <ul>
            <li><b>Taxes:</b> <?= $cityInfo["ID"] ?></li>
            <li><b>Median Home Price:</b> $ <?= number_format($cityInfo["median_home_price"]) ?></li>
            <li><b>Median Monthly Rent:</b> $ <?= number_format($cityInfo["median_monthly_rent"]) ?></li>
            <li><b>Average Temps:</b> <?= $cityInfo["average_temps"] ?></li>
            <li><b>Average Annual Rainfall: </b> <?= $cityInfo["average_annual_rainfall"] ?></li>
            <li><b>Special Feature:</b> <?= $cityInfo["special_feature"] ?></li>
        </ul>
    </div>
    <div id="description"><?= $cityInfo["description"] ?></div>
    <div id="information"><a href="https://www.daveramsey.com/blog/best-cities-to-retire">cities information from</a> </div>
</div>

<?php include "./includes/footer.php" ?>
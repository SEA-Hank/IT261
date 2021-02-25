<?php
include('config.php');

$id = isset($_GET["id"]) ? $_GET["id"] : "incorrect";
if (!is_numeric($id)) {
    header('Location:people.php');
}

$SQL = "select * from people where id = " . $id;

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or
    die(myError(__FILE__, __LINE__, mysqli_connect_error()));

$result = mysqli_query($link, $SQL)  or
    die(myError(__FILE__, __LINE__, mysqli_error($iConn)));

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $id = htmlentities($row["ID"]);
    $firstName = htmlentities($row["firstName"]);
    $lastName = htmlentities($row["lastName"]);
    $email = htmlentities($row["email"]);
    $occupation = htmlentities($row["occupation"]);
    $birthDay = htmlentities($row["birthDay"]);
    $description = htmlentities($row["description"]);
    $feedback = "";
} else {
    $feedback = "Nobody is home - they are out to lunch!!!";
}
if (!empty($feedback)) : ?>
    <?= $feedback ?>
<?php else : ?>
    <div style="width: 850px;margin:0px auto;">
        <main style="float:left;width:550px;padding:0px 5px">
            <h1>Yay!!! We have made it - here we are</h1>
            <h2>You are on <?= $firstName ?>'s page</h2>
            <ul>
                <li><b>First Name:</b><?= $firstName ?></li>
                <li><b>Last Name:</b><?= $lastName ?></li>
                <li><b>Occupation:</b><?= $occupation ?></li>
                <li><b>Email:</b><?= $email ?></li>
                <li><b>birthDay:</b><?= $birthDay ?></li>
            </ul>
            <p><?= $description ?></p>
            <p><a href="people.php">return to people page</a></p>
        </main>
        <aside style="float:left;width:250px;padding-top:20px">
            <img style="width: 250px;" src="./pic/pic_<?= $id ?>.jpg" alt="">
        </aside>
    </div>
<?php endif;
mysqli_free_result($result);
mysqli_close($link);
?>
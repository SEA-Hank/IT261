<?php include "./includes/config.php" ?>
<?php include './includes/header.php' ?>
<?php
date_default_timezone_set('America/Los_Angeles');
$dayArray = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
if (isset($_GET["day"])) {
    $day = $_GET["day"];
} else {
    $day = date("l");
}
if (!in_array($day, $dayArray, true)) {
    $day = date("l");
}
//$day = "Monday";
switch ($day) {
    case "Monday":
        $title = "Monster Hunter";
        $img = "MonsterHunter.jpg";
        $content = "When Lt. Artemis and her loyal soldiers are transported to a new world, they engage in a desperate battle for survival against enormous enemies with incredible powers. Feature film based on the video game by Capcom.";
        break;
    case "Tuesday":
        $title = "Tenet";
        $img = "Tenet.jpeg";
        $content = "Armed with only one word, Tenet, and fighting for the survival of the entire world, a Protagonist journeys through a twilight world of international espionage on a mission that will unfold in something beyond real time.";
        break;
    case "Wednesday":
        $title = "The Vanished";
        $img = "TheVanished.jpg";
        $content = "Story of a husband and wife that will stop at nothing to find her missing daughter, who disappeared on a family camping trip. When the police don't catch any leads, the duo take over.";
        break;
    case "Thursday":
        $title = "Cut Throat City";
        $img = "CutThroatCity.jpg";
        $content = "Set after Hurricane Katrina, four boyhood friends out of options reluctantly accept an offer to pull off a dangerous heist in the heart of New Orleans.";
        break;
    case "Friday":
        $img = "alone.jpg";
        $title = "Alone";
        $content = "A recently widowed traveler is kidnapped by a cold blooded killer, only to escape into the wilderness where she is forced to battle against the elements as her pursuer closes in on her.";
        break;
    case "Saturday":
        $img = "wonderWoman1984.jpg";
        $title = "Wonder Woman";
        $content = "Diana must contend with a work colleague and businessman, whose desire for extreme wealth sends the world down a path of destruction, after an ancient artifact that grants wishes goes missing.";
        break;
    case "Sunday":
        $title = "Joker";
        $img = "joker.jpg";
        $content = "In Gotham City, mentally troubled comedian Arthur Fleck is disregarded and mistreated by society. He then embarks on a downward spiral of revolution and bloody crime. This path brings him face-to-face with his alter-ego: the Joker.";
        break;
}

?>
<main id="daily">
    <div id="dailyLeft" class="<?= $day ?>">
        <p id="title"><?= $day ?> is <?= $title ?> Day
            <span></span>
        </p>
        <div>
            <img src="./images/<?= $img ?>" alt="<?= $title ?>">
        </div>
        <p id="instruction">
            <?= $content ?>
        </p>
    </div>
    <aside id="dailyRight">
        <!-- <img src="./images/Monday-2.jpg" alt="Monster Hunter - 2"> -->
        <div id="dailyWrapper">
            <span>Daily</span>
            <ul>
                <?php foreach ($dayArray as $key => $value) { ?>
                    <li> <a class="<?= $value ?>" href="./daily.php?day=<?= $value ?>"><?= $value ?></a> </li>
                <?php } ?>
            </ul>
        </div>
    </aside>
</main>
<?php include './includes/footer.php' ?>
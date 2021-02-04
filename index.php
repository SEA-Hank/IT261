<?php include "./config.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT261 HANK Portal Page</title>
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <div id="wrapper">
        <header>
            <p>IT 261 Hank Portal Page</p>
        </header>
        <nav>
            <ul>
                <?php foreach ($nav as $key => $value) {  ?>
                    <li class="<?= $key == $page ? "selected" : "" ?>"><a href="<?= $value ?>"> <?= $key ?> </a></li>
                <?php } ?>
            </ul>
        </nav>
        <div id="container">
            <main>
                <div id="info">
                    <img src="./images/info.jpeg" alt="myself">
                    <p> Hi, everyone! my name is yingheng he, you can also call me Hank. I love coding. I want to be a web developer in the next few years. This goal is hard to me, but I never give up
                    </p>
                    <p> I am learning the algorithms by myself, because I know that lost of it company always test interviewer's ability about algorithms.
                    </p>
                    <p> I love fishing too, I ofen go fishing with my friends or my family at the weekend. Fishing is a good sport to put us together and let me relax
                    </p>
                </div>
                <div id="screenshotWrapper">
                    <div>
                        <p>MAMP Screenshot</p>
                        <img class="screenshot" src="./images/mamp.jpg" alt="mamp">
                    </div>
                    <div>
                        <p>ERROR Screenshot</p>
                        <img class="screenshot" src="./images/error.jpg" alt="mamp">
                    </div>
                </div>
            </main>
            <aside>
                <div class="exercises">
                    <span>Week Class Exercises</span>

                    <?php foreach ($exercises as $week => $weeks) {  ?>
                        <p><?= $week ?> </p>
                        <ul>
                            <?php foreach ($weeks as $key => $value) {  ?>
                                <li><a href="<?= $value ?>"> <?= $key ?> </a></li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </div>
            </aside>
        </div>
        <footer>
            <div>
                <span>
                    Copyright 2017 - <?= date("Y") ?>
                </span>
                <span>All Rights Reserved</span>
                <span> <a class="valid" href="http://validator.w3.org/check/referer" target="_blank">Valid HTML</a></span>
                <span> <a class="valid" href="http://jigsaw.w3.org/css-validator/check?uri=referer" target="_blank">Valid CSS</a>
                </span>
            </div>
        </footer>
    </div>
</body>

</html>
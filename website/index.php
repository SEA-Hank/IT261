<?php include "./includes/config.php" ?>
<?php include './includes/header.php' ?>
<main id="home">

    <!-- <div class="content">

    </div> -->
    <div class="mainWrapper">
        <div class="main-left">
            <h1>
                Welcome to my home page
            </h1>
            <p>
                <img src="<?= randImages('home') ?>" alt="">
            </p>
        </div>
        <aside class="main-right">
            <h1>
                About me
            </h1>
            <p> Hi, everyone! my name is yingheng he, you can also call me Hank. I love coding. I want to be a web developer in the next few years. This goal is hard to me, but I never give up
            </p>
            <p> I am learning the algorithms by myself, because I know that lost of it company always test interviewer's ability about algorithms.
            </p>
            <p> I love fishing too, I ofen go fishing with my friends or my family at the weekend. Fishing is a good sport to put us together and let me relax
            </p>
        </aside>
    </div>
</main>
<?php include './includes/footer.php' ?>
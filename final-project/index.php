<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/base.css">
    <title>Document</title>
</head>

<body>
    <header>
        <div id="login-wrapper">
            <span id="span-login-info">Hello, <b>Hank</b></span>
            <span id="span-logout"> <a href="www.google.com">logout</a></span>
            <span id="span-label">Best cities for retirees</span>
        </div>
        <div id="menu-wrapper">
            <nav>
                <ul>
                    <li><a href="www.google.com">HOME</a></li>
                    <li><a href="www.google.com">SWITCH</a></li>
                    <li><a href="www.google.com">CITYS</a></li>
                    <li><a href="www.google.com">CONTACT</a></li>
                    <li><a href="www.google.com">ABOUT</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main></main>
    <footer>
        <ul>
            <li>IT 261 FINAL-PROJECT</li>
            <li>Copyright &#169; <?= date("Y") ?> </li>
            <li>All Rights Reserved</li>
            <!-- <li><a href="../index.php">Portal Page</a></li> -->
            <li><a class="valid" href="http://validator.w3.org/check/referer" target="_blank">Valid HTML</a></li>
            <li><a class="valid" href="http://jigsaw.w3.org/css-validator/check?uri=referer" target="_blank">Valid CSS</a></li>
        </ul>
    </footer>
</body>

</html>
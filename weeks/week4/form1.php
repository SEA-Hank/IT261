<?php
if (isset($_POST['name'], $_POST["email"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    echo '$name --> ' . $name . '<br>';
    echo '$email --> ' . $email;
} else {
    echo '
    <form action="" method="post">
    <label>NAME</label>
    <input type="" name="name">
    <br><br>
    <label>Email</label>
    <input type="email" name="email">
    <br><br>
    <input type="submit" value="Send it!"><br>
    <p><a href="">Reset</a></p> 
    </form>
    ';
}

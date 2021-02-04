<?php
if (isset($_POST['name'], $_POST['confirm'])) {
    $name = $_POST['name'];
    $confirm = $_POST['confirm'];

    $yes = 'unchecked';
    $no = 'unchecked';

    if ($confirm == 'yes') {
        $yes = 'checked';
        header('Location:index.php');
    } else {
        $no = 'checked';
        header('Location:member.php');
    }
} else {
    echo '
    <form action="" method="post">
    <label>Name</label>
    <input type="text" name="name">
    <label>Are you a member?</label>
    <input type="radio" name="confirm" value="yes">Yes
    <input type="radio" name="confirm" value="no">No
    <input type="submit" value="Send it">
    <p><a href="">Reset</a></p>
    </form>
    ';
}

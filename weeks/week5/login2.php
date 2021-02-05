<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Second login form</title>
    <style>
        form {
            width: 450px;
            margin: 0px auto;
        }

        label {
            padding: 5px;
            display: block;
        }

        .errorMsg {
            color: red;
            text-align: center;
        }
    </style>
</head>

<body>
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <fieldset>
            <label for="">Name: </label>
            <input type="text" name="name" id="">
            <label for="">Are you a Member?</label>
            <ul>
                <li><input type="radio" name="confirm" value="yes" id="">Yes</li>
                <li><input type="radio" name="confirm" value="no" id="">No</li>
            </ul>
            <label for="">Your password:</label>
            <input type="password" name="password" id="">
            <input type="submit" value="Confirm">
            <p><a href="">Reset</a></p>
        </fieldset>
    </form>
    <?php
    $fields_array = array(
        "name" => "Please fill out your name",
        'confirm' => "Are you a member?",
        'password' => 'Please fill out your password'
    );
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $isfieldsReady = true;
        foreach ($fields_array as $key => $value) {
            if (empty($_POST[$key])) {
                $isfieldsReady = false;
                echo "<p class='errorMsg'>$value</p>";
            }
        }
        if ($isfieldsReady) {
            $name = $_POST["name"];
            $confirm = $_POST["confirm"];
            $password = $_POST["password"];
            if ($confirm === 'yes' && $password === 'password') {
                header('Location:index.php');
            } else {
                header('Location:becomemember.php');
            }
        }
    }
    ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our First Form</title>
    <style>
        * {
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
        }

        form {
            width: 400px;
            margin: 0px auto;
            margin-bottom: 50px;
        }

        fieldset {
            padding: 10px;
        }

        label {
            display: block;
            padding: 5px;
        }

        input {
            display: block;
            margin-bottom: 10px;
        }

        input[type=text],
        input[type=email] {
            width: 100%;
            height: 30px;
        }

        textarea {
            width: 100%;
            height: 150px;
            margin-bottom: 10px;
        }

        ul {
            background-color: beige;
            /* padding: 50px 0px; */
            display: block;
            margin: 0px auto;
            width: 400px;
        }

        li {
            list-style: none;
            padding: 5px;
        }

        .error {
            text-align: center;
            font-size: 1.5em;
            color: red;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <fieldset>
            <label>First Name</label>
            <input type="text" name="firstName">
            <label>Last Name</label>
            <input type="text" name="lastName">
            <label>Email</label>
            <input type="Email" name="email">
            <label>Comments</label>
            <textarea name="comments" id="comments"></textarea>
            <input type="submit" value="submit">
            <p><a href="">Reset</a></p>
        </fieldset>
    </form>
    <?php
    if (isset($_POST["firstName"],
    $_POST["lastName"],
    $_POST["email"],
    $_POST["comments"])) {
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $comments = $_POST["comments"];
        if (empty($firstName && $lastName && $email && $comments)) {
            echo '<p class=\'error\'>We have a problem! Please fill in all fields.</p>';
        } else {
            echo '<ul>';
            echo '<li><b>firstName : </b>' . $firstName . '</li>';
            echo '<li><b>lastName : </b>' . $lastName . '</li>';
            echo '<li><b>email : </b>' . $email . '</li>';
            echo '<li><b>comments : </b>' . $comments . '</li>';
            echo '</ul>';
        }
    }
    ?>
</body>

</html>
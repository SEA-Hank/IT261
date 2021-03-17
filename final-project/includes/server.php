<?php
$isStick = true;
$showError = $_SERVER["REQUEST_METHOD"] === 'POST';
//$showError = false;
$fileName = basename($_SERVER['PHP_SELF']);
if ($fileName === "register.php") {
    $form_config = array(
        "firstName" => array(
            "display" => "First Name",
            "msg" => "First Name is required",
            "htmlType" => "text",
            "placeholder" => "first name"
        ),
        "lastName" => array(
            "display" => "Last Name",
            "msg" => "Last Name is required",
            "htmlType" => "text",
            "placeholder" => "last name"
        ),
        "Email" => array(
            "msg" => array(
                "isEmpty" => "Email is required",
                "existData" => "Email already exists"
            ),
            "htmlType" => "text",
            "placeholder" => "email"
        ),
        "UserName" => array(
            "msg" => array(
                "isEmpty" => "User name is required",
                "existData" => "Username already exists"
            ),
            "htmlType" => "text",
            "placeholder" => "username"
        ),
        "password" => array(
            "msg" => "Password is required",
            "htmlType" => "password",
            "placeholder" => "password"
        ),
        "confirm_password" => array(
            "display" => "Confirm Password",
            "msg" => array(
                "isPasswordMatch" => "Passwords do not match!"
            ),
            "htmlType" => "password",
            "placeholder" => "password"
        ),
    );
} else {
    $form_config = array(
        "UserName" => array(
            "msg" => "User name is required",
            "htmlType" => "text",
            "placeholder" => "username"
        ),
        "password" => array(
            "msg" => "Password is required",
            "htmlType" => "password",
            "placeholder" => "password"
        )
    );
}



$form_status = checkFieldsStatus($form_config);

if (isset($_POST["reg_user"])) {
    if (count($form_status["errorMsg"]) == 0) {

        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or
            die(myError(__FILE__, __LINE__, mysqli_connect_error()));

        ConvertToSQLString($link, $form_status);

        $firstName = $form_status["firstName"];
        $lastName = $form_status["lastName"];
        $UserName = $form_status["UserName"];
        $Email = $form_status["Email"];
        $password = md5($form_status["password"]);

        $insertSQL = "insert into Users(firstname,lastname,username,email,password) 
                                        value('$firstName','$lastName','$UserName','$Email','$password')";

        mysqli_query($link, $insertSQL)  or
            die(myError(__FILE__, __LINE__, mysqli_error($link)));

        mysqli_close($link);

        $_SESSION['reg_succeeded'] = "reg_succeeded";

        header("Content-type: text/html; charset=utf-8");
        header("Location:login.php");
        exit();
    }
}


if (isset($_POST["login_user"]) && count($form_status["errorMsg"]) == 0) {
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or
        die(myError(__FILE__, __LINE__, mysqli_connect_error()));

    ConvertToSQLString($link, $form_status);

    $password = md5($form_status["password"]);
    $UserName = $form_status["UserName"];
    $sql = "select * from Users where password='$password' and username='$UserName'";

    $result = mysqli_query($link, $sql)  or
        die(myError(__FILE__, __LINE__, mysqli_error($link)));

    if (mysqli_num_rows($result) > 0) {

        $_SESSION["UserName"] = $UserName;
        $_SESSION["success"] = "You are now logged in!";

        mysqli_free_result($result);
        mysqli_close($link);

        header("Content-type: text/html; charset=utf-8");
        header("Location:index.php");
        exit();
    } else {
        $form_status["errorMsg"]["dataError"] = array("Wrong UserName/Password combo");
    }
    mysqli_free_result($result);
    mysqli_close($link);
}

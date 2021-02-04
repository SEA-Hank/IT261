<html>

<head>
    <title>My Adder Assignment</title>
    <style>
        body {
            text-align: center;
        }

        h1 {
            color: green;
        }

        form {
            text-align: left;
            border: 1px solid red;
            width: 400px;
            margin: 0px auto;
            padding: 10px;
        }

        input[type=text] {
            margin-left: 10px;
        }

        .message {
            font-weight: bolder;
            font-size: 20px;
        }
    </style>
</head>

<body>

    <h1>Adder.php</h1>
    <form action="" method="post">
        <label>Enter the first number:</label><input type="text" name="num1"><br><br>
        <label>Enter the second number:</label><input type="text" name="num2"><br><br>
        <input type="submit" value="Add Em!!">
    </form>

    <?php //adder-wrong.php
    if (isset($_POST['num1'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        if (
            trim($num1) === "" || trim($num2) === ""
        ) {
            echo '<p class="message">Please fill out the fields</p>';
        } elseif (!is_numeric($num1) || !is_numeric($num2)) {
            echo '<p class="message">Please input numbers</p>';
        } else {
            $int_num1 = (int)$num1;
            $int_num2 = (int)$num2;
            $myTotal =  $int_num1  + $int_num2;
            echo "<p style='font-size:18px'>Casting Floats to Intgegers: int($num1) = $int_num1 and int($num2) = $int_num2</p>";
            echo '<h2>You added ' . $int_num1 . ' and ' . $int_num2 . '</h2>';
            echo "<p style=\"color:red\"> and the answer is <br>" . $myTotal . "!</p>";
            echo '<p><a href="">Reset page</a></p>';
        }
    }
    ?>
    <!-- For Extra Credit
    
    1. output 'Please fill out the fields' when you don't input anything. 

    2. soutput 'Please input numbers' when you don't input numbers.

    3. Casting Floats to Intgegers
     -->


    <!-- Error 1 HTML ERROR : <\form action=""> change to  <form action="" method="post"> -->
    <!-- Error 2 HTML ERROR : Enter the first number:</label> change to   <label>Enter the first number:</label>  -->
    <!-- Error 3 HTML ERROR : </label>Enter the second number: change to    <label>Enter the second number:</label> -->
    <!-- Error 4 Case Sensitive : name="Num1" change to name="num1" -->
    <!-- Error 5 Case Sensitive : $num1 + $Num2 change to  $num1 + $num2 -->
    <!-- Error 6 logical Error :  $myTotal -= $num1 + $num2; change to $myTotal = $num1 + $num2;-->
    <!-- Error 7 PHP syntax: </?php//adder-wrong.php change to </?php //adder-wrong.php -->
    <!-- Error 8 HTML ERROR & String combine ERROR:
            echo '<h2>You added ". $num1 ." and .$num2. '"';
            echo ' <p> and the answer is <br>
            <style="color:red;">" $myTotal ."!"</p>;
            echo'<p><a href="">Reset page</a>'

            CHANGE TO 

            echo '<h2>You added ' . $num1 . ' and ' . $num2 . '</h2>';
            echo "<p style=\"color:red\"> and the answer is <br>" . $myTotal . "!</p>";
            echo '<p><a href="">Reset page</a></p>';
    -->
    <!-- Error 9 move the php to under the </form> tag  -->
    <!-- Error 10 Html error </html>';{?> change to </html> -->
    <!-- Add some styles -->
</body>

</html>
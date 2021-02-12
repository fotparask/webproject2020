<!DOCTYPE html>

<html>

<head>
<meta charset="utf-8">
<title>DatAnalysis Sign-up</title>
<link rel="stylesheet" type="text/css" href="styling.css">
</head>


<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "webproject";

$email = "";
$username = "";
$password = "";

$email_exists = '';     //var to check if email aleady exists
$username_exists = '';  //var to check if username aleady exists



if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        echo "
            <script>alert('You entered an invalid email!');</script>
        ";
    }
    elseif(!preg_match("/^[a-zA-Z0-9-' ]*$/",$_POST["username"])) {
        echo "
            <script>alert('Please enter a valid username.');</script>
        ";
    }
    elseif(!preg_match("/^[a-zA-Z0-9-' ]*$/",$_POST["password"])) {
        echo "
            <script>alert('Please enter a valid password.');</script>
        ";
    }
    else{

        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);


        //Create connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        //Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT email FROM users WHERE email='$email'";
        $result1 = $conn->query($sql);
        $sql = "SELECT username FROM users WHERE username='$username'";
        $result2 = $conn->query($sql);

        if ($result1->num_rows > 0) {
            $email_exists = "Email already exists.";
        }
        elseif($result2->num_rows > 0) {
            $username_exists = "User already exists.";
        }
        else{

            $sql = "INSERT INTO users (email, username, password)
            VALUES ('$email', '$username', '$hashed_pwd');";

            if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id;
                echo "
                    <script>alert('New user created successfully');</script>
                ";
            }
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();

    }
}


?>


<body>
   
<table class="main_frame">
    <tr>
        <th>
            <table class="outer_frame">
                <tr>
                    <th>
                        <table class="inner_frame">
                            <tr>
                                <th>
                                    <table class="categories_frame">
                                        <tr>
                                            <th> 
                                                <table>
                                                    <tr>
                                                        <th>
                                                            <table class="logo_frame">
                                                                <tr>
                                                                    <th>
                                                                        <img src= "https://media-exp1.licdn.com/dms/image/C560BAQHFiK3xdd_AwQ/company-logo_200_200/0/1588679357791?e=2159024400&v=beta&t=6EeGhyA9B187tOqDx9-BUocBYo49-QYE3LxcGOTTLm8" width=70% alt="logo_image">
                                                                    </th>
                                                                </tr>
                                                            </table>
                                                        </th>
                                                    </tr>
                                                </table>
                                                <table class="question-frame">
                                                    <tr>
                                                        <th>
                                                            <table class="question">
                                                                <tr>
                                                                    <th>
                                                                        Already have an account? Go and log in by
                                                                        <a href="sign_in.php">clicking here</a>
                                                                    </th>
                                                                </tr>
                                                            </table>
                                                        </th>
                                                    </tr>
                                                </table>
                                            </th>
                                            <th>
                                                <table class="form">
                                                    <tr>
                                                        <th>
                                                            <form action = "" method = "post">
                                                                <table class="tab-header-frame">
                                                                    <tr>
                                                                        <th>
                                                                            <table class="tab-header">
                                                                                <tr>
                                                                                    <th>
                                                                                        Sign Up
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                                <table class="tab-content-frame">
                                                                    <tr>
                                                                        <th>
                                                                            <table class="tab-content">
                                                                                <tr>
                                                                                    <th>
                                                                                        <table class="form-element-frame">
                                                                                            <tr>
                                                                                                <th>
                                                                                                    <table class="form-element">
                                                                                                        <tr>
                                                                                                            <th>
                                                                                                            <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Email" required />
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                    <table>
                                                                                                        <tr>
                                                                                                            <th>
                                                                                                                <?php echo "<p style='color:red; font-size: 10px;'>" . $email_exists . "</p>"; ?>
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                </th>
                                                                                            </tr>
                                                                                        </table>
                                                                                        <table class="form-element-frame">
                                                                                            <tr>
                                                                                                <th>
                                                                                                    <table class="form-element">
                                                                                                        <tr>
                                                                                                            <th>
                                                                                                                <input type="text" placeholder="Username" name = "username">
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                    <table>
                                                                                                        <tr>
                                                                                                            <th>
                                                                                                                <?php echo "<p style='color:red; font-size: 10px;'>" . $username_exists . "</p>"; ?>
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                </th>
                                                                                            </tr>
                                                                                        </table>
                                                                                        <table class="form-element-frame">
                                                                                            <tr>
                                                                                                <th>
                                                                                                    <table class="form-element">
                                                                                                        <tr>
                                                                                                            <th>
                                                                                                            <input type="password" id="psw" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                </th>
                                                                                            </tr>
                                                                                        </table>
                                                                                        <table class="form-element-frame">
                                                                                            <tr>
                                                                                                <th>
                                                                                                    <table class="form-element">
                                                                                                        <tr>
                                                                                                            <th>
                                                                                                            <input type="password" id="psw" name="password" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                </th>
                                                                                            </tr>
                                                                                        </table>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <th>
                                                                                                    <input class="login" type="submit" name="submit" value = "Create Account" />
                                                                                                </th>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </form>
                                                        </th>
                                                    </tr>
                                                </table>
                                            </th>
                                        </tr>
                                    </table>
                                </th>
                            </tr>
                        </table>
                    </th>
                </tr>
            </table>
        </th>
    </tr>
</table>

</body>

</html>
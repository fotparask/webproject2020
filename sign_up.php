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


<html>

  <head>
    <meta charset="utf-8">
    <title>HARcules Register </title>
    <link rel="stylesheet" href="style-form.css">
  </head>

  <body>
    <div class="logo_img">
        <a href="firstindex.php" class="im" > <img src="HARcules Logo-01.png" width="400px"> </a>
    </div>
    <div class="center">
      <h1>Εγγραφή</h1>
      <form method="post" action="sign_up.php">
        <div class="txt_field">
          <input type="email" name="email" id="email" required>
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="text" name="username" id="username" required>
          <span></span>
          <label>Όνομα Χρήστη</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" id="password" required>
          <span></span>
          <label>Κωδικός</label>
        </div>
        <div class="txt_field">
            <input type="password" name="secondPassword" id="secondPassword" required>
            <span></span>
            <label>Επιβεβαίωση Κωδικού</label>
        </div>
        <input type="submit" value="Εγγραφή" name="register" id ="register">
        <div class="signup_info">
        Όλα τα πεδία είναι υποχρεωτικά
        </div>
        <div class="signup_link">
          Είσαι ήδη μέλος; <a href="sign_in.php">Σύνδεση</a>
        </div>
      </form>
    </div>

  </body>


  <script type="text/javascript">

    function validateEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }


    function validateUsername(username) {
        const re = /^[a-zA-Z0-9-' ]*$/;
        return re.test(String(username).toLowerCase());
    }


    function validatePassword(password) {
        const re = /^[a-zA-Z0-9-' ]*$/;
        return re.test(String(password).toLowerCase());
    }

    $(document).ready(function () {
        $("#login").on('click',function() {
            let email = $("#email").val();
            let password = $("#password").val();
            
            if (!validateEmail(email)) {
                alert('Please enter a valid email.');
            }
            else if(!validatePassword(password)) {
                alert('Please enter a valid password.');
            }
            else{
                $.ajax(
                    {
                        url: 'index.php',
                        type: 'post',
                        data: {
                            login: 1,
                            userEmail: email,
                            userPassword: password
                        },
                        success: function (response) {
                            console.log("Ajax call succeded");
                        }
                    }
                );
            }
        })
    });

</script>


</html>
<?php

    if ($_POST['register']){


        $email = $_POST["ajaxEmail"];
        $username = $_POST["ajaxUsername"];
        $password = $_POST["ajaxPassword"];
        $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);


        include "database_config.php";

        $sql = "SELECT email FROM users WHERE email='$email'";
        $result1 = $conn->query($sql);
        $sql = "SELECT username FROM users WHERE username='$username'";
        $result2 = $conn->query($sql);

        if ($result1->num_rows > 0) {
            echo("Email already exists.");
        }
        elseif($result2->num_rows > 0) {
            echo("User already exists.");
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
?>


<html>

  <head>
    <meta charset="utf-8">
    <title>HARcules Register </title>
    <link rel="stylesheet" href="style-form.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>

  <body>
    <div class="logo_img">
      <img src="images/Logo-01.png" width="400px">
    </div>
    <div class="center">
      <h1>Register</h1>
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
        <input type="button" value="Εγγραφή" name="register" id ="register">
        <div class="signup_info">
        Όλα Τα πεδία με είναι υποχρεωτικά
        </div>
        <div class="signup_link">
          Είσαι ήδη μέλος; <a href="sign_in.php">Signin</a>
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
        $("#register").on('click',function() {
            let email = $("#email").val();
            let username = $("#username").val();
            let password = $("#password").val();
            let secondPassword = $("#secondPassword").val();
            
            if (!validateEmail(email)) {
                alert('Please enter a valid email.');
            }
            else if(!validateUsername(username)) {
                alert('Please enter a valid password.');
            }
            else if(!validatePassword(password)) {
                alert('Please enter a valid password.');
            }
            else if(secondPassword != password) {
                alert('Password do not match.');
            }
            else{
                $.ajax(
                    {
                        url: 'sign_up.php',
                        type: 'post',
                        data: {
                            register: 1,
                            ajaxEmail: email,
                            ajaxUsername: username,
                            ajaxPassword: password
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
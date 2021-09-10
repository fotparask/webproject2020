<?php

    if($_POST['login']) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        include "database_config.php";


        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);
            
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_pwd = $row['password'];
            
            if(password_verify($password ,$hashed_pwd)){
              $conn->close();
              echo("Login succeded.");
              session_start();
              $_SESSION["username"] = $row['username'];
              $_SESSION["email"] = $row['email'];
              header("Location: main_page/index.php");
              exit;
            }
            else{
              echo "
              <script>alert('Password is incorrect.');</script>
              ";
            }  
        }
        else {
          echo "
          <script>alert('Email does not exist.');</script>
      ";
        }
        
        $conn->close();

    }
?>

<html>

  <head>
    <meta charset="utf-8">
    <title>HARcules Login</title>
    <link rel="stylesheet" href="style-form.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>

  <body>
    <div class="logo_img">
      <a href="index.html" class="im" > <img src="images\HARcules Logo-01.png" width="400px"> </a>
    </div>
    <div class="center">
      <h1>Login</h1>
      <form method='post' name='loginForm' onsubmit="javascript: startAjax(); return false;">
        <div class="txt_field">
          <input type="email" name="email" id="email" required>
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" id ="password" required>
          <span></span>
          <label>Κωδικός</label>
        </div>
        <div class="pass">Ξέχασες τον κωδικό;</div>
        <input type="submit" value="Σύνδεση" name="login" id ="login">
        <div class="signup_link">
          Δεν είσαι μέλος; <a href="sign_up.php">Εγγραφή</a>
        </div>
      </form>
    </div>

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
      function startAjax(){
            
            if (!validateEmail(email)) {
                alert('Please enter a valid email.');
            }
            else if(!validatePassword(password)) {
                  alert('Please enter a valid password.');
            }
            else{
                $.ajax(
                    {
                        url: 'sign_in.php',
                        method: 'POST',
                        data: {
                            login: 1,
                            ajaxEmail: $("#email").val(),
                            ajaxPassword: $("#password").val()
                        },
                        success: function (response) {
                            console.log("Ajax call succeded");
                            document.loginForm.submit();
                        }
                    }
                );
            }
      }
    });

    </script>
   

  </body>
 
</html>

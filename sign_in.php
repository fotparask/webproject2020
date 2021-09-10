<?php

    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "webproject";

    if($_POST['userEmail']) {

        $email = $_POST['userEmail'];
        $password = $_POST['userPassword'];

        //Create connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        //Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);
            
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_pwd = $row['password'];
            
            if(password_verify($password ,$hashed_pwd)){
                $conn->close();
                // session_start();
                // $_SESSION["username"] = $row['username'];
                // $_SESSION["email"] = $row['email'];
                echo("Login succeded.");
            }
            else{
                echo("The password is incorect.");
            }  
        }
        else {
            echo("User does not exist");
        }
        
        $conn->close();

    }
?>

<html>

  <head>
    <meta charset="utf-8">
    <title>HARcules Login</title>
    <link rel="stylesheet" href="style-form.css">
  </head>

  <body>
    <div class="logo_img">
      <a href="firstindex.php" class="im" > <img src="HARcules Logo-01.png" width="400px"> </a>
    </div>
    <div class="center">
      <h1>Σύνδεση</h1>
      <form method="post" action="sign_in.php">
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
   

  </body>
 
</html>

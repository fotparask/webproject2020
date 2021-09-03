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
<title>DatAnalysis Login</title>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>



<body>
   
    <form method="post" action="index.php">
        <input type="Email" placeholder="Email" name="email" id ="email"> <br>
        <input type="password" placeholder="Password" name="password" id ="password"> <br>
        <input type="button" value="login" name="login" id ="login">
    </form>
    
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
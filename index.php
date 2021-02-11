<!DOCTYPE html>

<html>

<head>

<meta charset="utf-8">
<title>DatAnalysis</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="styling.css">

</head>


<?php

    $email = "";
    $real_pwd_hash = "";
    $password = "";
    $wrong_pwd = "";
    $wrong_user = "";

    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "webproject";
    //dfgdfg
    

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        if (!preg_match("/^[a-zA-Z0-9-' ]*$/",$_POST["username"])) {
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

            $username = $_POST["username"];
            $password = $_POST["password"];
            $hashed_pwd = '';

            //Create connection
            $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

            //Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM users WHERE username='$username'";
            $result = $conn->query($sql);
              
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $hashed_pwd = $row['password'];
                
                if(password_verify($password ,$hashed_pwd)){
                    $conn->close();
                    exit(header("Location: ./main_page/index.html"));
                }
                else{
                    $wrong_pwd = "The password is incorect.";
                }  
            }
            else {
                $wrong_user = "User does not exist";
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
                                                                <table  class="logo_frame">
                                                                    <tr>
                                                                        <th>
                                                                            <img src="https://media-exp1.licdn.com/dms/image/C560BAQHFiK3xdd_AwQ/company-logo_200_200/0/1588679357791?e=2159024400&v=beta&t=6EeGhyA9B187tOqDx9-BUocBYo49-QYE3LxcGOTTLm8" width=70% alt="logo_image">
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
                                                                            Don't you have an account? Join us
                                                                            <a href="sign_up.php"> here</a>
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
                                                                <table class="tab-header-frame">
                                                                    <tr>
                                                                        <th>
                                                                            <table class="tab-header">
                                                                                <tr>
                                                                                    <th>
                                                                                        Log in
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                                <table class="tab-content-frame">
                                                                    <tr>
                                                                        <th>
                                                                            <form action=""  method = "post">
                                                                                <table class="tab-content">
                                                                                    <tr>
                                                                                        <th>
                                                                                            <table class="form-element-frame">
                                                                                                <tr>
                                                                                                    <th>
                                                                                                        <table>
                                                                                                            <tr>
                                                                                                                <th>
                                                                                                                    <input type="text" placeholder="Username" name = "username" required>
                                                                                                                </th>
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                        <table>
                                                                                                            <tr>
                                                                                                                <th>
                                                                                                                    <?php echo "<p style='color:red; font-size: 10px;'>" . $wrong_user . "</p>"; ?>
                                                                                                                </th>
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </table>
                                                                                            <table>
                                                                                                <tr>
                                                                                                    <th>
                                                                                                        <table class="form-element">
                                                                                                            <tr>
                                                                                                                <th>
                                                                                                                    <table class="wrapper">
                                                                                                                        <tr>
                                                                                                                            <th>
                                                                                                                                <table>
                                                                                                                                     <input class= "pswrd" type="Password" placeholder="Password" name = "password" required>
                                                                                                                                </table>
                                                                                                                                <table>
                                                                                                                                    <span class="show">SHOW</span>
                                                                                                                                </table>
                                                                                                                            </th>
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                    <table>
                                                                                                                        <tr>
                                                                                                                            <th>
                                                                                                                                <?php echo "<p style='color:red; font-size: 10px;'>" . $wrong_pwd . "</p>"; ?>
                                                                                                                            </th>
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                </th>
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </table>
                                                                                            <table>
                                                                                                <tr>
                                                                                                    <th>
                                                                                                        <input class="login" type="submit" name="submit" value="LOGIN" />
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
            </th>
        </tr>
    </table> 
    
    <script>
        var input = document.querySelector('.pswrd');
        var show = document.querySelector('.show');
        show.addEventListener('click', active);
        function active(){
            if(input.type === "password"){
            input.type = "text";
            show.style.color = "#ce2e2e";
            show.textContent = "HIDE";
            }else{
            input.type = "password";
            show.textContent = "SHOW";
            show.style.color = "#4a4a4a";
            }
        }
    </script>



</body>

</html>
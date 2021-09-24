<?php

    session_start();

    if(!isset($_SESSION['username'])) {
        header("Location: ../index.html");
        exit();
    }

    $sessionUsername = $_SESSION['username'];


    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = $_POST['username'];
        $old_password = $_POST['oldPassword'];
        $new_password = $_POST['newPassword'];
        $hashed_pwd = "";
        

        include "../database_config.php";


        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql);
            
        if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();
            $hashed_pwd = $row['password'];
            
            if(password_verify($password ,$hashed_pwd)){
                $sql = "UPDATE users SET password='$new_password' WHERE username='$username';";
                if ($conn->query($sql) === TRUE) {
                    echo "
                    <script>alert('Password changed successfuly');</script>
                    ";
                }
            }
            else{
                echo "
                    <script>alert('You entered a wrong password.');</script>
                    ";
            }  

        }
        else {
            echo "
              <script>alert('User does not exist.');</script>
              ";
        }

        $conn->close();
    }  
    
?>

<html lang="=el">

    <head>
        <title>HARcules</title>
        <meta charshet="UTF-8">
        
        <meta name="viewport" content="width=devise-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="">
    
        <link rel="stylesheet" href="style-main.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>


<body>
    
    <script src="script.js"> </script>
    
    <header class="first_all">
      
    <a href="index.php" class="im" > <img src="../images/logo.png" alt="logo image"> </a>


    <nav class="the_navbar">   

        <a href="harFiles/uploadFiles.php"> Upload Δεδομένων </a> 

        <a href="editProfile.php"> Διαχείριση Προφίλ </a> 

        <a href="#"> Οπτικοποίηση Δεδομένων </a> 

        <a href="../logout.php" onclick="return confirm('ΕΙΣΤΕ ΣΙΓΟΥΡΟΣ;');"> Αποσύνδεση </a>


    </nav>
           
            <div class="navbar_icons"> 
                    
                    <div class= "menu" > <img src="../images/menu.jpeg" alt="menu image" height= "21.5px" width="23px";></div>
                
            </div>

    </header>

    <div id="page-container">
        <div class="ban">
            <form method='post' name='changePassForm' onsubmit="javascript: startAjax(); return false;">
           
                <div class="lcolumn">  
                    
                    <br>
                    <h3>Αλλαγή <span>Κωδικού</span></h3>

                    <h3>
                        <br>
                        <div class= "form">
                            <div class= "labels">
                            <label for="username"> Όνομα χρήστη:</label> <br>
                            <label for="password"> Παλιός κωδικός:</label> <br>
                            <label for="password"> Νέος κωδικός:</label> <br>
                            <label for="password"> Νέος κωδικός:</label> <br>
                            </div>

                            
                            <div class= "inputs">
                                <input type="text" placeholder="Όνομα χρήστη" name="username" id="username"> <br>
                            
                                <input type="password" placeholder="Παλιός κωδικός" name="oldPassword" id="oldPassword"> <br>
                            
                                <input type="password" placeholder="Νέος κωδικός" name="newPassword" id="newPassword"> <br>
                            
                                <input type="password" placeholder="Νέος κωδικός" name="confirmPassword" id="confirmPassword"> <br>
                            
                            </div>
                        </div>
                    </h3>
                        
                </div>

                
                <div class= "remember">
                    <input type="checkbox"> Θυμήσου με 
                </div>

                <br>
                <!--
                <a href="index3.html" target="blank" >  Ξεχάσατε τον παλιό κωδικό; </a>
                -->
                <br>
        
                <div class= "newbutton">
                <div class="buttons">
                    <button type="submit" class="primier" name="changePass" id ="changePass"> Αλλαγή Κωδικού </button>
                </div>
                </div>

            </form>

        </div>
   

    </div>
    <div class="footer">
        <footer>
            <p> &copy; HARcules Copyright 2021</p>
        </footer>
    </div>   
</div>

    <script type="text/javascript">

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
             

            let username = $("#username").val();
            let oldPassword = $("#oldPassword").val();
            let newPassword = $("#newPassword").val();
            let confirmPassword = $("#confirmPassword").val();

            if (!validateUsername(username)) {
                alert('Please enter a valid username.');
            }
            else if(!validatePassword(password)) {
                alert('Please enter a valid password.');
            }
            else if(newPassword != confirmPassword){
                alert('Passwords do not match.');
            }
            else{
                $.ajax(
                    {
                        url: 'changePassword.php',
                        method: 'POST',
                        data: {
                            login: 1,
                            ajaxPassword: $("#password").val(),
                            ajaxUsername: $("#username").val()
                        },
                        success: function (response) {
                            console.log("Ajax call succeded");
                            document.changePassForm.submit();
                        }
                    }
                );
            }
       }
    });

    </script>
       
</body>

</html>
<?php

    session_start();

    if(!isset($_SESSION['username'])) {
        header("Location: ../index.html");
        exit();
    }

    $sessionUsername = $_SESSION['username'];




    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $old_username = $_POST["oldUsername"];
        $new_username = $_POST["newUsername"];
        $password = $_POST["password"];
        $hashed_pwd = "";
        

        include "../database_config.php";


        $sql = "SELECT * FROM users WHERE username='$old_username'";
        $result = $conn->query($sql);
            
        if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();
            $hashed_pwd = $row['user_password'];
            
            if(password_verify($password ,$hashed_pwd)){
                $sql = "UPDATE users SET username='$new_username' WHERE username='$old_username';";
                if ($conn->query($sql) === TRUE) {
                    echo "
                    <script>alert('Username changed successfuly');</script>
                    ";
                }
                $conn->close();
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
<!DOCTYPE html>
<html lang="=el">


  
<head>
    <title>website</title>
    <meta charshet="UTF-8">
    <meta name="viewport" content="width=devise-width, initial-scale=1.0">
    <title>website</title> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <link rel="stylesheet" href="style-main.css">

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

    <div class="ban">
        <form method='post' name='changePassForm' onsubmit="javascript: startAjax(); return false;">

            <div class="lcolumn">  
                
                <br>
                <h5>Αλλαγή <span>Ονόματος Χρήστη</span></h5>

                <h3>
                    <br>
                    <div class= "form">
                        <div class= "labels">
                        <label for="username"> Παλιό όνομα χρήστη:</label> <br>
                        <label for="username"> Νέο όνομα χρήστη:</label> <br>
                        <label for="username"> Επιβεβαίωση ονόματος:</label> <br>
                        <label for="password"> Κωδικός:</label><br>
                    </div>
            
                    <div class= "inputs">
                        <input type="text" placeholder="Παλιό όνομα χρήστη" name="oldUsername" id="oldUsername"> <br>
                        <input type="text" placeholder="Νέο όνομα χρήστη" name="newUsername" id="newUsername">  <br>
                        <input type="text" placeholder="Επιβεβαίωση ονόματος" name="confirmUsername" id="confirmUsername">   <br>
                        <input type="password" placeholder="Κωδικός" name="password" id="password">  <br>
                    </div>
                    
                </h3>
                </div>
            </div>

            
            <br>
            <br>
            
            <div class= "newbutton">
            <div class="buttons">
                <button type="submit" class="primier" name="changeUser" id ="changeUser"> Αλλαγή Ονόματος Χρήστη </button>
            </div>
            </div>

        </form>        
    </div>

    
    <div class="footer">
        <footer>
            <p> &copy; HARcules Copyright 2021</p>
        </footer>
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


    function startAjax(){
            

        let oldUsername = $("#oldUsername").val();
        let newUsername = $("#newPassword").val();
        let password = $("#password").val();

        if (!validateUsername(username)) {
            alert('Please enter a valid username.');
        }
        else if(!validatePassword(password)) {
            alert('Please enter a valid password.');
        }
        else if(newUsername != confirmUsername){
            alert('Usernames do not match.');
        }
        else{
            document.changePassForm.submit();
            $.ajax(
                {
                    url: 'changeUsername.php',
                    method: 'POST',
                    data: {
                        login: 1,
                        ajaxPassword: $("#password").val(),
                        ajaxUsername: $("#newUsername").val()
                    },
                    success: function (response) {
                        console.log("Ajax call succeded");
                        document.changePassForm.submit();
                    }
                }
            );
        }
    }

    </script>
       
</body>

</html>
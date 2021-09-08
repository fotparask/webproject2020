<?php

    $old_username = "";
    $new_username = "";
    $confirm_username = "";
    $password = "";
    $wrong_pwd = "";
    $wrong_user = "";
    $user_changed = ""; 



    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        if ($_POST["new_username"] !== $_POST["confirm_username"]){
            echo "
                <script>alert('Usernames do not match.');</script>
            ";
        }
        else{

            $old_username = $_POST["old_username"];
            $new_username = $_POST["new_username"];
            $password = $_POST["password"];
            $hashed_pwd = "";
            

            include "../database_config.php";


            $sql = "SELECT * FROM users WHERE username='$old_username'";
            $result = $conn->query($sql);
                
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $hashed_pwd = $row['password'];
                
                if(password_verify($password ,$hashed_pwd)){
                    $sql = "UPDATE users SET username='$new_username' WHERE username='$old_username';";
                    if ($conn->query($sql) === TRUE) {
                        $user_changed = "You have successfully changed your username.";
                    }
                    $conn->close();
                }
                else{
                    $wrong_pwd = "The password is incorect.";
                    $conn->close();
                }  
            }
            else {
                $wrong_user = "User" . $old_username . "does not exist";
                $conn->close();
            }
            
            
        }
    }
?>

<html lang="=el">

<head>
    <title>website</title>
    <meta charshet="UTF-8">
    <meta name="description" content="website">

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="">

    <link rel="stylesheet" href="style-main.css">

</head>


<body>

    <div class="first_all">

        <header class="first_all">
            <a href="index.php" class="im" > <img src="../images/logo.png" alt="logo image"> </a>
            
            <nav class="the_navbar">   
                
                <a href="uploadFiles.php"> Upload Δεδομένων </a> 
                            
                <a href="editProfile.php"> Διαχείριση Προφίλ </a> 
                        
                <a href="#"> Οπτικοποίηση Δεδομένων </a> 
                            
                <a href="#"> Αποσύνδεση </a>
                
            </nav>
            
                <div class="navbar_icons">                        
                        <div class= "menu" > <img src="../images/menu.jpeg" alt="menu image" height= "21.5px" width="23px";></div>    
                </div>
        </header>


        <div class="ban">
         
            <div class="lcolumn">  
                <!--
                <div class="search">
                    <img src="search.png">
                    <input type="text">
                </div>
                -->
                <br>
                <h3>Αλλαγή <span>Ονόματος Χρήστη</span></h3>

                <h3>
                    <br>
                    <div class= "form">
                        <div class= "labels">
                        <label for="username"> Παλιό όνομα χρήστη:</label> <br>
                        <label for="username"> Νέο όνομα χρήστη:</label> <br>
                        <label for="username"> Νέο όνομα χρήστη:</label> <br>
                        <label for="password"> Κωδικός:</label><br>
                        </div>
            
                        <div class= "inputs">
                        <input type="text" placeholder="Παλιό όνομα χρήστη" name="username"> <br>
                        <input type="text" placeholder="Νέο όνομα χρήστη" name="username">  <br>
                        <input type="text" placeholder="Νέο όνομα χρήστη" name="username">  <br>
                        <input type="password" placeholder="Κωδικός" name="password">  <br>
                        </div>

                </h3>
                    </div>

                
               <!--
               Ή αλλάξτε όνομα χρήστη μέσω:
                <div class="social">
                    <br>
                   
                            <a href="https://www.facebook.com/" target="blank" >    <img src="facebook2.png" > </a> 
                        
                            <a href="https://accounts.google.com/ServiceLogin/signinchooser?passive=1209600&continue=https%3A%2F%2Faccounts.google.com%2Fb%2F0%2FAddMailService&followup=https%3A%2F%2Faccounts.google.com%2Fb%2F0%2FAddMailService&flowName=GlifWebSignIn&flowEntry=ServiceLogin/" target="blank" >    <img src="gmail2.jpg" width="33px" > </a>
                        
                    
                    <br>
                    <br>
                    <br>
                </div>
                -->

            </div>


            <div class="rcolumn">  </div>


            <input type="checkbox"> Θυμήσου με 

                <br>
                <!--
                <a href="index3.html" target="blank" >  Ξεχάσατε τον κωδικό; </a>
                -->
                <br>
                <br>
                <div class="buttons">
                    <button type="button" class="primier"> Αλλαγή Ονόματος Χρήστη </button> 
                </div>

                <!--  
                <div class="container">
                    <footer>
                    <p class="pull-right"> <a href="#"> Επιστροφή στην κορυφή </a> </p>
                    </footer>
                </div>
                -->
        </div>

        
    </div> 
                    
       
</body>

</html>
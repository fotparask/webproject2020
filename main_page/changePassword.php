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
        <title>HARcules</title>
        <meta charshet="UTF-8">
        
        <meta name="viewport" content="width=devise-width, initial-scale=1.0">
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

        <a href="uploadFiles.php"> Upload Δεδομένων </a> 

        <a href="editProfile.php"> Διαχείριση Προφίλ </a> 

        <a href="#"> Οπτικοποίηση Δεδομένων </a> 

        <a href="../logout.php"> Αποσύνδεση </a>


    </nav>
           
            <div class="navbar_icons"> 
                    
                    <div class= "menu" > <img src="../images/menu.jpeg" alt="menu image" height= "21.5px" width="23px";></div>
                
            </div>

    </header>


        <div class="ban">
           
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
                            <input type="text" placeholder="Όνομα χρήστη" name="username"> <br>
                        
                            <input type="password" placeholder="Παλιός κωδικός" name="password"> <br>
                        
                            <input type="password" placeholder="Νέος κωδικός" name="password"> <br>
                        
                            <input type="password" placeholder="Νέος κωδικός" name="password"> <br>
                        
                        </div>
                </h3>
                    </div>
            
              
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
                <button type="button" class="primier"> Αλλαγή Κωδικού </button>
            </div>
            </div>

        </div>
   

    </div>
    <div class="footer">
        <footer>
            <p> &copy; HARcules Copyright 2021</p>
        </footer>
    </div>            
       
</body>

</html>
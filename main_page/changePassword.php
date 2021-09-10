
<?php


    session_start();

    if(!isset($_SESSION['username'])) {
        header("Location: ../index.html");
        exit();
    }

    $username = $_SESSION['username'];

    
    $real_pwd_hash = "";
    $old_password = "";
    $new_password = "";
    $confirm_password = "";
    $username = "";
    $wrong_pwd = "";
    $wrong_user = "";
    $password_changed = "";



    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        if ($_POST["new_password"] !== $_POST["confirm_password"]){
            echo "
                <script>alert('Passwords do not match.');</script>
            ";
        }
        else{

            $username = $_POST["username"];
            $old_password = $_POST["old_password"];
            $new_password = $_POST["new_password"];
            $hashed_pwd = "";

            include "../database_config.php";


            $sql = "SELECT * FROM users WHERE username='$username'";
            $result = $conn->query($sql);
                
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $hashed_pwd = $row['password'];
                
                if(password_verify($old_password ,$hashed_pwd)){
                    $hashed_pwd = password_hash($new_password, PASSWORD_DEFAULT);
                    $sql = "UPDATE users SET password='$hashed_pwd' WHERE username='$username';";
                    if ($conn->query($sql) === TRUE) {
                        $password_changed = "You have successfully changed the password.";
                    }
                    $conn->close();
                }
                else{
                    $wrong_pwd = "The password is incorect.";
                    $conn->close();
                }  
            }
            else {
                $wrong_user = "User " . $username . " does not exist";
                $conn->close();
            }
            
            
        }
    }
?>


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
                        <input type="password" placeholder="Νέος κωδικός" name="password"> 
                        </div>
                        
                </h3>
                    </div>
            
              
            </div>

            
 
            <input type="checkbox"> Θυμήσου με 
        
            <br>
            <!--
            <a href="index3.html" target="blank" >  Ξεχάσατε τον παλιό κωδικό; </a>
            -->
            <br>
      
            <div class="buttons">
                <button type="button" class="primier"> Αλλαγή Κωδικού </button>
            </div>

           
        </div>
   

     
                    
       
</body>

</html>
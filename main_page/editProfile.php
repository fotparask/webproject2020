<?php

    session_start();

    if(!isset($_SESSION['username'])) {
        header("Location: ../index.html");
        exit();
    }

    $sessionUsername = $_SESSION['username'];

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
       
        <div class="lcolumn">  
            <br>
            <br>

            <h3>Δείτε <span> Βασικά Στατιστικά για τα δεδομένα που έχετε ανεβάσει</span></h3>
            <br>
            <br>
        </div>

            </div>
        
          
            <table>

                <tr>

                    <th>Δεδομένα που έχουν Ανέβει</th>
                    <th>Ημερομηνία Τελευταίου Upload</th>
                    <th>Πλήθος Εγγραφών</th>

                </tr>

                <tr>

                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    

                </tr>

                <tr>

                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    

                </tr>

                <tr>

                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    

                </tr>

                <tr>

                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    

                </tr>

                <tr>

                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    

                </tr>

                <tr>

                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    

                </tr>

                <tr>

                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    

                </tr>





                </table>

        <div class="option"> 

        <h3>Επιθυμείτε:</h3>
   
        <br>
        <br>
        <a href="changeUsername.php" > <h3>  Να αλλάξετε όνομα χρήστη </h3> </a> 
   
           

        <br>
        <br>
        <a href="changePassword.php" > <h3> Να αλλάξετε κωδικό πρόσβασης </h3> </a> 
        <br>
        <br>
        <br>

        </div>



       
    </div>


    <div class="footer">
        <footer>
            <p> &copy; HARcules Copyright 2021</p>
        </footer>
    </div> 



</body>

</html>
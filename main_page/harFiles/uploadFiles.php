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
    
        <link rel="stylesheet" href="../style-main.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>


    <body>

      
    <script src="../script.js"> </script>
    
    <header class="first_all">

        <a href="../index.php" class="im" > <img src="../../images/logo.png" alt="logo image"> </a>
        
        <nav class="the_navbar">        

            <a href="../uploadFiles.php"> Upload Δεδομένων </a>                        
            <a href="../editProfile.php"> Διαχείριση Προφίλ </a>                     
            <a href="#"> Οπτικοποίηση Δεδομένων </a>                      
            <a href="../../logout.php"> Αποσύνδεση </a>   

        </nav>
           
        <div class="navbar_icons">                     
            <div class= "menu" > 
                <img src="../../images/menu.jpeg" alt="menu image" height= "21.5px" width="23px";>
            </div>  
        </div>

    </header>


    <div class="ban">
       
        <div class="lcolumn">  
            <br>
            <br>
            <h3>Επιλέξτε <span> ένα Αρχείο HAR από τον υπολογιστή σας</span></h3>
            <br>
            <br>
          
        </div>
        </div>

       
        <input type="file" id="harFileInput" name="files">
       


        <div class="options"> 

        <h3>Επιθυμείτε:</h3>
        <br>
        <br>
        <input type="checkbox"> Να ανέβει το αρχείο στο σύστημα 
        <br>
        <br>
        <input type="checkbox"> Να αποθηκευτεί το επεξεργασμένο αρχείο τοπικά
        <br>
        <br>
        <br>

        </div>
        
    </div>

    
  
    <script defer src="har_collection.js" charset="utf-8"></script>

    <button type="button" id="upload" name="upload">Upload</button>


    

    <script type="text/javascript">
        const fileSelector = document.getElementById('harFileInput');
        const buttonId = document.getElementById('upload');
        let har_entries;

        fileSelector.addEventListener('change', (event) => {
            console.log(fileSelector.files[0]);
            var reader = new FileReader();
            reader.readAsText(fileSelector.files[0]);
            reader.onload = function () {
                let har_file_data = JSON.parse(reader.result);
                har_entries = readHarFile(har_file_data);
                console.log(har_entries);
            }
            reader.onerror = function (evt) {
                document.getElementById("fileContents").innerHTML = "error reading file";
            }
            reader.onloadend = function () {

                let string = JSON.stringify(har_entries);
                //sending cleaned har file to php
                fetch("upload_to_database.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({har_string: string})
                })
            }
        });
    </script>

    <div class="footer">
        <footer>
            <p> &copy; HARcules Copyright 2021</p>
        </footer>
    </div> 

</body>

</html>
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
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>


<body>

    <script src="script.js"> </script>
    
    <header class="first_all">

        <a href="index.php" class="im" > <img src="../images/logo.png" alt="logo image"> </a>
        
        <nav class="the_navbar">        

            <a href="uploadFiles.php"> Upload Δεδομένων </a>                        
            <a href="editProfile.php"> Διαχείριση Προφίλ </a>                     
            <a href="#"> Οπτικοποίηση Δεδομένων </a>                      
            <a href="#"> Αποσύνδεση </a>   

        </nav>
           
        <div class="navbar_icons">                     
            <div class= "menu" > 
                <img src="../images/menu.jpeg" alt="menu image" height= "21.5px" width="23px";>
            </div>  
        </div>

    </header>


    <div class="ban">
        <div class="lcolumn">  
            <br><br>
            <h3>Επιλέξτε <span> ένα Αρχείο HAR από τον υπολογιστή σας</span></h3>
            <br><br>
        </div>
    </div>
    
    <input type="file" onchange="readFile(this)">
    <div class="buttons">
        <button type="button" class="primier" id="addHarFile"> Προσθήκη Αρχείου </button>
    </div>


    <div class="options"> 
        <h3>Επιθυμείτε:</h3>
        <br><br>
        <input type="checkbox"> Να ανέβει το αρχείο στο σύστημα 
        <br><br>

        <input type="checkbox"> Να αποθηκευτεί το επεξεργασμένο αρχείο τοπικά
        <br><br><br>
    </div>


  
    <script defer type="text/javascript">
        $(document).ready(function () {
            $('#addHarFile').click(function() {
                <script defer src="harfiles/har_collection.js" charset="utf-8"></script>                       
            });
        });
    </script>



</body>

</html>
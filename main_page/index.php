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
              
            <div class= "menu" id="menu-btn">
                <img src="..\images\menu.jpeg" alt="menu image" height= "21.5px" width="23px">
            </div>
                
        </div>

    </header>

    <div id="page-container">

        <section class="ban" id="ban">
            
            <div class="lcolumn"> 

            
                <br>
                <br>
                
                <h3> <span> Καλώς ήλθατε </span> <small> στην </small> Ιστοσελίδα μας </h3>
                <br>
                <br>
                <br>
                <br>
                <h2>ΣΚΟ<spanun>ΠΟΣ</spanun> μας είναι:</h2>
                <div class="hope">
                <br>
                <br>
                Μέσω της συγκεκριμένης ιστοσελίδας η απεικόνιση ενός πλήρους συστήματος συλλογής, διαχείρισης και
                ανάλυσης πληθοποριστικής (crowdsourced) πληροφορίας, που αφορά δεδομένα κίνησης HTTP.
                <br>
                <br>
                <br>
                <br>
                </div>


            <h2>Σημαντικές πληροφορίες:</h2>
            <br>
            
            <div class="text"> 

                Η κίνηση στο διαδίκτυο μέσω HTTP, μπορεί να καταγραφεί από οποιονδήποτε πελάτη (client), 
                ώστε τα δεδομένα αυτά να χρησιμοποιηθούν αργότερα για την ανάλυση της συμπεριφοράς ενός ιστοτόπου. 
                Για το σκοπό αυτό, έχει δημιουργηθεί το πρότυπο HAR (HTTP ARchive), που ορίζει μια συγκεκριμένη δομή (σχήμα) JSON για την αποθήκευση αυτών των δεδομένων.
                <br>
                <br>
                Αν και η ανάλυση των δεδομένων ενός υπολογιστή δεν έχει τόσο μεγάλο ενδιαφέρον, 
                η ανάλυση HAR αρχείων από πολλούς υπολογιστές, που αφορούν πολλούς ιστότοπους και διαφορετικές ώρες πρόσβασης, 
                έχει τη δυνατότητα να αποκαλύψει ιδιαίτερα ενδιαφέρουσες πτυχές της υποδομής του παγκόσμιου ιστού.
                <br>
                <br>
                Έτσι λοιπόν, παρουσιάζουμε ένα σύστημα πληθοποριστικής συλλογής δεδομένων HAR με σκοπό την παροχή κάποιων βασικών αναλύσεων για κάθε χρήστη ξεχωριστά,
                αλλά και γενικότερων αναλύσεων που αφορούν την υποδομή διαδικτύου σε μια περιοχή.  
                
                </div>
                
                <br>

            </div>

            <div class="footer">
                <footer>
                    <p> &copy; HARcules Copyright 2021</p>
                </footer>
            </div> 

        </section>
    </div>
    
       
</body>

</html>
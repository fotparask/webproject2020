<?php
    session_start();

    if(!isset($_SESSION['username'])) {
        header("Location: ../../index.html");
        exit();
    }
    
    if($_SESSION['is_admin'] == 0) {
        header("Location: ../../index.html");
        exit();
    }
    $sessionUsername = $_SESSION['username'];
?>


<html lang="=el">

<head>
<title>HARcules Admins</title>
    <meta charshet="UTF-8">
    
    <meta name="viewport" content="width=devise-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="..\style-main.css">
</head>
<body>
    
    <script src="script.js"> </script>
    
    <header class="first_all">

        <a href="admin.php" class="im" > <img src="..\..\images\logo.png" alt="logo image"> </a>

        
        <nav class="the_navbar">   
            
            <a href="admin_info.php"> Απεικόνιση Πληροφορίων </a> 
                            
            <a href="admin_times.php"> Ανάλυση Χρόνων </a> 

            <a href="admin_HTTP.php"> Ανάλυση HTTP </a> 

            <a href="../index.php"> Χρήστης </a> 

            <a href="../../logout.php" onclick="return confirm('ΕΙΣΤΕ ΣΙΓΟΥΡΟΣ;');"> Αποσύνδεση </a> 
            
        </nav>

        <div class="navbar_icons"> 
                    
                    <div class= "menu" id="menu-btn">
                        <img src="..\..\images\menu.jpeg" alt="menu image" height= "21.5px" width="23px">
                    </div>
                
            </div>
       
    </header>
    <div id="page-container">
        <section class="ban" id="ban">
            
            <div class="lcolumn">  
                <h2><!--<p style="text-decoration: underline;"> -->Διαχειρηστής </h2>
                <br>
                <br>
                <br>
                <br>
                
                <h3> <span> Καλώς </span> ήλθατε </h3>
                <br>
                <br>
                <br>
                <br>
                <h2>ΔΥΝΑΤ<spanun>ΟΤΗΤΕΣ</spanun> :</h2>
                <div class="hope">
                <br>
                <br>
                Μέσω της συγκεκριμένης ιστοσελίδας ως διαχειριστής μπορείτε να υλοποιήσετε τις παραπάνω ενέργειες σε σχέση με έναν απλό χρήστη που έχει μειωμένες δυνατότητες. 
            
                
                <br>
                <br>
                <br>
                <br>
                </div>
    
    
                <br>
    
            </div>
    
        </section>

            <div class="footer">
                <footer>
                    <p class="pull-right"> &copy; HARcules Copyright 2021</p>
                </footer>
            </div>        
    </div>
</body>

</html>
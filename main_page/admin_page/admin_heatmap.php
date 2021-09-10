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
<title>HARcules HTTP</title>
    <meta charshet="UTF-8">
    
    <meta name="viewport" content="width=devise-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style-main.css">
</head>

<body>
    
    <script src="script.js"> </script>
    
    <header class="first_all">
        <a href="admin.php" class="im" > <img src="..\images\logo.png" alt="logo image"> </a>
        
        <nav class="the_navbar">   
            
            <a href="admin_info.php"> Απεικόνιση Πληροφορίων </a> 
                        
            <a href="admin_times.php"> Ανάλυση Χρόνων </a> 

            <a href="admin_HTTP.php"> Ανάλυση HTTP </a> 
                    
            <a href="admin_heatmap.php"> Οπτικοποίηση Δεδομένων </a> 

            <a href="../../logout.php"> Αποσύνδεση </a> 
            
        </nav>

        <div class="navbar_icons"> 
                    
                    <div class= "menu" id="menu-btn">
                        <img src="..\images\menu.jpeg" alt="menu image" height= "21.5px" width="23px">
                    </div>
                
            </div>
       
    </header>
   
    <div class="ban">
            
        <div class="lcolumn">  
            <h3> HEAT Map </h3>
        </div>
    </div>

    <div class="show-info">
        
    </div>   

    <div class="footer">
        <footer>
            <p>&copy; HARcules Copyright 2021</p>
        </footer>
    </div>      
   
</body>

</html>
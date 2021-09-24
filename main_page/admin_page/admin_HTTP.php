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

<!DOCTYPE html>
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

            <a href="../logout.php" onclick="return confirm('ΕΙΣΤΕ ΣΙΓΟΥΡΟΣ;');"> Αποσύνδεση </a> 
            
        </nav>

        <div class="navbar_icons"> 
                    
                    <div class= "menu" id="menu-btn">
                        <img src="..\..\images\menu.jpeg" alt="menu image" height= "21.5px" width="23px">
                    </div>
                
            </div>
       
    </header>
    <div class="ban">
            
            <div class="lcolumn"> 
                <br>
                <br> 
                <h3> Ανάλυση <span>Κεφαλιδών HTTP</span> </h3>
            </div>
        
    
            <div class="options3"> 
    
            <h3>Επιλογή Παρόχου Συνδεσιμότητας:</h3>
            <br>
            <br>
            <input type="checkbox"> Cosmote
            <br>
            <br>
            <input type="checkbox"> Vodafone
            <br>
            <br>
            <input type="checkbox"> Wind
            <br>
            <br>
            <input type="checkbox"> Nova
            <br>
            <br>
            <input type="checkbox"> Sky Telecom
            <br>
            <br>
            <input type="checkbox"> Όλα τα Παραπάνω
            <br>
            <br>
            <br>
    
            </div>
    
        </div>
    
        <div class="show-info3">
            <table>
    
                <tr>
    
                    <th>Ποσοστό</th>
                    <th>Chrome</th>
                    <th>Explorer</th>
                    <th>Firefox</th>
                    <th>Safari</th>
                    <th>Opera</th>
                    <th>All Content Types</th>
    
                </tr>
    
                <tr>
    
                    <td>Max Age / Expires</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    
    
                </tr>
    
                <tr>
    
                    <td>Max Stale</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    
    
                </tr>
                <tr>
    
                    <td>Min Fresh</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    
    
                </tr>
    
                <tr>
    
                    <td>Public Cacheability</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    
    
                </tr>
    
                <tr>
    
                    <td>Private Cacheability</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    
    
                </tr>
    
                <tr>
    
                    <td>No-Cache Cacheability</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    
    
                </tr>
    
                <tr>
    
                    <td>No-Store Cacheability</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    
    
                </tr>
            </table>
        </div>   
    
        <div class="chart">
            <canvas id="infoChart" width="220" height="160"></canvas>
        </div>    
    </div>
   
</body>

</html>
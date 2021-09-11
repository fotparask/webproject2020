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
<title>HARcules Basic Info</title>
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
        <a href="admin.php" class="im" > <img src="..\..\images\logo.png" alt="logo image"> </a>
        
        <nav class="the_navbar">   
            
            <a href="admin_info.php"> Απεικόνιση Πληροφορίων </a> 
                        
            <a href="admin_times.php"> Ανάλυση Χρόνων </a> 

            <a href="admin_HTTP.php"> Ανάλυση HTTP </a> 
                    
            <a href="admin_heatmap.php"> Οπτικοποίηση Δεδομένων </a> 

            <a href="../../logout.php"> Αποσύνδεση </a> 
            
        </nav>

        <div class="navbar_icons"> 
                    
                    <div class= "menu" id="menu-btn">
                        <img src="..\..\images\menu.jpeg" alt="menu image" height= "21.5px" width="23px">
                    </div>
                
            </div>
       
    </header>
   
    <div class="ban">
            
        <div class="lcolumn">  
            <h3> Ανάλυση Χρόνων Απόκρισης </h3>
        </div>
    </div>

    <div class="show-info">
       
    </div>   

    <div class="chart">
        <canvas id="infoChart" width="220" height="160"></canvas>
    </div>
    <div class="footer">
        <footer>
            <p> &copy; HARcules Copyright 2021</p>
        </footer>
    </div>      
    <script>
    function BuildChart(labels, values, chartTitle) {
        var ctx = document.getElementById("infoChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels, // Our labels
                datasets: [{
                    label: chartTitle, // Name the series
                    data: values, // Our values
                    backgroundColor: [ // Specify custom colors
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [ // Add custom color borders
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1 // Specify bar border width
                }]
            },
            options: {
                responsive: true, // Instruct chart js to respond nicely.
                maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
            }
        });
        return myChart;
    }

    var table = document.getElementById('dataTable');
    var json = []; // first row needs to be headers 
    var headers = [];
    for (var i = 0; i < table.rows[0].cells.length; i++) {
        headers[i] = table.rows[0].cells[i].innerHTML.toLowerCase().replace(/ /gi, '');
    }
    // go through cells 
    for (var i = 1; i < table.rows.length; i++) {
        var tableRow = table.rows[i];
        var rowData = {};
        for (var j = 0; j < tableRow.cells.length; j++) {
            rowData[headers[j]] = tableRow.cells[j].innerHTML;
        }
        json.push(rowData);
    }
   // console.log(json);
    // Map json values back to label array
    var labels = json.map(function (e) {
        return e.κατηγορία;
    });
    console.log(labels);
    // Map json values back to values array
    var values = json.map(function (e) {
        return e.ποσότητα;
    });
    console.log(values);
    var chart = BuildChart(labels, values, "Ποσότητα");
    </script>
   
</body>

</html>
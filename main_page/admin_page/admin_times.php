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
<title>HARcules</title>
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

    <div class="timechart">
       <canvas id="timesChart" width="60" height="100"></canvas>
    </div>

    <!-- getting the data from the database -->
    <?php 
          $timings = "SELECT * FROM entries ";
          $result_q1 = mysqli_query($link, $timings) or die(mysql_error());
          
          $timings_array = array();
          $hours_array = array();
          while($row = mysqli_fetch_assoc($result_q1)){

            // add each row returned into an array
            array_push($timings_array,$row["timings_wait"]);
            array_push($hours_array,date("H",strtotime($row["startedDateTime"])));

          }
          ?>

    <div class="footer">
        <footer>
            <p> &copy; HARcules Copyright 2021</p>
        </footer>
    </div>      
    <script>
        //getting the arrays from php
        var timings_all = <?php echo json_encode($timings_array); ?>;
        var hours_all = <?php echo json_encode($hours_array); ?>;

        //calculating the average response time for each hour
        const hours_sum = []; //24 slots - one for each hr of the day
        const counter = []; //24 slots - one for each hr of the day

        for (let i=0; i<24; i++){
        hours_sum[i]=0;
        counter[i]=0;
        }

        for (let i = 0; i < timings_all.length; i++) {
        hours_sum[hours_all[i]] += parseFloat(timings_all[i]);
        counter[hours_all[i]] +=1;
        }

        const yaxis = [];
        for (let i=0; i<24; i++){
        yaxis[i] = hours_sum[i] / counter[i];
        }

        BuildChart();


        function BuildChart() {
            var ctx = document.getElementById("timesChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                        labels: ["1h", "2h", "3h", "4h", "5h", "6h", "7h", "8h", "9h", "10h", "11h", "12h", "13h", "14h", "15h", "16h", "17h", "18h", "19h", "20h", "21h", "22h", "23h"],
                        datasets: [{
                        label: "Average Response Time During the Day",
                        data: ["12", "43", "74", "66", "89", "57", "43", "24", "98", "23"],
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
                    scales: {
                        y: {
                            suggestedMin: 0,
                            suggestedMax: 100
                        }
                    }
                }
            });
        }
        var chart = BuildChart();
        </script>
    
</body>

</html>
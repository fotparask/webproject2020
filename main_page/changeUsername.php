<!DOCTYPE html>
<html lang="=el">

<head>
    <title>website</title>
    <meta charshet="UTF-8">
    <meta name="description" content="website">

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="">

    <link rel="stylesheet" href="style.css">

    <!--    
        style at style.css
    -->

</head>


<body>


    <?php

        $old_username = "";
        $new_username = "";
        $confirm_username = "";
        $password = "";
        $wrong_pwd = "";
        $wrong_user = "";
        $user_changed = ""; 


        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "webproject";


        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            if ($_POST["new_username"] !== $_POST["confirm_username"]){
                echo "
                    <script>alert('Usernames do not match.');</script>
                ";
            }
            else{

                $old_username = $_POST["old_username"];
                $new_username = $_POST["new_username"];
                $password = $_POST["password"];
                $hashed_pwd = "";
                

                //Create connection
                $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

                //Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }


                $sql = "SELECT * FROM users WHERE username='$old_username'";
                $result = $conn->query($sql);
                    
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $hashed_pwd = $row['password'];
                    
                    if(password_verify($password ,$hashed_pwd)){
                        $sql = "UPDATE users SET username='$new_username' WHERE username='$old_username';";
                        if ($conn->query($sql) === TRUE) {
                            $user_changed = "You have successfully changed your username.";
                        }
                        $conn->close();
                    }
                    else{
                        $wrong_pwd = "The password is incorect.";
                        $conn->close();
                    }  
                }
                else {
                    $wrong_user = "User" . $old_username . "does not exist";
                    $conn->close();
                }
                
                
            }
        }
    ?>
    <!--
        <h1>  yes  </h1>
        <h2 class="title"> no no </h2>
        <br>
        <p>  
            <a href="test2.html" target="blank" > <strong> SIGN UP HERE </strong> </a> 

            <img src="user2.png" alt="user image" width="30" height="30">
            <img src="logout1.jpg" alt="logout image" width="37" height="50">
        </p>
    -->
    <div class="first_all">
        <form action = "" method = "post">
            <div class="second_navbar">   
                <a href="index.html"  > <img src="datalysis1.png" alt="datalysis image" width="" height=""> </a>
                <ul>
                    <li> <a href="#"> Upload Δεδομένων </a> </li>
                    <li> <a href="#"> Διαχείριση Προφίλ </a> </li>
                    <li> <a href="#"> Οπτικοποίηση Δεδομένων </a> </li>
                </ul>
            
                <div class="navbar_icons"> 
                    <ul>
                        <li>
                            <a href="#"> Αποσύνδεση </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="ban">
                <div class="lcolumn">  
                    <!--
                        <div class="search">
                            <img src="search.png">
                            <input type="text">
                        </div>
                    -->
                    <br>
                    <h3>Αλλαγή <span>Κωδικού</span></h3>
                    <h3>
                        <br>
                        <div class= "form">
                            <div class= "labels">
                                <label for="username"> Παλιό όνομα χρήστη:</label> <br>
                                <label for="username"> Νέο όνομα χρήστη:</label> <br>
                                <label for="username"> Επιβεβαίωση νέου ονόματος:</label> <br>
                                <label for="password"> Κωδικός:</label><br>
                            </div>
            
                            <div class= "inputs">
                                <input type="text" placeholder="Παλιό όνομα χρήστη" name="old_username" required> <br>
                                <input type="text" placeholder="Νέο όνομα χρήστη" name="new_username">  <br>
                                <input type="text" placeholder="Επιβεβαίωση" name="confirm_username">  <br>
                                <input type="password" placeholder="Κωδικός" name="password" required>  <br>
                            </div>
                            <br>
                            <div> 
                                <?php echo "<p style='color:red; font-size: 13px;'>" . $wrong_user . "</p>"; ?><br>
                                <?php echo "<p style='color:red; font-size: 13px;'>" . $wrong_pwd . "</p>"; ?> <br>
                                <?php echo "<p style='color:green; font-size: 13px;'>" . $user_changed . "</p>"; ?> <br>
                            </div>
                        </div>
                    </h3>
                </div>    
            </div>
            <!--
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
            -->
            <div class="rcolumn"></div>
    
            <input type="checkbox"> Θυμήσου με 
            <br>
            <!--
            <a href="index3.html" target="blank" >  Ξεχάσατε τον παλιό κωδικό; </a>
            -->
            <br>
            <br>
            <div class="buttons">
                <button type="submit" class="primier" name="submit"> Αλλαγή Ονόματος </button>
            </div>
        </form>
    </div>  
             
</body>

</html>
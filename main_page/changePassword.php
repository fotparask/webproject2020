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

        $real_pwd_hash = "";
        $old_password = "";
        $new_password = "";
        $confirm_password = "";
        $username = "";
        $wrong_pwd = "";
        $wrong_user = "";
        $password_changed = "";


        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "vofogi62";
        $dbname = "webproject";


        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            if ($_POST["new_password"] !== $_POST["confirm_password"]){
                echo "
                    <script>alert('Passwords do not match.');</script>
                ";
            }
            else{

                $username = $_POST["username"];
                $old_password = $_POST["old_password"];
                $new_password = $_POST["new_password"];
                $hashed_pwd = "";

                //Create connection
                $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

                //Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }


                $sql = "SELECT * FROM users WHERE username='$username'";
                $result = $conn->query($sql);
                    
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $hashed_pwd = $row['password'];
                    
                    if(password_verify($old_password ,$hashed_pwd)){
                        $hashed_pwd = password_hash($new_password, PASSWORD_DEFAULT);
                        $sql = "UPDATE users SET password='$hashed_pwd' WHERE username='$username';";
                        if ($conn->query($sql) === TRUE) {
                            $password_changed = "You have successfully changed the password.";
                        }
                        $conn->close();
                    }
                    else{
                        $wrong_pwd = "The password is incorect.";
                        $conn->close();
                    }  
                }
                else {
                    $wrong_user = "User " . $username . " does not exist";
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
                                <label for="username">  Όνομα χρήστη:</label> <br>
                                <label for="password"> Παλιός κωδικός:</label> <br>
                                <label for="password"> Νέος κωδικός:</label> <br>
                                <label for="password"> Επιβεβαίωση κωδικού:</label> <br>
                            </div>
            
                            <div class= "inputs">
                                <input type="text" placeholder="Όνομα χρήστη" name="username" required><br>
                                <input type="password" placeholder="Παλιός κωδικός" name="old_password" required> <br>
                                <input type="password" placeholder="Νέος κωδικός" name="new_password"  required> <br>
                                <input type="password" placeholder="Επιβεβαίωση κωδικού" name="confirm_password" required><br> 
                            </div>

                            <div>
                                <?php echo "<p style='color:red; font-size: 13px;'>" . $wrong_user . "</p>"; ?><br>
                                <?php echo "<p style='color:red; font-size: 13px;'>" . $wrong_pwd . "</p>"; ?> <br>
                                <?php echo "<p style='color:green; font-size: 13px;'>" . $password_changed . "</p>"; ?> <br>
                            </div>
                        </div>
                    </h3>
                </div>    
            </div>
            <!--
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                Ή αλλάξτε κωδικό μέσω:
                <div class="social">
                    <br>
                
                            <a href="https://www.facebook.com/" target="blank" >    <img src="facebook2.png" > </a> 
                        
                            <a href="https://accounts.google.com/ServiceLogin/signinchooser?passive=1209600&continue=https%3A%2F%2Faccounts.google.com%2Fb%2F0%2FAddMailService&followup=https%3A%2F%2Faccounts.google.com%2Fb%2F0%2FAddMailService&flowName=GlifWebSignIn&flowEntry=ServiceLogin/" target="blank" >    <img src="gmail2.jpg" width="33px" > </a>
                        
                    
                    <br>
                    <br>
                    <br>
                </div>
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
                <button type="submit" class="primier" name="submit"> Αλλαγή Κωδικού </button>
            </div>
        </form>
    </div>  
             
</body>

</html>
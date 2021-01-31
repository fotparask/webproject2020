<!DOCTYPE html>

<html>

<head>

<meta charset="utf-8">
<title>DatAnalysis</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="http://localhost/webproject/sign_in.css">

</head>


<?php

    $email = "";
    $password = "123456";


    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$_POST["email"])) {
            echo "Invalid email";
            echo "<br>";
        }
        elseif($_POST["password"] != $password ) {
            echo "Invalid password";
            echo "<br>";
        }
        else{
            $email = $_POST["email"];
            $password = "123456";
        }
    }


    function val($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

?>

<body>
   
    <table class="main_frame">
        <tr>
            <th>
                <table class="outer_frame">
                    <tr>
                        <th>
                            <table class="inner_frame">
                                <tr>
                                    <th>
                                        <table class="categories_frame">
                                            <tr>
                                                <th> 
                                                    <table class="logo_frame">
                                                        <tr>
                                                            <th>
                                                                <table class="logo_icon">
                                                                    <tr>
                                                                        <th>
                                                                            <img src="https://dynamic.brandcrowd.com/asset/logo/3be43897-018d-4384-94bd-59f14dfb762f/logo?v=4" width=100% alt="logo_image">
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </th>
                                                        </tr>
                                                    </table>
                                                </th>
                                                <th>
                                                    <table class="form">
                                                        <tr>
                                                            <th>
                                                                <table class="tab-header-frame">
                                                                    <tr>
                                                                        <th>
                                                                            <table class="tab-header">
                                                                                <tr>
                                                                                    <th>
                                                                                        Sign In
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                                <table class="tab-content-frame">
                                                                    <tr>
                                                                        <th>
                                                                            <form action=""  method = "post">
                                                                                <table class="tab-content">
                                                                                    <tr>
                                                                                        <th>
                                                                                            <table class="form-element-frame">
                                                                                                <tr>
                                                                                                    <th>
                                                                                                        <table>
                                                                                                            <tr>
                                                                                                                <th>
                                                                                                                    <input type="text" placeholder="Email/Username">
                                                                                                                </th>
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </table>
                                                                                            <table>
                                                                                                <tr>
                                                                                                    <th>
                                                                                                        <table class="form-element">
                                                                                                            <tr>
                                                                                                                <th>
                                                                                                                    <table class="wrapper">
                                                                                                                        <tr>
                                                                                                                            <th>
                                                                                                                                <input type="Password" placeholder="Password" id="password">
                                                                                                                                <span>
                                                                                                                                    <i class="fa fa-eye" id="eye" onclick="toggle()">
                                                                                                                                    </i>
                                                                                                                                </span>
                                                                                                                                <script>
                                                                                                                                    var state= false;
                                                                                                                                    function toggle(){
                                                                                                                                        if(state){
                                                                                                                                        document.getElementById("password").setAttribute("type","password");
                                                                                                                                        document.getElementById("eye").style.color='#7a797e';
                                                                                                                                        state = false;
                                                                                                                                        }
                                                                                                                                        else{
                                                                                                                                        document.getElementById("password").setAttribute("type","text");
                                                                                                                                        document.getElementById("eye").style.color='#5887ef';
                                                                                                                                        state = true;
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                </script>
                                                                                                                            </th>
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                </th>
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </table>
                                                                                            <table>
                                                                                                <tr>
                                                                                                    <th>
                                                                                                        <input type="submit" name="submit" value = "Submit" />
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </table>
                                                                                            <table class="question-frame">
                                                                                                <tr>
                                                                                                    <th>
                                                                                                        <table class="question">
                                                                                                            <tr>
                                                                                                                <th>
                                                                                                                    Don't you have an account? 
                                                                                                                    <a href="sign_up.php">click here</a>
                                                                                                                </th>
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </th>
                                                                                    </tr>
                                                                                </table>
                                                                            </form>
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </th>
                                                        </tr>
                                                    </table>
                                                </th>
                                            </tr>
                                        </table>
                                    </th>
                                </tr>
                            </table>
                        </th>
                    </tr>
                </table>
            </th>
        </tr>
    </table>


<?php

    echo "User email is " . $email;
    echo "<br>";
    echo "Uset password is " . $password;
    echo "<br>";

?>



</body>

</html>
<?php

    //session code.
    //session_start();

    // if(!isset($_SESSION['username'])) {
    //     header("Location: ../index.html");
    //     exit();
    // }

    //$userID = $_SESSION['user_id'];



    header('Content-Type: application/json');
    //Receive the RAW post string data.
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ?trim($_SERVER["CONTENT_TYPE"]) : '';

    if ($contentType === "application/json") {
        //Receive the RAW post data.
        $content = trim(file_get_contents("php://input"));
        $harData = json_decode($content, true);

        //If json_decode failed, the JSON is invalid.
        if(! is_array($harData)) {
            echo '{"status":"error"}';
        } else {
          echo '{"status":"ok"}';
        }
    } else {
        echo '{"status":"error"}';
    }

    include "../../database_config.php";

    $entriesLenght = count($harData["entries"]);
    settype($userID, "int");
    $userID = $harData["userID"];
    echo ($content);

    $sql = "INSERT INTO har_files (harUserID, numEntries)
            VALUES ('$userID', '$entriesLenght');";
    $result1 = $conn->query($sql);

    $sql = "INSERT INTO entries (harID, serverIPAddress, timings_wait, startedDateTime)
            VALUES ();";
    //$result1 = $conn->query($sql);

    echo '{"Database connected"}';
    
    $conn->close();
?>

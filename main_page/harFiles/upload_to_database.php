<?php

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

    $entries = $harData["entries"];
    $entriesLenght = count($entries);
    settype($userID, "int");
    $userID = $harData["userID"];
    echo ($content);

    //inserting into har_files table
    $sql = "INSERT INTO har_files (harUserID, numEntries)
            VALUES ('$userID', '$entriesLenght');";
    $result1 = $conn->query($sql);
    $sql = "SELECT * from har_files WHERE harUserID='$userID' ORDER BY harID DESC LIMIT 1";
    $result2 = $conn->query($sql);
    $row = $result2->fetch_assoc();
    $harID = $row['harID'];
    settype($harID, "int");


    
    for ($i=0; $i < $entriesLenght; $i++) { 
        $entry = $entries[$i];

        //inserting into entries table
        $serverIPAddress = $entry['serverIPAddress'];
        $serverTimings = $entry['timings']['wait'];
        $startedDateTime = $entry['startedDateTime'];
        $sql = "INSERT INTO entries (harID, serverIPAddress, timings_wait, startedDateTime)
            VALUES ('$harID', '$serverIPAddress', '$serverTimings', '$startedDateTime');";
        $result3 = $conn->query($sql);

        
        //inserting into request and headers table
        $request = $entry['request'];
        $requestMethod = $request['method'];
        $requestUrl = $request['url'];
        $sql = "INSERT INTO request (harID, method, url)
            VALUES ('$harID', '$requestMethod', '$requestUrl');";
        $result4 = $conn->query($sql);
        $sql = "SELECT * from request WHERE harID='$harID' ORDER BY requestID DESC LIMIT 1";
        $result5 = $conn->query($sql);
        $row = $result5->fetch_assoc();
        $requestID = $row['requestID'];
        settype($requestID, "int");
        //headers
        $headers = $request['headers'];
        $content_type = $headers['content_type'];
        $cache_control = $headers['cache_control'];
        $pragma = $headers['pragma'];
        $expires = $headers['expires'];
        $age = $headers['age'];
        $last_modified = $headers['last_modified'];
        $head_host = $headers['host'];

        echo("skata"  . $content_type . "ompa");
        $sql = "INSERT INTO headers (harID, requestID, content_type, cache_control, pragma, expires, age, last_modified, head_host)
            VALUES ('$harID', '$requestID', '$content_type', '$cache_control', '$pragma', '$expires', '$age', '$last_modified', '$head_host');";
        $result6 = $conn->query($sql);



        //inserting into response and headers table
        $response = $entry['response'];
        $responseStatus = $response['status'];
        $responseText = $request['statusText'];
        echo( $responseStatus . $responseText);
        $sql = "INSERT INTO response (harID, res_status, statusText)
            VALUES ('$harID', '$responseStatus', '$responseText');";
        $result4 = $conn->query($sql);
        $sql = "SELECT * from response WHERE harID='$harID' ORDER BY responseID DESC LIMIT 1";
        $result7 = $conn->query($sql);
        $row = $result5->fetch_assoc();
        $responseID = $row['responseID'];
        settype($responseID, "int");
        //headers
        $headers = $response['headers'];
        $content_type = $headers['content_type'];
        $cache_control = $headers['cache_control'];
        $pragma = $headers['pragma'];
        $expires = $headers['expires'];
        $age = $headers['age'];
        $last_modified = $headers['last_modified'];
        $head_host = $headers['host'];

        $sql = "INSERT INTO headers (harID, requestID, content_type, cache_control, pragma, expires, age, last_modified, head_host)
            VALUES ('$harID', '$requestID', '$content_type', '$cache_control', '$pragma', '$expires', '$age', '$last_modified', '$head_host');";
        $result8 = $conn->query($sql);

    }

    echo '{"Database connected"}';
    
    $conn->close();
?>

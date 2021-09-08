<?php

    $har_entries = json_decode(file_get_contents('php://input'), true);

    include "../../database_config.php";

    $sql = "INSERT INTO harFile VALUE 0;";

    $result1 = $conn->query($sql);
    
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    $conn->close();

    header("location: ../index.php");

    exit();
?>

<?php
    $host = 'mysql_db'; // Match the service name in docker-compose.yml
    $dbname = 'SafeBox';
    $user = 'app_user';
    $pass = 'app_password';


    //DB CONNECTION
    try {
        $conn = new mysqli($host, $user, $pass, $dbname);
        //echo "Successfully connected to the MySQL database inside Docker!";
    } catch (Exception $e) {
        //echo "Connection failed: " . $e->getMessage();
    }
?>
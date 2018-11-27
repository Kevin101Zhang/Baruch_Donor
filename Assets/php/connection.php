<?php
    $host = "localhost";
    $host_user = "root";
    $host_pass = "B@ruch123";
    $database = "baruch_donor";
    $port = "3306";

    // connect to mysql
    $mysql = mysqli_connect($host, $host_user, $host_pass);
    if(!$mysql) {
    echo "Cannot connect to database.";
    exit;
    }

    // select the appropriate database
    $selected = mysqli_select_db($mysql, $database);
    if(!$selected) {
    echo "Cannot select database.";
    exit;
    }
?>
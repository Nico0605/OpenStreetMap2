<?php
    $host = 'localhost';
    $uname = 'root';
    $pwd = 'root';
    $db = 'OpenStreetMap2';
    $dbprefix='';

    $mysqli = new mysqli($host, $uname, $pwd, $db);
    
    if($mysqli->connect_errno) {
        die('DB connection error: '.$mysqli->connect_error);
    }
?>
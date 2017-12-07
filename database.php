<?php
    $servername = 'localhost';
    $username = 'monkey';
    $password = 'xyzzy1';
    $dbname = 'CSU_Info_DB';

    $db = new mysqli($servername, $username, $password, $dbname);

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
?>
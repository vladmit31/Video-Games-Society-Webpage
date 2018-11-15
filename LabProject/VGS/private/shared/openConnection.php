<?php
    error_reporting(E_ALL); 
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);
    
    // Credentials
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'db';
    
    //Create a database connection
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

?>

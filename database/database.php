<?php 
    /* 
        Database Credentials 
        Default Settings (user root no password) 
    */
    define ('DB_SERVER', 'localhost');
    define ('DB_USERNAME', 'root');
    define ('DB_PASSWORD', '');
    define ('DB_NAME', 'ExamCRUD');

    /* 
        Attempt to connect to MySQL Database
    */
    $connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    /* 
        Check the Database Connection
    */
    if ($connect === false) {
        die ("ERROR: Could not connect. " . mysqli_connect_errror());
    }
    else{
        // Echo a Test Connection String
        //echo 'YEEEES! Connected';
    }

?>
<?php
    //Credentials database
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '12345');
    define('DB_NAME', 'ta_db_siswa');
    
    /* Attempt to connect to MySQL database */
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    // Check connection
    if($link === false){
        die("ERROR: Tidak bisa tersambung ke database. " . mysqli_connect_error());
    }
?>
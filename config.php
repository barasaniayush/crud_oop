<?php
    define("servername","localhost");
    define("username","root");
    define("password","");
    define("dbname","user");
    
    $conn = new mysqli(servername, username, password, dbname);
    if(!$conn) {
        die("Connection failed".mysqli_connect_error());
    }
?>
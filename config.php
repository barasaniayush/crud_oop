<?php
    define ("servername","localhost");
    define("username","root");
    define("password","");
    define("dbname","user");

    $conn = mysqli_connect(servername, username, password, dbname);
    if(!$conn) {
        die("Connection failed".mysqli_connect_error());
    }
?>
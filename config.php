<?php
function connectDB() 
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "register_db";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    mysqli_set_charset($conn, "utf8");
    return $conn;
}
?>
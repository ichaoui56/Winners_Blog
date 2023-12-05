<?php

$db_server = "sql206.infinityfree.com";
$db_user = "if0_35553201";
$db_pass = "jS4FFzcVvx";
$db_name = "if0_35553201_BlogDB";
$conn = "";

// Create connection & check connection
try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
} catch (mysqli_sql_exception) {
    echo "Not connected: ";
}
//Create Database
// $sql_create_db = "CREATE DATABASE IF NOT EXISTS Blog";
// $req=mysqli_query($conn, $sql_create_db);

//Check if the database is created
// if($req){
//     echo "Database created successfully";
// }
// else {
//     echo "Error creating database: " . mysqli_error($conn);
// }


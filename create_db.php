<?php

$server_name="localhost";
$username="root";
$password="";

$connection = new mysqli($server_name, $username, $password);

if($connection->connect_error)
{
    die("Connection failed:{$connection->connect_error}");
}
echo "Connection established successfully";


$create_db = "CREATE DATABASE form_db";

if($connection->query($create_db) == TRUE) {
    printf ("Database created successfully: %s",$create_db);
}
else 
    printf("Error: %s", $connection->error);
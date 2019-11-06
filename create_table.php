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

$connection -> select_db("form_db");

$create_form_completers_table = "CREATE TABLE  form_completers(
                                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                name VARCHAR(100) NOT NULL,
                                surname VARCHAR (100),
                                email VARCHAR(50) NOT NULL,
                                phone_number VARCHAR(20),
                                message TEXT
)";

if($connection ->query($create_form_completers_table) == TRUE) {
    printf("Query executed successfully: %s", $create_form_completers_table);
}
else {
    printf("Error: %s", $connection-> error);

}

?>
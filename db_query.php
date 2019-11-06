<?php
require_once(__DIR__.'/constants.php');

final class Query {
    const CREATE_DATABASE  = "CREATE DATABASE IF NOT EXISTS ".Constants::DB_NAME;

    const CREATE_TABLE = "CREATE TABLE IF NOT EXISTS ".Constants::TABLE_NAME."(
                            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                            name VARCHAR(100) NOT NULL,
                            surname VARCHAR (100),
                            email VARCHAR(50) NOT NULL,
                            phone_number VARCHAR(20),
                            message TEXT)";

    const GET_FORM_COMPLETERS_QUERY = "SELECT * FROM ".Constants::TABLE_NAME;

    static function GET_FORM_COMPLETERS_DATA($user_id) {
        return "SELECT * FROM ".Constants::TABLE_NAME." WHERE id = ". $user_id;
    }

    static function FORM_QUERY($name,$surname,$email,$phone_number,$message) {
        return "INSERT INTO ".Constants::TABLE_NAME."(name,surname,email,phone_number,message) VALUES('".$name."', '".$surname."', '".$email."', '".$phone_number."','".$message."')";
        
    }

}
?>
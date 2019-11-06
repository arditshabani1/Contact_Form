<?php
require_once(__DIR__.'/db_query.php');

class QueryRunner {
    private $connection = NULL;

    function __construct() {
        $this -> connection = new mysqli(Constants::SERVER_NAME, Constants::USERNAME, Constants::PASSWORD);

        if($this -> connection -> connect_error) {
            die("Connection failed:{$this -> connection -> connect_error}");
        }

        $this -> createDatabase();
        $this->createTable();
    }



    private function createDatabase(){
        if($this->connection->query(Query::CREATE_DATABASE) != TRUE) {
            printf("Error: %s", $this->connection->error);
        }
        $this->connection->select_db(Constants::DB_NAME);

    }


    private function createTable(){
        if($this->connection->query(Query::CREATE_TABLE) != TRUE) {
            printf("Error: %s", $this->connection->error);
        }
    }

    public function cform() {
        $result=$this->connection->query(
            Query::FORM_QUERY($_SESSION['name'],
            $_SESSION['surname'],$_SESSION['email'],$_SESSION['phone_number'],$_SESSION['message']));

        return $result;
    }

    public function get_form() {
        $result = $this->connection->query(Query::GET_FORM_COMPLETERS_QUERY);
        if($result->num_rows > 0){
            return $result;
        }
        
        return [];
    }
    public function get_form_completers_data($user_id) {
        $result=$this->connection->query(
            Queries::GET_FORM_COMPLETERS_DATA($user_id));

        if(!$result) {
            header("Location: form.php");
        }

        return $result->fetch_assoc();
    }


}
?>
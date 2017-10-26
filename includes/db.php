<?php
//Database Class
class db {
// Initialise variables
    public $isConnected;
    protected $conn;
//Constructor method, here it is used to connect to the database
    public function __construct($username = 'root', $password = '', $host = 'localhost', $dbname = 'idroidstore', $opt = []){
        try{
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $this->conn = new PDO($dsn, $username, $password, $opt);
            $this->isConnected = true;
//            echo 'DB connected';

        }catch (PDOException $e){
            echo $e->getMessage();

        }

    }
//Disconnect method to disconnect from the databse
    public function disconnect(){
        $this->isConnected = false;
        $this->conn = null;

    }
//Method to get single row
    public function getRow($query, $params=[]){

        try{
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch();

        }catch (PDOException $e){
            echo $e->getMessage();
        }

    }
//Method to get multiple rows
    public function getRows($query, $params= [] ){
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll();

        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
//Method to insert row
    public function insertRow($query,  $params= [] ){
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            return true;

        }catch (PDOException $e){
            echo $e->getMessage();
        }

    }
//Method to update row
    public function updateRow($query, $params= [] ){
        $this->insertRow($query, $params);

    }
//Method to delete row
    public function deleteRow($query, $params= [] ){
        $this->insertRow($query, $params);
    }
}
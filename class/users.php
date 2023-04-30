<?php
class User{
    // Connection
    private $conn;
    // Table
    private $db_table = "tbl_users";
    // Columns

    public $username;

    public $token;
    public $created;
    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // READ ALL
    public function getUsers(){
        $sqlQuery = "SELECT username,token FROM " . $this->db_table;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // READ ONE
    public function checkUsername($username){
        $sqlQuery = "SELECT username FROM $this->db_table WHERE username = '$username'";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // CREATE
    public function createUser(){
        $sqlQuery = "INSERT INTO $this->db_table SET username = :username, token = :token";
        $stmt = $this->conn->prepare($sqlQuery);

        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->token=htmlspecialchars(strip_tags($this->token));

        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":token", $this->token);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
}

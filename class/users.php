<?php
class User{
    // Connection
    private $conn;
    // Table
    private $db_table = "tbl_users";
    // Columns
    public $uid;
    public $username;
    public $realname;
    public $emailaddress;
    public $avatar;
    public $teamname;
    public $teamlogo;
    public $rank;
    public $points;
    public $token;
    public $created;
    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // READ ALL
    public function getUsers(){
        $sqlQuery = "SELECT uid, username, realname, avatar, token FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // READ ONE
    public function checkUsername($username){
        $sqlQuery = "SELECT username FROM tbl_users WHERE username = '$username'";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // CREATE
    public function createUser(){
        $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        uid = :uid, 
                        username = :username, 
                        realname = :realname, 
                        avatar = :avatar, 
                        teamname = :teamname,
                        teamlogo = :teamlogo,
                        points = :points,
                        rank = :rank,
                        emailaddress = :emailaddress,
                        token = :token,
                        created = :created";

        // generate token here

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->uid=htmlspecialchars(strip_tags($this->uid));
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->realname=htmlspecialchars(strip_tags($this->realname));
        $this->avatar=htmlspecialchars(strip_tags($this->avatar));
        $this->teamname=htmlspecialchars(strip_tags($this->teamname));
        $this->teamlogo=htmlspecialchars(strip_tags($this->teamlogo));
        $this->points=htmlspecialchars(strip_tags($this->points));
        $this->rank=htmlspecialchars(strip_tags($this->rank));
        $this->emailaddress=htmlspecialchars(strip_tags($this->emailaddress));
        $this->token=htmlspecialchars(strip_tags($this->token));
        $this->created=htmlspecialchars(strip_tags($this->created));

        // bind data
        $stmt->bindParam(":uid", $this->uid);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":realname", $this->realname);
        $stmt->bindParam(":avatar", $this->avatar);
        $stmt->bindParam(":teamname", $this->teamname);
        $stmt->bindParam(":teamlogo", $this->teamlogo);
        $stmt->bindParam(":points", $this->points);
        $stmt->bindParam(":rank", $this->rank);
        $stmt->bindParam(":emailaddress", $this->emailaddress);
        $stmt->bindParam(":token", $this->token);
        $stmt->bindParam(":created", $this->created);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
}

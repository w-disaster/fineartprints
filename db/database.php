<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
    }

    public function getAllPictures(){
        $stmt = $this->db->prepare("SELECT Title, Image, Author, Base_price FROM Picture ORDER BY RAND() LIMIT 12");

        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPictureFromTitle($i){
        $stmt = $this->db->prepare("SELECT Title, Description, Author, Category_name FROM Picture WHERE Title=?");
        $stmt->bind_param("s", $i);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

}
?>
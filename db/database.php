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
        $stmt = $this->db->prepare("SELECT Title, Description, Author, Category_name, Publish_date FROM Picture WHERE Title=?");
        $stmt->bind_param("s", $i);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTecnhiquesFromPictureTitle($i){
        $stmt = $this->db->prepare("SELECT Description FROM Print_technique WHERE Print_technique.Technique_id = Art_print.Technique_id AND Art_print.Picture_title=?");
        $stmt->bind_param("s", $i);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function query($sql){
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    
    
    public function getSlideShowPictures($n=6){
        $stmt = $this->db->prepare("SELECT Image FROM picture WHERE Orientation='landscape'
         ORDER BY RAND() LIMIT ?");
        $stmt->bind_param("i",$n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getLatestPictures($n=4){
        $stmt = $this->db->prepare("SELECT Image, Title FROM picture ORDER BY Publish_Date DESC LIMIT ?");
        $stmt->bind_param("i",$n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getRandSalesPictures($n=-1){
        $query = "SELECT Image, Title FROM picture WHERE Discount!=0 ORDER BY RAND()";
        if($n > 0){
            $query = $query . " LIMIT ?";
        }
        $stmt = $this->db->prepare($query);
        if($n > 0){
            $stmt->bind_param("i", $n);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertNewCustomer($email, $birth_date, $password, $name, $surname, $phone, $city, 
    $postal_code, $province, $address){
        $customer = "customer";
        $stmt = $this->db->prepare("INSERT INTO user (Email, Birth_date, Password, Name, Surname, Phone, City, Postal_Code,
         Province, Address, Role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
        $stmt->bind_param("sssssisisss", $email, $birth_date, $password, $name, $surname, $phone, $city, 
        $postal_code, $province, $address, $customer);
        $stmt->execute();
    }
}
?>
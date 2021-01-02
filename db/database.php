<?php

class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }        
    }

    public function checkLogin($username, $password){
        $stmt = $this->db->prepare("SELECT email as username, role FROM User WHERE email = ? AND password = ?");
        $stmt->bind_param('ss',$username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllPictures(){
        $stmt = $this->db->prepare("SELECT Title, Image, Author, Base_price, Discount FROM Picture ORDER BY RAND() LIMIT 12");

        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPictureFromTitle($title){
        $stmt = $this->db->prepare("SELECT * FROM Picture WHERE Title=?");
        $stmt->bind_param("s", $title);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTechniquesFromPictureTitle($i){
        $stmt = $this->db->prepare("SELECT Print_technique.Technique_id, Image, Description FROM Print_technique, Art_print WHERE Print_technique.Technique_id = Art_print.Technique_id AND Art_print.Picture_title=?");
        $stmt->bind_param("s", $i);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getFramesFromSeller($seller) {
        $stmt = $this->db->prepare("SELECT Frame.Frame_id, Image, Description, Price FROM Make_frame_available, Frame WHERE Make_frame_available.Email = ? AND Make_frame_available.Frame_id = Frame.Frame_id");
        $stmt->bind_param("s", $seller);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPasspartoutsFromSeller($seller) {
        $stmt = $this->db->prepare("SELECT Passpartout.Passpartout_id, Image, Specifications, Price_per_cm2 FROM Make_passpartout_available, Passpartout WHERE 
        Make_passpartout_available.Email = ? AND Make_passpartout_available.Passpartout_id = Passpartout.Passpartout_id");
        $stmt->bind_param("s", $seller);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPriceFromTechnique($technique_id){
        $stmt = $this->db->prepare("SELECT Price_per_cm2 FROM Print_technique WHERE Technique_id = ?");
        $stmt->bind_param("i", $technique_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPriceFromFrame($frame_id) {
        $stmt = $this->db->prepare("SELECT Price FROM Frame WHERE Frame_id = ?");
        $stmt->bind_param("i", $frame_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPriceFromPasspartout($passpartout_id) {
        $stmt = $this->db->prepare("SELECT Price_per_cm2 FROM Passpartout WHERE 
        Passpartout_id = ?");
        $stmt->bind_param("i", $passpartout_id);
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

    public function addUser($email, $birth_date, $password, $name, $surname, $phone, $city, 
    $postal_code, $province, $address,$role){
        $stmt = $this->db->prepare("INSERT INTO user (Email, Birth_date, Password, Name, Surname, Phone, City, Postal_Code,
         Province, Address, Role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
        $stmt->bind_param("sssssisisss", $email, $birth_date, $password, $name, $surname, $phone, $city, 
        $postal_code, $province, $address, $role);
        $stmt->execute();
    }

    public function getCustomer(){
        $email = $_SESSION["username"];
        $role = $_SESSION["role"];
        $stmt = $this->db->prepare("SELECT Email, Birth_date, Name, Surname, Password, Phone, City, Postal_code,
         Province, Address FROM user WHERE Email = ? AND Role = ?;");
        $stmt->bind_param("ss", $email, $role);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateCustomer($email, $birth_date, $password, $name, $surname, $phone, $city, 
    $postal_code, $province, $address){
        $email = $_SESSION["username"];
        $role = $_SESSION["role"];
        $stmt = $this->db->prepare("UPDATE user SET Email = ?, Birth_date = ?, Password = ?, Name = ?, Surname = ?, Phone = ?, City = ?, Postal_Code = ?,
         Province = ?, Address = ?, Role = ? WHERE Email = ?");
        $stmt->bind_param("sssssisissss", $email, $birth_date, $password, $name, $surname, $phone, $city, 
        $postal_code, $province, $address,$role, $email);
        $stmt->execute();
    }

    public function getCreditCard($owner, $expire_date, $card){
        $stmt = $this->db->prepare("SELECT Number FROM credit_card
         WHERE Owner = ? AND Expire_date = ? AND Number = ?;");
        $stmt->bind_param("ssi", $owner, $expire_date, $card);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPaymentInfo(){
        $email = $_SESSION["username"];
        $stmt = $this->db->prepare("SELECT Owner, Card_number, Expire_date 
        FROM payment_info, credit_card WHERE payment_info.Card_number = credit_card.Number AND Email = ?;");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function deletePaymentInfo($card){
        $stmt = $this->db->prepare("DELETE FROM payment_info WHERE Card_number = ?;");
        $stmt->bind_param("i", $card);
        $stmt->execute();
    }

    public function addPaymentInfo($number){
        $email = $_SESSION["username"];
        $stmt = $this->db->prepare("INSERT INTO payment_info (Card_number, Email) VALUES (?, ?);");
        $stmt->bind_param("is", $number, $email);
        $stmt->execute();
    }

    public function getMyOrders(){
        $email = $_SESSION["username"];
        $stmt = $this->db->prepare("SELECT Status, Order_id, Order_date, Shipped_date FROM prints_order, user
        WHERE user.Email = prints_order.Email AND prints_order.Email = ? ORDER BY Order_date DESC");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrderProducts(){
        $email = $_SESSION["username"];
        $stmt = $this->db->prepare("SELECT picture.Image, Picture_title, print_technique.Description,
         passpartout.Specifications, frame.Description AS Framedesc, final_product.Order_id
          FROM prints_order, user, print_technique, passpartout, frame, final_product, picture
           WHERE prints_order.Order_id = final_product.Order_id AND
            final_product.Technique_id = print_technique.Technique_id AND
             final_product.Frame_id = frame.Frame_id AND
              final_product.Passpartout_id = passpartout.Passpartout_id AND
               user.Email = prints_order.Email AND
                Title = Picture_title AND user.Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getValueFromTitle($title) {
        $stmt = $this->db->prepare("SELECT Base_price, Discount FROM Picture WHERE Title=?");
        $stmt->bind_param("s", $title);
    
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNotifications() {
        $status = "new";
        $email = $_SESSION["username"];
        $stmt = $this->db->prepare("SELECT tracking_notification.Order_id, Data,
        Description FROM user, tracking_notification, prints_order WHERE
         prints_order.Order_id = tracking_notification.Order_id AND user.Email = prints_order.Email AND user.Email = ?
         AND tracking_notification.Status = ? ORDER BY Data DESC");
        $stmt->bind_param("ss", $email, $status);

        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function clearNotifications() {
        $status = "seen";
        $email = $_SESSION["username"];
        $stmt = $this->db->prepare("UPDATE tracking_notification, user, prints_order SET 
        tracking_notification.Status = ? WHERE prints_order.Order_id = tracking_notification.Order_id
        AND user.Email = prints_order.Email AND user.Email = ?");
        $stmt->bind_param("ss", $status, $email);
        $stmt->execute();
    }
}
?>
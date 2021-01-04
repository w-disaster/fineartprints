<?php

class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }        
    }

    public function checkLogin($email, $password){
        $stmt = $this->db->prepare("SELECT Email, Role FROM user WHERE email = ? AND password = ?");
        $stmt->bind_param('ss',$email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPictureFromTitle($title){
        $stmt = $this->db->prepare("SELECT * FROM picture WHERE Title=?");
        $stmt->bind_param("s", $title);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCustomerCreditCardByEmail($email){
        $stmt = $this->db->prepare("SELECT Card_number FROM payment_info WHERE Email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTechniquesFromPictureTitle($title){
        $stmt = $this->db->prepare("SELECT print_technique.Technique_id, Image, Description, Price_per_cm2 FROM print_technique, art_print WHERE print_technique.Technique_id = art_print.Technique_id AND art_print.Picture_title=?");
        $stmt->bind_param("s", $title);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getFramesFromSeller($seller) {
        $stmt = $this->db->prepare("SELECT frame.Frame_id, Image, Description, Price FROM make_frame_available, frame WHERE make_frame_available.Email = ? AND make_frame_available.Frame_id = frame.Frame_id");
        $stmt->bind_param("s", $seller);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPasspartoutsFromSeller($seller) {
        $stmt = $this->db->prepare("SELECT passpartout.Passpartout_id, Image, Specifications, Price_per_cm2 FROM make_passpartout_available, passpartout WHERE 
        make_passpartout_available.Email = ? AND make_passpartout_available.Passpartout_id = passpartout.Passpartout_id");
        $stmt->bind_param("s", $seller);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTechniqueFromId($technique_id){
        $stmt = $this->db->prepare("SELECT * FROM print_technique WHERE Technique_id = ?");
        $stmt->bind_param("i", $technique_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getFrameFromId($frame_id) {
        $stmt = $this->db->prepare("SELECT * FROM frame WHERE Frame_id = ?");
        $stmt->bind_param("i", $frame_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPasspartoutFromId($passpartout_id) {
        $stmt = $this->db->prepare("SELECT * FROM passpartout WHERE 
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
    $postal_code, $province, $address, $role){
        $stmt = $this->db->prepare("INSERT INTO user (Email, Birth_date, Password, Name, Surname, Phone, City, Postal_Code,
         Province, Address, Role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
        $stmt->bind_param("sssssisisss", $email, $birth_date, $password, $name, $surname, $phone, $city, 
        $postal_code, $province, $address, $role);
        $stmt->execute();
    }

    public function addPaymentInfo($email, $number){
        $stmt = $this->db->prepare("INSERT INTO payment_info (Card_number, Email) VALUES (?, ?)");
        $stmt->bind_param("ss", $number, $email);
        $stmt->execute();
    }

    public function getUser($email){
        $stmt = $this->db->prepare("SELECT Email, Birth_date, Name, Surname, Password, Phone, City, Postal_code,
         Province, Address FROM user WHERE Email = ?;");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateCustomer($email, $birth_date, $password, $name, $surname, $phone, $city, 
    $postal_code, $province, $address){
        $role = "customer";
        $stmt = $this->db->prepare("UPDATE user SET Email = ?, Birth_date = ?, Password = ?, Name = ?, Surname = ?, Phone = ?, City = ?, Postal_Code = ?,
         Province = ?, Address = ?, Role = ? WHERE Email = ?");
        $stmt->bind_param("sssssisissss", $email, $birth_date, $password, $name, $surname, $phone, $city, 
        $postal_code, $province, $address,$role, $email);
        $stmt->execute();
    }

    public function getCreditCard($owner, $expire_date, $number){
        $stmt = $this->db->prepare("SELECT Number FROM credit_card WHERE Owner = ? AND Expire_date = ? AND Number = ?");
        $stmt->bind_param("sss", $owner, $expire_date, $number);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPaymentInfos($email){
        $status = "in use";
        $stmt = $this->db->prepare("SELECT Owner, Card_number, Expire_date 
        FROM payment_info, credit_card WHERE payment_info.Card_number = credit_card.Number
         AND Email = ? AND Status = ?;");
        $stmt->bind_param("ss", $email, $status);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function isPaymentInfoInUse($email, $card){
        $status = "in use";
        $stmt = $this->db->prepare("SELECT Owner, Card_number, Expire_date 
        FROM payment_info, credit_card WHERE payment_info.Card_number = credit_card.Number
         AND Email = ? AND Status = ?;");
        $stmt->bind_param("ss", $email, $status);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updatePaymentInfo($email, $card, $status){
        $stmt = $this->db->prepare("UPDATE payment_info SET 
        Status = ? WHERE Card_number = ? AND Email = ?;");
        $stmt->bind_param("sis",$status, $card, $email);
        $stmt->execute();
    }

    public function getMyOrders($email){
        $stmt = $this->db->prepare("SELECT Status, Order_id, Order_date, Status FROM prints_order, user
        WHERE user.Email = prints_order.Email AND prints_order.Email = ? ORDER BY Order_date DESC");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrderProducts($email){
        $stmt = $this->db->prepare("SELECT picture.Image, Picture_title, print_technique.Description,
         passpartout.Specifications, frame.Description  AS Framedesc, final_product.Price, final_product.Order_id
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
        $stmt = $this->db->prepare("SELECT Base_price, Discount FROM picture WHERE Title=?");
        $stmt->bind_param("s", $title);
    
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNotifications($email) {
        $status = "new";
        $stmt = $this->db->prepare("SELECT tracking_notification.Order_id, Data,
        prints_order.Status AS Order_status FROM user, tracking_notification, prints_order WHERE
         prints_order.Order_id = tracking_notification.Order_id AND
          user.Email = prints_order.Email AND user.Email = ?
         AND tracking_notification.Status = ? ORDER BY Data DESC");
        $stmt->bind_param("ss", $email, $status);

        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function clearNotifications($email) {
        $status = "seen";
        $stmt = $this->db->prepare("UPDATE tracking_notification, user, prints_order SET 
        tracking_notification.Status = ? WHERE prints_order.Order_id = tracking_notification.Order_id
        AND user.Email = prints_order.Email AND user.Email = ?");
        $stmt->bind_param("ss", $status, $email);
        $stmt->execute();
    }
}
?>
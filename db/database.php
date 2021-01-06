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
        /* I check if there is a user with specified email */
        $stmt = $this->db->prepare("SELECT Email, Role, Password, Salt FROM user WHERE Email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();

        /* query result fetching */
        $stmt->store_result();
        $stmt->bind_result($email, $role, $db_password, $salt);
        $stmt->fetch();

        /* I check if the password is correct */
        $password = hash('sha512', $password.$salt);
        if($stmt->num_rows == 1) {
            /* We check if the password match the one on the database */
            if ($db_password == $password) {
                /* Correct password, XSS prevention: */
                $_SESSION['email'] = htmlspecialchars($email);
                $_SESSION['role'] = htmlspecialchars($role);
                return true;    
            }
        }
        return false;
    }

    public function getPictureFromTitle($title){
        $stmt = $this->db->prepare("SELECT * FROM picture WHERE Title=?");
        $stmt->bind_param("s", $title);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCustomerCreditCardByEmail($email){
        $status = "in use";
        $stmt = $this->db->prepare("SELECT Card_number FROM payment_info WHERE Email=? AND Status = ?");
        $stmt->bind_param("ss", $email, $status);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPicturesFromSeller($email) {
        $stmt = $this->db->prepare("SELECT * FROM picture WHERE Email=?");
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

    public function insertSupportedTechniqueForPrint($technique_id, $picture_title) {
        $stmt = $this->db->prepare("INSERT INTO art_print (Technique_id, Picture_title) VALUES (?, ?)");
        $stmt->bind_param("is", $technique_id, $picture_title);
        $stmt->execute();
    }

    public function deleteSupportedTechniqueFromPrint($technique_id, $picture_title) {
        $stmt = $this->db->prepare("DELETE FROM art_print WHERE Technique_id=? AND Picture_title=?");
        $stmt->bind_param("is", $technique_id, $picture_title);
        $stmt->execute();
    }

    public function addPicture($parameters) {
        $title = $parameters["title"];
        $description = $parameters["description"];
        $author = $parameters["author"];
        $image = $parameters["image"];
        $base_price = $parameters["base_price"];
        $discount = $parameters["discount"];
        $orientation = $parameters["orientation"];
        $category_name = $parameters["category"];
        $email = $parameters["email"];

        $stmt = $this->db->prepare("INSERT INTO picture (Title, Description, Author, Image, Base_price, Discount, Orientation, Category, Email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssiisss", $title, $description, $author, $image, $base_price, $discount, $orientation, $category_name, $email);
        $stmt->execute();
    }

    public function updatePicture($parameters) {
        $description = $parameters["description"];
        $author = $parameters["author"];
        $image = $parameters["image"];
        $base_price = $parameters["base_price"];
        $discount = $parameters["discount"];
        $orientation = $parameters["orientation"];
        $category_name = $parameters["category"];
        $email = $parameters["email"];

        $stmt = $this->db->prepare("UPDATE picture SET Description = ?, Author = ?, Image = ?, Base_price = ?, Discount = ?, Orientation = ?, Category_name = ?, Email = ? WHERE Title = ?");
        $stmt->bind_param("sssiisss", $description, $author, $image, $base_price, $discount, $orientation, $category_name, $email);
        $stmt->execute();
    }

    public function deletePicture($title) {
        $stmt = $this->db->prepare("DELETE FROM picture WHERE Title=?");
        $stmt->bind_param("s", $title);
        $stmt->execute();
    }

    public function addUser($email, $birth_date, $password, $salt, $name, $surname, $phone, $city, 
    $postal_code, $province, $address, $role){
        $stmt = $this->db->prepare("INSERT INTO user (Email, Birth_date, Password, Salt, Name, Surname, Phone, City, Postal_Code,
         Province, Address, Role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
        $stmt->bind_param("ssssssisisss", $email, $birth_date, $password, $salt, $name, $surname, $phone, $city, 
        $postal_code, $province, $address, $role);
        $stmt->execute();
    }

    public function addPaymentInfo($email, $number){
        $status = "in use";
        $stmt = $this->db->prepare("INSERT INTO payment_info (Card_number, Email, Status) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $number, $email, $status);
        $stmt->execute();
    }

    public function getUser($email){
        $stmt = $this->db->prepare("SELECT Email, Birth_date, Name, Surname, Password, Salt, Phone, City, Postal_code,
         Province, Address FROM user WHERE Email = ?;");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateCustomer($email, $birth_date, $password, $salt, $name, $surname, $phone, $city, 
    $postal_code, $province, $address){
        $role = "customer";
        $stmt = $this->db->prepare("UPDATE user SET Birth_date = ?, Password = ?, Salt = ?, Name = ?, Surname = ?, Phone = ?, City = ?, Postal_Code = ?,
         Province = ?, Address = ?, Role = ? WHERE Email = ?");
        $stmt->bind_param("sssssisissss", $birth_date, $password, $salt, $name, $surname, $phone, $city, 
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

    public function getCustomerCreditCards($email){
        $stmt = $this->db->prepare("SELECT Owner, Card_number, Expire_date 
        FROM payment_info, credit_card WHERE payment_info.Card_number = credit_card.Number
         AND Email = ? AND Status = 'in use';");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function isPaymentInfoRemoved($email, $card){
        $status = "removed";
        $stmt = $this->db->prepare("SELECT * FROM payment_info WHERE Email = ? AND Card_number = ? AND Status = ?;");
        $stmt->bind_param("sis", $email, $card, $status);
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

    public function addFinalProduct($pictureTitle, $technique_id, $frame_id, $passpartout_id, $width, $height, $order_id, $price){
        $stmt = $this->db->prepare("INSERT INTO final_product (Picture_title, Technique_id, Frame_id, Passpartout_id, 
            Art_print_width, Art_print_height, Order_id, Price) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
        $stmt->bind_param("siiiiiii", $pictureTitle, $technique_id, $frame_id, $passpartout_id, $width, $height, $order_id, $price);
        $stmt->execute();
    }

    public function addOrder($city, $postalCode, $address, $orderDate, $email, $cardNumber, $shipperName){

        $order_id = 0;
        $order_id_query = $this->query("SELECT MAX(Order_id) AS Order_id FROM prints_order");
        if(count($order_id_query) > 0){
            $order_id = $order_id_query[0]["Order_id"] + 1;
        }

        $stmt = $this->db->prepare("INSERT INTO prints_order (Order_id, Ship_city, Ship_postal_code, Ship_address,
        Order_date, Email, Card_number, Shipper_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
        $stmt->bind_param("isisssss", $order_id, $city, $postalCode, $address, $orderDate, $email, $cardNumber, $shipperName);

        $stmt->execute();
        return $order_id;
    }

    public function getMyOrders($email){
        $stmt = $this->db->prepare("SELECT Order_id, Order_date, Status FROM prints_order, user
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
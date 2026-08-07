<?php
    include_once __DIR__ . '/../pages/db/confDB.php';
    class Password{
        private $id;
        private $user_id;
        private $initial;
        private $name;
        private $username;
        private $password;
        private $category;
        private $updated;

        public function __construct($id, $user_id, $name, $initial, $username, $password, $category, $updated) {
            $this->id = (int)$id;
            $this->user_id = (int)$user_id;
            $this->name = $name;
            $this->initial = $initial;
            $this->username = $username;
            $this->password = $password;
            $this->category = $category;
            $this->updated = $updated;
        }

        public function getId() {
            return $this->id;
        }
         public function getUser_id() {
            return $this->user_id;
        }
        public function getName() {
            return htmlspecialchars($this->name);
        }
        public function getInitial() {
            return $this->initial;
        }
        public function getUsername() {
            return htmlspecialchars($this->username);
        }
        public function getPassword() {
            return $this->password;
        }
        public function getCategory() {
            return htmlspecialchars($this->category);
        }
        public function getUpdated() {
            return htmlspecialchars($this->updated);
        }



        //GET ID BY TITLE
        public static function getIdByTitle($title) {
            global $conn;
            $stmt = $conn->prepare("SELECT id FROM passwords WHERE name = ?");
            $stmt->bind_param("s", $title);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['id'];
            } else {
                return null;
            }
        }
        //GET password by id
        public static function getPasswordById($id){
            global $conn;

            $stmt = $conn->prepare("SELECT password FROM passwords WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $result = $stmt->get_result();

            if($row = $result->fetch_assoc()){
                return $row['password'];
            }

            return '';
        }


        //FETCHING ALL THE PASSWORDS...
        public static function fetchAllPasswords() {
            global $conn;
            $sql = "SELECT * FROM passwords order by updated_at DESC";
            $result = $conn->query($sql);
            $passwords = [];
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $passwords[] = new Password(
                        $row['id'],
                        $row['user_id'],
                        $row['name'],
                        strtoupper(substr($row['name'], 0, 1)),
                        $row['username'],
                        $row['password'],
                        $row['category'],
                        $row['updated_at']
                    );
                }
            }
            return $passwords;
        }     
        
        //COUNT all of em
        public static function countPSWD($user_id){
            global $conn;
            $sql = "SELECT COUNT(*) AS total FROM passwords WHERE user_id = ?";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            return $row['total'];
        }
        
        //CREATING A NEW PASSWORD ENTRY...
        public static function createPassword($user_id, $name, $initials, $username, $password, $category) {
            global $conn;
            $stmt = $conn->prepare("INSERT INTO passwords (user_id, name, initials, username, password, category) VALUES (?, ?, ?, ?, ?, ?)");
            $initials = strtoupper(substr($name, 0, 1));
            $stmt->bind_param("ssssss", $user_id, $name, $initials, $username, $password, $category);
            try{
                $stmt->execute();
                $_SESSION["password_status"] = "success";
                $_SESSION["password_message"] = "Password added! Reload the page to see the update.";
                return true;

            }catch(Exception $e){
                $_SESSION["password_status"] = "error";
                $_SESSION["password_message"] = "Password added! Reload the page to see the update.";
            }
        }


        //UPDATING AN EXISTING PASSWORD ENTRY
        public static function updatePassword($id, $name, $username, $password, $category) {
            global $conn;

            // initials
            $initials = !empty($name) ? strtoupper(mb_substr($name, 0, 1)) : '';

            $sql = "UPDATE passwords 
                    SET name = ?, 
                        initials = ?, 
                        username = ?, 
                        password = ?, 
                        category = ?, 
                        updated_at = NOW() 
                    WHERE id = ?";

            $stmt = $conn->prepare($sql);

            $stmt->bind_param("sssssi", $name, $initials, $username, $password, $category, $id);

            try {
                
                $stmt->execute();
            } catch (Exception $e) {
                throw new Exception("Error updating password: " . $e->getMessage());
            }
        }
    }
?>
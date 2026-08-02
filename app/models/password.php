<?php
    include("../pages/db/confDB.php");
    class Password{
        private $id;
        private $user_id;
        private $initial;
        private $name;
        private $username;
        private $password;
        private $category;
        private $updated;

        public function __construct($user_id, $name, $initial, $username, $password, $category, $updated) {
            $this->user_id = $user_id;
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
        public function getInitial() {
            return $this->initial;
        }
        public function getName() {
            return htmlspecialchars($this->name);
        }
        public function getUsername() {
            return htmlspecialchars($this->username);
        }
        public function getPassword() {
            return htmlspecialchars($this->password);
        }
        public function getCategory() {
            return htmlspecialchars($this->category);
        }
        public function getUpdated() {
            return htmlspecialchars($this->updated);
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
                        strtoupper(substr($row['name'], 0, 1)),
                        $row['name'],
                        $row['username'],
                        $row['password'],
                        $row['category'],
                        $row['updated_at']
                    );
                }
            }
            return $passwords;
        }     
        
        
        //CREATING A NEW PASSWORD ENTRY...
        public static function createPassword($user_id, $name, $initials, $username, $password, $category) {
            global $conn;
            $stmt = $conn->prepare("INSERT INTO passwords (user_id, name, initials, username, password, category) VALUES (?, ?, ?, ?, ?, ?)");
            $initials = strtoupper(substr($name, 0, 1));
            $stmt->bind_param("ssssss", $user_id, $name, $initials, $username, $password, $category);
            try{
                $stmt->execute();
                header("Location: ../../pages/dashboard.php");
            }catch(Exception $e){
                throw new Exception("Error creating password: " . $e->getMessage());
            }
        }
    }
?>
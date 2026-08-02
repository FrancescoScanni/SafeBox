<?php
    session_start();
    class User{
        
        private ?int $id;
        private string $name;
        private string $email;
        private string $pswd;

        public function __construct(
            string $name,
            string $email,
            string $pswd,
            ?int $id = null
        ) {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->pswd = $pswd;
        }
        // Getters
        public function getId(): ?int { return $this->id; }
        public function getName(): string { return $this->name; }
        public function getEmail(): string { return $this->email; }
        public function getPasswordHash(): string { return password_hash($this->pswd, PASSWORD_DEFAULT); }
        // Setters
        public function setName(string $name): void { $this->name = $name; }
        public function setEmail(string $email): void { $this->email = $email; }


        //--------METHODS

        //1. CREATE USERS
        public function create(User $user){
            global $conn;
            $sql = "INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);

            $name  = $user->getName();
            $email = $user->getEmail();
            $hash  = $user->getPasswordHash();

            $stmt->bind_param("sss", $name, $email, $hash);

            // Execute query
            $stmt->execute();

            // Obtain the ID just updated
            $id = $conn->insert_id;
            $stmt->close();
        }



        //2. LOGIN
        public static function login($email){
            global $conn;
            $sql="SELECT * FROM users WHERE email=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();

            $result = $stmt->get_result();
            $userData = $result->fetch_assoc();
            
            $stmt->close();

            // DATA array or null
            return $userData ?: null; 
        }


    }
?>
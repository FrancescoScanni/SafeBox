<?php
    class Ticket {
        private ?int $id;
        private string $name;
        private string $email;
        private string $topic;
        private string $message;

        public function __construct(
            string $name,
            string $email,
            string $topic,
            string $message,
            ?int $id = null
        ) {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->topic = $topic;
            $this->message = $message;
        }

        // Getters
        public function getId(): ?int { return $this->id; }
        public function getName(): string { return $this->name; }
        public function getEmail(): string { return $this->email; }
        public function getTopic(): string { return $this->topic; }
        public function getMessage(): string { return $this->message; }

        // Setters
        public function setName(string $name): void { $this->name = $name; }
        public function setEmail(string $email): void { $this->email = $email; }
        public function setTopic(string $topic): void { $this->topic = $topic; }
        public function setMessage(string $message): void { $this->message = $message; }


        //--------METHODS
        public static function createTicket($name, $email, $topic, $message) {
            global $conn;
            $sql = "INSERT INTO tickets (name, email, topic, message) VALUES (?, ?, ?, ?)";
            try{
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssss", $name, $email, $topic, $message);
                $stmt->execute();
                $stmt->close();
            }catch(Exception $e){
                echo "Something went wrong: " . $e->getMessage();
            }
            
            
        }

}
<?php
    include_once("../../pages/db/confDB.php");
    global $conn;

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        // Recupera l'ID al posto del nome
        $id = $_GET['id'] ?? null; 
        //echo "ID : " . htmlspecialchars($id) . debug
        
        if ($id) {
            try {
                
                $stmt = $conn->prepare("DELETE FROM passwords WHERE id = ?");
                $stmt->bind_param("i", $id); 
                
                if($stmt->execute()) {
                    header("Location: ../../pages/dashboard.php?section=passwords");
                    exit();
                } else {
                    throw new Exception("Execution failed");
                }
            } catch (Exception $e) {
                echo "Error deleting password: " . $e->getMessage();
            }
        } else {
            echo "Password ID is required.";
        }
    }
?>
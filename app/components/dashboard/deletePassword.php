<?php
    include_once("../../pages/db/confDB.php");

    //DELETING A PASSWORD
    global $conn;

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $pswdName = $_GET['pswdName'] ?? null;
        if ($pswdName) {

            try {
                $stmt = $conn->prepare("DELETE FROM passwords WHERE name = ?");
                $stmt->bind_param("s", $pswdName);
                try{
                    $stmt->execute();
                    header("Location: ../../pages/dashboard.php?section=passwords");
                }catch(Exception $e){
                    throw new Exception("Error deleting password: " . $e->getMessage());
                }

            } catch (Exception $e) {
                echo "Error deleting password: " . $e->getMessage();
            }
        } else {
            echo "Password name is required.";
        }
    }
?>
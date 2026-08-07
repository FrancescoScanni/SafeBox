<?php
    session_start();    
    include_once("../../models/password.php");

    // Initialize variables
    $err = false;
    $title=$username=$pswd=$category="";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id         = $_POST["id"] ?? '';
        $original_title = $_POST["original_title"] ?? '';
        $title         = trim($_POST["title"] ?? '');
        $username         = $_POST["username"] ?? '';
        $pswd         = $_POST["password"] ?? '';
        $category        = $_POST["category"] ?? '';

        // Process form
        if (!$err) {
            try {

                if(empty($pswd)){
                    $pswd = Password::getPasswordById($id);
                }
                $id = getPSWDID($original_title);
                Password::updatePassword($id, $title, $username, $pswd, $category);

                $_SESSION['update_status'] = 'success';
                $_SESSION['update_msg']    = 'Modification successful!';
            } catch (Exception $e) {
                
                $_SESSION['update_status'] = 'error';
                $_SESSION['update_msg']    = 'An error occurred. Try again.';
            }

            header("Location: ../../pages/dashboard.php");
            exit(); // Importante arrestare l'esecuzione dopo l'header
        } else {
            echo "Please fill in all required fields correctly.";
        }
    }


    //fetching pswd ID
    function getPSWDID($original_title){
        try{
            $id=Password::getIdByTitle($original_title);
            return $id;
        }catch(Exception $e){
            echo "Error fetching password ID: " . $e->getMessage();
        }
    }
?>
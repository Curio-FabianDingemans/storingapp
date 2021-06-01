<?php
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        //1. Verbinding
        require_once 'conn.php';
        require_once '../backend/sessionController.php';

        $query="SELECT * FROM `users` WHERE `username` = :username LIMIT 1";
        $statement=$conn->prepare($query);
        $statement->execute([
            "username"=> $username
        ]);
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);

        if(count($users) > 0){
            if(password_verify($password, $users[0]['password'])){
                $_SESSION['Id'] = $users[0]['Id'];
                $_SESSION['username'] = $users[0]['username'];
                header("Location: ../meldingen/index.php");
                die();
            }else{
                $_SESSION["error-type"] = "error";
                $_SESSION["error-msg"] = "Incorrect password";
                header("Location: ../login.php");
                die();
            }
            
        }else{
            $_SESSION["error-type"] = "error";
            $_SESSION["error-msg"] = "Account not found";
            header("Location: ../login.php");
            die();
        }
        
    }
?>
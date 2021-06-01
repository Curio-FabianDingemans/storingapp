<?php
    require_once './backend/sessionController.php';
?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp</title>
    <?php require_once 'head.php'; ?>
</head>

<body>

    <?php require_once 'header.php'; ?>
    
    <div class="container login">
        <div>
            <h1>Login</h1>
            <?php
                if(isset($_SESSION["error-type"])){
                    if($_SESSION["error-type"] == "success"){
                        echo '<div class="box-success">'.$_SESSION["error-msg"].'</div>';
                    }
                    if($_SESSION["error-type"] == "info"){
                        echo '<div class="box-info">'.$_SESSION["error-msg"].'</div>';
                    }
                    if($_SESSION["error-type"] == "error"){
                        echo '<div class="box-error">'.$_SESSION["error-msg"].'</div>';
                    }
                    unset($_SESSION["error-type"]);
                    unset($_SESSION["error-type"]);
                }
            ?>
            <form action="./backend/loginController.php" method="POST">
                <div class="input-group">
                    <label class="input-group-text">Username:</label>
                    <input type="text" name="username" required>
                </div>
                <div class="input-group">
                    <label class="input-group-text">Password:</label>
                <input type="password" name="password" required> 
                </div>
                <input type="submit" value="Inloggen" class="btn btn-dark fullwidth">
            </form>
        </div>
    </div>

</body>

</html>

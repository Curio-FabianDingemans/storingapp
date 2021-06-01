<?php
    require_once '../backend/sessionController.php';
    
    if(!isset($_SESSION['Id'])){
        $_SESSION["error-type"] = "info";
        $_SESSION["error-msg"] = "Je moet eerst inloggen";
        header("Location: ../login.php");
        die();
    }
?>
<?php
    require_once '../backend/conn.php';
    $Id = $_GET['id'];  
    $query="SELECT * FROM `meldingen` WHERE Id=:Id";
    $statement=$conn->prepare($query);
    $statement->execute([
        "Id" => $Id
    ]);
    $items=$statement->fetchAll(PDO::FETCH_ASSOC);

    if(count($items) == 0){
        header("Location: ".$base_url."/meldingen/index.php");
        die();
    }else{
        $type = $items[0]['type'];
        $attractie = $items[0]['attractie'];
        $melder = $items[0]['melder'];
        $capaciteit = $items[0]['capaciteit'];
        $overige_info = $items[0]['overige_info'];
        $prioriteit = $items[0]['prioriteit'];
    }
?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen / Nieuw</title>
    <?php require_once '../head.php'; ?>
</head>

<body>

    <?php require_once '../header.php'; ?>

    <div class="container">
        <h1>Nieuwe melding</h1>

        <form action="../backend/updateMeldingenController.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $Id; ?>" class="form-control" required>
            <div class="input-group">
                <label class="input-group-text" for="type">Type:</label>
                <input type="text" class="form-control" value="<?php echo $type; ?>" required readonly>
            </div>
            <div class="input-group">
                <label class="input-group-text" for="overige_info">Beschijving:</label>
                <textarea name="overige_info" id="overige_info" rows="2" class="form-control" required><?php echo $overige_info; ?></textarea>
            </div>
            <div class="input-group">
                <label class="input-group-text" for="attractie">Atractie</label>
                <input type="text" class="form-control" value="<?php echo $attractie; ?>" required readonly>
                
            </div>
            <div class="input-group">
                <label class="input-group-text" for="capaciteit">Capaciteit p/uur:</label>
                <input type="number" value="0" min="0" max="1000" name="capaciteit" id="capaciteit" class="form-control" value="<?php echo $capaciteit; ?>" required>
            </div>
            <div class="input-group">
                <label class="input-group-text" for="melder">Naam melder:</label>
                <input type="text" name="melder" id="melder" class="form-control" value="<?php echo $melder; ?>" required>
            </div>
            <div class="form-check">
                <?php
                    if($prioriteit == 1){
                        echo '<input class="form-check-input" type="checkbox" name="prioriteit" id="prioriteit" checked>';
                    }else{
                        echo '<input class="form-check-input" type="checkbox" name="prioriteit" id="prioriteit">';
                    }
                ?>
                <label class="form-check-label" for="prioriteit">
                    Heeft prioriteit
                </label>
            </div>
            <br>
            
            <input type="submit" value="Verstuur melding" class="btn btn-dark">

        </form>
    </div>  

</body>

</html>

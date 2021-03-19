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
                <input class="form-control" list="datalistOptions" id="type" name="type" value="<?php echo $type; ?>" required>
                <datalist id="datalistOptions">
                    <option value="Achtbaan">
                    <option value="Draaiend">
                    <option value="Kinder">
                    <option value="Horeca">
                    <option value="Show">
                    <option value="Water">
                    <option value="Overig">
                </datalist>
            </div>
            <div class="input-group">
                <label class="input-group-text" for="overige_info">Overige info:</label>
                <textarea name="overige_info" id="overige_info" rows="2" class="form-control" required><?php echo $overige_info; ?></textarea>
            </div>
            <div class="input-group">
                <label class="input-group-text" for="attractie">Attractie:</label>
                <select name="attractie" id="attractie" class="form-control" required>
                    <?php
                        if($attractie == "Baron 1898"){
                            echo '
                            <option value="Baron 1898" selected>Baron 1898</option>
                            <option value="Max & Moritz">Max & Moritz</option>
                            <option value="Symbolica">Symbolica</option>
                            <option value="Joris En De Draak">Joris En De Draak</option>
                            <option value="Python">Python</option>
                            <option value="Vogel Rock">Vogel Rock</option>
                            <option value="Villa Volta">Villa Volta</option>
                            ';
                        }else if($attractie == "Max & Moritz"){
                            echo '
                            <option value="Baron 1898">Baron 1898</option>
                            <option value="Max & Moritz" selected>Max & Moritz</option>
                            <option value="Symbolica">Symbolica</option>
                            <option value="Joris En De Draak">Joris En De Draak</option>
                            <option value="Python">Python</option>
                            <option value="Vogel Rock">Vogel Rock</option>
                            <option value="Villa Volta">Villa Volta</option>
                            ';
                        }else if($attractie == "Symbolica"){
                            echo '
                            <option value="Baron 1898">Baron 1898</option>
                            <option value="Max & Moritz">Max & Moritz</option>
                            <option value="Symbolica" selected>Symbolica</option>
                            <option value="Joris En De Draak">Joris En De Draak</option>
                            <option value="Python">Python</option>
                            <option value="Vogel Rock">Vogel Rock</option>
                            <option value="Villa Volta">Villa Volta</option>
                            ';
                        }else if($attractie == "Joris En De Draak"){
                            echo '
                            <option value="Baron 1898">Baron 1898</option>
                            <option value="Max & Moritz">Max & Moritz</option>
                            <option value="Symbolica">Symbolica</option>
                            <option value="Joris En De Draak" selected>Joris En De Draak</option>
                            <option value="Python">Python</option>
                            <option value="Vogel Rock">Vogel Rock</option>
                            <option value="Villa Volta">Villa Volta</option>
                            ';
                        }else if($attractie == "Python"){
                            echo '
                            <option value="Baron 1898">Baron 1898</option>
                            <option value="Max & Moritz">Max & Moritz</option>
                            <option value="Symbolica">Symbolica</option>
                            <option value="Joris En De Draak">Joris En De Draak</option>
                            <option value="Python" selected>Python</option>
                            <option value="Vogel Rock">Vogel Rock</option>
                            <option value="Villa Volta">Villa Volta</option>
                            ';
                        }else if($attractie == "Vogel Rock"){
                            echo '
                            <option value="Baron 1898">Baron 1898</option>
                            <option value="Max & Moritz">Max & Moritz</option>
                            <option value="Symbolica">Symbolica</option>
                            <option value="Joris En De Draak">Joris En De Draak</option>
                            <option value="Python">Python</option>
                            <option value="Vogel Rock" selected>Vogel Rock</option>
                            <option value="Villa Volta">Villa Volta</option>
                            ';
                        }else if($attractie == "Villa Volta"){
                            echo '
                            <option value="Baron 1898">Baron 1898</option>
                            <option value="Max & Moritz">Max & Moritz</option>
                            <option value="Symbolica">Symbolica</option>
                            <option value="Joris En De Draak">Joris En De Draak</option>
                            <option value="Python">Python</option>
                            <option value="Vogel Rock">Vogel Rock</option>
                            <option value="Villa Volta" selected>Villa Volta</option>
                            ';
                        }else{
                            echo '
                            <option value="Baron 1898">Baron 1898</option>
                            <option value="Max & Moritz">Max & Moritz</option>
                            <option value="Symbolica">Symbolica</option>
                            <option value="Joris En De Draak">Joris En De Draak</option>
                            <option value="Python">Python</option>
                            <option value="Vogel Rock">Vogel Rock</option>
                            <option value="Villa Volta">Villa Volta</option>
                            ';
                        }
                    ?>
                </select>
            </div>
            <div class="input-group">
                <label class="input-group-text" for="capaciteit">Capaciteit p/uur:</label>
                <input type="number" value="<?php echo $capaciteit; ?>" min="0" max="1000" name="capaciteit" id="capaciteit" class="form-control" required>
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

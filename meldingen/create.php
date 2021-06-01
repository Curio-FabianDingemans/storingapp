<?php
    require_once '../backend/sessionController.php';
    
    if(!isset($_SESSION['Id'])){
        $_SESSION["error-type"] = "info";
        $_SESSION["error-msg"] = "Je moet eerst inloggen";
        header("Location: ../login.php");
        die();
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

        <form action="../backend/addMeldingenController.php" method="POST">
            <div class="input-group">
                <label class="input-group-text" for="type">Type:</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="none">- Kies een optie -</option>
                    <option value="Achtbaan">Achtbaan</option>
                    <option value="Draaiende atractie">Draaiende atractie</option>
                    <option value="Kinderatractie">Kinderatractie</option>
                    <option value="Horeca">Horeca</option>
                    <option value="Parkshows">Parkshows</option>
                    <option value="Waterattractie">Waterattractie</option>
                    <option value="Overig">Overig</option>
                </select>
            </div>
            <div class="input-group">
                <label class="input-group-text" for="overige_info">Beschijving:</label>
                <textarea name="overige_info" id="overige_info" rows="2" class="form-control" required></textarea>
            </div>
            <div class="input-group">
                <label class="input-group-text" for="attractie">Atractie</label>
                <select name="attractie" id="attractie" class="form-control" required>
                    <option value="Baron 1898">Baron 1898</option>
                    <option value="Max & Moritz">Max & Moritz</option>
                    <option value="Symbolica">Symbolica</option>
                    <option value="Joris En De Draak">Joris En De Draak</option>
                    <option value="Python">Python</option>
                    <option value="Vogel Rock">Vogel Rock</option>
                    <option value="Villa Volta">Villa Volta</option>
                </select>
            </div>
            <div class="input-group">
                <label class="input-group-text" for="capaciteit">Capaciteit p/uur:</label>
                <input type="number" value="0" min="0" max="1000" name="capaciteit" id="capaciteit" class="form-control" required>
            </div>
            <div class="input-group">
                <label class="input-group-text" for="melder">Naam melder:</label>
                <input type="text" name="melder" id="melder" class="form-control" required>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="prioriteit" id="prioriteit">
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

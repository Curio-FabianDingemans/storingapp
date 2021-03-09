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
                <label class="input-group-text" for="attractie">Title:</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="input-group">
                <label class="input-group-text" for="attractie">Beschijving:</label>
                <textarea name="desc" id="desc" rows="2" class="form-control" required></textarea>
            </div>
            <div class="input-group">
                <label class="input-group-text" for="atraction">Atractie</label>
                <select name="atraction" id="atraction" class="form-control" required>
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
                <input type="number" value="0" min="0" name="capacity" id="capacity" class="form-control" required>
            </div>
            <div class="input-group">
                <label class="input-group-text" for="melder">Naam melder:</label>
                <input type="text" name="reporter" id="reporter" class="form-control" required>
            </div>
            
            <input type="submit" value="Verstuur melding" class="btn btn-dark">

        </form>
    </div>  

</body>

</html>

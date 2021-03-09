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
        echo '
        <tr>
            <td>Geen meldingen</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        ';
    }else{
        $Title = $items[0]['Title'];
        $Atraction = $items[0]['Atraction'];
        $Reporter = $items[0]['Reporter'];
        $Capacity = $items[0]['Capacity'];
        $Desc = $items[0]['Desc'];
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
                <label class="input-group-text" for="attractie">Title:</label>
                <input type="text" name="title" id="title" class="form-control" value="<?php echo $Title; ?>" required>
            </div>
            <div class="input-group">
                <label class="input-group-text" for="attractie">Beschijving:</label>
                <textarea name="desc" id="desc" rows="2" class="form-control" required><?php echo $Desc; ?></textarea>
            </div>
            <div class="input-group">
                <label class="input-group-text" for="atraction">Atractie</label>
                <select name="atraction" id="atraction" class="form-control" required>
                    <?php
                        if($Atraction == "Baron 1898"){
                            echo '
                            <option value="Baron 1898" selected>Baron 1898</option>
                            <option value="Max & Moritz">Max & Moritz</option>
                            <option value="Symbolica">Symbolica</option>
                            <option value="Joris En De Draak">Joris En De Draak</option>
                            <option value="Python">Python</option>
                            <option value="Vogel Rock">Vogel Rock</option>
                            <option value="Villa Volta">Villa Volta</option>
                            ';
                        }else if($Atraction == "Max & Moritz"){
                            echo '
                            <option value="Baron 1898">Baron 1898</option>
                            <option value="Max & Moritz" selected>Max & Moritz</option>
                            <option value="Symbolica">Symbolica</option>
                            <option value="Joris En De Draak">Joris En De Draak</option>
                            <option value="Python">Python</option>
                            <option value="Vogel Rock">Vogel Rock</option>
                            <option value="Villa Volta">Villa Volta</option>
                            ';
                        }else if($Atraction == "Symbolica"){
                            echo '
                            <option value="Baron 1898">Baron 1898</option>
                            <option value="Max & Moritz">Max & Moritz</option>
                            <option value="Symbolica" selected>Symbolica</option>
                            <option value="Joris En De Draak">Joris En De Draak</option>
                            <option value="Python">Python</option>
                            <option value="Vogel Rock">Vogel Rock</option>
                            <option value="Villa Volta">Villa Volta</option>
                            ';
                        }else if($Atraction == "Joris En De Draak"){
                            echo '
                            <option value="Baron 1898">Baron 1898</option>
                            <option value="Max & Moritz">Max & Moritz</option>
                            <option value="Symbolica">Symbolica</option>
                            <option value="Joris En De Draak" selected>Joris En De Draak</option>
                            <option value="Python">Python</option>
                            <option value="Vogel Rock">Vogel Rock</option>
                            <option value="Villa Volta">Villa Volta</option>
                            ';
                        }else if($Atraction == "Python"){
                            echo '
                            <option value="Baron 1898">Baron 1898</option>
                            <option value="Max & Moritz">Max & Moritz</option>
                            <option value="Symbolica">Symbolica</option>
                            <option value="Joris En De Draak">Joris En De Draak</option>
                            <option value="Python" selected>Python</option>
                            <option value="Vogel Rock">Vogel Rock</option>
                            <option value="Villa Volta">Villa Volta</option>
                            ';
                        }else if($Atraction == "Vogel Rock"){
                            echo '
                            <option value="Baron 1898">Baron 1898</option>
                            <option value="Max & Moritz">Max & Moritz</option>
                            <option value="Symbolica">Symbolica</option>
                            <option value="Joris En De Draak">Joris En De Draak</option>
                            <option value="Python">Python</option>
                            <option value="Vogel Rock" selected>Vogel Rock</option>
                            <option value="Villa Volta">Villa Volta</option>
                            ';
                        }else if($Atraction == "Villa Volta"){
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
                <input type="number" value="0" min="0" name="capacity" id="capacity" class="form-control" value="<?php echo $Capacity; ?>" required>
            </div>
            <div class="input-group">
                <label class="input-group-text" for="melder">Naam melder:</label>
                <input type="text" name="reporter" id="reporter" class="form-control" value="<?php echo $Reporter; ?>" required>
            </div>
            
            <input type="submit" value="Verstuur melding" class="btn btn-dark">

        </form>
    </div>  

</body>

</html>

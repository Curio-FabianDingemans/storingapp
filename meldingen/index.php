<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen</title>
    <?php require_once '../head.php'; ?>
    <?php require_once '../backend/conn.php'; ?>
</head>

<body>

    <?php require_once '../header.php'; ?>
    
    <div class="container">
        <h1>Meldingen</h1>
        <a href="create.php">Nieuwe melding &gt;</a>

        <?php if(isset($_GET['msg']))
        {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>

        <div style="display: flex; justify-content: center; align-items: center; color: #666666;">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Type</th>
                        <th scope="col">Atractie</th>
                        <th scope="col">Melder</th>
                        <th scope="col">Capaciteit</th>
                        <th scope="col">Overige Informatie</th>
                        <th scope="col">Gemeld op</th>
                        <th scope="col">Prioriteit</th>
                        <th scope="col">Acties</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query="SELECT * FROM `meldingen` ORDER BY prioriteit DESC, gemeld_op DESC";
                        $statement=$conn->prepare($query);
                        $statement->execute();
                        $items=$statement->fetchAll(PDO::FETCH_ASSOC);

                        if(count($items) == 0){
                            echo '
                            <tr>
                                <td>Geen meldingen</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            ';
                        }else{
                            foreach($items as $item){
                                if($item["prioriteit"] == 0){
                                    $prio = "Nee";
                                }else{
                                    $prio = "Ja";
                                }
                                echo '
                                <tr>
                                    <td>'.$item["type"].'</td>
                                    <td>'.$item["attractie"].'</td>
                                    <td>'.$item["melder"].'</td>
                                    <td>'.$item["capaciteit"].'</td>
                                    <td>'.$item["overige_info"].'</td>
                                    <td>'.$item["gemeld_op"].'</td>
                                    <td>'.$prio.'</td>
                                    <td>
                                        <a href="./edit.php?id='.$item["Id"].'" class="meldingActionIcon iconEdit"><i class="fas fa-edit"></i></a>
                                        <a href="../backend/deleteMeldingenController.php?id='.$item["Id"].'" class="meldingActionIcon IconDelete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                ';
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>  

</body>

</html>

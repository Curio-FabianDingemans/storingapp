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
            <table class="table-responsive table-hover">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Atractie</th>
                        <th scope="col">Melder</th>
                        <th scope="col">Capaciteit</th>
                        <th scope="col">Beschijving</th>
                        <th scope="col">Acties</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query="SELECT * FROM `meldingen` ORDER BY DateTime DESC";
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
                            </tr>
                            ';
                        }else{
                            foreach($items as $item){
                                echo '
                                <tr>
                                    <td>'.$item["Title"].'</td>
                                    <td>'.$item["Atraction"].'</td>
                                    <td>'.$item["Reporter"].'</td>
                                    <td>'.$item["Capacity"].'</td>
                                    <td>'.$item["Desc"].'</td>
                                    <td>6</td>
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

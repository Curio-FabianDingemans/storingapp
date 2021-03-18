<?php

//Variabelen vullen
$type = $_POST['type'];
$overige_info = $_POST['overige_info'];
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit'];
$melder = $_POST['melder'];
$gemeld_op = date('Y-m-d H:i:s', time());

if(isset($_POST['prioriteit'])){
    $prioriteit = 1;
}else{
    $prioriteit = 0;
}

if(!is_numeric($capaciteit)){
    $capaciteit = 0;
}

if($capaciteit < 0){
    $capaciteit = 0;
}

if($capaciteit > 1000){
    $capaciteit = 1000;
}

//1. Verbinding
require_once 'conn.php';

//2. Query
$query="INSERT INTO `meldingen`(`type`, `overige_info`, `attractie`, `melder`, `capaciteit`, `gemeld_op`, `prioriteit`) VALUES(:type, :overige_info, :attractie, :melder, :capaciteit, :gemeld_op, :prioriteit)";

//3. Prepare
$statement=$conn->prepare($query);

//4. Execute
$statement->execute([
    "type" => $type,
    "overige_info" => $overige_info,
    "attractie" => $attractie,
    "melder" => $melder,
    "capaciteit" => $capaciteit,
    "gemeld_op" => $gemeld_op,
    "prioriteit" => $prioriteit
]);

header("Location: ../meldingen/index.php");
die();
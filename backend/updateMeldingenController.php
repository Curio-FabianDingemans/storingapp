<?php

//Variabelen vullen
$id = $_POST['id'];
$type = $_POST['type'];
$overige_info = $_POST['overige_info'];
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit'];
$melder = $_POST['melder'];

if(empty($type)){
    echo "Type mag niet leeg zijn";
}

if(empty($overige_info)){
    echo "Overige info mag niet leeg zijn";
}

if(empty($melder)){
    echo "Melder mag niet leeg zijn";
}

$atracties = ["Baron 1898", "Max & Moritz", "Symbolica", "Joris En De Draak", "Python", "Vogel Rock", "Villa Volta"];
if(!in_array($attractie, $atracties)){
    echo "Ongeldige attractie";
}

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

if(is_numeric($capacity)){
    $capacity = 0;
}

//2. Query
$query="UPDATE `meldingen` SET `type`=:type, `overige_info`=:overige_info, `attractie`=:attractie, `melder`=:melder, `capaciteit`=:capaciteit, `prioriteit`=:prioriteit WHERE Id=:Id";

//3. Prepare
$statement=$conn->prepare($query);

//4. Execute
$statement->execute([
    "type" => $type,
    "overige_info" => $overige_info,
    "attractie" => $attractie,
    "melder" => $melder,
    "capaciteit" => $capaciteit,
    "prioriteit" => $prioriteit,
    "Id" => $id
]);

header("Location: ../meldingen/index.php");
die();
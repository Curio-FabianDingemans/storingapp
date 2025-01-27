<?php

//Variabelen vullen
$type = $_POST['type'];
$overige_info = $_POST['overige_info'];
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit'];
$melder = $_POST['melder'];
$datetime = date('Y-m-d H:i:s', time());

if($type == "none"){
    echo "Kies een typen";
    die();
}

$types = ["Achtbaan", "Draaiende atractie", "Kinderatractie", "Horeca", "Parkshows", "Waterattractie", "Overig"];
if(!in_array($type, $types)){
    echo "Ongeldige type";
    die();
}

if(empty($overige_info)){
    echo "Overige info mag niet leeg zijn";
    die();
}

if(empty($melder)){
    echo "Melder mag niet leeg zijn";
    die();
}

$atracties = ["Baron 1898", "Max & Moritz", "Symbolica", "Joris En De Draak", "Python", "Vogel Rock", "Villa Volta"];
if(!in_array($attractie, $atracties)){
    echo "Ongeldige attractie";
    die();
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

//2. Query
$query="INSERT INTO `meldingen`(`type`, `overige_info`, `attractie`, `melder`, `capaciteit`, `prioriteit`, `gemeld_op`) VALUES(:type, :overige_info, :attractie, :melder, :capaciteit, :prioriteit, :gemeld_op)";

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
    "gemeld_op" => $datetime
]);

header("Location: ../meldingen/index.php");
die();

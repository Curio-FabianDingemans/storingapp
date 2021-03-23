<?php

//Variabelen vullen
$id = $_POST['id'];
$overige_info = $_POST['overige_info'];
$capaciteit = $_POST['capaciteit'];
$melder = $_POST['melder'];
//1. Verbinding
require_once 'conn.php';

if(empty($overige_info)){
    echo "Overige info mag niet leeg zijn";
    die();
}

if(empty($melder)){
    echo "Melder mag niet leeg zijn";
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
$query="UPDATE `meldingen` SET `overige_info`=:overige_info, `melder`=:melder, `capaciteit`=:capaciteit, `prioriteit`=:prioriteit WHERE Id=:Id";

//3. Prepare
$statement=$conn->prepare($query);

//4. Execute
$statement->execute([
    "overige_info" => $overige_info,
    "melder" => $melder,
    "capaciteit" => $capaciteit,
    "prioriteit" => $prioriteit,
    "Id" => $id
]);

header("Location: ../meldingen/index.php");
die();

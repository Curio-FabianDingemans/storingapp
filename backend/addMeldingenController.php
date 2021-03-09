<?php

//Variabelen vullen
$title = $_POST['title'];
$desc = $_POST['desc'];
$atraction = $_POST['atraction'];
$capacity = $_POST['capacity'];
$reporter = $_POST['reporter'];
$datetime = date('Y-m-d H:i:s', time());
//1. Verbinding
require_once 'conn.php';

//2. Query
$query="INSERT INTO `meldingen`(`Title`, `Desc`, `Atraction`, `Reporter`, `Capacity`, `InsertDateTime`) VALUES(:Title, :Desc, :Atraction, :Reporter, :Capacity, :InsertDateTime)";

//3. Prepare
$statement=$conn->prepare($query);

//4. Execute
$statement->execute([
    "Title" => $title,
    "Desc" => $desc,
    "Atraction" => $atraction,
    "Reporter" => $reporter,
    "Capacity" => $capacity,
    "InsertDateTime" => $datetime
]);

header("Location: ../meldingen/index.php");
die();
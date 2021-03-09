<?php

//Variabelen vullen
$id = $_POST['id'];
$title = $_POST['title'];
$desc = $_POST['desc'];
$atraction = $_POST['atraction'];
$capacity = $_POST['capacity'];
$reporter = $_POST['reporter'];
//1. Verbinding
require_once 'conn.php';

//2. Query
$query="UPDATE `meldingen` SET `Title`=:Title, `Desc`=:Desc, `Atraction`=:Atraction, `Reporter`=:Reporter, `Capacity`=:Capacity WHERE Id=:Id";

//3. Prepare
$statement=$conn->prepare($query);

//4. Execute
$statement->execute([
    "Title" => $title,
    "Desc" => $desc,
    "Atraction" => $atraction,
    "Reporter" => $reporter,
    "Capacity" => $capacity,
    "Id" => $id
]);

header("Location: ../meldingen/index.php");
die();
<?php

//Variabelen vullen
$id = $_GET['id'];
//1. Verbinding
require_once 'conn.php';

//2. Query
$query="DELETE FROM `meldingen` WHERE Id=:Id";

//3. Prepare
$statement=$conn->prepare($query);

//4. Execute
$statement->execute([
    "Id" => $id
]);

header("Location: ../meldingen/index.php");
die();
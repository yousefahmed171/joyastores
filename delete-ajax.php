<?php 
include "conc.php";

$id = $_POST['id'];

// Delete record
$query = "DELETE FROM order WHERE id_order=".$id;
$stmt->prpare($query);
$stmt->execute();

echo 1;
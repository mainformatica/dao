<?php

$conn = new PDO("mysql:dbname=db_php7;host=localhost", "root", "");
$conn->beginTransaction();

$stmt = $conn->prepare("DELETE FROM  tb_usuarios  WHERE idusuario = ?");

$id = 2;


$stmt->execute(array($id));

//$conn->rollback();
$conn->commit();

echo "Deletado com sucesso!";


?>
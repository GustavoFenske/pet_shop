<?php

require_once "../infra/conexao.php";

$id = $_GET['id'];

$sql = "DELETE FROM pets WHERE id = $id";
$conexao->query($sql);

header("Location: cadastro_pet.php");

?>
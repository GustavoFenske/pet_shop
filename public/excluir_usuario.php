<?php

require_once "../infra/conexao.php";

$id = $_GET['id'];

$sql = "DELETE FROM usuarios WHERE id = $id";
$conexao->query($sql);

header("Location: cadastro_usuario.php");

?>
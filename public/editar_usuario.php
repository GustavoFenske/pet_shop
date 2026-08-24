<?php

require_once '../infra/conexao.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $raca = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "UPDATE usuarios SET nome='$nome', email='$raca', telefone='$telefone' WHERE id=$id";
    $conexao->query($sql);

    header("Location: cadastro_usuario.php");
}

$sql_select = "SELECT * FROM usuarios WHERE id = $id";
$resultado = mysqli_query($conexao, $sql_select);
$usuario = mysqli_fetch_assoc($resultado);
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PET SHOP</title>
</head>

<body>

    <form method="POST">
        <h2>Editar Usuário</h2>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $usuario['nome']; ?>">
        <Br>
        <label for="raca">Email:</label>
        <input type="text" id="raca" name="email" value="<?php echo $usuario['email']; ?>">
        <Br>
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value="<?php echo $usuario['telefone']; ?>">
        <Br>
        <button type="submit">Atualizar</button>
    </form>

</body>

</html>
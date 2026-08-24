<?php

require_once '../infra/conexao.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $raca = $_POST['raca_pet'];
    $idade = $_POST['idade'];

    $sql = "UPDATE pets SET nome='$nome', raca_pet='$raca', idade=$idade WHERE id=$id";
    $conexao->query($sql);

    header("Location: cadastro_pet.php");
}

$sql_select = "SELECT * FROM pets WHERE id = $id";
$resultado = mysqli_query($conexao, $sql_select);
$pet = mysqli_fetch_assoc($resultado);
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PET SHOP</title>
</head>

<body>

    <form method="POST">
        <h2>Editar Pet</h2>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $pet['nome']; ?>">
        <Br>
        <label for="raca">Raça:</label>
        <input type="text" id="raca" name="raca_pet" value="<?php echo $pet['raca_pet']; ?>">
        <Br>
        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" value="<?php echo $pet['idade']; ?>">
        <Br>
        <button type="submit">Atualizar</button>
    </form>

</body>

</html>
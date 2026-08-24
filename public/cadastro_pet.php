<?php

require_once "../infra/conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $raca = $_POST['raca'];
    $idade = $_POST['idade'];

    $sql = "INSERT INTO pets (nome, raca_pet, idade) VALUES ('$nome', '$raca', '$idade')";
    $conexao->query($sql);
}

$sql_select = "SELECT * FROM pets";
$resultado = mysqli_query($conexao, $sql_select);

$sql_select = "SELECT * FROM usuarios";
$resultado_usuarios = mysqli_query($conexao, $sql_select);


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PET SHOP</title>
</head>

<body>
    <header></header>
    <label for="id">USARIO RESPONSAVEL</label>


    <select name="id" id="id_usuario">
                <?php while ($usuario = mysqli_fetch_assoc($resultado_usuarios)){ ?>
                    <option value="<?= $usuario['id'] ?>"><?= $usuario['nome'] ?></option>
                <?php }?>

    </select>


    <h1>Cadastro de Pets</h1>
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="raca">Raça:</label>
        <input type="text" id="raca" name="raca" required>

        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" required>

        <button type="submit">Cadastrar</button>
    </form>

    <h2>PETS CADASTRADOS</h2>

    <table>
        <tr>
            <th>Nome</th>
            <th>Raça</th>
            <th>Idade</th>
        </tr>

        <?php while ($pet = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($pet['nome']) ?></td>
                <td><?php echo htmlspecialchars($pet['raca_pet']) ?></td>
                <td><?php echo htmlspecialchars($pet['idade']) ?></td>
            </tr>

            <td>
                <a href="editar_pet.php?id=<?= $pet['id'] ?>">Editar</a>
                <a href="excluir_pet.php?id=<?= $pet['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este pet?')">Excluir</a>
            </td>
        <?php } ?>


    </table>

        <a href="../index.php">VOLTAR</a>

</body>

</html>
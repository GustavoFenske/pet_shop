<?php

require_once('../infra/conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_usuario = $_POST['id_usuario'];
    $id_pet = $_POST['id_pet'];

    $sql = "UPDATE usuarios
            SET id_pet = '$id_pet'
            WHERE id = '$id_usuario'";

    $conexao->query($sql);

    header("Location: cadastro_usuario.php");
    exit;
}


$sql_select_usuarios = "SELECT * FROM usuarios";
$resultado_usuarios = mysqli_query($conexao, $sql_select_usuarios);


$sql_select_pets = "SELECT * FROM pets";
$resultado_pets = mysqli_query($conexao, $sql_select_pets);

?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PET SHOP</title>
</head>

<body>

    <form method="POST">

        <h2>Associar Pet ao Usuário</h2>

        <label for="id_usuario">Selecione o usuário:</label>

        <select name="id_usuario" id="id_usuario" required>

            <?php while ($usuario = mysqli_fetch_assoc($resultado_usuarios)) { ?>

                <option value="<?php echo $usuario['id']; ?>">
                    <?php echo $usuario['nome']; ?>
                </option>

            <?php } ?>

        </select>

        <br><br>


        <label for="id_pet">Selecione o pet:</label>

        <select name="id_pet" id="id_pet" required>

            <?php while ($pet = mysqli_fetch_assoc($resultado_pets)) { ?>

                <option value="<?php echo $pet['id']; ?>">
                    <?php echo $pet['nome']; ?>
                </option>

            <?php } ?>

        </select>

        <br><br>


        <input type="submit" value="Associar">

    </form>

    <br>

    <a href="../index.php">VOLTAR</a>

</body>

</html>
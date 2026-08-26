<?php

require_once "../infra/conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "INSERT INTO usuarios (nome, email, telefone) VALUES ('$nome', '$email', '$telefone')";
    $conexao->query($sql);
}



$sql_select = "SELECT usuarios.id, usuarios.nome, usuarios.email, usuarios.telefone,
       GROUP_CONCAT(pets.nome SEPARATOR ', ') AS pets
FROM usuarios
LEFT JOIN pets ON pets.id_usuario = usuarios.id
GROUP BY usuarios.id";
$resultado = mysqli_query($conexao, $sql_select);

?>








<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PET SHOP </title>
    
</head>
<body>
    
    <h1>Cadastro de Usuário</h1>
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required><br><br>

        <input type="submit" value="cadastrar">
    </form>

    <H2>PESSOAS CADASTRADAS</H2>

    <table>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <br>
            <th>Pet</th>
        </tr>


        <?php while($usuario = mysqli_fetch_assoc($resultado)){ ?>
            <tr>
                <td><?php echo $usuario['nome']; ?></td>
                <td><?php echo $usuario['email']; ?></td>
                <td><?php echo $usuario['telefone']; ?></td>
                <td><?php echo $usuario['nome']; ?></td>
                <td><?php echo $usuario['pets'] ?? 'Nenhum'; ?></td>

            </tr>

             <td>
                  <a href="editar_usuario.php?id=<?php echo $usuario['id']; ?>">Editar</a> | 
                <a href="excluir_usuario.php?id=<?php echo $usuario['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                <a href="associar_pet.php?id=<?php echo $usuario['id']; ?>">Associar PET</a>
                </td>

        <?php } ?>
    </table>

    <a href="../index.php">VOLTAR</a>


</body>
</html>
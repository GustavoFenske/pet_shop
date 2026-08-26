<?php

require_once "../infra/conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "INSERT INTO usuarios (nome, email, telefone) 
            VALUES ('$nome', '$email', '$telefone')";

    $conexao->query($sql);

    header("Location: cadastro_usuario.php");
    exit;
}

$sql_select = "SELECT usuarios.id, usuarios.nome, usuarios.email, usuarios.telefone,
       GROUP_CONCAT(pets.nome SEPARATOR ', ') AS pets
FROM usuarios
LEFT JOIN pets ON pets.id_usuario = usuarios.id
GROUP BY usuarios.id";

$resultado = mysqli_query($conexao, $sql_select);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário - Amigo Pets</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>

<header class="header">

    <a href="../index.php" class="logo">
        <div class="logo-pata">🐾</div>

        <div class="logo-texto">
            <h1>AMIGO <span>PETS</span></h1>
            <p>- Sistema de Gestão</p>
        </div>
    </a>

</header>

<main class="pagina-usuario">

    <section class="formulario-container">

        <h2>Cadastro de Usuário</h2>
        <p class="subtitulo">Cadastre um novo cliente</p>

        <form method="POST">

            <div class="campo">
                <input type="text" id="nome" name="nome" placeholder="Nome" required>
            </div>

            <div class="campo">
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>

            <div class="campo">
                <input type="text" id="telefone" name="telefone" placeholder="Telefone" required>
            </div>

            <button type="submit">CADASTRAR</button>

        </form>

    </section>

    <section class="pessoas-container">

        <h2>PESSOAS CADASTRADAS</h2>

        <div class="lista-pessoas">

            <?php while ($usuario = mysqli_fetch_assoc($resultado)) { ?>

                <div class="pessoa-card">

                    <div class="informacoes">

                        <strong class="email">
                            <?php echo $usuario['email']; ?>
                        </strong>

                        <span class="dados">
                            <?php echo $usuario['telefone']; ?> |
                            <?php echo $usuario['nome']; ?>
                        </span>

                        <span class="pet">
                            Pet: <?php echo $usuario['pets'] ?? 'Nenhum'; ?>
                        </span>

                        <div class="acoes">

                            <a href="editar_usuario.php?id=<?php echo $usuario['id']; ?>" class="editar">Editar</a> |
                            <a href="excluir_usuario.php?id=<?php echo $usuario['id']; ?>" class="excluir" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a> |
                            <a href="associar_pet.php?id=<?php echo $usuario['id']; ?>" class="associar">Associar PET</a>

                        </div>

                    </div>

                </div>

            <?php } ?>

        </div>

    </section>

    <a href="../index.php" class="voltar">← Voltar</a>

</main>

</body>
</html>
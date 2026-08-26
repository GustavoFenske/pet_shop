<?php

require_once "../infra/conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $raca_pet = $_POST['raca_pet'];
    $idade = $_POST['idade'];

    $sql = "INSERT INTO pets (nome, raca_pet, idade) 
            VALUES ('$nome', '$raca_pet', '$idade')";

    $conexao->query($sql);

    header("Location: cadastro_pet.php");
    exit;
}

$sql_select = "SELECT * FROM pets";

$resultado = mysqli_query($conexao, $sql_select);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pets - Amigo Pets</title>
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

    <main class="pagina-pet">

        <section class="formulario-pet">

            <h2>Cadastro de Pets</h2>

            <form method="POST">

                <div class="campo-pet">
                    <input type="text" id="nome" name="nome" placeholder="Nome" required>
                </div>

                <div class="campo-pet">
                    <input type="text" id="raca_pet" name="raca_pet" placeholder="Raça" required>
                </div>

                <div class="campo-pet">
                    <input type="number" id="idade" name="idade" placeholder="Idade" required>
                </div>

                <button type="submit">CADASTRAR</button>

            </form>

        </section>

        <section class="pets-container">

            <h2>PETS CADASTRADOS</h2>

            <div class="lista-pets">

                <?php while ($pet = mysqli_fetch_assoc($resultado)) { ?>

                    <div class="pet-card">

                        <div>
                            <img class="pet-avatar" src="../style/imagens/cachorro1.jpg" alt="Cachorro">
                        </div>

                        <div class="pet-informacoes">

                            <strong><?php echo $pet['nome']; ?></strong>

                            <span><?php echo $pet['raca_pet']; ?> | <?php echo $pet['idade']; ?></span>

                            <div class="pet-acoes">

                                <a href="editar_pet.php?id=<?php echo $pet['id']; ?>">Editar</a>

                                |

                                <a href="excluir_pet.php?id=<?php echo $pet['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>

                            </div>

                        </div>

                    </div>

                <?php } ?>

            </div>

        </section>

        <a href="../index.php" class="voltar-pet">VOLTAR</a>

    </main>

</body>

</html>
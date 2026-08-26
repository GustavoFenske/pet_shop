<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Amigo Pets</title>

    <link rel="stylesheet" href="style/style.css">
</head>

<body>

    <header class="header">

        <div class="logo">
            <div class="logo-pata">🐾</div>

            <div>
                <h1>AMIGO <span>PETS</span></h1>
                <p>Sistema de Gestão</p>
            </div>
        </div>

    </header>


    <main class="principal">

        <div class="imagem-container">

            <img 
                src="style/imagens/cachorro1.jpg" 
                alt="Cachorro"
            >

        </div>


        <div class="cadastros">

            <a 
                href="public/cadastro_usuario.php" 
                class="botao usuario"
            >
                <div class="icone">👤</div>

                <div class="texto">
                    <strong>CADASTRO DE USUÁRIO</strong>
                    <span>Gerenciar clientes e usuários</span>
                </div>
            </a>


            <a 
                href="public/cadastro_pet.php" 
                class="botao pet"
            >
                <div class="icone">🐶</div>

                <div class="texto">
                    <strong>CADASTRO DE PET</strong>
                    <span>Gerenciar seus amigos</span>
                </div>
            </a>

        </div>

    </main>

</body>

</html>
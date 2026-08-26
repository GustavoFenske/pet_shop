Umigos - Sistema de Cadastro e Gerenciamento de Pet Shop

Sistema web desenvolvido em PHP e MySQL para gerenciar clientes e seus animais de estimação atendidos pela pet shop AUmigos.

📋 sobre o projeto

A AUmigos precisa saber quem é o responsável por cada animal e quais animais pertencem a cada cliente. O sistema implementa um CRUD completo de Clientes (usuarios) e Animais (pets), com relacionamento 1:N — um cliente pode ter vários animais, mas cada animal pertence a apenas um cliente.

⚙️ Funcionalidades implementadas

   CRUD de Clientes (usuarios)

            Cadastrar cliente
             Listar clientes
             Editar cliente
             Excluir cliente
             Visualizar dados de um cliente

CRUD de Animais (pets)

             Cadastrar animal
             Listar animais
             Editar animal
             Excluir animal
             Associar um animal a um cliente (via id_usuario)
             Exibir o nome do responsável na listagem (via JOIN)

    📁 Estrutura de pastas 

pet_shop/
├── infra/
│   └── conexao.php          # Conexão com o banco de dados (mysqli)
├── public/
│   ├── cadastro_usuario.php # Cadastro e listagem de clientes
│   ├── editar_usuario.php   # Edição de cliente
│   ├── excluir_usuario.php  # Exclusão de cliente
│   ├── associar_pet.php     # Associação de um animal a um cliente
│   ├── cadastro_pet.php     # Cadastro e listagem de animais
│   ├── editar_pet.php       # Edição de animal
│   ├── excluir_pet.php      # Exclusão de animal
│   └── detalhes_cliente.php # Tela de detalhes do cliente
└── index.php                 # Página inicial / menu do sistema

Ajuste os nomes acima conforme os arquivos realmente existentes no seu projeto.

    🚀 Como executar o projeto localmente
    
Copie a pasta do projeto para C:\xampp\htdocs\.
Inicie os módulos Apache e MySQL no XAMPP.
Importe o script SQL do banco de dados pelo phpMyAdmin.
Confira os dados de conexão em infra/conexao.php.
Acesse http://localhost/pet_shop/index.php no navegador.

👤 Autor

Gustavo Fenske — 2026
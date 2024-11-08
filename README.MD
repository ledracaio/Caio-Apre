# Sistema de Gerenciamento de Pessoas

Este sistema permite o gerenciamento de pessoas por meio de um CRUD (Cadastro, Edição, Listagem e Exclusão) completo. Desenvolvido com Laravel e Vue.js, o sistema possui autenticação e controle de acesso. Após o login, o usuário pode acessar as funcionalidades de manutenção de pessoas.

# Funcionalidades

- Login e Autenticação de Usuário

- Cadastro, Edição, Listagem e Exclusão de Pessoas

- Interface moderna com Vue.js e estilização com Bootstrap


# Tecnologias Utilizadas

- Laravel - Backend

- Vue.js - Frontend

- PostgreSQL - Banco de Dados

- Bootstrap - Estilização


# Requisitos

- PHP >= 8.x

- Composer >= 2.x

- Node.js >= 16.x

- PostgreSQL >= 12.x

- NPM >= 8.x


# Instruções para Instalação e Configuração

1. Clone o Repositório

git clone https://github.com/ledracaio/Caio-Apre.git
cd Caio-Apre
cd CadastroPessoas

2. Instale Dependências PHP

Utilize o Composer para instalar as dependências:

composer install

3. Instale Dependências JavaScript

Utilize o NPM para instalar as dependências do frontend:

npm install

4. Configure o Banco de Dados

* Verifique se a extensão do banco a ser utilizado está ativo no php.ini

Renomeie o arquivo .env.example para .env e configure as variáveis de ambiente para o PostgreSQL:

cp .env.example .env

No arquivo .env, ajuste as configurações do banco de dados:

DB_CONNECTION=pgsql //Estou utilizando o pgsql porém pode ser usado também com mysql

DB_HOST=127.0.0.1 // localhost

DB_PORT=5432 // Caso utilize mysql troque a porta para a desejada ou padrão 3306

DB_DATABASE=CaioApresentame

DB_USERNAME=postgres // Usuário onde está o database

DB_PASSWORD=postgres // Senha do usuário onde está o database


(Caso não tenha o database criado Execute a criação ou utilize um database existente)

5. Crie a Estrutura do Banco de Dados

Execute o comando para rodar as migrações e criar a tabela pessoas:

php artisan migrate

6. Gere a Chave da Aplicação

Para segurança, gere uma chave de aplicação:

php artisan key:generate

7. Compile os Assets do Frontend

Compile os arquivos do Vue.js e Bootstrap:

npm run dev


# Como Executar o Sistema

Inicie o servidor local do Laravel:

php artisan serve

Acesse o sistema em: http://localhost:8000


# Fluxo de Uso

1. Acesse http://localhost:8000.

2. Cadastre um usuário clicando em Register

2.1. Realize o login com um usuário registrado.

3. Após o login, você terá acesso às seguintes funcionalidades:

Listagem de Pessoas: Selecione a aba "Gestão de Pessoas" (/pessoas)

Cadastro de Nova Pessoa: 
- Selecione a aba "Gestão de Pessoas"
- Clique no botão "Criar nova pessoa"
- Insira as informações da pessoa
- Clique em "Salvar"
(/pessoas/create)

Edição de Pessoa: 
- Selecione a aba "Gestão de Pessoas"
- Escolha uma pessoa para editar
- Clique no botão "Editar"
- Altere os dados desejados
- Clique em "Salvar"
(/pessoas/{id}/edit)

Exclusão de Pessoa
- Selecione a aba "Gestão de Pessoas"
- Escolha uma pessoa para editar
- Clique no botão "Exluir"
- Confirme o alert


# Estrutura do Projeto

O projeto é organizado em duas partes principais:

Backend (Laravel): Gerencia a API, autenticação e manipulação de dados.

Frontend (Vue.js): Exibe a interface para o usuário com interatividade e responsividade.

Estilização (Bootstrap): Proporciona uma aparência moderna e responsiva.


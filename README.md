# Hotel Management System
Este projeto é uma aplicação de gerenciamento de hotéis e quartos, desenvolvida com Laravel 10.x, Inertia.js e Vue.js. A aplicação permite criar, visualizar, atualizar e excluir (CRUD) entidades de Hotéis e Quartos e realiza operações de preenchimento automático de endereços através da API do ViaCEP.

Requisitos do Projeto
Laravel 10.x ou 11.x
Sistema de autenticação simples
Funcionalidade CRUD para as entidades:
Hotéis
Campos: name (obrigatório, único), address (obrigatório), city (obrigatório), state (obrigatório), zip_code (obrigatório), website (opcional)
Quartos
Campos: name (obrigatório), description (obrigatório), hotel_id (chave estrangeira)

Tecnologias Utilizadas
Backend: Laravel 10.x
Frontend: Inertia.js e Vue.js
Estilização: Tailwind CSS
Testes: PHPUnit
Banco de Dados: MySQL
API de Endereços: ViaCEP
Configuração do Projeto
Pré-requisitos
PHP >= 8.1
Composer >= 2.x
MySQL >= 5.7
Node.js >= 14
NPM/Yarn

Instalação
Clone o repositório: git clone https://github.com/seu-usuario/nome-do-repositorio.git
Crie um novo diretório: cd nome-do-repositorio
Instale as dependências do backend: composer install
Instale as dependências do frontend: npm install
Configure o arquivo .env com as informações de banco de dados
Execute as migrações: php artisan migrate --seed
Compile os arquivos do frontend: npm run dev
Inicie o servidor local: php artisan serve
Uso
A aplicação possui um sistema de autenticação simples para acesso às funcionalidades de criação, edição e exclusão de Hotéis e Quartos.

CRUD de Hotéis e Quartos
O sistema permite gerenciar:

Hotéis: Cadastrar, visualizar, atualizar e excluir.
Quartos: Associar quartos a um hotel específico e gerenciar os quartos com as operações CRUD.
Estrutura do Banco de Dados
Tabelas:

Hotels
id (Identificador único do hotel)
name (Nome do hotel)
address, city, state, zip_code (Informações de endereço)
website (Website do hotel)
Rooms
id (Identificador único do quarto)
name (Nome do quarto)
description (Descrição do quarto)
hotel_id (Chave estrangeira para o hotel associado)
Testes
Testes unitários foram implementados para garantir a robustez das operações de CRUD das entidades Hotel e Room.

Bonus e Implementações Adicionais
Seeders e Factories: Utilizados para popular as tabelas com dados iniciais de Hotéis e Quartos.
Tailwind CSS: Utilizado para estilização, proporcionando uma interface mais agradável e responsiva.
To-Do e Melhorias Futuras
Implementar Vuetify: Estilização adicional com Vuetify pode ser considerada para componentes de UI mais avançados.
Implementar Laravel Sail: Para facilitar o ambiente de desenvolvimento com Docker.
Melhorias na Interface de Usuário: Componentes de UI mais sofisticados e interativos.
Testes de Integração: Expandir a cobertura dos testes para incluir testes de integração.
Espero que isso ajude! Lembre-se de que é importante configurar o arquivo .gitignore para excluir os arquivos que não devem ser incluídos no repositório.
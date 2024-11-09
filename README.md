Hotel Management System
Este projeto é uma aplicação de gerenciamento de hotéis e quartos, desenvolvida com Laravel 10.x, Inertia.js e Vue.js. A aplicação permite criar, visualizar, atualizar e excluir (CRUD) entidades de Hotéis e Quartos e realiza operações de preenchimento automático de endereços através da API do ViaCEP.

Sumário
Requisitos do Projeto
Tecnologias Utilizadas
Configuração do Projeto
Pré-requisitos
Instalação
Uso
Autenticação
CRUD de Hotéis e Quartos
Estrutura do Banco de Dados
Testes
Bonus e Implementações Adicionais
To-Do e Melhorias Futuras
Requisitos do Projeto
Laravel 10.x ou 11.x
Sistema de autenticação simples
Funcionalidade CRUD para as entidades:
Hotels
Campos: name (obrigatório, único), address (obrigatório), city (obrigatório), state (obrigatório), zip_code (obrigatório), website (opcional)
Rooms
Campos: name (obrigatório), description (obrigatório), hotel_id (chave estrangeira)
Uso de Migrations para a criação das tabelas
Preenchimento automático de endereço via API do ViaCEP
Frontend com Inertia e Vue.js
Validações de formulário com Laravel
Testes unitários
Documentação clara do código
Bônus
Uso de Seeders e Factories para dados de Hotéis e Quartos
Estilização com Tailwind CSS
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
Clone este repositório:

bash
Copiar código
git clone https://github.com/seu-usuario/nome-do-repositorio.git
cd nome-do-repositorio
Instale as dependências do backend:

bash
Copiar código
composer install
Instale as dependências do frontend:

bash
Copiar código
npm install
Configure o arquivo .env com as informações de banco de dados e execute as migrations:

plaintext
Copiar código
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=hotel_test
DB_USERNAME=root
DB_PASSWORD=
Execute as migrations e seeders para popular o banco de dados:

bash
Copiar código
php artisan migrate --seed
Compile os arquivos do frontend:

bash
Copiar código
npm run dev
Inicie o servidor local:

bash
Copiar código
php artisan serve
Uso
Autenticação
A aplicação possui um sistema de autenticação simples para acesso às funcionalidades de criação, edição e exclusão de Hotéis e Quartos.

CRUD de Hotéis e Quartos
O sistema permite gerenciar:

Hotéis: Cadastrar, visualizar, atualizar e excluir.
Quartos: Associar quartos a um hotel específico e gerenciar os quartos com as operações CRUD.
Preenchimento Automático de Endereço
Na criação de um novo hotel, o endereço é automaticamente preenchido ao inserir o CEP, utilizando a API do ViaCEP.

Estrutura do Banco de Dados
Tabelas
Hotels

id - Identificador único do hotel.
name - Nome do hotel (único e obrigatório).
address, city, state, zip_code - Informações de endereço (obrigatórias).
website - Website do hotel (opcional).
Rooms

id - Identificador único do quarto.
name - Nome do quarto (obrigatório).
description - Descrição do quarto (obrigatório).
hotel_id - Chave estrangeira para o hotel associado.
Testes
Testes unitários foram implementados para garantir a robustez das operações de CRUD das entidades Hotel e Room.

Executando os Testes
Certifique-se de que o banco de dados de testes está configurado no arquivo .env:

plaintext
Copiar código
DB_DATABASE=hotel_test
Execute os testes:

bash
Copiar código
php artisan test
Testes Implementados
HotelTest: Testa a criação, atualização, exclusão de hotéis e validações de campo obrigatórios.
RoomTest: Testa a criação de quartos e associações com hotéis.
Bonus e Implementações Adicionais
Seeders e Factories: Utilizados para popular as tabelas com dados iniciais de Hotéis e Quartos, facilitando os testes e o desenvolvimento.
Tailwind CSS: Utilizado para estilização, proporcionando uma interface mais agradável e responsiva.
To-Do e Melhorias Futuras
Implementar Vuetify: Estilização adicional com Vuetify pode ser considerada para componentes de UI mais avançados.
Implementar Laravel Sail: Para facilitar o ambiente de desenvolvimento com Docker.
Melhorias na Interface de Usuário: Componentes de UI mais sofisticados e interativos.
Testes de Integração: Expandir a cobertura dos testes para incluir testes de integração.
Contato
Desenvolvido por Seu Nome.

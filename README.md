# Hotel Management System

Este projeto é uma aplicação de gerenciamento de hotéis e quartos, desenvolvida com Laravel 10.x, Inertia.js e Vue.js. A aplicação permite criar, visualizar, atualizar e excluir (CRUD) entidades de Hotéis e Quartos e realiza operações de preenchimento automático de endereços através da API do ViaCEP.

## Sumário
- [Requisitos do Projeto](#requisitos-do-projeto)
- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Configuração do Projeto](#configuração-do-projeto)
  - [Pré-requisitos](#pré-requisitos)
  - [Instalação](#instalação)
- [Uso](#uso)
  - [Autenticação](#autenticação)
  - [CRUD de Hotéis e Quartos](#crud-de-hotéis-e-quartos)
  - [Preenchimento Automático de Endereço](#preenchimento-automático-de-endereço)
- [Estrutura do Banco de Dados](#estrutura-do-banco-de-dados)
  - [Tabelas](#tabelas)
- [Testes](#testes)
  - [Executando os Testes](#executando-os-testes)
  - [Testes Implementados](#testes-implementados)
- [Bônus e Implementações Adicionais](#bônus-e-implementações-adicionais)
- [To-Do e Melhorias Futuras](#to-do-e-melhorias-futuras)
- [Contato](#contato)

## Requisitos do Projeto
- **Laravel 10.x ou 11.x**
- **Sistema de autenticação simples**
- **Funcionalidade CRUD para as entidades**:
  - **Hotéis**
    - Campos: `name` (obrigatório, único), `address` (obrigatório), `city` (obrigatório), `state` (obrigatório), `zip_code` (obrigatório), `website` (opcional)
  - **Quartos**
    - Campos: `name` (obrigatório), `description` (obrigatório), `hotel_id` (chave estrangeira)
- Uso de **Migrations** para a criação das tabelas
- **Preenchimento automático de endereço** via API do ViaCEP
- Frontend com **Inertia.js** e **Vue.js**
- **Validações de formulário** com Laravel
- **Testes unitários**
- **Documentação clara do código

## Tecnologias Utilizadas
- **Backend**: Laravel 10.x
- **Frontend**: Inertia.js e Vue.js
- **Estilização**: Tailwind CSS
- **Testes**: PHPUnit
- **Banco de Dados**: MySQL
- **API de Endereços**: ViaCEP

## Configuração do Projeto

### Pré-requisitos
Antes de rodar o projeto, tenha os seguintes pré-requisitos instalados:

- **PHP** >= 8.1
- **Composer** >= 2.x
- **MySQL** >= 5.7
- **Node.js** >= 14
- **NPM/Yarn**

### Instalação
1. Clone este repositório:
   ```bash
   git clone https://github.com/seu-usuario/nome-do-repositorio.git
   cd nome-do-repositorio
   ```

2. Instale as dependências do backend:
   ```bash
   composer install
   ```

3. Instale as dependências do frontend:
   ```bash
   npm install
   ```

4. Configure o arquivo .env com as informações de banco de dados:
   ```bash
        CREATE DATABASE hotel_test;

        DB_CONNECTION=mysql
        DB_HOST=localhost
        DB_PORT=3306
        DB_DATABASE=hotel_test
        DB_USERNAME=root
        DB_PASSWORD=
   ```

5. Execute as migrations e seeders para popular o banco de dados:
   ```bash
   php artisan migrate --seed
   ```

6. Compile os arquivos do frontend:
   ```bash
   npm run dev
   ```

7. Inicie o servidor local:
   ```bash
   php artisan serve
   ```

## CRUD de Hotéis e Quartos

### O sistema permite gerenciar:

- **Hotéis:** Cadastrar, visualizar, atualizar e excluir.
- **Quartos:** Associar quartos a um hotel específico e gerenciar os quartos com as operações CRUD.

## Estrutura do Banco de Dados

### Tabelas:

#### Hotéis

- id (Identificador único do hotel)
- name (Nome do hotel)
- address, city, state, zip_code (Informações de endereço)
- website (Website do hotel)

#### Rooms

- id (Identificador único do quarto)
- name (Nome do quarto)
- description (Descrição do quarto)
- hotel_id (Chave estrangeira para o hotel associado)

## Testes

Testes unitários foram implementados para garantir a robustez das operações de CRUD das entidades Hotel e Room.

## Bonus e Implementações Adicionais:

- **Seeders e Factories:** Utilizados para popular as tabelas com dados iniciais de Hotéis e Quartos.
- **Tailwind CSS:** Utilizado para estilização, proporcionando uma interface mais agradável e responsiva.

   ```bash
   php artisan make:seeder HotelSeeder
   php artisan make:seeder RoomSeeder
   ```
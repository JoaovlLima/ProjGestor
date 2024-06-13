<h1>Projeto Gestor Senai</h1> 

<p align="center">
  <img src="https://img.shields.io/static/v1?label=PHP&message=frontEnd&color=blue&style=for-the-badge&logo=PHP"/>
  <img src="http://img.shields.io/static/v1?label=License&message=MIT&color=green&style=for-the-badge"/>
  <img src="http://img.shields.io/static/v1?label=TESTES&message=%3E100&color=GREEN&style=for-the-badge"/>
   <img src="http://img.shields.io/static/v1?label=STATUS&message=EM%20DESENVOLVIMENTO&color=RED&style=for-the-badge"/>
</p>

> Status do Projeto:  :warning: Em desenvolvimento

### Tópicos 

:small_blue_diamond: [Descrição do projeto](#descrição-do-projeto)

:small_blue_diamond: [Funcionalidades](#funcionalidades)

:small_blue_diamond: [Deploy da Aplicação](#deploy-da-aplicação-dash)

:small_blue_diamond: [Pré-requisitos](#pré-requisitos)

:small_blue_diamond: [Como rodar a aplicação](#como-rodar-a-aplicação-arrow_forward)



## Descrição do projeto 

<p align="justify">
   sistema de gestão de estoque desenvolvido para gerenciar materiais e fornecedores, permitindo o cadastro de novos itens e a atualização de estoque existente. Utilizando uma interface web, os usuários podem selecionar materiais e fornecedores a partir de listas dinâmicas, preenchidas com dados recuperados do backend via API. O sistema suporta funcionalidades como o registro de novos materiais e fornecedores, além do cadastramento de quantidades de estoque para materiais específicos, todos enviados em formato JSON conforme as necessidades do backend. A estrutura do projeto inclui separação clara entre lógica de apresentação e processamento, com o uso de PHP para gerenciamento de dados e comunicação com APIs RESTful.

</p>

[Link para o BackEnd](https://github.com/TheuZCoder/ApiGerenciamentoSenai)

## Funcionalidades

:heavy_check_mark: Login de Funcionarios  

:heavy_check_mark: Cadastro de Materiais

:heavy_check_mark: Cadastro de Patrimonios e Salas

:heavy_check_mark: Envio de Patrimonios a Manutenção

## Layout da Aplicação :dash:

![Captura de tela 2024-06-13 143121](https://github.com/JoaovlLima/ProjGestor/assets/82974688/316f595b-81bf-4db7-b925-969ef05adee4)
![Captura de tela 2024-06-13 143105](https://github.com/JoaovlLima/ProjGestor/assets/82974688/60db7071-4a39-4be9-bee4-f9d68c5624ad)
![Captura de tela 2024-06-13 143238](https://github.com/JoaovlLima/ProjGestor/assets/82974688/710bdb54-fc9c-47f9-b6ed-7ddc820cf2ac)
![Captura de tela 2024-06-13 143223](https://github.com/JoaovlLima/ProjGestor/assets/82974688/16f77a46-56d9-48e5-a263-401713fe9dfc)
![Captura de tela 2024-06-13 143211](https://github.com/JoaovlLima/ProjGestor/assets/82974688/710dfd24-1d97-46f5-9ecb-02daba593bfd)
![Captura de tela 2024-06-13 143157](https://github.com/JoaovlLima/ProjGestor/assets/82974688/08aad2df-18e3-4664-8c03-cc020415868f)
![Captura de tela 2024-06-13 143145](https://github.com/JoaovlLima/ProjGestor/assets/82974688/199614de-cc72-48ca-a61d-1bedc80b39d8)


## Pré-requisitos

:warning: [PHP](https://www.php.net/) 
:warning: [PostgreSQL](https://www.pgadmin.org/download/pgadmin-4-windows/)


## Como rodar a aplicação :arrow_forward:

No terminal, clone o projeto: 

```
git clone https://github.com/JoaovlLima/ProjGestor.git
```
Instale o PHP na Maquina e no terminal escreva:
```
php -S localhost:3000
```
No Navegador coloque o seguinte url:
```
http://localhost:3000/view/login.php
```

## Casos de Uso

Demonstração de como  ficou todas as Telas:
![allscreens](https://github.com/JoaovlLima/ProjGestor/assets/82974688/5182a5b1-8671-4d8f-ae9a-94a0e103cdc7)

Cadastrar Patrimonio e envia para Manutenção:
![cadastrar patrimonio e envia para manutencao](https://github.com/JoaovlLima/ProjGestor/assets/82974688/5d130643-35b6-4854-a240-cb4f2316dea5)

Cadastrar Material e Fornecedor:
![cadastro material e fornecedor](https://github.com/JoaovlLima/ProjGestor/assets/82974688/01c2e9cf-4492-46fc-b8a1-101b4b918982)

Cadastrar Estoque:
![cadastroestoque](https://github.com/JoaovlLima/ProjGestor/assets/82974688/f7419664-44bc-4e4d-a0f3-5833dbc8df52)

Logout e Login:
![logout login](https://github.com/JoaovlLima/ProjGestor/assets/82974688/24353309-b89f-4322-8bdf-70049a28d339)

## Iniciando/Configurando banco de dados

Criação Banco de Dados:
````
CREATE TABLE manutencao (
    status_manutencao varchar(255),
    descricao_manutencao varchar(255),
    id_manutencao serial PRIMARY KEY
);

CREATE TABLE tipo_patrimonio (
    nome_tipo_patrimonio varchar(255),
    id_tipo_patrimonio serial PRIMARY KEY
);

CREATE TABLE Usuario (
    nome_usuario varchar(255),
    email_usuario varchar(255),
    senha_usuario varchar(255),
    cpf_usuario varchar(255) PRIMARY KEY
);

CREATE TABLE Patrimonio (
    img_patrimonio varchar(255),
    descricao_patrimonio varchar(255),
    status_patrimonio varchar(255),
    nome_patrimonio varchar(255),
    id_patrimonio serial PRIMARY KEY,
    local_patrimonio int,
    bloco_patrimonio int,
    tipo_patrimonio int,
    FOREIGN KEY (local_patrimonio) REFERENCES local_patrimonio (id_local_patrimonio),
    FOREIGN KEY (bloco_patrimonio) REFERENCES bloco_patrimonio (id_bloco_patrimonio),
    FOREIGN KEY (tipo_patrimonio) REFERENCES tipo_patrimonio (id_tipo_patrimonio)
);

CREATE TABLE bloco_patrimonio (
    id_bloco_patrimonio serial PRIMARY KEY,
    nome_bloco_patrimonio varchar(255)
);

CREATE TABLE local_patrimonio (
    nome_local_patrimonio varchar(255),
    id_local_patrimonio serial PRIMARY KEY,
    cpf_usuario varchar(255),
    id_bloco_patrimonio int,
    FOREIGN KEY (cpf_usuario) REFERENCES Usuario (cpf_usuario),
    FOREIGN KEY (id_bloco_patrimonio) REFERENCES bloco_patrimonio (id_bloco_patrimonio)
);

CREATE TABLE baixa_patrimonio (
    id_despacho varchar(1) PRIMARY KEY,
    data date,
    motivo varchar(255)
);

CREATE TABLE adm (
    nome_adm varchar(255),
    senha_adm varchar(255),
    email_adm varchar(255),
    cpf_adm varchar(255) PRIMARY KEY
);

CREATE TABLE estoque (
    id_estoque serial PRIMARY KEY,
    quantidade int
	  id_material int;
    cnpj_fornecedor varchar(20)
    FOREIGN KEY (id_material) REFERENCES material (id_material);
    FOREIGN KEY (cnpj_fornecedor) REFERENCES fornecedor(cnpj_fornecedor)
);

CREATE TABLE fornecedor (
    cnpj_fornecedor varchar(255) PRIMARY KEY,
    nome_fornecedor varchar(255)
);

CREATE TABLE material (
    id_material serial PRIMARY KEY,
    nome_material varchar(255)
);

CREATE TABLE vai_manutencao (
    defeito varchar(255),
    data date,
    id_patrimonio int,
    id_manutencao int,
    FOREIGN KEY (id_patrimonio) REFERENCES Patrimonio (id_patrimonio),
    FOREIGN KEY (id_manutencao) REFERENCES manutencao (id_manutencao)
);

CREATE TABLE sai (
    data date,
    descricao varchar(255),
    id_manutencao int,
    id_patrimonio int,
    FOREIGN KEY (id_manutencao) REFERENCES manutencao (id_manutencao),
    FOREIGN KEY (id_patrimonio) REFERENCES Patrimonio (id_patrimonio)
);

CREATE TABLE transferencia (
    id_patrimonio int,
    id_bloco_patrimonio int,
    id_local_patrimonio int,
    PRIMARY KEY (id_patrimonio, id_bloco_patrimonio, id_local_patrimonio),
    FOREIGN KEY (id_bloco_patrimonio) REFERENCES bloco_patrimonio (id_bloco_patrimonio),
    FOREIGN KEY (id_local_patrimonio) REFERENCES local_patrimonio (id_local_patrimonio)
);

CREATE TABLE deu_baixa (
    id_despacho varchar(1),
    id_manutencao int,
    FOREIGN KEY (id_despacho) REFERENCES baixa_patrimonio (id_despacho),
    FOREIGN KEY (id_manutencao) REFERENCES manutencao (id_manutencao)
);

CREATE TABLE entrada (
    data date,
    id_estoque int,
    cnpj_fornecedor varchar(255),
    FOREIGN KEY (id_estoque) REFERENCES estoque (id_estoque),
    FOREIGN KEY (cnpj_fornecedor) REFERENCES fornecedor (cnpj_fornecedor)
);

CREATE TABLE saida (
    data date,
    id_estoque int,
    id_material int,
    FOREIGN KEY (id_estoque) REFERENCES estoque (id_estoque),
    FOREIGN KEY (id_material) REFERENCES material (id_material)
);
````

## Linguagens, dependencias e libs utilizadas :books:

- [PHP](https://www.php.net/)


## Tarefas em aberto


:memo: Conectar a API back com o BackEnd

:memo: Deploy do FrontEnd 

:memo: Deploy do BackEnd

## Desenvolvedores/Contribuintes :octocat:


| [<img src="https://avatars.githubusercontent.com/u/82974688?s=400&u=0bbb34283f405a86af7e82cd41b14c2375b62f22&v=4" width=115><br><sub>Matheus Silva</sub>](https://github.com/TheuZCoder) |  [<img src="https://avatars.githubusercontent.com/u/124844047?v=4" width=115><br><sub>João Lima</sub>](https://github.com/JoaovlLima) |  [<img src="https://avatars.githubusercontent.com/u/123770407?v=4" width=115><br><sub>Leticia</sub>](https://github.com/lets02) |
| :---: | :---: | :---: 

## Licença 

The [MIT License]() (MIT)

Copyright :copyright: 2024 - Projeto Gestor Senai

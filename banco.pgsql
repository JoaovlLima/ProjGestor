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
    FOREIGN KEY (cpf_usuario) REFERENCES Usuario (cpf_usuario)
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
    FOREIGN KEY (id_material) REFERENCES material (id_material);
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

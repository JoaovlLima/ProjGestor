SELECT * from local_patrimonio;
SELECT * from bloco_patrimonio;
SELECT * from manutencao;
SELECT * from patrimonio;
Select * from usuario;
select * from sai;
select * from vai_manutencao;
select * from tipo_patrimonio;
select * from estoque;
SELECT * from material;
select * from fornecedor;
select * from transferencias;


insert into local_patrimonio
VALUES
('Sala 23',5,22222222222,5),('Sala 25',6,11111111111,5);

insert into bloco_patrimonio
VALUES
(5,'C');

ALTER TABLE local_patrimonio
ADD COLUMN id_bloco_patrimonio INT;

ALTER TABLE local_patrimonio
ADD CONSTRAINT fk_bloco
FOREIGN KEY(id_bloco_patrimonio) 
REFERENCES bloco_patrimonio(id_bloco_patrimonio);

UPDATE local_patrimonio
SET id_bloco_patrimonio = 3
WHERE id_local_patrimonio = 3;

UPDATE local_patrimonio
SET id_bloco_patrimonio = 4
WHERE id_local_patrimonio = 4;


ALTER TABLE estoque
ADD COLUMN cnpj_fornecedor VARCHAR(20),
ADD FOREIGN KEY (cnpj_fornecedor) REFERENCES fornecedor(cnpj_fornecedor);

UPDATE estoque SET cnpj_fornecedor = '12345678000100' WHERE id_estoque IN (1);
UPDATE estoque SET cnpj_fornecedor = '98765432000100' WHERE id_estoque IN (2);

CREATE TABLE transferencias (
    id_transferencia SERIAL PRIMARY KEY,
    id_patrimonio INT NOT NULL,
    novo_bloco INT NOT NULL,
    nova_sala INT NOT NULL,
    cpf_usuario VARCHAR(11) NOT NULL,
    status VARCHAR(20) NOT NULL,
    FOREIGN KEY (id_patrimonio) REFERENCES patrimonio(id_patrimonio),
    FOREIGN KEY (novo_bloco) REFERENCES bloco_patrimonio(id_bloco_patrimonio),
    FOREIGN KEY (nova_sala) REFERENCES local_patrimonio(id_local_patrimonio),
    FOREIGN KEY (cpf_usuario) REFERENCES usuario(cpf_usuario)
);

insert into usuario
VALUES
('Diretor','diretor@senai.com','1234','1234')






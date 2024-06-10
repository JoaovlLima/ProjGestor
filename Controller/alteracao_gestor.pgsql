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

UPDATE estoque SET cnpj_fornecedor = '12345678000100' WHERE id_estoque IN (13, 14);
UPDATE estoque SET cnpj_fornecedor = '98765432000100' WHERE id_estoque IN (15, 16);



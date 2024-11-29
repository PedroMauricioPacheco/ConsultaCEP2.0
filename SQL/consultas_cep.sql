CREATE TABLE informacoes_consultas(
	cep INT(8),
    estado VARCHAR(20),
    cidade VARCHAR(30),
    bairro VARCHAR(48),
    rua VARCHAR(48),
    data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
    data_alteracao DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
ALTER TABLE informacoes_consultas
ADD COLUMN id INT auto_increment PRIMARY KEY;
USE workshop;

CREATE TABLE IF NOT EXISTS cadeiras (
        id MEDIUMINT NOT NULL AUTO_INCREMENT,
        sigla CHAR(5) NOT NULL,
        nome VARCHAR(256),
        ano ENUM('1','2','3','4','5') NOT NULL,
        semestre ENUM('1','2') NOT NULL,
        curso ENUM('MIEIC', 'MIEEC', 'MIB'),
        descontinuada BOOLEAN DEFAULT 0,
        PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS apontamentos (
        id MEDIUMINT NOT NULL AUTO_INCREMENT,
        cadeira MEDIUMINT,
        nome VARCHAR(256),
        descricao VARCHAR(512),
        autor VARCHAR(128),
        dataCriacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        FOREIGN KEY (cadeira) REFERENCES cadeiras (id)
                ON DELETE CASCADE
                ON UPDATE CASCADE
);

INSERT INTO cadeiras (sigla, nome, ano, semestre, curso) VALUES ('MPCP', 'Microprocessadores e Computadores Pessoais', '1', '2', 'MIEIC');
INSERT INTO cadeiras (sigla, nome, ano, semestre, curso) VALUES ('AOCO', 'Arquitetura e Organizacao de Computadores', '1', '1', 'MIEIC');
INSERT INTO cadeiras (sigla, nome, ano, semestre, curso) VALUES ('SOPE', 'Sistemas Operativos', '2', '2', 'MIEIC');
INSERT INTO cadeiras (sigla, nome, ano, semestre, curso) VALUES ('TSIN', 'Teoria do Sinal', '2', '1', 'MIEEC');
INSERT INTO apontamentos (cadeira, nome, descricao, autor) VALUES (1, 'Conceitos de Assembly', 'Apontamentos tirados durante a introducao a assebly', 'Daniel Silva');
INSERT INTO apontamentos (cadeira, nome, descricao, autor) VALUES (3, 'Threads', 'Apontamentos sobre threads', 'Gil Domingues');
INSERT INTO apontamentos (cadeira, nome, descricao, autor) VALUES (2, 'Portas Logicas', 'Apontamentos sobre portas logicas', 'Miguel Ramalho');
INSERT INTO apontamentos (cadeira, nome, descricao, autor) VALUES (4, 'Sinais', 'Sinal da cruz', 'Filipa Barros');
INSERT INTO apontamentos (cadeira, nome, descricao, autor) VALUES (3, 'Semaphores', 'Magnificos apontamentos de semaforos e sinais de stop', 'Rui Vilares');

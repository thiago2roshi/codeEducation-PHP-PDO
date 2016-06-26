CREATE DATABASE IF NOT EXISTS `code_pdo`, DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `code_pdo`.`alunos`;
CREATE TABLE code_pdo.alunos (
    'id' INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    'nome' varchar(255) NOT NULL,
    'nota' INT NULL
);

# populate table
INSERT INTO `code_pdo`.`alunos` (nome, nota) VALUES
    ('Jose', 8),
    ('Ricardo', 3),
    ('Paulo', 10),
    ('Stella', 9),
    ('Richard', 4),
    ('Pablo', 7),
    ('Roldao', 8),
    ('Wesley', 3),
    ('Yamato', 5),
    ('Allyneh', 7),
    ('Robert', 8),
    ('Alberto', 9)
    ('Leandro', 8),
    ('Thiago', 5),
    ('Fernanda', 4),
    ('Jessica', 6),
    ('Islaiane', 7),
    ('Dyana', 10),
    ('Pabline', 8),
    ('Poliane', 9);

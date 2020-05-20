
CREATE DATABASE IF NOT EXISTS BDD_intranet CHARACTER SET utf8;

USE BDD_intranet;

CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(20) NOT NULL,
    password VARCHAR(40) NOT NULL,
    rank TINYINT UNSIGNED NOT NULL DEFAULT 2,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS categories (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS articles (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    content TEXT NULL,
    category_id INT UNSIGNED NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(category_id) 
    REFERENCES categories(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO users (username, password, rank) VALUES
('admin', 'pass', 1),
('ayoub', 'P@sswordXx', 2),
('amine', 'Pepe78', 2),
('hacksha1', '69bd0b393cf2cc38bd40cbe69a9754e7599d6d47', 2),
('/Lab1/injections/Stage3.php', '', 0);

INSERT INTO categories (title) VALUES
('Web'),
('Programmation'),
('Systeme');

INSERT INTO articles (title, content, category_id) VALUES
('Mon premier article !', 'Le premier article ', 1),
('Mon second article', 'Et voilà le deuxième !', 1),
('Mon troisième article', 'Et voilà le troisième  !', 2);


CREATE DATABASE blog;
USE blog;

-- tabula posts id, content,

CREATE TABLE posts(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
content VARCHAR(5200) NOT NULL
);
INSERT INTO posts
(content)
VALUES 
("Lieldienas nāk"),
("Otrais bloga ieraksts"),
("Trīs lietas labas lietas");
SELECT * FROM posts;

CREATE TABLE categories(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
category_name  VARCHAR(25) NOT NULL
);
INSERT INTO categories
(category_name)
VALUES 
("Svētki"),
("Mūzika"),
("Sports");
SELECT * FROM categories;

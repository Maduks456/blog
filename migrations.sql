CREATE DATABASE IF NOT EXISTS blog;
USE blog;
DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS categories;
-- Categories first
CREATE TABLE categories (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(25) NOT NULL
);

INSERT INTO categories (category_name)
VALUES
('Svētki'),
('Mūzika'),
('Sports');

-- Posts second
CREATE TABLE posts (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    content VARCHAR(5200) NOT NULL,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

INSERT INTO posts (content, category_id)
VALUES
('Lieldienas nāk', 1),
('Otrais bloga ieraksts', 3),
('Trīs lietas labas lietas', 1);

-- Comments last
CREATE TABLE comments (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    author VARCHAR(50) NOT NULL,
    creation_time DATETIME NOT NULL,
    content VARCHAR(5000) NOT NULL,
    post_id INT NOT NULL,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
);

SELECT * FROM categories;
SELECT * FROM posts;
SELECT * FROM comments;
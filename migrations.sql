CREATE DATABASE IF NOT EXISTS blog;
USE blog;
DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS categories;
CREATE TABLE categories (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(25) NOT NULL
);

INSERT INTO categories (category_name)
VALUES
('Holiday'),
('Music'),
('Sport');

CREATE TABLE posts (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    content VARCHAR(5200) NOT NULL,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

INSERT INTO posts (title, content, category_id)
VALUES
('Easter is comeing','Easter is the colorfull holiday.', 1),
('Second Blog post','This was the second blog post.', 3),
('Three things are good things', '3 of something is better than 1 or 2 of it. Like TNT.', 1);

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
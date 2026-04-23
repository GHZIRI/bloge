DROP DATABASE IF EXISTS bloge;
CREATE DATABASE bloge;
USE bloge;

CREATE TABLE users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    name_user VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(250) NOT NULL
);

-- create table catalog
CREATE TABLE catalog (
    id_catalog INT AUTO_INCREMENT PRIMARY KEY,
    name_catalog VARCHAR(100) NOT NULL UNIQUE
);

-- create table posts
CREATE TABLE article ( 
    id_article INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    contenu TEXT NOT NULL,
    date_publication DATETIME NOT NULL,
    status ENUM('brouillon', 'publié') NOT NULL,
    id_user INT NOT NULL,
    id_catalog INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users (id_user),
    FOREIGN KEY (id_catalog) REFERENCES catalog (id_catalog)
);

 -- create table commit
CREATE TABLE comment (
    id_comment INT AUTO_INCREMENT PRIMARY KEY,
    contenu TEXT NOT NULL,
    date_comment DATETIME NOT NULL,
    id_user INT,
    id_article INT,
    FOREIGN KEY (id_user) REFERENCES users (id_user),
    FOREIGN KEY (id_article) REFERENCES article (id_article)
);

-- create index
CREATE INDEX idx_name_user ON users (name_user);
CREATE INDEX idx_title_article ON article (title);
-- full tabl use
INSERT INTO users (name_user, email, password) VALUES
('Ahmed', 'ahmed@gmail.com', '123456'),
('Salman', 'salman@gmail.com', '123456'),
('Youssef', 'youssef@gmail.com', '123456');     

   
-- full tabl catalog
INSERT INTO catalog (name_catalog) VALUES
('Technology'),
('Education'),
('Science');


-- full table article
INSERT INTO article
(title, contenu, date_publication, status, id_user, id_catalog)
VALUES
('Learn SQL', 'Article about SQL basics', '2024-01-10 10:00:00', 'publié', 1, 1),
('HTML for Beginners', 'Step by step HTML tutorial', '2024-02-15 14:30:00', 'publié', 2, 2),
('What is a Database?', 'Introduction to databases', '2024-03-01 09:00:00', 'brouillon', 1, 1),
('Artificial Intelligence', 'Article about AI concepts', '2024-03-20 18:00:00', 'publié', 3, 3);


-- full table comment 
INSERT INTO comment
(contenu, date_comment, id_user, id_article)
VALUES
('Great article!', '2024-03-21 12:00:00', 2, 1),
('Very clear explanation', '2024-03-22 15:30:00', 3, 1),
('Helpful content', '2024-03-23 09:00:00', 1, 2);

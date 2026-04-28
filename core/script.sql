
DROP DATABASE IF EXISTS bloge;


CREATE DATABASE bloge CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE bloge;


CREATE TABLE IF NOT EXISTS catalog (
    id_catalog INT PRIMARY KEY AUTO_INCREMENT,
    name_catalog VARCHAR(100) NOT NULL
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS users (
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    name_user VARCHAR(100) NOT NULL,
    email_user VARCHAR(100) UNIQUE NOT NULL,
    password_user VARCHAR(255) NOT NULL,
  
    role ENUM('admin', 'user') DEFAULT 'user' 
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS article (
    id_article INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    contenu TEXT NOT NULL,
    date_publication DATETIME DEFAULT CURRENT_TIMESTAMP,
    status ENUM('published', 'draft') DEFAULT 'published',
    id_user INT,
    id_catalog INT,
    FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE SET NULL,
    FOREIGN KEY (id_catalog) REFERENCES catalog(id_catalog) ON DELETE SET NULL
) ENGINE=InnoDB;


INSERT INTO catalog (name_catalog) VALUES 
('Web Development'), 
('Database Design'), 
('Cyber Security'),
('Machine Learning'),
('DevOps');


INSERT INTO users (name_user, email_user, password_user, role) VALUES 
('Salman Dev', 'salman@blog.com', '123456', 'admin'),     
('Admin Pro', 'admin@blog.com', 'admin123', 'admin'),      
('Tech Writer', 'writer@blog.com', 'writer123', 'user'),  
('New Guest', 'guest@blog.com', 'guest123', 'user');       


INSERT INTO article (title, contenu, status, id_user, id_catalog) VALUES 
('Mastering PHP OOP', 'OOP makes your code cleaner and more professional.', 'published', 1, 1),
('Advanced MySQL Tips', 'Indexes and PDO are essential for fast database management.', 'published', 1, 2),
('The Brave Browser for Devs', 'Why Brave is the best choice for developers.', 'published', 2, 1),
('Getting Started with React', 'React is a powerful JavaScript library for UI.', 'published', 3, 1),
('Introduction to Docker', 'Docker revolutionized the way we deploy applications.', 'published', 1, 5);
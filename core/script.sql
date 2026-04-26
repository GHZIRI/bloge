CREATE DATABASE IF NOT EXISTS bloge CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE bloge;

CREATE TABLE IF NOT EXISTS catalog (
    id_catalog INT PRIMARY KEY AUTO_INCREMENT,
    name_catalog VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS users (
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    name_user VARCHAR(100) NOT NULL,
    email_user VARCHAR(100) UNIQUE NOT NULL,
    password_user VARCHAR(255) NOT NULL
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

-- Insert Catalogs
INSERT INTO catalog (name_catalog) VALUES 
('Web Development'), 
('Database Design'), 
('Cyber Security'),
('Machine Learning'),
('DevOps');

-- Insert Users
INSERT INTO users (name_user, email_user, password_user) VALUES 
('Salman Dev', 'salman@blog.com', '123456'),
('Admin Pro', 'admin@blog.com', 'admin123'),
('Tech Writer', 'writer@blog.com', 'writer123');

-- Insert Articles
INSERT INTO article (title, contenu, status, id_user, id_catalog) VALUES 
('Mastering PHP OOP', 'OOP makes your code cleaner and more professional. Using classes like Article and Database is the future of PHP web development. By mastering OOP, you can create scalable applications easily.', 'published', 1, 1),
('Advanced MySQL Tips', 'Indexes and PDO are essential for fast and secure database management in any professional app. Learn how to optimize your queries and avoid common bottlenecks.', 'published', 1, 2),
('The Brave Browser for Devs', 'Why Brave is the best choice for developers, especially with its built-in privacy and dark mode features. It is fast, secure, and built on Chromium.', 'published', 2, 1),
('Getting Started with React', 'React is a powerful JavaScript library for building user interfaces. It allows you to create reusable UI components and manage state efficiently across your application.', 'published', 3, 1),
('Understanding Neural Networks', 'Neural networks form the basis of modern AI. They are inspired by the human brain and are capable of learning complex patterns from large amounts of data.', 'published', 2, 4),
('Introduction to Docker', 'Docker revolutionized the way we deploy applications. By using containers, you can ensure that your software runs the same way everywhere, from your laptop to the cloud.', 'published', 1, 5),
('Securing Your Web Apps', 'Security should never be an afterthought. From preventing SQL injection to using HTTPS and strong hashing algorithms, discover the best practices for web security.', 'published', 3, 3),
('The Power of Node.js', 'Node.js allows you to use JavaScript on the server side. It is perfect for building scalable network applications due to its non-blocking, event-driven architecture.', 'published', 1, 1),
('Optimizing SQL Queries', 'A slow query can crash your application. Learn how to use EXPLAIN to analyze queries, create effective indexes, and structure your database for performance.', 'published', 2, 2),
('Continuous Integration and Deployment (CI/CD)', 'Automate your testing and deployment pipelines. CI/CD practices help you deliver code changes more frequently and reliably, reducing the risk of bugs in production.', 'published', 3, 5);
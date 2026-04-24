
DELETE FROM comment;
DELETE FROM article;    


INSERT INTO article 
(title, contenu, date_publication, status, id_user, id_catalog) 
VALUES 
('Mastering PHP and OOP', 
'Object-Oriented Programming (OOP) is a programming paradigm based on the concept of objects, which can contain data and code. Data in the form of fields (often known as attributes or properties), and code, in the form of procedures (often known as methods). In PHP, OOP helps in creating modular and reusable code. Using classes like Article and Database is the first step towards building professional applications. This allows for better organization, easier debugging, and more scalable software development in the long run.', 
'2026-04-20 10:00:00', 'publié', 1, 1),

('The Power of PDO in MySQL', 
'PHP Data Objects (PDO) provides a lightweight, consistent interface for accessing databases in PHP. Each database driver that implements the PDO interface can expose database-specific features as regular extension functions. Note that you cannot perform any database functions using the PDO extension by itself; you must use a database-specific PDO driver to access a database server. PDO provides a data-access abstraction layer, which means that, regardless of which database you are using, you use the same functions to issue queries and fetch data.', 
'2026-04-21 14:30:00', 'publié', 2, 1),

('Why Version Control Matters', 
'Git is a DevOps tool used for source code management. It is a free and open-source version control system used to handle small to very large projects efficiently. Git is used to tracking changes in the source code, enabling multiple developers to work together on non-linear development. It allows you to revert to previous states, branch out for new features, and merge changes with confidence. Learning git push, pull, and commit is essential for any backend developer today.', 
'2026-04-22 09:15:00', 'publié', 1, 2),

('Understanding Database Indexes', 
'A database index is a data structure that improves the speed of data retrieval operations on a database table at the cost of additional writes and storage space to maintain the index data structure. Indexes are used to quickly locate data without having to search every row in a database table every time a database table is accessed. In your current project, creating an index on name_user or title_article will make your SELECT queries much faster as your data grows.', 
'2026-04-23 11:45:00', 'publié', 3, 3),

('The Future of Web Development', 
'Web development is constantly evolving with new frameworks and technologies emerging every year. From server-side rendering to client-side hydration, the landscape is vast. For a learner focusing on PHP, the journey involves mastering not just the language, but also how it interacts with APIs, front-end frameworks, and modern deployment tools. Staying curious and building projects like this blog system is the best way to keep up with the industry trends in 2026.', 
'2026-04-24 08:00:00', 'publié', 2, 1);
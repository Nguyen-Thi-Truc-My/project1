CREATE DATABASE demo_git;
USE demo_git;

CREATE TABLE demo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    message VARCHAR(255)
);

INSERT INTO demo (message)
VALUES ('Hello CI/CD from MySQL Database!');

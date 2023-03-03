DROP DATABASE IF EXISTS quiz;
CREATE DATABASE quiz;
USE quiz;
create TABLE users (
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    passwd VARCHAR(100) NOT NULL,
    PRIMARY KEY (username)
);
CREATE TABLE quizzes (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    descr TEXT,
    username VARCHAR(50) NOT NULL,
    PRIMARY KEY (id),
    foreign key (username) references users(username)
);
CREATE TABLE questions(
    id INT NOT NULL AUTO_INCREMENT,
    question VARCHAR(255) NOT NULL,
    question_type ENUM('mcq', 'tf') NOT NULL,
    quiz_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (quiz_id) REFERENCES quizzes(id)
);
CREATE TABLE answers(
    id INT NOT NULL AUTO_INCREMENT,
    answer VARCHAR(255) NOT NULL,
    question_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (question_id) REFERENCES questions(id)
);
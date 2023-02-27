DROP DATABASE IF EXISTS quiz;
CREATE DATABASE quiz;
USE quiz;
create TABLE users (
    username varchar(50) primary key,
    email varchar(100) not null,
    password varchar(255) not null
);
CREATE TABLE quizzes (
    id INT NOT NULL AUTO_INCREMENT,
    title varchar(255) not null,
    description_ text,
    username varchar(50) not null,
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
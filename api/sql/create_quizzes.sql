CREATE TABLE quizzes (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    descr TEXT,
    username VARCHAR(50) NOT NULL,
    PRIMARY KEY (id),
    foreign key (username) references users(username)
);
CREATE TABLE IF NOT EXISTS questions(
    id INT NOT NULL AUTO_INCREMENT,
    question VARCHAR(255) NOT NULL,
    question_type ENUM('mcq', 'tf') NOT NULL,
    quiz_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (quiz_id) REFERENCES quizzes(id)
);
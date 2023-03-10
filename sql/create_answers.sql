CREATE TABLE answers(
    id INT NOT NULL AUTO_INCREMENT,
    answer VARCHAR(255) NOT NULL,
    question_id INT NOT NULL,
    is_correct BOOLEAN NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (question_id) REFERENCES questions(id)
);
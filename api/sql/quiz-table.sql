CREATE TABLE quizzes (
    id  INT primary key auto_increment,
    username varchar(50) not null,
    title varchar(255) not null,
    _description text,
    foreign key (username) references users(username)
);

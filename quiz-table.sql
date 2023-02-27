CREATE TABLE quizes (
    id auto_increment varchar(100) primary key,
    title varchar(255) not null,
    _description text,
    foreign key (user_id) references users(username)
);

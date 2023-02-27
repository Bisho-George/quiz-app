CREATE DATABASE quiz;
use quiz;

CREATE TABLE quiz (
    id varchar(100) primary key,
    title varchar(255) not null,
    _description text,
    user_id varchar(50) not null
);


create TABLE user (
    username varchar(50) primary key,
    email varchar(255) not null,
    password varchar(255) not null
);

-- create a new user 
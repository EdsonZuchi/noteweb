use notewebdb;

create table tb_user(
    id int not null auto_increment,
    name varchar(45) null, 
    email varchar(45) null, 
    password varchar(20) null, 
    birth date null, 
    primary key(id)
);

create table tb_note(
    id int not null auto_increment,
    id_user int not null, 
    title varchar(20) null, 
    text varchar(100) null, 
    date date null, 
    time time null, 
    primary key(id)
);
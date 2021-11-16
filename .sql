create database bd_task;
use bd_task;
create table task (id int primary key auto_increment, title varchar(255) notnull, checked boolean, date date); 
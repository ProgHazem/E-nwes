
create database enews;
use enews;

-- Normal User ====> 2
-- Journalist =====> 1
-- Admin     ======> 0
create table user (
    id int primary key auto_increment,
    f_name varchar(150) not null,
    l_name varchar(150) not null,
    username varchar(150) not null,
    userpass varchar(150) not null,
    userphone varchar(20) ,
    gender enum("F","M") not null,
    email varchar(50) not null,
    birth date ,
    user_role enum("J","U","A") not null,
    user_status enum("Aprove","Pending","Block") not null
);
create table category(
    id int primary key not null auto_increment,
    name varchar(100) not null
);
create table artical (
    id int primary key not null auto_increment,
    image varchar(20) not null,
    title varchar(50) not null,
    body text not null,
    date_artical date,
    status_art enum("Aprove","Pending","Block") not null,
    user_id int,
    FOREIGN KEY (user_id) REFERENCES user(id),
    cat_id int,
    FOREIGN KEY (cat_id) REFERENCES category(id)
);
create table blocked_user(
    user_id int not null ,
    date_block date not null,
    FOREIGN KEY (user_id) REFERENCES user(id)

);
create table comment(
    atrical_id int not null ,
    user_id int not null ,
    date_comment date not null,
    content text not null ,
    FOREIGN KEY (atrical_id) REFERENCES artical(id),
    FOREIGN KEY (user_id) REFERENCES user(id)

);

insert into user set f_name = "maged", l_name="magdy", username="magedmagdy", userpass = "123456", gender="M", email="magedmagdy@ggmail.com", user_role="A", user_status="Aprove";
insert into user set f_name = "amr", l_name="waly", username="amr", userpass = "123456", gender="M", email="magedmagdy@ggmail.com", user_role="U", user_status="Pending";
insert into user set f_name = "hazem", l_name="magdy", username="hazem", userpass = "123456", gender="M", email="magedmagdy@ggmail.com", user_role="A", user_status="Aprove";

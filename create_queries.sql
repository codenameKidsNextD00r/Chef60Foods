-- create database Chef60;
use Chef60;

create table users ( #change table name in doc 'user' is reserved
uuid char(40) not null primary key,
email varchar(100) not null,
user_password varchar (50) not null, #password is reserved
first_name varchar(50) not null,
last_name varchar(50) not null,
phone varchar(13) not null,
is_admin tinyint not null DEFAULT 0
);

create table reservation (
uuid char(40) not null primary key,
user_uuid char(40) not null,
reservation_date datetime not null,
reservation_time time not null,
seats int not null,
notes longtext 
);

show tables;

-- this is just test data, you can INSERT any data you want
INSERT INTO users(uuid, email, user_password, first_name, last_name, phone, is_admin)
values(
UUID(),
'bongani@gmail.com',
'12345678',
'Bongani',
'Mlumbi',
'0670579949',
1);

select * from users;
select * from reservation;
show tables;
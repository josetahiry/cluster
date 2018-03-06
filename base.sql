create database mastermind;
use mastermind;

create table colorplayer(
	id varchar(10) primary key,
	name varchar(15)
);

create table colormaster(
	id varchar(10) primary key,
	name varchar(15)
);

create table player(
	pseudo varchar(15) primary key,
	age int,
	password varchar(30)
);

create table colorhidden(
	id int,
	name varchar(15)
);

create table score(
	name varchar(15),
	attempt int
);

insert into colorplayer values ('01','Red');
insert into colorplayer values ('02','Blue');
insert into colorplayer values ('03','Green');
insert into colorplayer values ('04','Yellow');
insert into colorplayer values ('05','Orange');
insert into colorplayer values ('06','Purple');
insert into colorplayer values ('07','Brown');
insert into colorplayer values ('08','Pink');

insert into colormaster values ('01','White');
insert into colormaster values ('02','Black');

insert into player values ('Jose',19,'Jose');
insert into player values ('Manoa',19,'Manoa');
insert into player values ('Cedric',19,'Cedric');
insert into player values ('Mirado',19,'Mirado');

insert into colorhidden values(1,'White');
insert into colorhidden values(2,'Blue');

Database = u912987663_mast
User = u912987663_jose
Mdp = josetahiry
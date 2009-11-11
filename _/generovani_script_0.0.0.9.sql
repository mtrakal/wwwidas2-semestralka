/*
created		6.10.2009
modified		6.11.2009
project		filmoteka
model		oracle 10g
company		http://blog.trtkal.net
author		trtkal
version		0.0.9
database		oracle 10g 
*/




























































drop table ttitulzanr cascade constraints
/
drop table tzanr cascade constraints
/
drop table tuzivatel cascade constraints
/
drop table trole cascade constraints
/
drop table tformat_titulku cascade constraints
/
drop table tjazyk cascade constraints
/
drop table ttitulky cascade constraints
/
drop table tjazyk_filmu cascade constraints
/
drop table tadresa cascade constraints
/
drop table tvypujcka cascade constraints
/
drop table tpujcujici cascade constraints
/
drop table tfilmoteka cascade constraints
/
drop table tformat_filmu cascade constraints
/
drop table ttitul cascade constraints
/


-- create types section





-- create tables section


create table ttitul (
	film_id number not null ,
	cz varchar2 (50),
	en varchar2 (50),
	original varchar2 (50),
	csfd clob,
	imdb clob,
	rok_vydani number(4,0),
	delka number(3,0),
	popis clob,
primary key (film_id) 
) 
/

create table tformat_filmu (
	formatfilmu_id number not null ,
	format varchar2 (30) not null ,
primary key (formatfilmu_id) 
) 
/

create table tfilmoteka (
	katalogove_cislo number not null ,
	film_id number not null ,
	formatfilmu_id number not null ,
	hodnoceni number,
	datum_pridani date,
	velikost number,
	umisteni varchar2 (255),
primary key (katalogove_cislo) 
) 
/

create table tpujcujici (
	adresa_id number not null ,
	jmeno varchar2 (30) not null ,
	prijmeni varchar2 (30) not null ,
	email varchar2 (250) not null ,
	telefon number,
	nick varchar2 (30) not null ,
primary key (nick) 
) 
/

create table tvypujcka (
	vypujcka_id number not null ,
	katalogove_cislo number not null ,
	datum_pujceni date,
	datum_vraceni date,
	nick varchar2 (30) not null ,
primary key (vypujcka_id) 
) 
/

create table tadresa (
	adresa_id number not null ,
	ulice varchar2 (30),
	cislo number,
	psc number(5,0),
	mesto varchar2 (30),
primary key (adresa_id) 
) 
/

create table tjazyk_filmu (
	katalogove_cislo number not null ,
	jazyk_id number not null ,
primary key (katalogove_cislo,jazyk_id) 
) 
/

create table ttitulky (
	titulky_id varchar2 (20) not null ,
	katalogove_cislo number not null ,
	titulky varchar2 (150),
	formattitulku_id number not null ,
	jazyk_id number not null ,
primary key (titulky_id) 
) 
/

create table tjazyk (
	jazyk_id number not null ,
	jazyk varchar2 (20),
primary key (jazyk_id) 
) 
/

create table tformat_titulku (
	formattitulku_id number not null ,
	format varchar2 (30) not null ,
primary key (formattitulku_id) 
) 
/

create table trole (
	role_id number not null ,
	role varchar2 (20),
primary key (role_id) 
) 
/

create table tuzivatel (
	nick varchar2 (30) not null ,
	password varchar2 (260),
	role_id number not null ,
primary key (nick) 
) 
/

create table tzanr (
	zanr_id number not null ,
	zanr varchar2 (30),
primary key (zanr_id) 
) 
/

create table ttitulzanr (
	film_id number not null ,
	zanr_id number not null ,
primary key (film_id,zanr_id) 
) 
/





-- create alternate keys section


-- create indexes section



-- create section for pks, aks and unique constraints, which have to be generated after indexes



-- create foreign keys section

alter table tfilmoteka add  foreign key (film_id) references ttitul (film_id) 
/

alter table ttitulzanr add  foreign key (film_id) references ttitul (film_id) 
/

alter table tfilmoteka add  foreign key (formatfilmu_id) references tformat_filmu (formatfilmu_id) 
/

alter table tvypujcka add  foreign key (katalogove_cislo) references tfilmoteka (katalogove_cislo) 
/

alter table ttitulky add  foreign key (katalogove_cislo) references tfilmoteka (katalogove_cislo) 
/

alter table tjazyk_filmu add  foreign key (katalogove_cislo) references tfilmoteka (katalogove_cislo) 
/

alter table tvypujcka add  foreign key (nick) references tpujcujici (nick) 
/

alter table tpujcujici add  foreign key (adresa_id) references tadresa (adresa_id) 
/

alter table tjazyk_filmu add  foreign key (jazyk_id) references tjazyk (jazyk_id) 
/

alter table ttitulky add  foreign key (jazyk_id) references tjazyk (jazyk_id) 
/

alter table ttitulky add  foreign key (formattitulku_id) references tformat_titulku (formattitulku_id) 
/

alter table tuzivatel add  foreign key (role_id) references trole (role_id) 
/

alter table tpujcujici add  foreign key (nick) references tuzivatel (nick) 
/

alter table ttitulzanr add  foreign key (zanr_id) references tzanr (zanr_id) 
/


-- create object tables section



-- create xmltype tables section



-- create procedures section



-- create functions section



-- create views section



-- create sequences section




-- create triggers from referential integrity section




































-- create user triggers section



-- create packages section





-- create synonyms section



-- create roles section



-- users permissions to roles section



-- roles permissions section

/* roles permissions */




-- user permissions section

/* users permissions */




-- create table comments section


-- create attribute comments section


-- after section



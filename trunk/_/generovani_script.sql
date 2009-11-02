/*
created		6.10.2009
modified		20.10.2009
project		filmoteka
model		oracle 10g
company		http://blog.trtkal.net
author		trtkal
version		0.0.6
database		oracle 10g 
*/






















































drop table ttitulzanr
/
drop table tzanr
/
drop table tuzivatel
/
drop table trole
/
drop table tformat_titulku
/
drop table tjazyk
/
drop table ttitulky
/
drop table tjazyk_filmu
/
drop table tadresa
/
drop table tvypujcka
/
drop table tpujcujici
/
drop table tfilmoteka
/
drop table tformat_filmu
/
drop table ttitul
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
	format_id number not null ,
	format varchar2 (30) not null ,
primary key (format_id) 
) 
/

create table tfilmoteka (
	katalogove_cislo number not null ,
	film_id number not null ,
	format_id number not null ,
	hodnoceni number,
	datum_pridani date,
	velikost number,
	umisteni varchar2 (255),
primary key (katalogove_cislo) 
) 
/

create table tpujcujici (
	uzivatel_id number not null ,
	adresa_id number not null ,
	jmeno varchar2 (30) not null ,
	prijmeni varchar2 (30) not null ,
	email varchar2 (250) not null ,
	telefon number,
primary key (uzivatel_id) 
) 
/

create table tvypujcka (
	id_vypujcky number not null ,
	katalogove_cislo number not null ,
	datum_pujceni date,
	datum_vraceni date,
	uzivatel_id number not null ,
primary key (id_vypujcky) 
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
	format_id number not null ,
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
	format_id number not null ,
	format varchar2 (30) not null ,
primary key (format_id) 
) 
/

create table trole (
	role_id number not null ,
	role varchar2 (20),
primary key (role_id) 
) 
/

create table tuzivatel (
	uzivatel_id number not null ,
	nick varchar2 (30),
	password varchar2 (260),
	role_id number not null ,
primary key (uzivatel_id) 
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

alter table tfilmoteka add  foreign key (format_id) references tformat_filmu (format_id) 
/

alter table tvypujcka add  foreign key (katalogove_cislo) references tfilmoteka (katalogove_cislo) 
/

alter table ttitulky add  foreign key (katalogove_cislo) references tfilmoteka (katalogove_cislo) 
/

alter table tjazyk_filmu add  foreign key (katalogove_cislo) references tfilmoteka (katalogove_cislo) 
/

alter table tvypujcka add  foreign key (uzivatel_id) references tpujcujici (uzivatel_id) 
/

alter table tpujcujici add  foreign key (adresa_id) references tadresa (adresa_id) 
/

alter table tjazyk_filmu add  foreign key (jazyk_id) references tjazyk (jazyk_id) 
/

alter table ttitulky add  foreign key (jazyk_id) references tjazyk (jazyk_id) 
/

alter table ttitulky add  foreign key (format_id) references tformat_titulku (format_id) 
/

alter table tuzivatel add  foreign key (role_id) references trole (role_id) 
/

alter table tpujcujici add  foreign key (uzivatel_id) references tuzivatel (uzivatel_id) 
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



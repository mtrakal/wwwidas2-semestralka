/*
CREATED		6.10.2009
MODIFIED		14.12.2009
PROJECT		FILMOTEKA
MODEL		ORACLE 10G
COMPANY		HTTP://BLOG.TRTKAL.NET
AUTHOR		TRTKAL
VERSION		0.1.3
DATABASE		ORACLE 10G 
*/





















































DROP INDEX I_TITULKY_ID
/
DROP INDEX I_VYPUJCKA_ID
/
DROP INDEX I_KATALOGOVE_CISLO
/
DROP INDEX I_FILM_ID
/







DROP TABLE TTITULZANR CASCADE CONSTRAINTS
/
DROP TABLE TZANR CASCADE CONSTRAINTS
/
DROP TABLE TUZIVATEL CASCADE CONSTRAINTS
/
DROP TABLE TROLE CASCADE CONSTRAINTS
/
DROP TABLE TFORMAT_TITULKU CASCADE CONSTRAINTS
/
DROP TABLE TJAZYK CASCADE CONSTRAINTS
/
DROP TABLE TTITULKY CASCADE CONSTRAINTS
/
DROP TABLE TJAZYK_FILMU CASCADE CONSTRAINTS
/
DROP TABLE TADRESA CASCADE CONSTRAINTS
/
DROP TABLE TVYPUJCKA CASCADE CONSTRAINTS
/
DROP TABLE TPUJCUJICI CASCADE CONSTRAINTS
/
DROP TABLE TFILMOTEKA CASCADE CONSTRAINTS
/
DROP TABLE TFORMAT_FILMU CASCADE CONSTRAINTS
/
DROP TABLE TTITUL CASCADE CONSTRAINTS
/


-- CREATE TYPES SECTION





-- CREATE TABLES SECTION


CREATE TABLE TTITUL (
	FILM_ID NUMBER NOT NULL ,
	CZ VARCHAR2 (50),
	EN VARCHAR2 (50),
	ORIGINAL VARCHAR2 (50) NOT NULL ,
	CSFD VARCHAR2 (500),
	IMDB VARCHAR2 (500),
	ROK_VYDANI NUMBER(4,0) NOT NULL ,
	DELKA NUMBER(3,0) NOT NULL ,
	POPIS VARCHAR2 (4000),
PRIMARY KEY (FILM_ID) 
) 
/

CREATE TABLE TFORMAT_FILMU (
	FORMATFILMU_ID NUMBER NOT NULL ,
	FORMAT VARCHAR2 (30) NOT NULL ,
PRIMARY KEY (FORMATFILMU_ID) 
) 
/

CREATE TABLE TFILMOTEKA (
	KATALOGOVE_CISLO NUMBER NOT NULL ,
	FILM_ID NUMBER NOT NULL ,
	FORMATFILMU_ID NUMBER NOT NULL ,
	HODNOCENI NUMBER,
	DATUM_PRIDANI DATE NOT NULL ,
	VELIKOST NUMBER,
	UMISTENI VARCHAR2 (255),
PRIMARY KEY (KATALOGOVE_CISLO) 
) 
/

CREATE TABLE TPUJCUJICI (
	ADRESA_ID NUMBER NOT NULL ,
	JMENO VARCHAR2 (30) NOT NULL ,
	PRIJMENI VARCHAR2 (30) NOT NULL ,
	EMAIL VARCHAR2 (250) NOT NULL ,
	TELEFON NUMBER,
	NICK VARCHAR2 (30) NOT NULL ,
PRIMARY KEY (NICK) 
) 
/

CREATE TABLE TVYPUJCKA (
	VYPUJCKA_ID NUMBER NOT NULL ,
	KATALOGOVE_CISLO NUMBER NOT NULL ,
	DATUM_PUJCENI DATE NOT NULL ,
	DATUM_VRACENI DATE,
	NICK VARCHAR2 (30) NOT NULL ,
PRIMARY KEY (VYPUJCKA_ID) 
) 
/

CREATE TABLE TADRESA (
	ADRESA_ID NUMBER NOT NULL ,
	ULICE VARCHAR2 (30) NOT NULL ,
	CISLO NUMBER NOT NULL ,
	PSC NUMBER(5,0) NOT NULL ,
	MESTO VARCHAR2 (30),
PRIMARY KEY (ADRESA_ID) 
) 
/

CREATE TABLE TJAZYK_FILMU (
	KATALOGOVE_CISLO NUMBER NOT NULL ,
	JAZYK_ID NUMBER NOT NULL ,
PRIMARY KEY (KATALOGOVE_CISLO,JAZYK_ID) 
) 
/

CREATE TABLE TTITULKY (
	TITULKY_ID NUMBER NOT NULL ,
	KATALOGOVE_CISLO NUMBER NOT NULL ,
	TITULKY VARCHAR2 (150),
	FORMATTITULKU_ID NUMBER NOT NULL ,
	JAZYK_ID NUMBER NOT NULL ,
PRIMARY KEY (TITULKY_ID) 
) 
/

CREATE TABLE TJAZYK (
	JAZYK_ID NUMBER NOT NULL ,
	JAZYK VARCHAR2 (20) NOT NULL ,
PRIMARY KEY (JAZYK_ID) 
) 
/

CREATE TABLE TFORMAT_TITULKU (
	FORMATTITULKU_ID NUMBER NOT NULL ,
	FORMAT VARCHAR2 (30) NOT NULL ,
PRIMARY KEY (FORMATTITULKU_ID) 
) 
/

CREATE TABLE TROLE (
	ROLE_ID NUMBER NOT NULL ,
	ROLE VARCHAR2 (20) NOT NULL ,
PRIMARY KEY (ROLE_ID) 
) 
/

CREATE TABLE TUZIVATEL (
	NICK VARCHAR2 (30) NOT NULL ,
	PASSWORD VARCHAR2 (260) NOT NULL ,
	ROLE_ID NUMBER NOT NULL ,
PRIMARY KEY (NICK) 
) 
/

CREATE TABLE TZANR (
	ZANR_ID NUMBER NOT NULL ,
	ZANR VARCHAR2 (30),
PRIMARY KEY (ZANR_ID) 
) 
/

CREATE TABLE TTITULZANR (
	FILM_ID NUMBER NOT NULL ,
	ZANR_ID NUMBER NOT NULL ,
PRIMARY KEY (FILM_ID,ZANR_ID) 
) 
/





-- CREATE ALTERNATE KEYS SECTION


-- CREATE INDEXES SECTION

CREATE INDEX I_FILM_ID ON TTITUL (FILM_ID) 
/
CREATE INDEX I_KATALOGOVE_CISLO ON TFILMOTEKA (KATALOGOVE_CISLO) 
/
CREATE INDEX I_VYPUJCKA_ID ON TVYPUJCKA (VYPUJCKA_ID) 
/
CREATE INDEX I_TITULKY_ID ON TTITULKY (TITULKY_ID) 
/


-- CREATE SECTION FOR PKS, AKS AND UNIQUE CONSTRAINTS, WHICH HAVE TO BE GENERATED AFTER INDEXES



-- CREATE FOREIGN KEYS SECTION

ALTER TABLE TFILMOTEKA ADD  FOREIGN KEY (FILM_ID) REFERENCES TTITUL (FILM_ID) 
/

ALTER TABLE TTITULZANR ADD  FOREIGN KEY (FILM_ID) REFERENCES TTITUL (FILM_ID) 
/

ALTER TABLE TFILMOTEKA ADD  FOREIGN KEY (FORMATFILMU_ID) REFERENCES TFORMAT_FILMU (FORMATFILMU_ID) 
/

ALTER TABLE TVYPUJCKA ADD  FOREIGN KEY (KATALOGOVE_CISLO) REFERENCES TFILMOTEKA (KATALOGOVE_CISLO) 
/

ALTER TABLE TTITULKY ADD  FOREIGN KEY (KATALOGOVE_CISLO) REFERENCES TFILMOTEKA (KATALOGOVE_CISLO) 
/

ALTER TABLE TJAZYK_FILMU ADD  FOREIGN KEY (KATALOGOVE_CISLO) REFERENCES TFILMOTEKA (KATALOGOVE_CISLO) 
/

ALTER TABLE TVYPUJCKA ADD  FOREIGN KEY (NICK) REFERENCES TPUJCUJICI (NICK) 
/

ALTER TABLE TPUJCUJICI ADD  FOREIGN KEY (ADRESA_ID) REFERENCES TADRESA (ADRESA_ID) 
/

ALTER TABLE TJAZYK_FILMU ADD  FOREIGN KEY (JAZYK_ID) REFERENCES TJAZYK (JAZYK_ID) 
/

ALTER TABLE TTITULKY ADD  FOREIGN KEY (JAZYK_ID) REFERENCES TJAZYK (JAZYK_ID) 
/

ALTER TABLE TTITULKY ADD  FOREIGN KEY (FORMATTITULKU_ID) REFERENCES TFORMAT_TITULKU (FORMATTITULKU_ID) 
/

ALTER TABLE TUZIVATEL ADD  FOREIGN KEY (ROLE_ID) REFERENCES TROLE (ROLE_ID) 
/

ALTER TABLE TPUJCUJICI ADD  FOREIGN KEY (NICK) REFERENCES TUZIVATEL (NICK) 
/

ALTER TABLE TTITULZANR ADD  FOREIGN KEY (ZANR_ID) REFERENCES TZANR (ZANR_ID) 
/


-- CREATE OBJECT TABLES SECTION



-- CREATE XMLTYPE TABLES SECTION



-- CREATE PROCEDURES SECTION



-- CREATE FUNCTIONS SECTION



-- CREATE VIEWS SECTION



-- CREATE SEQUENCES SECTION




-- CREATE TRIGGERS FROM REFERENTIAL INTEGRITY SECTION




































-- CREATE USER TRIGGERS SECTION



-- CREATE PACKAGES SECTION





-- CREATE SYNONYMS SECTION



-- CREATE ROLES SECTION



-- USERS PERMISSIONS TO ROLES SECTION



-- ROLES PERMISSIONS SECTION

/* ROLES PERMISSIONS */




-- USER PERMISSIONS SECTION

/* USERS PERMISSIONS */




-- CREATE TABLE COMMENTS SECTION


-- CREATE ATTRIBUTE COMMENTS SECTION


-- AFTER SECTION



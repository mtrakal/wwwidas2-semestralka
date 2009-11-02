/* SEKVENCE */
CREATE SEQUENCE sformattitulku_id INCREMENT BY 1 START WITH 1 nomaxvalue;
CREATE SEQUENCE stitulky_id INCREMENT BY 1 START WITH 1 nomaxvalue;
CREATE SEQUENCE sjazyk_id INCREMENT BY 1 START WITH 1 nomaxvalue;
CREATE SEQUENCE suzivatel_id INCREMENT BY 1 START WITH 1 nomaxvalue;
CREATE SEQUENCE srole_id INCREMENT BY 1 START WITH 1 nomaxvalue;
CREATE SEQUENCE sadresa_id INCREMENT BY 1 START WITH 1 nomaxvalue;
CREATE SEQUENCE svypujcka_id INCREMENT BY 1 START WITH 1 nomaxvalue;
CREATE SEQUENCE sfilm_id INCREMENT BY 1 START WITH 1 nomaxvalue;
CREATE SEQUENCE szanr_id INCREMENT BY 1 START WITH 1 nomaxvalue;
CREATE SEQUENCE skatalogove_cislo INCREMENT BY 1 START WITH 1 nomaxvalue;
CREATE SEQUENCE sformatfilmu_id INCREMENT BY 1 START WITH 1 nomaxvalue;
/

/* TRIGGERY */
create or replace trigger tformattitulku_id before insert on tformat_titulku for each row begin select sformattitulku_id.nextval into :new.formattitulku_id from dual; end;
/
create or replace trigger ttitulky_id before insert on ttitulky for each row begin select stitulky_id.nextval into :new.titulky_id from dual; end;
/
create or replace trigger tjazyk_id before insert on tjazyk for each row begin select sjazyk_id.nextval into :new.jazyk_id from dual; end;
/
create or replace trigger tuzivatel_id before insert on tuzivatel for each row begin select suzivatel_id.nextval into :new.uzivatel_id from dual; end;
/
create or replace trigger trole_id before insert on trole for each row begin select srole_id.nextval into :new.role_id from dual; end;
/
create or replace trigger tadresa_id before insert on tadresa for each row begin select sadresa_id.nextval into :new.adresa_id from dual; end;
/
create or replace trigger tvypujcka_id before insert on tvypujcka for each row begin select svypujcka_id.nextval into :new.vypujcka_id from dual; end;
/
create or replace trigger tfilm_id before insert on ttitul for each row begin select sfilm_id.nextval into :new.film_id from dual; end;
/
create or replace trigger tzanr_id before insert on tzanr for each row begin select szanr_id.nextval into :new.zanr_id from dual; end;
/
create or replace trigger tkatalogove_cislo before insert on tfilmoteka for each row begin select skatalogove_cislo.nextval into :new.katalogove_cislo from dual; end;
/
create or replace trigger tformatfilmu_id before insert on tformat_filmu for each row begin select sformatfilmu_id.nextval into :new.formatfilmu_id from dual; end;
/

/* POHLEDY */
CREATE OR REPLACE FORCE VIEW movie_count ("POCET_FILMU") AS SELECT count(film_id) as pocet_filmu FROM ttitul;
/
CREATE OR REPLACE FORCE VIEW users_count ("POCET_UZIVATELU") AS SELECT count(uzivatel_id) as pocet_uzivatelu FROM tuzivatel;
/



/* ��NR */
INSERT INTO "ST22312"."TZANR" (ZANR) VALUES ('Animovan�');
INSERT INTO "ST22312"."TZANR" (ZANR) VALUES ('Hudebn�');
INSERT INTO "ST22312"."TZANR" (ZANR) VALUES ('Komedie');
INSERT INTO "ST22312"."TZANR" (ZANR) VALUES ('Ak�n�');
INSERT INTO "ST22312"."TZANR" (ZANR) VALUES ('Fantasy');
INSERT INTO "ST22312"."TZANR" (ZANR) VALUES ('Sci-Fi');
INSERT INTO "ST22312"."TZANR" (ZANR) VALUES ('Poh�dka');
INSERT INTO "ST22312"."TZANR" (ZANR) VALUES ('Dokument�rn�');

/* ROLE */
INSERT INTO "ST22312"."TROLE" (ROLE) VALUES ('Visitor');
INSERT INTO "ST22312"."TROLE" (ROLE) VALUES ('Administrator');
INSERT INTO "ST22312"."TROLE" (ROLE) VALUES ('Borrower');

/* JAZYK */
INSERT INTO "ST22312"."TJAZYK" (JAZYK) VALUES ('CZ');
INSERT INTO "ST22312"."TJAZYK" (JAZYK) VALUES ('GB');
INSERT INTO "ST22312"."TJAZYK" (JAZYK) VALUES ('FR');
INSERT INTO "ST22312"."TJAZYK" (JAZYK) VALUES ('JP');
INSERT INTO "ST22312"."TJAZYK" (JAZYK) VALUES ('DE');
INSERT INTO "ST22312"."TJAZYK" (JAZYK) VALUES ('SK');

/* FORMAT_FILMU */
INSERT INTO "ST22312"."TFORMAT_FILMU" (FORMAT) VALUES ('HDF');
INSERT INTO "ST22312"."TFORMAT_FILMU" (FORMAT) VALUES ('HDR');
INSERT INTO "ST22312"."TFORMAT_FILMU" (FORMAT) VALUES ('DVD');
INSERT INTO "ST22312"."TFORMAT_FILMU" (FORMAT) VALUES ('DVDRip');
INSERT INTO "ST22312"."TFORMAT_FILMU" (FORMAT) VALUES ('DTVRip');
INSERT INTO "ST22312"."TFORMAT_FILMU" (FORMAT) VALUES ('TVRip');
INSERT INTO "ST22312"."TFORMAT_FILMU" (FORMAT) VALUES ('Screener');
INSERT INTO "ST22312"."TFORMAT_FILMU" (FORMAT) VALUES ('TC');
INSERT INTO "ST22312"."TFORMAT_FILMU" (FORMAT) VALUES ('TS');
INSERT INTO "ST22312"."TFORMAT_FILMU" (FORMAT) VALUES ('CAM');
INSERT INTO "ST22312"."TFORMAT_FILMU" (FORMAT) VALUES ('OTHER');

/* FORMAT_TITULKU */
INSERT INTO "ST22312"."TFORMAT_TITULKU" (FORMAT) VALUES ('ASS');
INSERT INTO "ST22312"."TFORMAT_TITULKU" (FORMAT) VALUES ('AAS');
INSERT INTO "ST22312"."TFORMAT_TITULKU" (FORMAT) VALUES ('SUB');
INSERT INTO "ST22312"."TFORMAT_TITULKU" (FORMAT) VALUES ('SRT');
INSERT INTO "ST22312"."TFORMAT_TITULKU" (FORMAT) VALUES ('TXT');
INSERT INTO "ST22312"."TFORMAT_TITULKU" (FORMAT) VALUES ('OTHER');


/* TITUL */
INSERT INTO "ST22312"."TTITUL" (CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('Am�lie z Montmartru', 'Amelie from Montmartre', 'Le Fabuleux destin d''Am�lie Poulain', 'http://www.csfd.cz/film/29221-amelie-z-montmartru-fabuleux-destin-damelie-poulain-le/', 'http://www.imdb.com/title/tt0211915/', '2001', '117', 'Am�lie �ije v pa��sk� �tvrti Montmartre, kter� je sv�tem sama pro sebe. Je ��nic� v m�stn�m bistru, nakupuje u m�stn�ho zelin��e, zdrav� sousedy jako na mal�m m�st�. V jej�m �ivot� se nikdy neud�lo nic zvl�tn�ho, a� na mat�inu kuri�zn� smrt, nad n� Am�liin tat�nek st�le truchl�. Am�lie by asi z�stala sm��en� se sv�m osam�l�m �d�lem, kdyby jednoho dne neobjevila ve sv�m byt� ukryt� poklad v podob� star� krabice s pam�tkami na d�tstv� n�kdej��ho n�jemn�ka. Nejen�e se Am�lie rozhodne po letech doru�it krabici jej�mu majiteli, ale dosp�je sou�asn� k pozn�n�, �e m��e pom�hat zlep�it a napravovat okoln� sv�t. Kdy� pak jednoho dne objev� �lov�ka sb�raj�c�ho u n�dra�n�ch fotoautomat� zahozen� podobenky ciz�ch lid�, Am�lie se zamiluje. Trv� to ale je�t� n�jak� �as, ne� se sezn�m� s Ninem a ne� mu dovol� roz�ifrovat jej� tajemn� zpr�vy.');
INSERT INTO "ST22312"."TTITUL" (CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('Cesta do fantazie', 'Spirited away', 'Sen to Chihiro no kamikakushi', 'http://www.csfd.cz/film/42136-spirited-away-sen-to-chihiro-no-kamikakushi/', 'http://www.imdb.com/title/tt0245429', '2001', '125', 'Desetilet� Chihiro je oby�ejn� japonsk� hol�i�ka. Kdy� se se sv�mi rodi�i vyd�v� poprv� do nov�ho bydli�t�, jejich auto zabloud� na opu�t�nou lesn� cestu, vedouc� k z�hadn�mu tunelu. Chihiro i jej� rodi�e se vydaj� dovnit� a objev� cosi, co pova�uj� za opu�t�n� lunapark. Rodi�e podlehnou l�kav� nab�dce ob�erstven� v opu�t�n�ch st�nc�ch, ale z�hy se prom�n� ve vep�e. Chihiro se sna�� naj�t pomoc a naraz� na tajupln�ho chlapce jm�nem Haku. Ten ji sezn�m� s duchy, kte�� v noci lunapark ob�vaj� a najde j� zam�stn�n� u Yubaby, star� �arod�jnice s mal�m t�lem a velkou hlavou, kter� provozuje obrovsk� l�zn�, kam si chod� odpo�inout mili�ny pozemsk�ch boh� a jin�ch fantastick�ch bytost�. Zde se skr�v� jedin� mo�nost, jak m��e Chihiro zru�it zaklet� sv�ch rodi�� a vr�tit se do lidsk�ho sv�ta.');
INSERT INTO "ST22312"."TTITUL" (CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('Cesta z m�sta', '', 'Cesta z m�sta', 'http://www.csfd.cz/film/9399-cesta-z-mesta/', 'http://www.imdb.com/title/tt0256676/', '2000', '104', 'Program�tor Honza (Tom� Han�k) tr�v� v�t�inu sv�ho �asu v softwarov�m dom�: mailuje, upgraduje, senduje, attachuje a loaduje. Kdy� bere na v�let do p��rody sv�ho p�edpubert�ln�ho syna (Michal Vorel) z rozveden�ho man�elstv�, nezapomene samoz�ejm� p�ibalit mobil, notebook a digit�ln� kameru. Hektick� v�kendov� v�let se z�hy prot�hne na n�kolikat�denn� pobyt v mal� podhorsk� vesni�ce, kde Honza se synem str�v� nejhez�� a nejveselej�� chv�le sv�ho �ivota. Postupn� se sp��tel� s m�stn�mi figurkami a zejm�na s p�vabnou rebeluj�c� Mark�tou. Honza propad� nejen jej�mu kouzlu, ale i v�biv� v�ni dom�c�ch lik�r� jej� zemit� babi�ky, drsn�mu p��telstv� venkovsk� rodiny Ludvy a Vlasti�ky a koloritu sv�r�zn�ho venkovsk�ho �ivota. S p��chodem zimy je Honza z�kony byznysu p�inucen vr�tit se zp�t do civilizace. O�i�t�n a obohacen o z�itky, kter� mu m�sto nem��e nikdy poskytnout...');
-- pozor je tam "'" INSERT INTO "ST22312"."TTITUL" (CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('13. podla��', 'The thirteen\'s floor', '', '', '', '', '', '');
INSERT INTO "ST22312"."TTITUL" (CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('Resident Evil', 'Resident Evil', 'Resident Evil', 'http://www.csfd.cz/film/151-resident-evil/', 'http://www.imdb.com/title/tt0120804/', '2002', '97', 'Tajemn� spole�nost Umbrella Corporation, zab�vaj�c� se genetick�m v�zkumem, prov�d� ve sv�ch rozs�hl�ch podzemn�ch laborato��ch velice nebezpe�n� pokusy. V jednu chv�li unik� smrt�c� virus a centr�ln� po��ta� laborato�e - Red Queen - uzav�r� neprody�n� celou zasa�enou oblast podzemn�ho labyrintu a nech�v� zam�stnance, zasa�en� virem, uvnit� cel�ho pekla. Elitn� komando v �ele s Alic� (Milla Jovovich) a Rain (Michelle Rodriguez) dost�v� �kol, kter� je ot�zkou �ivota a smrti - izolovat virus, kter� ohro�uje cel� lidstvo zjistit p���inu. Brzo zji��uj�, �e v�echno je je�t� hor�� ne� �ekali - virem zasa�en� zam�stnanci nejsou ani �iv� ani mrtv� - nyn� jsou z nich mimo��dn� agresivn� zombie - Nemrtv� bestie, kter� se skr�vaj� v m�st� katastrofy. Jedin� jejich �kr�bnut� nebo kousnut� infikuje zasa�en�ho, kter� se okam�it� za�ne m�nit v jejich druh. Alice a jej� vojensk� t�m m� t�i hodiny na to dokon�it misi, ne� Nemrtv� proniknou na povrch Zem�. �ek� je souboj s krve��zniv�mi bestiemi bez jak�koli z�bran a dal�� d�siv� p�ekvapen� v nitru laborato�e - zmutovan� psi a jin� v�sledky experiment�. A je�t� se proti nim postav� centr�ln� po��ta� - Red Queen a ten, kdo to cel� spustil. Dok�e t�m p�ekonat po��ta�, naj�t antivirus a ubr�nit se Nemrtv�m? Kdo tohle peklo o�ivl�ho zla dok�e p�e��t? A kdo a kde je ten, jeho� pomsta ohro�uje cel� lidstvo? Filmov� zpracov�n� popul�rn� hry pln� akce, nap�t� a atraktivn� hudby, p�en�� zb�sil� tempo cel�ho dobrodru�stv� na pl�tno a zachov�v� jedine�nost kultu jm�nem "Resident Evil.');


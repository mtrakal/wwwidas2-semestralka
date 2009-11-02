/* ��NR */
INSERT INTO "ST22312"."TZANR" (ZANR_ID, ZANR) VALUES ('1', 'Animovan�');
INSERT INTO "ST22312"."TZANR" (ZANR_ID, ZANR) VALUES ('2', 'Hudebn�');
INSERT INTO "ST22312"."TZANR" (ZANR_ID, ZANR) VALUES ('3', 'Komedie');
INSERT INTO "ST22312"."TZANR" (ZANR_ID, ZANR) VALUES ('4', 'Ak�n�');
INSERT INTO "ST22312"."TZANR" (ZANR_ID, ZANR) VALUES ('5', 'Fantasy');
INSERT INTO "ST22312"."TZANR" (ZANR_ID, ZANR) VALUES ('6', 'Sci-Fi');
INSERT INTO "ST22312"."TZANR" (ZANR_ID, ZANR) VALUES ('7', 'Poh�dka');
INSERT INTO "ST22312"."TZANR" (ZANR_ID, ZANR) VALUES ('8', 'Dokument�rn�');

/* ROLE */
INSERT INTO "ST22312"."TROLE" (ROLE_ID, ROLE) VALUES ('1', 'Administrator');
INSERT INTO "ST22312"."TROLE" (ROLE_ID, ROLE) VALUES ('2', 'N�v�t�vn�k');
INSERT INTO "ST22312"."TROLE" (ROLE_ID, ROLE) VALUES ('3', 'P�j�uj�c�');

/* JAZYK */
INSERT INTO "ST22312"."TJAZYK" (JAZYK_ID, JAZYK) VALUES ('1', 'CZ');
INSERT INTO "ST22312"."TJAZYK" (JAZYK_ID, JAZYK) VALUES ('2', 'GB');
INSERT INTO "ST22312"."TJAZYK" (JAZYK_ID, JAZYK) VALUES ('3', 'FR');
INSERT INTO "ST22312"."TJAZYK" (JAZYK_ID, JAZYK) VALUES ('4', 'JP');
INSERT INTO "ST22312"."TJAZYK" (JAZYK_ID, JAZYK) VALUES ('5', 'DE');
INSERT INTO "ST22312"."TJAZYK" (JAZYK_ID, JAZYK) VALUES ('6', 'SK');

/* FORMAT_FILMU */
INSERT INTO "ST22312"."TFORMAT_FILMU" (FORMAT_ID, FORMAT) VALUES ('1', 'HDF');
INSERT INTO "ST22312"."TFORMAT_FILMU" (FORMAT_ID, FORMAT) VALUES ('2', 'HDR');
INSERT INTO "ST22312"."TFORMAT_FILMU" (FORMAT_ID, FORMAT) VALUES ('3', 'DVD');
INSERT INTO "ST22312"."TFORMAT_FILMU" (FORMAT_ID, FORMAT) VALUES ('4', 'DVDRip');
INSERT INTO "ST22312"."TFORMAT_FILMU" (FORMAT_ID, FORMAT) VALUES ('5', 'DTVRip');
INSERT INTO "ST22312"."TFORMAT_FILMU" (FORMAT_ID, FORMAT) VALUES ('6', 'TVRip');
INSERT INTO "ST22312"."TFORMAT_FILMU" (FORMAT_ID, FORMAT) VALUES ('7', 'Screener');
INSERT INTO "ST22312"."TFORMAT_FILMU" (FORMAT_ID, FORMAT) VALUES ('8', 'TC');
INSERT INTO "ST22312"."TFORMAT_FILMU" (FORMAT_ID, FORMAT) VALUES ('9', 'TS');
INSERT INTO "ST22312"."TFORMAT_FILMU" (FORMAT_ID, FORMAT) VALUES ('10', 'CAM');
INSERT INTO "ST22312"."TFORMAT_FILMU" (FORMAT_ID, FORMAT) VALUES ('11', 'Jin�');

/* FORMAT_TITULKU */
INSERT INTO "ST22312"."TFORMAT_TITULKU" (FORMAT_ID, FORMAT) VALUES ('1', 'ASS');
INSERT INTO "ST22312"."TFORMAT_TITULKU" (FORMAT_ID, FORMAT) VALUES ('2', 'AAS');
INSERT INTO "ST22312"."TFORMAT_TITULKU" (FORMAT_ID, FORMAT) VALUES ('3', 'SUB');
INSERT INTO "ST22312"."TFORMAT_TITULKU" (FORMAT_ID, FORMAT) VALUES ('4', 'SRT');
INSERT INTO "ST22312"."TFORMAT_TITULKU" (FORMAT_ID, FORMAT) VALUES ('5', 'TXT');
INSERT INTO "ST22312"."TFORMAT_TITULKU" (FORMAT_ID, FORMAT) VALUES ('6', 'OTHER');


/* TITUL */
INSERT INTO "ST22312"."TTITUL" (FILM_ID, CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('1', 'Am�lie z Montmartru', 'Amelie from Montmartre', 'Le Fabuleux destin d''Am�lie Poulain', 'http://www.csfd.cz/film/29221-amelie-z-montmartru-fabuleux-destin-damelie-poulain-le/', 'http://www.imdb.com/title/tt0211915/', '2001', '117', 'Am�lie �ije v pa��sk� �tvrti Montmartre, kter� je sv�tem sama pro sebe. Je ��nic� v m�stn�m bistru, nakupuje u m�stn�ho zelin��e, zdrav� sousedy jako na mal�m m�st�. V jej�m �ivot� se nikdy neud�lo nic zvl�tn�ho, a� na mat�inu kuri�zn� smrt, nad n� Am�liin tat�nek st�le truchl�. Am�lie by asi z�stala sm��en� se sv�m osam�l�m �d�lem, kdyby jednoho dne neobjevila ve sv�m byt� ukryt� poklad v podob� star� krabice s pam�tkami na d�tstv� n�kdej��ho n�jemn�ka. Nejen�e se Am�lie rozhodne po letech doru�it krabici jej�mu majiteli, ale dosp�je sou�asn� k pozn�n�, �e m��e pom�hat zlep�it a napravovat okoln� sv�t. Kdy� pak jednoho dne objev� �lov�ka sb�raj�c�ho u n�dra�n�ch fotoautomat� zahozen� podobenky ciz�ch lid�, Am�lie se zamiluje. Trv� to ale je�t� n�jak� �as, ne� se sezn�m� s Ninem a ne� mu dovol� roz�ifrovat jej� tajemn� zpr�vy.');
INSERT INTO "ST22312"."TTITUL" (FILM_ID, CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('2', 'Cesta do fantazie', 'Spirited away', '', '', '', '', '', '');
INSERT INTO "ST22312"."TTITUL" (FILM_ID, CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('3', 'Cesta z m�sta', '', 'Cesta z m�sta', '', '', '', '', '');
-- pozor je tam "'" INSERT INTO "ST22312"."TTITUL" (FILM_ID, CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('4', '13. podla��', 'The thirteen\'s floor', '', '', '', '', '', '');
INSERT INTO "ST22312"."TTITUL" (FILM_ID, CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('5', 'Resident Evil', 'Resident Evil', '', '', '', '', '', '');
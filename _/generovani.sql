/* ŽÁNR */
INSERT INTO "ST22312"."TZANR" (ZANR_ID, ZANR) VALUES ('1', 'Animovaný');
INSERT INTO "ST22312"."TZANR" (ZANR_ID, ZANR) VALUES ('2', 'Hudební');
INSERT INTO "ST22312"."TZANR" (ZANR_ID, ZANR) VALUES ('3', 'Komedie');
INSERT INTO "ST22312"."TZANR" (ZANR_ID, ZANR) VALUES ('4', 'Akèní');
INSERT INTO "ST22312"."TZANR" (ZANR_ID, ZANR) VALUES ('5', 'Fantasy');
INSERT INTO "ST22312"."TZANR" (ZANR_ID, ZANR) VALUES ('6', 'Sci-Fi');
INSERT INTO "ST22312"."TZANR" (ZANR_ID, ZANR) VALUES ('7', 'Pohádka');
INSERT INTO "ST22312"."TZANR" (ZANR_ID, ZANR) VALUES ('8', 'Dokumentární');

/* ROLE */
INSERT INTO "ST22312"."TROLE" (ROLE_ID, ROLE) VALUES ('1', 'Administrator');
INSERT INTO "ST22312"."TROLE" (ROLE_ID, ROLE) VALUES ('2', 'Návštìvník');
INSERT INTO "ST22312"."TROLE" (ROLE_ID, ROLE) VALUES ('3', 'Pùjèující');

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
INSERT INTO "ST22312"."TFORMAT_FILMU" (FORMAT_ID, FORMAT) VALUES ('11', 'Jiný');

/* FORMAT_TITULKU */
INSERT INTO "ST22312"."TFORMAT_TITULKU" (FORMAT_ID, FORMAT) VALUES ('1', 'ASS');
INSERT INTO "ST22312"."TFORMAT_TITULKU" (FORMAT_ID, FORMAT) VALUES ('2', 'AAS');
INSERT INTO "ST22312"."TFORMAT_TITULKU" (FORMAT_ID, FORMAT) VALUES ('3', 'SUB');
INSERT INTO "ST22312"."TFORMAT_TITULKU" (FORMAT_ID, FORMAT) VALUES ('4', 'SRT');
INSERT INTO "ST22312"."TFORMAT_TITULKU" (FORMAT_ID, FORMAT) VALUES ('5', 'TXT');
INSERT INTO "ST22312"."TFORMAT_TITULKU" (FORMAT_ID, FORMAT) VALUES ('6', 'OTHER');


/* TITUL */
INSERT INTO "ST22312"."TTITUL" (FILM_ID, CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('1', 'Amélie z Montmartru', 'Amelie from Montmartre', 'Le Fabuleux destin d''Amélie Poulain', 'http://www.csfd.cz/film/29221-amelie-z-montmartru-fabuleux-destin-damelie-poulain-le/', 'http://www.imdb.com/title/tt0211915/', '2001', '117', 'Amélie žije v paøížské ètvrti Montmartre, která je svìtem sama pro sebe. Je èíšnicí v místním bistru, nakupuje u místního zelináøe, zdraví sousedy jako na malém mìstì. V jejím životì se nikdy neudálo nic zvláštního, až na matèinu kuriózní smrt, nad níž Améliin tatínek stále truchlí. Amélie by asi zùstala smíøená se svým osamìlým údìlem, kdyby jednoho dne neobjevila ve svém bytì ukrytý poklad v podobì staré krabice s památkami na dìtství nìkdejšího nájemníka. Nejenže se Amélie rozhodne po letech doruèit krabici jejímu majiteli, ale dospìje souèasnì k poznání, že mùže pomáhat zlepšit a napravovat okolní svìt. Když pak jednoho dne objeví èlovìka sbírajícího u nádražních fotoautomatù zahozené podobenky cizích lidí, Amélie se zamiluje. Trvá to ale ještì nìjaký èas, než se seznámí s Ninem a než mu dovolí rozšifrovat její tajemné zprávy.');
INSERT INTO "ST22312"."TTITUL" (FILM_ID, CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('2', 'Cesta do fantazie', 'Spirited away', '', '', '', '', '', '');
INSERT INTO "ST22312"."TTITUL" (FILM_ID, CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('3', 'Cesta z mìsta', '', 'Cesta z mìsta', '', '', '', '', '');
-- pozor je tam "'" INSERT INTO "ST22312"."TTITUL" (FILM_ID, CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('4', '13. podlaží', 'The thirteen\'s floor', '', '', '', '', '', '');
INSERT INTO "ST22312"."TTITUL" (FILM_ID, CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('5', 'Resident Evil', 'Resident Evil', '', '', '', '', '', '');
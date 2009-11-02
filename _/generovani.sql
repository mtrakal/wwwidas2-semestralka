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



/* ÁNR */
INSERT INTO "ST22312"."TZANR" (ZANR) VALUES ('Animovanı');
INSERT INTO "ST22312"."TZANR" (ZANR) VALUES ('Hudební');
INSERT INTO "ST22312"."TZANR" (ZANR) VALUES ('Komedie');
INSERT INTO "ST22312"."TZANR" (ZANR) VALUES ('Akèní');
INSERT INTO "ST22312"."TZANR" (ZANR) VALUES ('Fantasy');
INSERT INTO "ST22312"."TZANR" (ZANR) VALUES ('Sci-Fi');
INSERT INTO "ST22312"."TZANR" (ZANR) VALUES ('Pohádka');
INSERT INTO "ST22312"."TZANR" (ZANR) VALUES ('Dokumentární');

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
INSERT INTO "ST22312"."TTITUL" (CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('Amélie z Montmartru', 'Amelie from Montmartre', 'Le Fabuleux destin d''Amélie Poulain', 'http://www.csfd.cz/film/29221-amelie-z-montmartru-fabuleux-destin-damelie-poulain-le/', 'http://www.imdb.com/title/tt0211915/', '2001', '117', 'Amélie ije v paøíské ètvrti Montmartre, která je svìtem sama pro sebe. Je èíšnicí v místním bistru, nakupuje u místního zelináøe, zdraví sousedy jako na malém mìstì. V jejím ivotì se nikdy neudálo nic zvláštního, a na matèinu kuriózní smrt, nad ní Améliin tatínek stále truchlí. Amélie by asi zùstala smíøená se svım osamìlım údìlem, kdyby jednoho dne neobjevila ve svém bytì ukrytı poklad v podobì staré krabice s památkami na dìtství nìkdejšího nájemníka. Nejene se Amélie rozhodne po letech doruèit krabici jejímu majiteli, ale dospìje souèasnì k poznání, e mùe pomáhat zlepšit a napravovat okolní svìt. Kdy pak jednoho dne objeví èlovìka sbírajícího u nádraních fotoautomatù zahozené podobenky cizích lidí, Amélie se zamiluje. Trvá to ale ještì nìjakı èas, ne se seznámí s Ninem a ne mu dovolí rozšifrovat její tajemné zprávy.');
INSERT INTO "ST22312"."TTITUL" (CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('Cesta do fantazie', 'Spirited away', 'Sen to Chihiro no kamikakushi', 'http://www.csfd.cz/film/42136-spirited-away-sen-to-chihiro-no-kamikakushi/', 'http://www.imdb.com/title/tt0245429', '2001', '125', 'Desetiletá Chihiro je obyèejná japonská holèièka. Kdy se se svımi rodièi vydává poprvé do nového bydlištì, jejich auto zabloudí na opuštìnou lesní cestu, vedoucí k záhadnému tunelu. Chihiro i její rodièe se vydají dovnitø a objeví cosi, co povaují za opuštìnı lunapark. Rodièe podlehnou lákavé nabídce obèerstvení v opuštìnıch stáncích, ale záhy se promìní ve vepøe. Chihiro se snaí najít pomoc a narazí na tajuplného chlapce jménem Haku. Ten ji seznámí s duchy, kteøí v noci lunapark obıvají a najde jí zamìstnání u Yubaby, staré èarodìjnice s malım tìlem a velkou hlavou, která provozuje obrovské láznì, kam si chodí odpoèinout milióny pozemskıch bohù a jinıch fantastickıch bytostí. Zde se skrıvá jediná monost, jak mùe Chihiro zrušit zakletí svıch rodièù a vrátit se do lidského svìta.');
INSERT INTO "ST22312"."TTITUL" (CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('Cesta z mìsta', '', 'Cesta z mìsta', 'http://www.csfd.cz/film/9399-cesta-z-mesta/', 'http://www.imdb.com/title/tt0256676/', '2000', '104', 'Programátor Honza (Tomáš Hanák) tráví vìtšinu svého èasu v softwarovém domì: mailuje, upgraduje, senduje, attachuje a loaduje. Kdy bere na vılet do pøírody svého pøedpubertálního syna (Michal Vorel) z rozvedeného manelství, nezapomene samozøejmì pøibalit mobil, notebook a digitální kameru. Hektickı víkendovı vılet se záhy protáhne na nìkolikatıdenní pobyt v malé podhorské vesnièce, kde Honza se synem stráví nejhezèí a nejveselejší chvíle svého ivota. Postupnì se spøátelí s místními figurkami a zejména s pùvabnou rebelující Markétou. Honza propadá nejen jejímu kouzlu, ale i vábivé vùni domácích likérù její zemité babièky, drsnému pøátelství venkovské rodiny Ludvy a Vlastièky a koloritu svérázného venkovského ivota. S pøíchodem zimy je Honza zákony byznysu pøinucen vrátit se zpìt do civilizace. Oèištìn a obohacen o záitky, které mu mìsto nemùe nikdy poskytnout...');
-- pozor je tam "'" INSERT INTO "ST22312"."TTITUL" (CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('13. podlaí', 'The thirteen\'s floor', '', '', '', '', '', '');
INSERT INTO "ST22312"."TTITUL" (CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('Resident Evil', 'Resident Evil', 'Resident Evil', 'http://www.csfd.cz/film/151-resident-evil/', 'http://www.imdb.com/title/tt0120804/', '2002', '97', 'Tajemná spoleènost Umbrella Corporation, zabıvající se genetickım vızkumem, provádí ve svıch rozsáhlıch podzemních laboratoøích velice nebezpeèné pokusy. V jednu chvíli uniká smrtící virus a centrální poèítaè laboratoøe - Red Queen - uzavírá neprodyšnì celou zasaenou oblast podzemního labyrintu a nechává zamìstnance, zasaené virem, uvnitø celého pekla. Elitní komando v èele s Alicí (Milla Jovovich) a Rain (Michelle Rodriguez) dostává úkol, kterı je otázkou ivota a smrti - izolovat virus, kterı ohrouje celé lidstvo zjistit pøíèinu. Brzo zjišují, e všechno je ještì horší ne èekali - virem zasaení zamìstnanci nejsou ani iví ani mrtví - nyní jsou z nich mimoøádnì agresivní zombie - Nemrtvé bestie, které se skrıvají v místì katastrofy. Jediné jejich škrábnutí nebo kousnutí infikuje zasaeného, kterı se okamitì zaène mìnit v jejich druh. Alice a její vojenskı tım má tøi hodiny na to dokonèit misi, ne Nemrtví proniknou na povrch Zemì. Èeká je souboj s krveíznivımi bestiemi bez jakıkoli zábran a další dìsivé pøekvapení v nitru laboratoøe - zmutovaní psi a jiné vısledky experimentù. A ještì se proti nim postaví centrální poèítaè - Red Queen a ten, kdo to celé spustil. Dokáe tım pøekonat poèítaè, najít antivirus a ubránit se Nemrtvım? Kdo tohle peklo oivlého zla dokáe pøeít? A kdo a kde je ten, jeho pomsta ohrouje celé lidstvo? Filmové zpracování populární hry plné akce, napìtí a atraktivní hudby, pøenáší zbìsilé tempo celého dobrodruství na plátno a zachovává jedineènost kultu jménem "Resident Evil.');


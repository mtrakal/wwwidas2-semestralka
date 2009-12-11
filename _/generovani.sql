/* SEKVENCE */
CREATE SEQUENCE sformattitulku_id INCREMENT BY 1 START WITH 1 nomaxvalue;
CREATE SEQUENCE stitulky_id INCREMENT BY 1 START WITH 1 nomaxvalue;
CREATE SEQUENCE sjazyk_id INCREMENT BY 1 START WITH 1 nomaxvalue;
CREATE SEQUENCE srole_id INCREMENT BY 1 START WITH 1 nomaxvalue;
CREATE SEQUENCE sadresa_id INCREMENT BY 1 START WITH 1 nomaxvalue;
CREATE SEQUENCE svypujcka_id INCREMENT BY 1 START WITH 1 nomaxvalue;
CREATE SEQUENCE sfilm_id INCREMENT BY 1 START WITH 1 nomaxvalue;
CREATE SEQUENCE szanr_id INCREMENT BY 1 START WITH 1 nomaxvalue;
CREATE SEQUENCE skatalogove_cislo INCREMENT BY 1 START WITH 1 nomaxvalue;
CREATE SEQUENCE sformatfilmu_id INCREMENT BY 1 START WITH 1 nomaxvalue;
--CREATE SEQUENCE suzivatel_id INCREMENT BY 1 START WITH 1 nomaxvalue;
/

/* TRIGGERY */
create or replace trigger tformattitulku_id before insert on tformat_titulku for each row begin select sformattitulku_id.nextval into :new.formattitulku_id from dual; end;
/
create or replace trigger ttitulky_id before insert on ttitulky for each row begin select stitulky_id.nextval into :new.titulky_id from dual; end;
/
create or replace trigger tjazyk_id before insert on tjazyk for each row begin select sjazyk_id.nextval into :new.jazyk_id from dual; end;
/
--create or replace trigger tuzivatel_id before insert on tuzivatel for each row begin select suzivatel_id.nextval into :new.uzivatel_id from dual; end;
--/
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
CREATE OR REPLACE FORCE VIEW users_count ("POCET_UZIVATELU") AS SELECT count(nick) as pocet_uzivatelu FROM tuzivatel;
/

/* FUNKCE */
create or replace
function f_pocetnevracenychfilmu return number as
  pocet_pujcenych number;
begin
  select count(*) into pocet_pujcenych from tpujcujici
  left join tvypujcka on tvypujcka.datum_vraceni is null
  where tvypujcka.nick = tpujcujici.nick
  order by tpujcujici.prijmeni;
  return pocet_pujcenych;
end f_pocetnevracenychfilmu;
/

/* použití*/
select f_pocetnevracenychfilmu as NEVRACENYCH from dual;

/* PROCEDURY */



/* ŽÁNR */
INSERT INTO "ST22312"."TZANR" (ZANR) VALUES ('Animovaný');
INSERT INTO "ST22312"."TZANR" (ZANR) VALUES ('Hudební');
INSERT INTO "ST22312"."TZANR" (ZANR) VALUES ('Komedie');
INSERT INTO "ST22312"."TZANR" (ZANR) VALUES ('Akční');
INSERT INTO "ST22312"."TZANR" (ZANR) VALUES ('Fantasy');
INSERT INTO "ST22312"."TZANR" (ZANR) VALUES ('Sci-Fi');
INSERT INTO "ST22312"."TZANR" (ZANR) VALUES ('Pohádka');
INSERT INTO "ST22312"."TZANR" (ZANR) VALUES ('Dokumentární');

/* ROLE */
INSERT INTO "ST22312"."TROLE" (ROLE) VALUES ('Visitor');
INSERT INTO "ST22312"."TROLE" (ROLE) VALUES ('Borrower');
INSERT INTO "ST22312"."TROLE" (ROLE) VALUES ('Administrator');

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
INSERT INTO "ST22312"."TTITUL" (CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('Amélie z Montmartru', 'Amelie from Montmartre', 'Le Fabuleux destin d''Amélie Poulain', 'http://www.csfd.cz/film/29221-amelie-z-montmartru-fabuleux-destin-damelie-poulain-le/', 'http://www.imdb.com/title/tt0211915/', '2001', '117', 'Amélie žije v pařížské čtvrti Montmartre, která je světem sama pro sebe. Je číšnicí v místním bistru, nakupuje u místního zelináře, zdraví sousedy jako na malém městě. V jejím životě se nikdy neudálo nic zvláštního, až na matčinu kuriózní smrt, nad níž Améliin tatínek stále truchlí. Amélie by asi zůstala smířená se svým osamělým údělem, kdyby jednoho dne neobjevila ve svém bytě ukrytý poklad v podobě staré krabice s památkami na dětství někdejšího nájemníka. Nejenže se Amélie rozhodne po letech doručit krabici jejímu majiteli, ale dospěje současně k poznání, že může pomáhat zlepšit a napravovat okolní svět. Když pak jednoho dne objeví člověka sbírajícího u nádražních fotoautomatů zahozené podobenky cizích lidí, Amélie se zamiluje. Trvá to ale ještě nějaký čas, než se seznámí s Ninem a než mu dovolí rozšifrovat její tajemné zprávy.');
INSERT INTO "ST22312"."TTITUL" (CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('Cesta do fantazie', 'Spirited away', 'Sen to Chihiro no kamikakushi', 'http://www.csfd.cz/film/42136-spirited-away-sen-to-chihiro-no-kamikakushi/', 'http://www.imdb.com/title/tt0245429', '2001', '125', 'Desetiletá Chihiro je obyčejná japonská holčička. Když se se svými rodiči vydává poprvé do nového bydliště, jejich auto zabloudí na opuštěnou lesní cestu, vedoucí k záhadnému tunelu. Chihiro i její rodiče se vydají dovnitř a objeví cosi, co považují za opuštěný lunapark. Rodiče podlehnou lákavé nabídce občerstvení v opuštěných stáncích, ale záhy se promění ve vepře. Chihiro se snaží najít pomoc a narazí na tajuplného chlapce jménem Haku. Ten ji seznámí s duchy, kteří v noci lunapark obývají a najde jí zaměstnání u Yubaby, staré čarodějnice s malým tělem a velkou hlavou, která provozuje obrovské lázně, kam si chodí odpočinout milióny pozemských bohů a jiných fantastických bytostí. Zde se skrývá jediná možnost, jak může Chihiro zrušit zakletí svých rodičů a vrátit se do lidského světa.');
INSERT INTO "ST22312"."TTITUL" (CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('Cesta z města', '', 'Cesta z města', 'http://www.csfd.cz/film/9399-cesta-z-mesta/', 'http://www.imdb.com/title/tt0256676/', '2000', '104', 'Programátor Honza (Tomáš Hanák) tráví většinu svého času v softwarovém domě: mailuje, upgraduje, senduje, attachuje a loaduje. Když bere na výlet do přírody svého předpubertálního syna (Michal Vorel) z rozvedeného manželství, nezapomene samozřejmě přibalit mobil, notebook a digitální kameru. Hektický víkendový výlet se záhy protáhne na několikatýdenní pobyt v malé podhorské vesničce, kde Honza se synem stráví nejhezčí a nejveselejší chvíle svého života. Postupně se spřátelí s místními figurkami a zejména s půvabnou rebelující Markétou. Honza propadá nejen jejímu kouzlu, ale i vábivé vůni domácích likérů její zemité babičky, drsnému přátelství venkovské rodiny Ludvy a Vlastičky a koloritu svérázného venkovského života. S příchodem zimy je Honza zákony byznysu přinucen vrátit se zpět do civilizace. Očištěn a obohacen o zážitky, které mu město nemůže nikdy poskytnout...');
-- pozor je tam "'" INSERT INTO "ST22312"."TTITUL" (CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('13. podlaží', 'The thirteen\'s floor', '', '', '', '', '', '');
INSERT INTO "ST22312"."TTITUL" (CZ, EN, ORIGINAL, CSFD, IMDB, ROK_VYDANI, DELKA, POPIS) VALUES ('Resident Evil', 'Resident Evil', 'Resident Evil', 'http://www.csfd.cz/film/151-resident-evil/', 'http://www.imdb.com/title/tt0120804/', '2002', '97', 'Tajemná společnost Umbrella Corporation, zabývající se genetickým výzkumem, provádí ve svých rozsáhlých podzemních laboratořích velice nebezpečné pokusy. V jednu chvíli uniká smrtící virus a centrální počítač laboratoře - Red Queen - uzavírá neprodyšně celou zasaženou oblast podzemního labyrintu a nechává zaměstnance, zasažené virem, uvnitř celého pekla. Elitní komando v čele s Alicí (Milla Jovovich) a Rain (Michelle Rodriguez) dostává úkol, který je otázkou života a smrti - izolovat virus, který ohrožuje celé lidstvo zjistit příčinu. Brzo zjišťují, že všechno je ještě horší než čekali - virem zasažení zaměstnanci nejsou ani živí ani mrtví - nyní jsou z nich mimořádně agresivní zombie - Nemrtvé bestie, které se skrývají v místě katastrofy. Jediné jejich škrábnutí nebo kousnutí infikuje zasaženého, který se okamžitě začne měnit v jejich druh. Alice a její vojenský tým má tři hodiny na to dokončit misi, než Nemrtví proniknou na povrch Země. Čeká je souboj s krvežíznivými bestiemi bez jakýkoli zábran a další děsivé překvapení v nitru laboratoře - zmutovaní psi a jiné výsledky experimentů. A ještě se proti nim postaví centrální počítač - Red Queen a ten, kdo to celé spustil. Dokáže tým překonat počítač, najít antivirus a ubránit se Nemrtvým? Kdo tohle peklo oživlého zla dokáže přežít? A kdo a kde je ten, jehož pomsta ohrožuje celé lidstvo? Filmové zpracování populární hry plné akce, napětí a atraktivní hudby, přenáší zběsilé tempo celého dobrodružství na plátno a zachovává jedinečnost kultu jménem "Resident Evil.');

/* DATA */
Insert into TUZIVATEL (NICK,PASSWORD,ROLE_ID) values ('trtkal','6e017b5464f820a6c1bb5e9f6d711a667a80d8eae4da3b7fbbce2345d7772b0674a318d5',3);

INSERT INTO "ST22312"."TTITULZANR" (FILM_ID, ZANR_ID) VALUES ('1', '3');
INSERT INTO "ST22312"."TTITULZANR" (FILM_ID, ZANR_ID) VALUES ('2', '3');
INSERT INTO "ST22312"."TTITULZANR" (FILM_ID, ZANR_ID) VALUES ('2', '1');
INSERT INTO "ST22312"."TTITULZANR" (FILM_ID, ZANR_ID) VALUES ('2', '5');
INSERT INTO "ST22312"."TTITULZANR" (FILM_ID, ZANR_ID) VALUES ('3', '3');
INSERT INTO "ST22312"."TTITULZANR" (FILM_ID, ZANR_ID) VALUES ('4', '6');
INSERT INTO "ST22312"."TTITULZANR" (FILM_ID, ZANR_ID) VALUES ('4', '4');

INSERT INTO "ST22312"."TUZIVATEL" (NICK, PASSWORD, ROLE_ID) VALUES ('stepas', '6e017b5464f820a6c1bb5e9f6d711a667a80d8eae4da3b7fbbce2345d7772b0674a318d5', '2');
INSERT INTO "ST22312"."TUZIVATEL" (NICK, PASSWORD, ROLE_ID) VALUES ('art', '6e017b5464f820a6c1bb5e9f6d711a667a80d8eae4da3b7fbbce2345d7772b0674a318d5', '2');
UPDATE "ST22312"."TUZIVATEL" SET NICK = 'stepis' WHERE ROWID = 'AAAWUJAAGAAAnRYAAB' AND ORA_ROWSCN = '24138444';

INSERT INTO "ST22312"."TPUJCUJICI" (ADRESA_ID, JMENO, PRIJMENI, EMAIL, NICK) VALUES ('3', 'Štěpán', 'Šonský', 'ssonsky@seznam.cz', 'shawn');
INSERT INTO "ST22312"."TPUJCUJICI" (ADRESA_ID, JMENO, PRIJMENI, EMAIL, TELEFON, NICK) VALUES ('3', 'Štěpán', 'Gajzler', 'stepis@gmail.com', '44582934', 'stepis');
INSERT INTO "ST22312"."TPUJCUJICI" (ADRESA_ID, JMENO, PRIJMENI, EMAIL, TELEFON, NICK) VALUES ('3', 'Artur', 'Cimbálník', 'art@gmail.com', '7762937012', 'art');

INSERT INTO "ST22312"."TPUJCUJICI" (ADRESA_ID, JMENO, PRIJMENI, EMAIL, NICK) VALUES ('3', 'Štěpán', 'Šonský', 'ssonsky@seznam.cz', 'shawn');
INSERT INTO "ST22312"."TPUJCUJICI" (ADRESA_ID, JMENO, PRIJMENI, EMAIL, TELEFON, NICK) VALUES ('3', 'Štěpán', 'Gajzler', 'stepis@gmail.com', '44582934', 'stepis');
INSERT INTO "ST22312"."TPUJCUJICI" (ADRESA_ID, JMENO, PRIJMENI, EMAIL, TELEFON, NICK) VALUES ('3', 'Artur', 'Cimbálník', 'art@gmail.com', '7762937012', 'art');

INSERT INTO "ST22312"."TFILMOTEKA" (FILM_ID, FORMATFILMU_ID, HODNOCENI, DATUM_PRIDANI, VELIKOST, UMISTENI) VALUES ('1', '3', '5', TO_DATE('11.12.09', 'DD.MM.RR'), '728837261', 'F43');
INSERT INTO "ST22312"."TFILMOTEKA" (FILM_ID, FORMATFILMU_ID, HODNOCENI, DATUM_PRIDANI, VELIKOST, UMISTENI) VALUES ('1', '1', '5', TO_DATE('11.12.09', 'DD.MM.RR'), '4503839273', 'F44');
INSERT INTO "ST22312"."TFILMOTEKA" (FILM_ID, FORMATFILMU_ID, HODNOCENI, DATUM_PRIDANI, VELIKOST, UMISTENI) VALUES ('2', '5', '5', TO_DATE('11.12.09', 'DD.MM.RR'), '728372802', 'F55');
INSERT INTO "ST22312"."TFILMOTEKA" (FILM_ID, FORMATFILMU_ID, HODNOCENI, DATUM_PRIDANI, VELIKOST, UMISTENI) VALUES ('3', '7', '4', TO_DATE('11.12.09', 'DD.MM.RR'), '453245765', 'F21');
INSERT INTO "ST22312"."TFILMOTEKA" (FILM_ID, FORMATFILMU_ID, HODNOCENI, DATUM_PRIDANI, VELIKOST, UMISTENI) VALUES ('4', '11', '3', TO_DATE('11.12.09', 'DD.MM.RR'), '443576749', 'F11');
INSERT INTO "ST22312"."TFILMOTEKA" (FILM_ID, FORMATFILMU_ID, HODNOCENI, DATUM_PRIDANI, VELIKOST, UMISTENI) VALUES ('4', '3', '4', TO_DATE('04.12.09', 'DD.MM.RR'), '4876354829', 'F33');

INSERT INTO "ST22312"."TJAZYK_FILMU" (KATALOGOVE_CISLO, JAZYK_ID) VALUES ('1', '1');
INSERT INTO "ST22312"."TJAZYK_FILMU" (KATALOGOVE_CISLO, JAZYK_ID) VALUES ('2', '3');
INSERT INTO "ST22312"."TJAZYK_FILMU" (KATALOGOVE_CISLO, JAZYK_ID) VALUES ('2', '5');
INSERT INTO "ST22312"."TJAZYK_FILMU" (KATALOGOVE_CISLO, JAZYK_ID) VALUES ('2', '1');
INSERT INTO "ST22312"."TJAZYK_FILMU" (KATALOGOVE_CISLO, JAZYK_ID) VALUES ('3', '1');
INSERT INTO "ST22312"."TJAZYK_FILMU" (KATALOGOVE_CISLO, JAZYK_ID) VALUES ('3', '4');
INSERT INTO "ST22312"."TJAZYK_FILMU" (KATALOGOVE_CISLO, JAZYK_ID) VALUES ('4', '1');
INSERT INTO "ST22312"."TJAZYK_FILMU" (KATALOGOVE_CISLO, JAZYK_ID) VALUES ('5', '2');
INSERT INTO "ST22312"."TJAZYK_FILMU" (KATALOGOVE_CISLO, JAZYK_ID) VALUES ('6', '1');
INSERT INTO "ST22312"."TJAZYK_FILMU" (KATALOGOVE_CISLO, JAZYK_ID) VALUES ('6', '2');
INSERT INTO "ST22312"."TJAZYK_FILMU" (KATALOGOVE_CISLO, JAZYK_ID) VALUES ('6', '6');

INSERT INTO "ST22312"."TTITULKY" (KATALOGOVE_CISLO, TITULKY, FORMATTITULKU_ID, JAZYK_ID) VALUES ('1', 'interní', '6', '1');
INSERT INTO "ST22312"."TTITULKY" (KATALOGOVE_CISLO, TITULKY, FORMATTITULKU_ID, JAZYK_ID) VALUES ('2', 'amelie.cz.ass', '1', '1');
INSERT INTO "ST22312"."TTITULKY" (KATALOGOVE_CISLO, TITULKY, FORMATTITULKU_ID, JAZYK_ID) VALUES ('2', 'amelie.cz.srt', '4', '1');
INSERT INTO "ST22312"."TTITULKY" (KATALOGOVE_CISLO, TITULKY, FORMATTITULKU_ID, JAZYK_ID) VALUES ('3', 'cesta do fantazie.cz.sub', '3', '1');
INSERT INTO "ST22312"."TTITULKY" (KATALOGOVE_CISLO, TITULKY, FORMATTITULKU_ID, JAZYK_ID) VALUES ('3', 'cesta do fantazie.en.aas', '2', '2');
INSERT INTO "ST22312"."TTITULKY" (KATALOGOVE_CISLO, TITULKY, FORMATTITULKU_ID, JAZYK_ID) VALUES ('5', 'resident.cz.sub', '3', '1');
INSERT INTO "ST22312"."TTITULKY" (KATALOGOVE_CISLO, TITULKY, FORMATTITULKU_ID, JAZYK_ID) VALUES ('6', 'resident.cz.ass', '1', '1');

INSERT INTO "ST22312"."TVYPUJCKA" (KATALOGOVE_CISLO, DATUM_PUJCENI, DATUM_VRACENI, NICK) VALUES ('1', TO_DATE('11.12.09', 'DD.MM.RR'), TO_DATE('13.12.09', 'DD.MM.RR'), 'stepis');
INSERT INTO "ST22312"."TVYPUJCKA" (KATALOGOVE_CISLO, DATUM_PUJCENI, DATUM_VRACENI, NICK) VALUES ('1', TO_DATE('14.12.09', 'DD.MM.RR'), TO_DATE('15.12.09', 'DD.MM.RR'), 'art');
INSERT INTO "ST22312"."TVYPUJCKA" (KATALOGOVE_CISLO, DATUM_PUJCENI, DATUM_VRACENI, NICK) VALUES ('3', TO_DATE('11.12.09', 'DD.MM.RR'), TO_DATE('12.12.09', 'DD.MM.RR'), 'shawn');
INSERT INTO "ST22312"."TVYPUJCKA" (KATALOGOVE_CISLO, DATUM_PUJCENI, DATUM_VRACENI, NICK) VALUES ('2', TO_DATE('11.12.10', 'DD.MM.RR'), TO_DATE('13.12.10', 'DD.MM.RR'), 'stepis');
INSERT INTO "ST22312"."TVYPUJCKA" (KATALOGOVE_CISLO, DATUM_PUJCENI, NICK) VALUES ('5', TO_DATE('11.11.09', 'DD.MM.RR'), 'shawn');
INSERT INTO "ST22312"."TVYPUJCKA" (KATALOGOVE_CISLO, DATUM_PUJCENI, NICK) VALUES ('6', TO_DATE('09.12.09', 'DD.MM.RR'), 'shawn');
INSERT INTO "ST22312"."TVYPUJCKA" (KATALOGOVE_CISLO, DATUM_PUJCENI, NICK) VALUES ('4', TO_DATE('06.10.09', 'DD.MM.RR'), 'art');
INSERT INTO "ST22312"."TVYPUJCKA" (KATALOGOVE_CISLO, DATUM_PUJCENI, NICK) VALUES ('3', TO_DATE('12.01.10', 'DD.MM.RR'), 'stepis');

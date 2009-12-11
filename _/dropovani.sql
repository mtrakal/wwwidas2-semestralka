/* TABULKY */
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

/* TRIGGERY */
drop trigger formattitulku_id;
/
drop trigger titulky_id;
/
drop trigger jazyk_id;
/
drop trigger uzivatel_id;
/
drop trigger role_id;
/
drop trigger adresa_id;
/
drop trigger vypujcka_id;
/
drop trigger film_id;
/
drop trigger zanr_id;
/
drop trigger katalogove_cislo;
/
drop trigger formatfilmu_id;
/

/* SEKVENCE */
drop sequence sformattitulku_id;
/
drop sequence stitulky_id;
/
drop sequence sjazyk_id;
/
drop sequence suzivatel_id;
/
drop sequence srole_id;
/
drop sequence sadresa_id;
/
drop sequence svypujcka_id;
/
drop sequence sfilm_id;
/
drop sequence szanr_id;
/
drop sequence skatalogove_cislo;
/
drop sequence sformatfilmu_id;
/

/* POHLEDY */
drop view "MOVIE_COUNT";
/
drop view "USERS_COUNT";
/
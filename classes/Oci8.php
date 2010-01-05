<?php
include_once dirname(__FILE__) . '/../dibi/dibi.php';
include_once dirname(__FILE__) . '/../../heslo.php';
/**
 * Description of Oci8
 *
 * @author Trtkal
 */
class Oci8 {
    private $e = null;

    public function __construct() {
        try {
            dibi::connect(array(
                    'driver'   => 'oracle',
                    'database' => 'sql101.upceucebny.cz:1521/oracle10',
                    'username' => 'st22312',
                    'password' => HESLO,
                    'charset' => 'UTF8'
            ));
        } catch (DibiException $e) {
            echo get_class($e), ': ', $e->getMessage(), "\n";
        }
    }
    public function __destruct() {
        try {
            dibi::disconnect();
        } catch (DibiException $e) {
            echo get_class($e), ': ', $e->getMessage(), "\n";
        }
    }
    /**
     * Vypsání počtu titulů v DB
     * @return <integer> počet titulů v databázi
     */
    public function MovieCount() {
        $result = null;
        $single = null;
        if(dibi::isConnected()) {
            $result= dibi::query("select * from movie_count");
            $single = $result->fetchSingle();
            return $single;
        }
    }
    /**
     * Vypsání počtu uživatelů v DB
     * @return <integer> počet uživatelů v databázi
     */
    public function UsersCount() {
        $result = null;
        $single = null;
        if(dibi::isConnected()) {
            $result= dibi::query("select * from users_count");
            $single = $result->fetchSingle();
            return $single;
        }
    }
    /**
     * Přidání uživatele
     * @param <string> $username
     * @param <string> $password
     * @param <integer> $role
     * @return <boolean> provedeno úspěšně?
     */
    public function UsersAdd($username, $password, $role) {
        $result = null;
        if(dibi::isConnected()) {
            $result = dibi::query("insert into tuzivatel (nick, password, role_id) values ('".$username."','".$password."','".$role."')");
            return true;
        } else {
            return false;
        }
    }
    /**
     * Vybrání všech uživatelských rolí z DB
     * @return <Pairs[]> uživatelské role
     */
    public function Role() {
        $result = null;
        $row = array();
        if(dibi::isConnected()) {
            $result= dibi::query("select role_id as ID, role as ROLE from trole");
            $row = $result->fetchPairs();
            return $row;
        }
    }
    /**
     * Doplňování názvu titulů filmů
     * @param <string> $var
     * @return <Array[][]> vícerozměrné pole
     */
    public function Autocomplete($var) {
        $result = null;
        $row = array();
        if(dibi::isConnected()) {
            $result= dibi::query("select film_id as IDFILMU, cz as CZ, en as EN, original as ORIGINAL, to_char(substr(popis,0,50)) as POPIS from ttitul where lower(ttitul.cz) like lower('%".$var."%') or lower(ttitul.en) like lower('%".$var."%') or lower(ttitul.original) like lower('%".$var."%') or lower(ttitul.popis) like lower('%".$var."%')");
            $row = $result->fetchAll();
            return $row;
        }
    }
    /**
     * Doplňování názvu filmů - jednotlivých, které je možné půjčit
     * @param <string> $var
     * @return <Array[][]> vícerozměrné pole
     */
    public function AutocompleteCMovie($var) {
        $result = null;
        $row = array();
        if(dibi::isConnected()) {
            $result= dibi::query("select KATALOGOVE_CISLO as IDFILMU, cz as CZ, en as EN, original as ORIGINAL, to_char(substr(popis,0,50)) as POPIS from TFILMOTEKA left join TTITUL on TTITUL.FILM_ID = TFILMOTEKA.FILM_ID where lower(ttitul.cz) like lower('%".$var."%') or lower(ttitul.en) like lower('%".$var."%') or lower(ttitul.original) like lower('%".$var."%') or lower(ttitul.popis) like lower('%".$var."%')");
            $row = $result->fetchAll();
            return $row;
        }
    }
    /**
     * Informace o filmu
     * @param <integer> $id
     * @return <Array[][]> informace o vybraném titulu
     */
    public function MovieGet($id) {
        $result = null;
        $row = array();
        if(dibi::isConnected()) {
            $result= dibi::query("select TTITUL.film_id as IDFILMU, cz as CZ, en as EN, original as ORIGINAL, csfd as CSFD, imdb as IMDB, rok_vydani as ROK, delka as DELKA, popis as POPIS, ZANR as ZANR from ttitul left join TTITULZANR on TTITULZANR.FILM_ID = TTITUL.FILM_ID left join TZANR on TZANR.ZANR_ID = TTITULZANR.ZANR_ID where TTITUL.film_id=".$id);
            $row = $result->fetchAll();
            return $row;
        }
    }
    public function GenreGetMovie($id) {
        $result = null;
        $row = array();
        if(dibi::isConnected()) {
            $result= dibi::query("select ZANR as ZANR from ttitul left join TTITULZANR on TTITULZANR.FILM_ID = TTITUL.FILM_ID left join TZANR on TZANR.ZANR_ID = TTITULZANR.ZANR_ID where TTITUL.film_id=".$id);
            $row = $result->fetchAll();
            return $row;
        }
    }
    /**
     * Přidání adresy vypůjčujícího
     * @param <string> $street
     * @param <integer> $number
     * @param <integer> $psc
     * @param <string> $city
     * @return <boolean> přidáno úspěšně?
     */
    public function BorrowerAddressAdd($street,$number, $psc, $city) {
        $result = null;
        if(dibi::isConnected()) {
            $result = dibi::query("insert into tadresa (ulice, cislo, psc, mesto) values ('".$street."','".$number."','".$psc."','".$city."')");
            return true;
        } else {
            return false;
        }
    }
    /**
     * Přidání žánru filmu
     * @param <string> $genre
     * @return <boolean> přidáno úspěšně?
     */
    public function GenreAdd($genre) {
        $result = null;
        if(dibi::isConnected()) {
            $result = dibi::query("insert into tzanr (zanr) values ('".$genre."')");
            return true;
        } else {
            return false;
        }
    }
    /**
     * Vrací seznam všech adres v DB
     * @return <Array[][]> seznam adres
     */
    public function BorrowerAddressGetAllComplete() {
        $result = null;
        $row = array();
        if(dibi::isConnected()) {
            $result= dibi::query("select ADRESA_ID as ID, MESTO as MESTO, PSC as PSC, ULICE as ULICE, CISLO as CISLO from tadresa order by mesto, ulice, cislo asc");
            $row = $result->fetchAll();
            return $row;
        }
    }
    /**
     * Přidání vypujčujícího
     * @param <string> $nick
     * @param <string> $firstname
     * @param <string> $lastname
     * @param <string> $email
     * @param <integer> $address
     * @param <number> $phone
     * @return <boolean> přidáno úspěšně?
     */
    public function BorrowerAdd($nick, $firstname,$lastname, $email, $address, $phone=null) {
        $result = null;
        if(dibi::isConnected()) {
            $result = dibi::query("insert into TPUJCUJICI (NICK, JMENO, PRIJMENI, EMAIL, ADRESA_ID, TELEFON) values ('".$nick."','".$firstname."','".$lastname."','".$email."','".$address."', '".$phone."')");
            return true;
        } else {
            return false;
        }
    }
    /**
     * Vybrání všech přezdívek z DB
     * @return <Array[][]> přezdívky
     */
    public function UsersGetAllNick() {
        $result = null;
        $row = array();
        if(dibi::isConnected()) {
            $result= dibi::query("select NICK as NICK from TUZIVATEL order by NICK asc");
            $row = $result->fetchAll();
            return $row;
        }
    }
    /**
     * Vrací informace o titulech - parsované jako XML
     * @return <Array['XML']> parsované XML
     */
    public function MovieParseXML() {
        $result = null;
        $row = array();
        if(dibi::isConnected()) {
            $result= dibi::query("select xmlelement(`titul`, xmlforest(film_id as `id-filmu`,cz as `nazev-cesky`,en as `nazev-anglicky`,original as `nazev-originalni`,delka as `delka`,rok_vydani as `datum-vydani`,csfd as `odkaz-csfd`,imdb as `odkaz-imdb`,popis as `popis-filmu`)) as xml from ttitul order by cz");
            $row = $result->fetchAll();
            return $row;
        }
    }
    /**
     * Ověření uživatele skrz databázi
     * @param <string> $username
     * @param <string> $password
     * @return <string> Array[][]
     */
    public function UserAuth($username, $password) {
        $result = null;
        if(dibi::isConnected()) {
            $result= dibi::query("select role as ROLE, nick as USERNAME, password as PASSWORD from TUZIVATEL left join TROLE on TROLE.ROLE_ID=TUZIVATEL.ROLE_ID where NICK='".$username."' and PASSWORD='".$password."'");
            return $result->fetchAll();
        }
    }
    public function MovieAdd($original, $cz = null, $en = null, $csfd = null, $imdb = null, $rok = null, $delka = null, $popis = null) {
        $result = null;
        if(dibi::isConnected()) {
            $result = dibi::query("insert into TTITUL (original, cz, en, csfd, imdb, rok_vydani, delka, popis) values ('".$original."','".$cz."','".$en."','".$csfd."','".$imdb."', '".$rok."', '".$delka."', '".$popis."')");
            return true;
        } else {
            return false;
        }
    }
    /**
     * Informace o filmu
     * @param <integer> $id
     * @return <Array[][]> informace o vybraném filmu
     */
    public function CMovieGet($id) {
        $result = null;
        $row = array();
        if(dibi::isConnected()) {
            $result= dibi::query("select TFILMOTEKA.KATALOGOVE_CISLO as KATALOGOVE_CISLO, ORIGINAL as ORIGINAL, CZ as CZ, EN as EN, CSFD as CSFD, IMDB as IMDB, DELKA as DELKA, ROK_VYDANI as ROK, FILM_ID as FILM_ID, HODNOCENI as HODNOCENI, VELIKOST as VELIKOST, UMISTENI as UMISTENI, FORMAT as FORMAT, JAZYK as JAZYK, to_char(DATUM_PRIDANI,'yyyy-mm-dd hh.mm') as DATUM_PRIDANI, POPIS as POPIS, FILM_ID as FILM_ID
from TFILMOTEKA
left join TFORMAT_FILMU on TFILMOTEKA.FORMATFILMU_ID = TFORMAT_FILMU.FORMATFILMU_ID
left join TTITUL on TTITUL.FILM_ID = TFILMOTEKA.FILM_ID
left join TJAZYK_FILMU on TJAZYK_FILMU.KATALOGOVE_CISLO=TFILMOTEKA.KATALOGOVE_CISLO
left join TJAZYK on TJAZYK_FILMU.JAZYK_ID = TJAZYK.JAZYK_ID
where TFILMOTEKA.KATALOGOVE_CISLO=".$id);
            $row = $result->fetchAll();
            return $row;
        }
    }
    public function CMovieGetByMovie($id) {
        $result = null;
        $row = array();
        if(dibi::isConnected()) {
            $result= dibi::query("select distinct TFILMOTEKA.KATALOGOVE_CISLO as KATALOGOVE_CISLO, UMISTENI as UMISTENI, FORMAT as FORMAT, JAZYK as JAZYK
from TFILMOTEKA
left join TFORMAT_FILMU on TFILMOTEKA.FORMATFILMU_ID = TFORMAT_FILMU.FORMATFILMU_ID
left join TTITUL on TTITUL.FILM_ID = TFILMOTEKA.FILM_ID
left join TJAZYK_FILMU on TJAZYK_FILMU.KATALOGOVE_CISLO=TFILMOTEKA.KATALOGOVE_CISLO
left join TJAZYK on TJAZYK_FILMU.JAZYK_ID = TJAZYK.JAZYK_ID
where TTITUL.FILM_ID=".$id);
            $row = $result->fetchAll();
            return $row;
        }
    }
    public function BorrowedCount() {
        $result = null;
        $single = null;
        if(dibi::isConnected()) {
            $result= dibi::query("select count(*) from tpujcujici left join tvypujcka on tvypujcka.datum_vraceni is null where tvypujcka.nick = tpujcujici.nick order by tpujcujici.prijmeni");
            $single = $result->fetchSingle();
            return $single;
        }
    }
}
?>
<?php
include_once dirname(__FILE__) . '/../dibi/dibi.php';

/**
 * Description of Oci8
 *
 * @author Administrator
 */
class Oci8 {
    private $e = null;

    public function __construct() {
        try {
            dibi::connect(array(
                'driver'   => 'oracle',
                'database' => 'sql101.upceucebny.cz:1521/oracle10',
                'username' => 'st22312',
                'password' => 'oracletrtkal',
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

    public function MovieCount() {
        $result = null;
        $single = null;
        if(dibi::isConnected()) {
            $result= dibi::query("select * from movie_count");
            $single = $result->fetchSingle();
            return $single;
        }
    }
    public function UsersCount() {
        $result = null;
        $single = null;
        if(dibi::isConnected()) {
            $result= dibi::query("select * from users_count");
            $single = $result->fetchSingle();
            return $single;
        }
    }
    public function UsersAdd($username, $password, $role) {
        $result = null;
        if(dibi::isConnected()) {
            $result = dibi::query("insert into tuzivatel (nick, password, role_id) values ('".$username."','".$password."','".$role."')");
            return true;
        } else {
            return false;
        }
    }
    public function Role() {
        $result = null;
        $row = array();
        if(dibi::isConnected()) {
            $result= dibi::query("select role_id as ID, role as ROLE from trole");
            $row = $result->fetchPairs();
            return $row;
        }
    }

    public function Autocomplete($var) {
        $result = null;
        $row = array();
        if(dibi::isConnected()) {
            $result= dibi::query("select film_id as IDFILMU, cz as CZ, en as EN, original as ORIGINAL, to_char(substr(popis,0,50)) as POPIS from ttitul where lower(ttitul.cz) like lower('%".$var."%') or lower(ttitul.en) like lower('%".$var."%') or lower(ttitul.original) like lower('%".$var."%')");
            $row = $result->fetchAll();
            return $row;
        }
    }
    public function MovieGet($id) {
        $result = null;
        $row = array();
        if(dibi::isConnected()) {
            $result= dibi::query("select film_id as IDFILMU, cz as CZ, en as EN, original as ORIGINAL, csfd as CSFD, imdb as IMDB, rok_vydani as ROK, delka as DELKA, popis as POPIS from ttitul where film_id=".$id);
            $row = $result->fetchAll();
            return $row;
        }
    }
    public function BorrowerAddressAdd($street,$number, $psc, $city) {
        $result = null;
        if(dibi::isConnected()) {
            $result = dibi::query("insert into tadresa (ulice, cislo, psc, mesto) values ('".$street."','".$number."','".$psc."','".$city."')");
            return true;
        } else {
            return false;
        }
    }
    public function GenreAdd($genre) {
        $result = null;
        if(dibi::isConnected()) {
            $result = dibi::query("insert into tzanr (zanr) values ('".$genre."')");
            return true;
        } else {
            return false;
        }
    }
    public function BorrowerAddressGetAllComplete() {
        $result = null;
        $row = array();
        if(dibi::isConnected()) {
            $result= dibi::query("select ADRESA_ID as ID, MESTO as MESTO, PSC as PSC, ULICE as ULICE, CISLO as CISLO from tadresa order by mesto, ulice, cislo asc");
            $row = $result->fetchAll();
            return $row;
        }
    }
    public function BorrowerAdd($nick, $firstname,$lastname, $email, $address, $phone=null) {
        $result = null;
        if(dibi::isConnected()) {
            $result = dibi::query("insert into TPUJCUJICI (NICK, JMENO, PRIJMENI, EMAIL, ADRESA_ID, TELEFON) values ('".$nick."','".$firstname."','".$lastname."','".$email."','".$address."', '".$phone."')");
            return true;
        } else {
            return false;
        }
    }
    public function UsersGetAllNick() {
        $result = null;
        $row = array();
        if(dibi::isConnected()) {
            $result= dibi::query("select NICK as NICK from TUZIVATEL order by NICK asc");
            $row = $result->fetchAll();
            return $row;
        }
    }
    public function MovieParseXML() {
        $result = null;
        $row = array();
        if(dibi::isConnected()) {
            $result= dibi::query("select xmlelement(`titul`, xmlforest(film_id as `id-filmu`,cz as `nazev-cesky`,en as `nazev-anglicky`,original as `nazev-originalni`,delka as `delka`,rok_vydani as `datum-vydani`,csfd as `odkaz-csfd`,imdb as `odkaz-imdb`,popis as `popis-filmu`)) as xml from ttitul order by cz");
            $row = $result->fetchAll();
            return $row;
        }
    }
}
?>
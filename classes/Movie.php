<?php
require_once dirname(__FILE__) . '/Oci8.php';

/**
 * Description of Movie
 *
 * @author Trtkal
 */
class Movie {
    private $original = null;
    private $cz = null;
    private $en = null;
    private $csfd = null;
    private $imdb = null;
    private $rok = null;
    private $delka = null;
    private $popis = null;

    /**
     * Přidání titulu filmu do databáze
     * @param <string> $original
     * @param <string> $cz
     * @param <string> $en
     * @param <string> $csfd
     * @param <string> $imdb
     * @param <integer> $rok
     * @param <integer> $delka
     * @param <string> $popis
     * @return <boolean> Proběhlo přidávání v pořádku?
     */
    public function Add($original, $cz = null, $en = null, $csfd = null, $imdb = null, $rok = null, $delka = null, $popis = null) {
        try {
            $this->original = $original;
            $this->cz = $cz;
            $this->en = $en;
            $this->csfd = $csfd;
            $this->imdb = $imdb;
            $this->rok = $rok;
            $this->delka = $delka;
            $this->popis = $popis;

            $db = new Oci8();
            $db->MovieAdd($this->original, $this->cz, $this->en, $this->csfd, $this->imdb, $this->rok, $this->delka, $this->popis);
            unset ($db);
            return true;
        } catch (DibiException $e) {
            echo get_class($e), ': ', $e->getMessage(), "\n";
            return false;
        }
    }
    public function Edit() {
        ;
    }
    public function Delete() {
        ;
    }

    public function Count() {
        $db = new Oci8();
        return $db->MovieCount();
        unset ($db);
    }
    public function Get($id) {
        $db = new Oci8();
        return $db->MovieGet($id);
        unset ($db);
    }
}
?>

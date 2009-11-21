<?php

/**
 * Description of ColorBox
 *
 * @author Trtkal
 */
class ColorBox {
    protected $nick = null;
    protected $role_id = null;

    protected $loged = false;

    /**
     * Přihlásí uživatele
     */
    public function UserLogin() {

    }

    /**
     * Přidá titul do databáze
     */
    public function MovieAdd() {
        ;
    }

    /**
     * Přidá instanci filmu do databáze
     */
    public function CMovieAdd() {
        ;
    }

    /**
     * Přidá uživatele do databáze
     */
    public function UserAdd() {
        ;
    }

    /**
     * Přídá vypůjčujícího do databáze
     */
    public function BorrowerAdd() {
        ;
    }

    /**
     * Přidá jazyk titulu/titulků do databáze
     */
    public function LanguageAdd() {
        ;
    }
    /**
     * Přidá žánr filmu do databáze
     */
    public function GenreAdd() {
        ;
    }
    public function UserDelete() {
        ;
    }

    public static function Header() {
        return '
            <meta http-equiv="content-type" content="text/html; charset=utf-8" />
            <link href="/style/modal.css" rel="stylesheet" type="text/css" media="screen" />
            <link href="/style/print.css" rel="stylesheet" type="text/css" media="print" />
        ';
    }
}
?>

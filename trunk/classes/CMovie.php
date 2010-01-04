<?php

/**
 * Description of CMovie
 *
 * @author Trtkal
 */
class CMovie {
    public function Add() {
        ;
    }
    public function Edit() {
        ;
    }
    public function Delete() {
        ;
    }
    public function GetByTitul($id) {
        $db = new Oci8();
        return $db->CMovieGetByMovie($id);
        unset ($db);
    }
    public function Get($id) {
        $db = new Oci8();
        return $db->CMovieGet($id);
        unset ($db);
    }
}
?>

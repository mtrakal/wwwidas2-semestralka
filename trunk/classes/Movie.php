<?php
require_once dirname(__FILE__) . '/Oci8.php';

/**
 * Description of Movie
 *
 * @author Administrator
 */
class Movie {
    public function Add() {
        ;
    }
    public function Edit() {
        ;
    }
    public function Delete() {
        ;
    }

    public function count() {
        $db = new Oci8();
        return $db->MovieCount();
        unset ($db);
    }
}
?>

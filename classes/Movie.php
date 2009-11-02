<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

 require_once './classes/Oci8.php';

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
    }
}
?>

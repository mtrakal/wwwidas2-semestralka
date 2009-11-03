<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './classes/Oci8.php';

/**
 * Description of User
 *
 * @author Administrator
 */
class User {
    public function Add() {
        ;
    }
    public function Delete() {
        ;
    }
    public function Edit() {
        ;
    }

    public function Count() {
        $db = new Oci8();
        return $db->UsersCount();
        unset ($db);
    }
}
?>

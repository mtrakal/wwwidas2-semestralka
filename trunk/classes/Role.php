<?php
require_once dirname(__FILE__) . '/Oci8.php';

/**
 * Description of Role
 *
 * @author Administrator
 */
class Role {
    public function Add() {
        ;
    }
    public function Edit() {
        ;
    }
    public function Delete() {
        ;
    }
    public function All() {
        $db = new Oci8();
        $result = $db->Role();
        unset ($db);
        return $result;
    }
}
?>

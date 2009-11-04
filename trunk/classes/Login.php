<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Administrator
 */
class Login {
    private $login = false;
    private $username = null;
    private $role = 'guest';
    private $jmeno = null;
    private $prijmeni = null;
    private $email = null;
    private $telefon = null;
    private $uzivatel_id = null;
    private $adresa_id = null;

    public function getLogin() {
        return $this->login;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getRole() {
        return $this->role;
    }

    public function getJmeno() {
        return $this->jmeno;
    }

    public function getPrijmeni() {
        return $this->prijmeni;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefon() {
        return $this->telefon;
    }

    public function getUzivatel_id() {
        return $this->uzivatel_id;
    }

    public function getAdresa_id() {
        return $this->adresa_id;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function setJmeno($jmeno) {
        $this->jmeno = $jmeno;
    }

    public function setPrijmeni($prijmeni) {
        $this->prijmeni = $prijmeni;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTelefon($telefon) {
        $this->telefon = $telefon;
    }

    public function setUzivatel_id($uzivatel_id) {
        $this->uzivatel_id = $uzivatel_id;
    }

    public function setAdresa_id($adresa_id) {
        $this->adresa_id = $adresa_id;
    }
}
?>

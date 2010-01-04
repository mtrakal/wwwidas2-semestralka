<?php
session_start();

require_once dirname(__FILE__) . '/../classes/Oci8.php';

/**
 * Description of Login
 *
 * @author Trtkal
 */
class Login {
    private $login = false;
    private $username = null;
    private $password = null;
    private $role = 'Visitor';
    private $jmeno = null;
    private $prijmeni = null;
    private $email = null;
    private $telefon = null;
    private $uzivatel_id = null;
    private $adresa_id = null;

    /**
     * Přihlášení uživatele a ověření skrz databázi
     * @param <string> $user
     * @param <string> $password
     * @return <boolean> přihlášen úspěšně?
     */
    public function Authorize($username, $password) {

        $this->username = $username;
        $this->password = sha1($password) . md5(strlen($password));
        try {
            $result = null;
            $db = new Oci8();
            $result = $db->UserAuth($this->username, $this->password);
            unset($db);

            if(($result != null) && ($this->username = $result[0]['USERNAME'] && ($this->password = $result[0]['PASSWORD']))) {
                $_SESSION['login']=true;
                $_SESSION['username']=$result[0]['USERNAME'];
                $_SESSION['role'] = $result[0]['ROLE'];
                return true;
            } else {
                return false;
            }

        } catch (DibiException $e) {
            echo get_class($e), ': ', $e->getMessage(), "\n";
            return false;
        }
    }
    /**
     * Zkontroluje, zda-li je uživatel přihlášen
     * @param <string> $role
     * @return <boolean> uživatel přihlášen?
     */
    public function IsAuthorized($role = null) {
        if(isset($_SESSION['login']) && empty ($role)) {
            if($_SESSION['login']) {
                return true;
            } else {
                return false;
            }
        }
        elseif(isset($_SESSION['login']) && isset($_SESSION['role'])) {
            if($_SESSION['login'] && $_SESSION['role']==$role) {
                return true;
            }
        } else {
            return false;
        }
    }
    /**
     * Odhlášení uživatele
     */
    public function Logout() {
        if($_SESSION['login']) {
            $_SESSION['login'] = false;
            $_SESSION = array();
        }
        session_destroy();
        //header("Location: /");
    }
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

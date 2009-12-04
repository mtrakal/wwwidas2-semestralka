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
    private $role = 'guest';
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
    public function Authorize($user, $password) {

        $this->username = $username;
        $this->password = sha1($password) . md5(strlen($password));
        try {
            $result = null;
            $db = new Oci8();
            $result = $db->UserAuth($this->username, $this->password);
            unset($db);

            if($result != null) {
                if(($row['username'] == $username) AND ($row['password'] == $password)) {
                    $_SESSION['login']=$row['true'];
                    $_SESSION['username']=$row['username'];
                    $_SESSION['role'] = $result;
                    return 1;
                }
                else {
                    return 0;
                }
            }
        } catch (DibiException $e) {
            echo get_class($e), ': ', $e->getMessage(), "\n";
            return false;
        }
    }
     /**
      * Zkontroluje, zda-li je uživatel přihlášen
      * @return <boolean> uživatel přihlášen?
      */
    public function IsAuthorized() {
        if(isset($_SESSION['login'])) {
            return 1;
        }
        else {
            return 0;
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

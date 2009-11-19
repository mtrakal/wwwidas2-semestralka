<?php
require_once dirname(__FILE__) . '/../classes/Oci8.php';

/**
 * Description of User
 *
 * @author Administrator
 */
class User {
    private $password = null;
    private $username = null;
    private $role = null;

    public function Add($username, $password, $role) {
        try {
            $this->username = $username;
            $this->password = sha1($password) . md5(strlen($password));
            $this->role = $role;

            $db = new Oci8();
            // return $db->UsersAdd($this->username, $this->password, $this->role);
            $db->UsersAdd($this->username, $this->password, $this->role);
            unset ($db);
            return true;
        } catch (DibiException $e) {
            echo get_class($e), ': ', $e->getMessage(), "\n";
            return false;
        }
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

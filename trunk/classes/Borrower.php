<?php
require_once dirname(__FILE__) . '/../classes/Oci8.php';

/**
 * Description of Borrower
 *
 * @author Administrator
 */
class Borrower {
    private $nick = null;
    private $firstname = null;
    private $lastname = null;
    private $email = null;
    private $address = null;
    private $phone = null;

    public function Add($nick, $firstname, $lastname, $email, $address, $phone=null) {
        try {
            $this->nick = $nick;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->email = $email;
            $this->address = $address;
            $this->phone = $phone;

            $db = new Oci8();
            $db->BorrowerAdd($this->nick, $this->firstname, $this->lastname, $this->email, $this->address, $this->phone);
            unset ($db);
            return true;
        } catch (DibiException $e) {
            echo get_class($e), ': ', $e->getMessage(), "\n";
            return false;
        }
    }
    public function Edit() {
        ;
    }
    public function Delete() {
        ;
    }
}
?>

<?php
require_once dirname(__FILE__) . '/../classes/Oci8.php';

/**
 * Description of BorrowerAddress
 *
 * @author Administrator
 */
class BorrowerAddress {
    private $street = null;
    private $number = null;
    private $psc = null;
    private $city = null;

    public function Add($street,$number, $psc, $city) {
        try {
            $this->street = $street;
            $this->number = $number;
            $this->psc = $psc;
            $this->city = $city;

            $db = new Oci8();
            $db->BorrowerAddressAdd($this->street, $this->number, $this->psc, $this->city);
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
    public function GetAllComplete() {
        $db = new Oci8();
        $result = $db->BorrowerAddressGetAllComplete();
        unset ($db);
        return $result;
    }
}
?>

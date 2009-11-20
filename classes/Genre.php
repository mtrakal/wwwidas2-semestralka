<?php
require_once dirname(__FILE__) . '/../classes/Oci8.php';

/**
 * Description of Genre
 *
 * @author Administrator
 */
class Genre {
    private $genre = null;
    
    public function Add($genre) {
        try {
            $this->genre = $genre;

            $db = new Oci8();
            $db->GenreAdd($this->genre);
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

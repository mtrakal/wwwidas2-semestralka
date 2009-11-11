<?php
include_once dirname(__FILE__) . '/../dibi/dibi.php';

/**
 * Description of Oci8
 *
 * @author Administrator
 */
class Oci8 {
    private $e;

    public function __construct() {
        try {
            dibi::connect(array(
                'driver'   => 'oracle',
                'database' => 'sql101.upceucebny.cz:1521/oracle10',
                'username' => 'st22312',
                'password' => 'oracletrtkal',
                'charset' => 'utf-8'
            ));
        } catch (DibiException $e) {
            echo get_class($e), ': ', $e->getMessage(), "\n";
        }
    }

    public function __destruct() {
        try {
            dibi::disconnect();
        } catch (DibiException $e) {
            echo get_class($e), ': ', $e->getMessage(), "\n";
        }
    }

    public function MovieCount() {
        $result = null;
        $single = null;
        if(dibi::isConnected()) {
            $result= dibi::query("select * from movie_count");
            $single = $result->fetchSingle();
            return $single;
        }
    }
    public function UsersCount() {
        $result = null;
        $single = null;
        if(dibi::isConnected()) {
            $result= dibi::query("select * from users_count");
            $single = $result->fetchSingle();
            return $single;
        }
    }
    public function UsersAdd($username, $password, $role) {
        $result = null;
        $single = null;
        if(dibi::isConnected()) {
            $result = dibi::query("insert into tuzivatel (nick, password, role_id) values ('".$username."','".$password."','".$role."')");
            return true;
        } else {
            return false;
        }
    }
    public function Role() {
        $result = null;
        $row = array();
        if(dibi::isConnected()) {
            $result= dibi::query("select role_id as ID, role as ROLE from trole");
            $row = $result->fetchPairs();
            return $row;
        }
    }
}
?>

<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Oci8
 *
 * @author Administrator
 */

require_once './dibi/dibi.php';

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
}
?>

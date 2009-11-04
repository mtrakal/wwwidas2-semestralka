<?php
/**
 * Description of Init
 *
 * @author Administrator
 */
class Init {
    protected $dirname;

    public function __construct() {
        if($_SERVER['SERVER_ADDR'] == '10.94.2.120') {
            $this->dirname == $_SERVER['DOCUMENT_ROOT'].'/vhosting/st22312/htdocs';
        } else {
            $this->dirname == $_SERVER['DOCUMENT_ROOT'];
        }
    }
}
?>
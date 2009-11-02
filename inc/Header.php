<?php

/**
 * Description of Header
 *
 * @author Administrator
 */
class Header {
    private $cssstyles = array();
    private $javascripts = array();
    private $metatags = array();

    public function __construct() {
            $this->cssstyles[] = array ('media' => "screen", 'href' => "/");
        }

    private static function Head() {
        return "<head>\n";
    }
    public static function Footer() {
        return "</head>\n";
    }

    public static function CSS() {
        $return = null;
        $pom = null;
        foreach ($this->cssstyles as $pom) {
            $return += '<link href="'.$pom['href'].'" rel="stylesheet" type="text/css" media="'.$pom['media'].'" />'+"\n";
        }
    }

    public function Generate() {
        ;
    }
}
?>

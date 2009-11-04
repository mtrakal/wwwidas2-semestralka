<?php
/**
 * Description of HtmlStruct
 *
 * @author Administrator
 */
class HtmlStruct {
    public static function Dtd() {
        return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">'
            ."\n".
            '<html xmlns="http://www.w3.org/1999/xhtml">';
    }
    public static function HeaderStart() {
        return "<head>";
    }

    /**
     * vrátí konec headeru a zároveň začátek body
     */
    public static function Body() {
        return "</head>\n<body>";
    }

    /**
     * vrátí konec webu
     * @return <type> string
     */
    public static function BodyEnd() {
        return "</body>\n</html>";
    }
}
?>

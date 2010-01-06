<?php
require_once dirname(__FILE__) . "/../fautoload.php";

/**
 * Description of HtmlStruct
 *
 * @author Trtkal
 */
class HtmlStruct {
    public static function Dtd() {
        return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">'
            ."\n".
            '<html xmlns="http://www.w3.org/1999/xhtml">';
    }
    public static function HeadStart($title=null) {
        return '<head><title>'.$title.'</title>';
    }

    /**
     * vrátí konec headeru a zároveň začátek body
     */
    public static function BodyStart() {
        return "</head>\n<body onload=\"setfocus()\">\n";
    }

    /**
     * vrátí konec webu
     * @return <type> string
     */
    public static function BodyEnd() {
        return "</body>\n</html>";
    }
    public static function HeadingHx($h,$string) {
        return '<h'.$h.'>'.$string.'</h'.$h.'>';
    }
    public static function InputTextReq($label, $name) {
        return '<label class="req">'.$label.':</label><input type="text" name="'.$name.'" /><br />';
    }
    public static function InputText($name, $label) {
        return '<label>'.$label.':</label><input type="text" name="'.$name.'" /><br />';
    }
    public static function SetFocus($name) {
        return '<script type="text/javascript">
        function setfocus() {
        document.getElementsByName("'.$name.'")[0].focus();
        }
    </script>';
    }
}
?>

<?php
require_once dirname(__FILE__) . '/Oci8.php';

/**
 * Description of XMLParse
 *
 * @author Trtkal
 */
class XMLParse {
    public function MovieGet() {
        header('Content-Disposition: attachment; filename="seznam-titulu.xml"');
        header("Pragma: public"); // požadováno
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private",false); // požadováno u některých prohlížečů
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Content-type: text/xml");
        header("Content-Transfer-Encoding: text");

        echo '<?xml version="1.0" encoding="UTF-8"?>'."\n<tituly>";

        $result = array();
        $db = new Oci8();
        $result = $db->MovieParseXML();
        //print_r($result);
        foreach ($result as $variable) {
            echo $variable['XML']."\n";
        };
        unset($result, $db);
        echo '</tituly>';
    }
/*
<!--
header("Pragma: public"); // požadováno
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); // požadováno u některých prohlížečů
header("Content-Transfer-Encoding: binary");
header("Content-Type: " . $mimetype);
header("Content-Length: " . $filesize);
header("Content-Disposition: attachment; filename="" . $name . "";" );
-->
*/
}
?>
<?php
/**
 * AutoComplete Field - PHP Remote Script
 *
 * This is a sample source code provided by fromvega.
 * Search for the complete article at http://www.fromvega.com
 *
 * Enjoy!
 *
 * @author fromvega
 *
 */

function detect($s)
{
    if (preg_match('#[\x80-\x{1FF}\x{2000}-\x{3FFF}]#u', $s))
        return 'UTF-8';

    if (preg_match('#[\x7F-\x9F\xBC]#', $s))
        return 'WINDOWS-1250';

    return 'ISO-8859-2';
}


function autoUTF($s)
{
    // detect UTF-8
    if (preg_match('#[\x80-\x{1FF}\x{2000}-\x{3FFF}]#u', $s))
        return $s;

    // detect WINDOWS-1250
    if (preg_match('#[\x7F-\x9F\xBC]#', $s))
        return iconv('WINDOWS-1250', 'UTF-8', $s);

    // assume ISO-8859-2
    return iconv('ISO-8859-2', 'UTF-8', $s);
}

// check the parameter
if(isset($_GET['part']) and $_GET['part'] != '') {
// initialize the results array
    $results = array();

    require_once dirname(__FILE__) . '/../../classes/Oci8.php';
    $db = new Oci8();
    
    $utf8 = autoUTF($_GET['part']);
    //$utf8 = $_GET['part'];

    $pom = $db->Autocomplete($utf8);
    unset ($db);
    //var_dump($pom);
    foreach ($pom as $variable) {
    // if it starts with 'part' add to results
    //if( strpos($variable, 'amel') === 0 ) {
        $results[] = "<a href=\"/titul/".$variable['IDFILMU'].".html\">".$variable['ORIGINAL']."</a><div class=\"font-small\"><p>CZ: ".$variable['CZ']."<br />EN:".$variable['EN']."<br />".$variable['POPIS']."&hellip;</p></div>";
    //}
    };
    unset ($pom);

    if (!function_exists('json_encode') && version_compare(PHP_VERSION, '5.2.0', '<')) {
        require_once dirname(__FILE__) . '/../../classes/FuckingOldPHP.php';
        $json = new FuckingOldPHP();
        echo $json->array_to_json($results);
    } else {
        // return the array as json with PHP 5.2
        //var_dump($results);
        echo json_encode($results);
    }
}
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

// check the parameter
if(isset($_GET['part']) and $_GET['part'] != '') {
// initialize the results array
    $results = array();

    // search colors
    require_once dirname(__FILE__) . '/../../classes/Oci8.php';
    $db = new Oci8();
    $pom = $db->Autocomplete($_GET['part']);
    unset ($db);
    foreach ($pom as $variable) {
    // if it starts with 'part' add to results
    //if( strpos($variable, 'amel') === 0 ) {
        $results[] = $variable['ORIGINAL']."<div class=\"font-small\"><p><a href=\"/titul/".$variable['IDFILMU'].".html\">CZ: ".$variable['CZ']."</a><br />EN:".$variable['EN']."<br />".$variable['POPIS']."&hellip;</p></div>";
    //}
    };
    unset ($pom);

    // return the array as json with PHP 5.2
    echo json_encode($results);

// or return using Zend_Json class
//require_once('Zend/Json/Encoder.php');
//echo Zend_Json_Encoder::encode($results);
}
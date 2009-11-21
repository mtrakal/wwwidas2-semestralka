<?php

/**
 * Description of Lang
 *
 * @author Trtkal
 */
class Lang {
// language set up by http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2 but use small
    private $a_sort = array("cz", "gb"); // how should will be sorted flags

    private $a_lang= array( //Creating a multidimensional array for translating
        // using: $lang_ma['string'][LANG]
        'lang_cz' => array (
            'cz' => 'Česky',
            'gb' => 'Czech',
            'de' => '__DE',
        ),
        'lang_gb' => array (
            'cz' => 'Anglicky',
            'gb' => 'English',
            'de' => '__DE',
        ),
        'lang_de' => array (
            'cz' => 'Německy',
            'gb' => 'German',
            'de' => '__DE',
        )
    );
    function language() {
        if(!isset($_GET['lang']) || empty($_GET['lang'])) { // set language with priority: GET, COOKIE, DEFAULT
            if(isset($_COOKIE['lang'])) {
                define("LANG",$_COOKIE['lang'],true);
            /**
             * odkomentovat
             */
            // header ("Location: /".LANG."/"); // redirect to homepage
            }
            else {
            // -------- HERE define default LANG --------- //
                define("LANG","cz",true); // language set up by http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2 but use small
                //setcookie("lang", "", time(), "/"); // unset old cookie
                if(isset($_GET['setlang'])) {
                //setcookie("lang", $_GET['setlang'], time()+ (60*60*24*14), "/"); // set new language
                }
            /**
             * odkomentovat!
             */
            // header ("Location: /".LANG."/"); // redirect to homepage
            }
        }
        else {
            define("LANG",$_GET['lang'],true);
        }
        language_redirect();
    }
    function language_noredirect() {
        if(!isset($_GET['lang']) OR empty($_GET['lang'])) { // set language with priority: GET, COOKIE, DEFAULT
            if(isset($_COOKIE['lang'])) {
                define("LANG",$_COOKIE['lang'],true);
            }
            else {
            // -------- HERE define default LANG --------- //
                define("LANG","cz",true); // language set up by http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2 but use small
                setcookie("lang", "", time(), "/"); // unset old cookie
                setcookie("lang", $_GET['setlang'], time()+ (60*60*24*14), "/"); // set new language
            }
        }
        else {
            define("LANG",$_GET['lang'],true);
        }
    }
    function language_redirect() {
        $url = null;
        // ----------- DO NOT EDIT NEXT ----------------- //
        if(isset($_GET['setlang'])) { // if is send request for change language
        //setcookie("lang", "", time(), "/"); // unset old cookie
        //setcookie("lang", $_GET['setlang'], time()+ (60*60*24*14), "/"); // set new language

            if(preg_replace("/../.*", $_SERVER['http_referer'], $url)) { // if is set old language, write to URI new and return URI
                $url = $url[0];
                echo $url;
                $url=preg_replace("/../", "/".$_GET['setlang']."/", $url);
                echo "\n".$url;
            }
            else { // if RE does not matched with URI, return homepage
                $url = "/".LANG."/";
            }
        /**
         * odkomentovat
         */
        //header ("Location: ".$url); // redirect to homepage
        }
    }
    function lang_show_flags($lang_array_sort, $lang_ma) { // function for create xHTML use: echo show_lang_flags($lang_array_sort, $lang_ma);
        $lang_flags="<div id=\"lang_flags\">"; // this is a start tag of  language DIV
        for ($i = 0; $i < count($lang_array_sort); $i++) { // for all flags create image and link for change language
            $lang_flags.="\n<a href=\"".$_SERVER['PHP_SELF']."?setlang=".$lang_array_sort[$i]."\"><img src=\"/style/lang/".$lang_array_sort[$i].".png\" alt=\"".$lang_ma['lang_'.$lang_array_sort[$i]][LANG]."\" title=\"".$lang_ma['lang_'.$lang_array_sort[$i]][LANG]."\" /></a>";
            if ($i!=count($lang_array_sort)-1) { // for all except last make space between images
                $lang_flags.="&nbsp;";
            }
        }
        $lang_flags.="\n</div>\n";

        return $lang_flags;
    }
    public function getA_sort() {
        return $this->a_sort;
    }
    public function getA_lang() {
        return $this->a_lang;
    }
}
?>
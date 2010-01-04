<?php
/**
 * contain class which is called when some Exception is catch :(
 */

/**
 * class which is called when some Exception is catch :(
 */
class CException {

  /**
   * save all infornation about catched exception to session array
   *
   * @param array $e array with information about exception
   */
 public function __construct($e) {
  $_SESSION['fatalError'] = array();
  $_SESSION['fatalError']['message'] = $e->getMessage();
  $_SESSION['fatalError']['code'] = $e->getCode();
  $_SESSION['fatalError']['file'] = $e->getFile();
  $_SESSION['fatalError']['line'] =  $e->getLine();
  header('Location: /?fatalerror'); //redirect to index.php/?fatalerror which show error page
  exit;
  }

  /**
   * Print informaion about catched error into page
   */
  public function showError() {
    CException::staticHTML_top();
    echo "      <h2>Nastal kritický problém</h2>\n      <ul>\n";
    echo "        <li>Problém s: ".$_SESSION['fatalError']['message']."</li>\n";
    echo "        <li>Číslo chyby: ".$_SESSION['fatalError']['code']."</li>\n";
    echo "        <li>Chyba v souboru: ".$_SESSION['fatalError']['file']."</li>\n";
    echo "        <li>Chyba v okolí řádku: ".$_SESSION['fatalError']['line']."</li>\n";
    echo "      </ul>\n";
    unset($_SESSION['fatalError']);
    CException::staticHTML_bottom();
    exit;
    }

  /**
   * print static (x)HTML top part of page
   */
  private static function staticHTML_top() {
  $show = <<< EOF
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs">
      <head>
      <title>
      STAG OOP |
        http://stag-portal.it</title>
        <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="cs" />
        <meta name="author" content="Trakal, Gajzler and Sonsky" />
        <meta name="keywords" content="STAG" />
        <meta name="description" content="The best of STAG agenda" />
        <meta name="robots" content="all,follow" />
        <link rel="alternate" type="application/rss+xml" title="RSS" href="/rss.xml" />
        <link rel="stylesheet" href="/css/screen.css" type="text/css" media="screen" />
        <!-- not implemented <link rel="stylesheet" href="/css/print.css" type="text/css" media="print" /> -->
      </head>
      <body><div id="main"><a href="/"><img src="/img/top_logo.png" alt="STAG" /></a>    <div id="top_menu">
        <form class="left" action="/index.php?action=login" method="post">
        </form>
          </div><!-- top_menu -->    <div id="left_menu">
      <ul>
        <li><a href="/">Úvodní stránka</a></li>
      </ul>
          </div><!-- left_menu -->    <div id="page">
EOF;

  echo $show;
    }

  /**
   * print static (x)HTML bottom part of page
   */
  private static function staticHTML_bottom() {
    echo '
      </div><!-- page -->  </div><!-- main -->  <div id="bottom"><a href="http://blog.trtkal.net">&copy;&nbsp;Trtkal</a>&nbsp;2008|&nbsp;spolupráce&nbsp;<a href="http://blog.shawn.cz">&nbsp;Shawn</a>&nbsp;a&nbsp;Štěpas<br /><a href="http://localhost/apache/phpmyadmin/">phpMyAdmin</a></div> </body></html>
      ';
    }
  }
?>
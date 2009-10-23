<?php
if ( stristr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml") ) {
  header("Content-type: application/xhtml+xml");
  echo '<?xml version="1.0" encoding="UTF-8"?>'."\n";
}
else {
  header("Content-type: text/html");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>IWWW a IDAS2 semestrálka &raquo; Filmotéka</title>
        <link href="/style/screen.css" rel="stylesheet" type="text/css" media="screen" />
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <div id="logo">
                    <h1><a href="http://blog.trtkal.net">Trtkalovo pískoviště</a></h1>
                    <p><a href="/">filmotéka</a></p>
                </div>
            </div>
            <!-- end #header -->
            <div id="menu">
                <ul>

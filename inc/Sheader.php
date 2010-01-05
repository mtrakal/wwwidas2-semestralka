<?php
/* dementní FF a CHROME nechápou, že v XHTML bychom rádi taky používali javascript s psaním do dokumentu...

if ( stristr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml") ) {
    header("Content-type: application/xhtml+xml");
    echo '<?xml version="1.0" encoding="UTF-8"?>'."\n";
}
else {
    header("Content-type: text/html");
}
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>IWWW a IDAS2 semestrálka &raquo; Filmotéka</title>
        <link href="/style/screen.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="/style/print.css" rel="stylesheet" type="text/css" media="print" />

        <!-- google loader -->
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load("jquery", "1.3.2");
            google.load("jqueryui", "1.7.2");
        </script>
        <!-- google loader_konec -->

        <!-- jQUERY -->
        <!--
        <script type="text/javascript" src="/style/texyla/jquery/jquery.js"></script>
        <script type="text/javascript" src="/style/texyla/jquery/jquery-ui.js"></script>
        -->
        <!-- jQUERY_konec -->

        <!-- AUTOCOMPLETE -->
        <link rel="stylesheet" href="/style/autocomplete/autocomplete.css" type="text/css" media="screen" />
        <script src="/style/autocomplete/dimensions.js" type="text/javascript"></script>
        <script src="/style/autocomplete/autocomplete.js" type="text/javascript"></script>
        <!-- AUTOCOMPLETE_konec -->

        <!-- TEXYLA -->
        <script type="text/javascript" src="/style/texyla/texyla/texyla.js"></script>
        <link rel="stylesheet" type="text/css" href="/style/texyla/texyla/css/style.css" />
        <link rel="stylesheet" type="text/css" href="/style/texyla/themes/default/theme.css" />

        <script type="text/javascript">
            //<![CDATA[
            $(document).ready(function() {
                $('a').filter(function() {
                    return this.hostname && this.hostname !== location.hostname;
                }).addClass('external')
                .click(function() {
                    window.open(this.href);
                    return false;
                });
            });

            $(function () {
                $.texyla("setDefaults", {
                    // language: "en"
                });

                $("#text2").texyla({
                    toolbar: [
                        'h1', 'h2', 'h3', 'h4',
                        null,
                        'bold', 'italic',
                        null,
                        'center', ['left', 'right', 'justify'],
                        null,
                        'ul', 'ol',
                        null,
                        'link', 'img', 'table', 'emoticon',
                        null,
                        "files",
                        null,
                        'div', ['html', 'blockquote', 'text', 'comment'],
                        null,
                        'code',	['codeHtml', 'codeCss', 'codeJs', 'codePhp', 'codeSql'], 'codeInline',
                        null,
                        {type: "label", text: "Ostatní"}, ['sup', 'sub', 'del', 'acronym', 'hr', 'notexy', 'web']
                    ],
                    bottomLeftToolbar: ['edit', 'preview', 'htmlPreview'],
                    tabs: true,
                    texyCfg: "admin",
                    width: 800
                });

                $.texyla({
                    texyCfg: "forum",
                    buttonType: "button"

                });
            });
            //]]></script>
        <!-- TEXYLA_konec -->
        <!-- COLORBOX -->
        <link type="text/css" media="screen" rel="stylesheet" href="/style/colorbox.css" />
        <!-- texy s tím NEJEDE <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script> -->
        <script type="text/javascript" src="/style/colorbox/jquery.colorbox.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".colorbox").colorbox();
                $(".youtube").colorbox({iframe:true, width:650, height:550});
                $(".iframe").colorbox({innerWidth:400, innerHeight: 180, iframe:true});
                $(".iframe.add_borrower").colorbox({innerWidth:400, innerHeight: 230, iframe:true});
                $(".iframe.movie").colorbox({width:700, height:600, iframe:true});
            });
            $(document).ready(function(){$().bind('cbox_closed',function() 
                {window.document.location.reload();});})
        </script>
        <!-- COLORBOX_konec -->
    </head>
    <body onload="setfocus()">
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

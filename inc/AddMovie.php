<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link href="/style/modal.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="/style/print.css" rel="stylesheet" type="text/css" media="print" />
        <title>Přidání titulků</title>
        <!-- jQUERY -->
        <script type="text/javascript" src="/style/texyla/jquery/jquery.js"></script>
        <script type="text/javascript" src="/style/texyla/jquery/jquery-ui.js"></script>
        <!-- jQUERY_konec -->

        <!-- TEXYLA -->
        <script type="text/javascript" src="/style/texyla/texyla/texyla.js"></script>
        <link rel="stylesheet" type="text/css" href="/style/texyla/texyla/css/style.css" />
        <link rel="stylesheet" type="text/css" href="/style/texyla/themes/default/theme.css" />
        <script type="text/javascript">
            //<![CDATA[

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
        <script type="text/javascript">
            function setfocus() {
                document.form.titulky.focus();
            }
        </script>
    </head>
    <body onLoad="setfocus()">
        <div id="modal">
            <h1>Přidání titulků</h1>
            <?php
            if(isset($_POST['titulky'])) {
                include_once dirname(__FILE__) . '/../classes/Subtitles.php';
                $subtitlesadd = new Movie();
                if($subtitlesadd->Add($_POST['id_filmu'], $_POST['titulky'], $_POST['format'], $_POST['jazyk'])) {
                    echo "<h2>Přidání proběhlo v pořádku</h2><p class=\"link\"><a href=\"".$_SERVER['PHP_SELF']."\">Přidat další</a></p>";
                } else {
                    echo "<h2>Nastala chyba</h2>";
                }
            } else {
                ?>
            <form id="add_movie" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form">
                <p>
                    <label class="req">Originální název:</label><input type="text" name="original" /><br />
                    <label>Český název:</label><input type="text" name="cz" /><br />
                    <label>Anglický název:</label><input type="text" name="en" /><br />
                    <label title="Odkaz na čsfd.cz">CSFD:</label><input type="text" name="csfd" /><br />
                    <label title="Odkaz na imdb">IMDB:</label><input type="text" name="imdb" /><br />
                    <label class="req" title="Rok vydání">Rok:</label><input type="text" name="rok" /><br />
                    <label class="req">Délka:</label><input type="text" name="delka" /><br />
                    <label class="req" title="Popis filmu">Popis:</label><textarea name="popis" rows="20" cols="90" id="text2"></textarea>
                </p>
                <!--<div class="center"><input type="submit" value="Přidat" /></div>-->
            </form>
            <?php } ?>
        </div>
    </body>
</html>
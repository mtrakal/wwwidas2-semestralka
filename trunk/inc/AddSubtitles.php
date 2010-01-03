<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link href="/style/modal.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="/style/print.css" rel="stylesheet" type="text/css" media="print" />
        <title>Přidání titulků</title>
      <script type="text/javascript">
            function setfocus() {
                document.getElementsByName("titulky")[0].focus();
            }
        </script>
    </head>
    <body onload="setfocus()">
        <div id="modal">
            <h1>Přidání titulků</h1>
            <?php
            if(isset($_POST['titulky'])) {
                include_once dirname(__FILE__) . '/../classes/Subtitles.php';
                $subtitlesadd = new Subtitles();
                if($subtitlesadd->Add($_POST['id_filmu'], $_POST['titulky'], $_POST['format'], $_POST['jazyk'])) {
                    echo "<h2>Přidání proběhlo v pořádku</h2><p class=\"link\"><a href=\"".$_SERVER['PHP_SELF']."\">Přidat další</a></p>";
                } else {
                    echo "<h2>Nastala chyba</h2>";
                }
            } else {
                ?>
            <form id="add_genre" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <p>
                    <label class="req">Žánr:</label><input type="text" name="genre" /><br />
                </p>
                <div class="center"><input type="submit" value="Přidat" /></div>
            </form>
            <?php } ?>
        </div>
    </body>
</html>
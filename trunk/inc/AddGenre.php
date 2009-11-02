<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="/style/modal.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="/style/print.css" rel="stylesheet" type="text/css" media="print" />
        <title>Přidání žánru</title>
    </head>
    <body>
        <div id="modal">
            <h1>Přidání žánru</h1>
            <form id="add_genre" action="'.$_SERVER['PHP_SELF'].'" method="post">
                <p>
                    <label class="req">Žánr:</label><input class="inp" type="text" name="genre" /><br />
                </p>
                <div class="center"><input type="submit" value="Přidat" /></div>
            </form>
        </div>
    </body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="/style/modal.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="/style/print.css" rel="stylesheet" type="text/css" media="print" />
        <title>Vstup do administrace</title>
    </head>
    <body>
        <div id="modal">
            <h1>Vstup do administrace</h1>
            <h2>Přihlášení</h2>
            <form id="login" action="'.$_SERVER['PHP_SELF'].'" method="post">
                <p>
                    <label class="req">Jméno:</label><input type="text" name="user" /><br />
                    <label class="req">Heslo:</label><input type="password" name="pass" />
                </p>
                <div class="center"><input type="submit" value="Přihlásit" /></div>
            </form>
        </div>
    </body>
</html>
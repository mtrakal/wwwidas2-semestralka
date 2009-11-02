<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="/style/modal.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="/style/print.css" rel="stylesheet" type="text/css" media="print" />
        <title>Přidání uživatele</title>
    </head>
    <body>
        <div id="modal">
            <h1>Registrovat půjčujícího</h1>
            <form id="add_borrower" action="'.$_SERVER['PHP_SELF'].'" method="post">
                <p>
                    <label class="req">Jméno:</label><input type="text" name="firstname" /><br />
                    <label class="req">Příjmení:</label><input type="text" name="lastname" /><br />
                    <label class="req">Email:</label><input type="text" name="email" /><br />
                    <label>Telefon:</label><input type="text" name="phone" /><br />
                </p>
                <div class="center"><input type="submit" value="Přidat" /></div>
            </form>
        </div>
    </body>
</html>
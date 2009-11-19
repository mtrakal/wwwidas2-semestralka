<?php
/*
include_once '../inc/ColorBox.php';
include_once '../inc/HtmlStruct.php';

$page += HtmlStruct::Dtd();
$page += HtmlStruct::HeaderStart();
$page += ColorBox::Header();
$page += '        <div id="modal">
            <h1>Přidání adresy</h1>
            <form id="add_address" action="'.$_SERVER['PHP_SELF'].'" method="post">
                <p>
                    <label class="req">Ulice:</label><input type="text" name="street" /><br />
                    <label class="req">ČP:</label><input type="text" name="number" /><br />
                    <label class="req">PSČ:</label><input type="text" name="psc" /><br />
                    <label class="req">Město:</label><input type="text" name="city" /><br />
                </p>
                <div class="center"><input type="submit" value="Přidat" /></div>
            </form>
        </div>';
$page += HtmlStruct::BodyEnd();
echo $page;
*/
?>
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
            <h1>Přidání adresy</h1>
            <form id="add_address" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <p>
                    <label class="req">Ulice:</label><input type="text" name="street" /><br />
                    <label class="req">ČP:</label><input type="text" name="number" /><br />
                    <label class="req">PSČ:</label><input type="text" name="psc" /><br />
                    <label class="req">Město:</label><input type="text" name="city" /><br />
                </p>
                <div class="center"><input type="submit" value="Přidat" /></div>
            </form>
        </div>
    </body>
</html>
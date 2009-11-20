<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link href="/style/modal.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="/style/print.css" rel="stylesheet" type="text/css" media="print" />
        <title>Přidání uživatele</title>
        <script type="text/javascript">
            function setfocus() {
                document.form.nick.focus();
            }
        </script>
    </head>
    <body onLoad="setfocus()">
        <div id="modal">
            <h1>Registrovat půjčujícího</h1>
            <?php
            if(isset($_POST['firstname'])) {
                include_once dirname(__FILE__) . '/../classes/Borrower.php';
                $borrower = new Borrower();
                if($borrower->Add($_POST['nick'], $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['address'], $_POST['phone'])) {
                    echo "<h2>Přidání proběhlo v pořádku</h2><p class=\"link\"><a href=\"".$_SERVER['PHP_SELF']."\">Přidat další</a></p>";
                } else {
                    echo "<h2>Nastala chyba</h2>";
                }
            } else {
                ?>
            <form id="add_borrower" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form">
                <p>
                    <label class="req">Přezdívka:</label><select name="nick" size="1">
                            <?php
                            require_once dirname(__FILE__) . '/../classes/User.php';
                            $user = new User();
                            $result = $user->GetAllNick();
                            foreach ($result as $variable) {
                                echo '<option value="'.$variable['NICK'].'">'.$variable['NICK'].'</option>';
                            };
                            unset ($result);
                            ?>
                    </select><br />
                    <label class="req">Jméno:</label><input type="text" name="firstname" /><br />
                    <label class="req">Příjmení:</label><input type="text" name="lastname" /><br />
                    <label class="req">Email:</label><input type="text" name="email" /><br />
                    <label class="req">Adresa:</label><select name="address" size="1">
                            <?php
                            require_once dirname(__FILE__) . '/../classes/BorrowerAddress.php';
                            $borroweraddress = new BorrowerAddress();
                            $result = $borroweraddress->GetAllComplete();
                            foreach ($result as $variable) {
                                echo '<option value="'.$variable['ID'].'">'.$variable['MESTO'].", ".$variable['PSC'].", ".$variable['ULICE']." ".$variable['CISLO'].'</option>';
                            };
                            unset ($result);
                            ?>
                    </select><br />
                    <label>Telefon:</label><input type="text" name="phone" /><br />
                </p>
                <div class="center"><input type="submit" value="Přidat" /></div>
            </form>
            <?php } ?>
        </div>
    </body>
</html>
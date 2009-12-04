<?
if(isset($_GET['action'])) {
	include_once dirname(__FILE__) . '/../classes/Login.php';
	
	switch($_GET['action']) {
	case 'logout':
		$login = new Login();
		$login->Logout();
		header('Location: /');
		break;
	}
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link href="/style/modal.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="/style/print.css" rel="stylesheet" type="text/css" media="print" />
        <title>Vstup do administrace</title>
        <script type="text/javascript">
            function setfocus() {
                document.form.username.focus();
            }
        </script>
    </head>
    <body onLoad="setfocus()">
        <div id="modal">
            <h1>Vstup do administrace</h1>
            <?php
            if(isset($_POST['username'])) {
                include_once dirname(__FILE__) . '/../classes/Login.php';
                $login = new Login();
                if($login->Authorize($_POST['username'], $_POST['password'])) {
                    echo "<h2>Přihlášení proběhlo v pořádku</h2>";
                } else {
                    echo "<h2>Špatný login!</h2><p class=\"link\"><a href=\"/inc/Login.php\"</p>";
                }
            } else {
                ?>
            <h2>Přihlášení</h2>
            <form id="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form">
                <p>
                    <label class="req">Jméno:</label><input type="text" name="username" /><br />
                    <label class="req">Heslo:</label><input type="password" name="password" />
                </p>
                <div class="center"><input type="submit" value="Přihlásit" /></div>
            </form>
					<?php } ?>
        </div>
    </body>
</html>
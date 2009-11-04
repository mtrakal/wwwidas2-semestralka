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
            <h1>Přidání uživatele</h1>
            <form id="add_user" action="'.$_SERVER['PHP_SELF'].'" method="post">
                <p>
                    <label class="req">Přezdívka:</label><input type="text" name="user" /><br />
                    <label class="req">Role:</label>
                    <select name="role" size="1">
                        <?php
                        require_once dirname(__FILE__) . '/../classes/Role.php';
                        $role = new Role();
                        foreach ($role->All() as $number_variable => $variable) {
                            echo '<option value="'.$number_variable.'">'.$number_variable.'</option>';
                        };
                        unset ($role);
                        ?>
                    </select><br />
                    <label class="req">Heslo:</label><input class="inp" type="password" name="pass" />
                </p>
                <div class="center"><input type="submit" value="Přidat" /></div>
            </form>
        </div>
    </body>
</html>
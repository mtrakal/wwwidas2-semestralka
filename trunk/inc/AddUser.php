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
                document.form.username.focus();
            }
        </script>
    </head>
    <body onLoad="setfocus()">
        <div id="modal">
            <h1>Přidání uživatele</h1>
            <?php
            if(isset($_POST['username'])) {
                include_once dirname(__FILE__) . '/../classes/User.php';
                $user = new User();
                if($user->Add($_POST['username'],$_POST['password'], $_POST['role'])) {
                    echo "<h2>Přidání proběhlo v pořádku</h2><p class=\"link\"><a href=\"".$_SERVER['PHP_SELF']."\">Přidat další</a></p>";
                } else {
                    echo "<h2>Nastala chyba</h2>";
                }
            } else {
                ?>
            <form id="add_user" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form">
                <p>
                    <label class="req">Přezdívka:</label><input type="text" name="username" /><br />
                    <label class="req">Role:</label>
                    <select name="role" size="1">
                            <?php
                            require_once dirname(__FILE__) . '/../classes/Role.php';
                            $role = new Role();
                        /*
                        while($pom[] = oci_fetch_assoc($role->All())) {
                                echo $pom[0];
                        }*/
                            $pom = $role->All();
                            foreach ($pom as $number_variable => $variable) {
                                echo '<option value="'.$number_variable.'">'.$variable.'</option>';
                            };
                            unset ($role);
                            ?>
                    </select><br />
                    <label class="req">Heslo:</label><input type="password" name="password" />
                </p>
                <div class="center"><input type="submit" value="Přidat" /></div>
            </form>
            <?php } ?>
        </div>
    </body>
</html>
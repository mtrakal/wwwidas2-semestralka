<?php
require_once dirname(__FILE__) . "/fautoload.php";
//require_once dirname(__FILE__) . '/classes/Login.php';
$login = new Login();
if($login->IsAuthorized()) {

    include_once "./inc/Sheader.php";
    ?>
<li><a href="/index.php">Hlavní stránka</a></li>
<li><a href="/index_filmoteka.php">Seznam filmů</a></li>
<li class="current_page_item"><a href="/index_administrace.php">Administrace</a></li>
<li><a href="/inc/Login.php?action=logout">Odhlášení</a></li>
</ul>
</div>
<!-- end #menu -->
<div id="page">
    <div id="content">
                                    <!--<div id="banner"><img src="/style/img/img07.jpg" alt="" /></div>-->
        <div class="post">
            <h2 class="title"><a href="#">Administrace</a></h2>
            <p class="meta">Bude časem&hellip; možná x)</p>
            <div class="entry">
                <p>Přihlášen jako <strong><?php echo $_SESSION['username'].'</strong> s rolí <strong>'.$_SESSION['role']; ?></strong></p>
                <p>Obsah budoucí administrace &hellip;</p>
                <!--<p class="csfdimdb">Odkaz na <a href="http://www.csfd.cz/film/29221-amelie-z-montmartru-fabuleux-destin-damelie-poulain-le/">čsfd</a>, <a href="http://www.csfd.cz/film/29221-amelie-z-montmartru-fabuleux-destin-damelie-poulain-le/">imdb</a>.</p>
                <p class="links"><a href="#" class="edit">Upravit</a> <a href="#" class="borrow">Zapůjčit</a></p>-->
            </div>
        </div>
        <div class="cleaner both">&nbsp;</div>
    </div>
    <!-- end #content -->
    <div id="sidebar">
        <ul>
            <li>
                <h2>Možnosti</h2>
                <ul>
                        <?php
                        if($login->IsAuthorized('Administrator')) {
                            ?>
                    <li><div>Uživatele</div>
                        <ul>
                            <li><a href="/inc/AddUser.php" class="iframe">Přidat</a></li>
                            <li><a href="#" class="iframe" title="zatím nefunguje">Upravit</a></li>
                            <li><a href="#" class="iframe" title="zatím nefunguje">Odstranit</a></li>
                        </ul>
                    </li>
                    <li><div>Adresu uživatele</div>
                        <ul>
                            <li><a href="/inc/AddAddress.php" class="iframe">Přidat</a></li>
                            <li><a href="#" class="iframe" title="zatím nefunguje">Upravit</a></li>
                            <li><a href="#" class="iframe" title="zatím nefunguje">Odstranit</a></li>
                        </ul>
                    </li>
                    <li><div>Žánr</div>
                        <ul>
                            <li><a href="/inc/AddGenre.php" class="iframe">Přidat</a></li>
                            <li><a href="#" class="iframe" title="zatím nefunguje">Upravit</a></li>
                            <li><a href="#" class="iframe" title="zatím nefunguje">Odstranit</a></li>
                        </ul>
                    </li>
                    <li><div>Půjčujícího</div>
                        <ul>
                            <li><a href="/inc/AddBorrower.php" class="iframe">Přidat</a></li>
                            <li><a href="#" class="iframe" title="zatím nefunguje">Upravit</a></li>
                            <li><a href="#" class="iframe" title="zatím nefunguje">Odstranit</a></li>
                        </ul>
                    </li>
                    <li><div>Titul filmu</div>
                        <ul>
                            <li><a href="/inc/AddMovie.php" class="iframe movie">Přidat</a></li>
                            <li><a href="#" class="iframe" title="zatím nefunguje">Upravit</a></li>
                            <li><a href="#" class="iframe" title="zatím nefunguje">Odstranit</a></li>
                        </ul>
                    </li>
                            <?php
                        }
                        if($login->IsAuthorized('Borrower')) {
                            ?>
                    <li><div>Filmy</div>
                        <ul>
                            <li><a href="#" class="iframe" title="zatím nefunguje">Vypůjčit</a></li>
                        </ul>
                    </li>
                            <?php
                        }
                        ?>
                </ul>
            </li>
        </ul>
    </div>
        <?php
        include_once "./inc/Sfooter.php";
    }
    else {
        echo "nic nebude!";
    }
    ?>
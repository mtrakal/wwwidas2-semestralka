<?php
require_once dirname(__FILE__) . "/fautoload.php";
$login = new Login();

require_once dirname(__FILE__) . "/inc/Sheader.php";
?>
<li class="current_page_item"><a href="/index.php">Hlavní stránka</a></li>
<li><a href="/index_filmoteka.php">Seznam filmů</a></li>
<?php
if($login->IsAuthorized()) {
    echo '<li><a href="/index_administrace.php">Administrace</a></li>'."\n".
            '<li><a href="/inc/Login.php?action=logout">Odhlášení</a></li>';
} else {
    echo '<li><a href="/inc/Login.php" class="iframe">Administrace</a></li>';
}
?>
</ul>
</div>
<!-- end #menu -->
<div id="page">
    <div id="content">
            <!--<div id="banner"><img src="/style/img/img07.jpg" alt="" /></div>-->
        <div class="post">
            <h2 class="title"><a href="#">Interní filmová databáze</a></h2>
            <!--<p class="meta">Fabuleux destin d'Amélie Poulain, Le</p>-->
            <div class="entry">
                <ul>
                    <li><strong>Odkazy</strong>
                        <ul>
                            <li><a href="http://code.google.com/p/wwwidas2-semestralka/source/browse/#svn/trunk">SVN zdrojáky</a></li>
                            <li><a href="http://code.google.com/p/wwwidas2-semestralka/updates/list">SVN změny</a></li>
                        </ul>
                    </li>
                    <li><strong>Popis</strong>
                        <ul>
                            <li>Správa osobní filmotéky</li>
                            <li>Možnost přidávání uživatelů, žánrů, filmů, &hellip;</li>
                            <li>Prohlížení titulů filmů a následně jednotlivých filmů</li>
                            <li>Zobrazení žánru, délky, &hellip; filmu</li>
                        </ul>
                    </li>
                    <li><strong>Uživatelské role</strong>
                        <ul>
                            <li>Viz obrázek z Oracle DB</li>
                        </ul>
                    </li>
                    <li><strong>Předpokládaný rozsah</strong>
                        <ul>
                            <li>Databáze: <a href="/img/oracle.png">obrázek (28 kB)</a></li>
                            <li>WWW a CSS v rozsahu do 10 stránek s generovaným obsahem</li>
                        </ul>
                    </li>

                </ul>
                <p class="links"><a href="#" class="edit">Upravit</a></p>
            </div>
        </div>
        <div class="cleaner both">&nbsp;</div>
    </div>
    <!-- end #content -->
    <div id="sidebar">
        <ul>
            <li>
                <h2>Statistiky databáze</h2>
                <ul>
                    <li><div>Celkem filmů</div>
                        <?php
                        require_once dirname(__FILE__) . '/classes/Movie.php';
                        $movie = new Movie();
                        echo $movie->Count();
                        unset ($movie);
                        ?>
                    </li>
                    <li><div>Registrovaných uživatelů</div>
                        <?php
                        require_once dirname(__FILE__) . '/classes/User.php';
                        $user = new User();
                        echo $user->Count();
                        unset ($user);
                        ?>
                    </li>
                    <li><div>Vypůjčených filmů</div>
                        <?php
                        $borrow = new Borrower();
                        echo $borrow->BorrowedCount();
                        unset ($borrower);
                        ?>
                    </li>
                    <li><div>Nejpůjčovanější filmy</div>
                        <ol>
                            <li>Amélie z Montmartru</li>
                            <li>Cesta do fantazie</li>
                        </ol>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <?php
    require_once "./inc/Sfooter.php";
    ?>
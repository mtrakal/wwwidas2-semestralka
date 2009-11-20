<?php
include_once dirname(__FILE__) . "/inc/Sheader.php";
?>
<li class="current_page_item"><a href="/index.php">Hlavní stránka</a></li>
<li><a href="/index_filmoteka.php">Seznam filmů</a></li>
<li><a href="/index_administrace.php">Administrace</a></li>
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
                    <li><strong>Popis</strong>
                        <ul>
                            <li>Správa osobní filmotéky s malou půjčovnou</li>
                            <li>Hodnocení filmů pouze správcem</li>
                            <li>Možnost stahování titulků</li>
                            <li>Zobrazení žánru, délky, ... filmu</li>
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
    include_once "./inc/Sfooter.php";
?>
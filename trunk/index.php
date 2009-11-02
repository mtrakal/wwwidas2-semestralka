<?php
include_once "./inc/Sheader.php";
?>
                    <li class="current_page_item"><a href="/index.php">Hlavní stránka</a></li>
                    <li><a href="/index_filmoteka.php">Seznam filmů</a></li>
                    <li><a href="/inc/Login.php" class="iframe">Login</a></li>
                    <li><a href="/inc/AddUser.php" class="iframe">User</a></li>
                    <li><a href="/inc/AddAddress.php" class="iframe">Adr</a></li>
                    <li><a href="/inc/AddGenre.php" class="iframe">Gen</a></li>
                    <li><a href="/inc/AddBorrower.php" class="iframe">Bor</a></li>
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
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
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
    require_once './classes/Movie.php';
    $movie = new Movie();
    echo $movie->count();
?>
                                </li>
                                <li><div>Registrovaných uživatelů</div>
<?php
    require_once './classes/User.php';
    $user = new User();
    echo $user->count();
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
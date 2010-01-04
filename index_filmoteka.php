<?php
require_once dirname(__FILE__) . "/fautoload.php";
session_start();
//require_once dirname(__FILE__) . '/classes/Movie.php';
//require_once dirname(__FILE__) . '/classes/CMovie.php';
//require_once dirname(__FILE__) . '/classes/Genre.php';
//require_once dirname(__FILE__) . '/classes/Login.php';

if(isset($_GET['export'])) {
    if($_GET['export']=='xml') {
        include_once dirname(__FILE__) . '/classes/XMLParse.php';
        $xml = new XMLParse();
        $xml->MovieGet();
        die();
    }
}

include_once "./inc/Sheader.php";
?>
<li><a href="/index.php">Hlavní stránka</a></li>
<li class="current_page_item"><a href="/index_filmoteka.php">Seznam filmů</a></li>
<?php
$login = new Login();
if($login->IsAuthorized()) {
    echo '<li><a href="/index_administrace.php">Administrace</a></li>'."\n".
            '<li><a href="/inc/Login.php?action=logout">Odhlášení</a></li>';
} else {
    echo '<li><a href="/inc/Login.php" class="iframe">Administrace</a></li>';
}
?>
</ul>
</div><!-- end #menu -->
<div id="page">
    <?php
    if (isset($_GET['movie'])) {
        $result = array();
        $titul = new Movie();
        $result = $titul->Get($_GET['movie']);
        unset($titul);

        $zanr = array();
        $genre = new Genre();
        $zanr = $genre->GetByMovie($_GET['movie']);
        unset($genre);
        ?>
    <div id="content">
            <!--<div id="banner"><img src="/style/img/img07.jpg" alt="" /></div>-->
        <div class="post">
            <h2 class="title"><a href="#"><?php echo $result['0']['CZ']; ?></a></h2>
            <p class="meta"><?php echo $result['0']['ORIGINAL']; ?></p>
            <div class="entry">
                <p><?php echo $result['0']['POPIS']; ?></p>
                <p class="csfdimdb">Odkaz na <a href="<?php echo $result['0']['CSFD']; ?>">čsfd</a>, <a href="<?php echo $result['0']['IMDB']; ?>">imdb</a>.</p>
                <p class="links"><a href="#" class="edit">Upravit</a></p>
            </div>
        </div>
        <div class="cleaner both">&nbsp;</div>
    </div><!-- end #content -->
    <div id="sidebar">
        <ul>
            <li>
                <h2>Parametry filmu</h2>
                <ul>
                    <li><div>Originální název</div><?php echo $result['0']['ORIGINAL']; ?></li>
                    <li><div>Anglický název</div><?php echo $result['0']['EN']; ?></li>
                    <li><div>Český název</div><?php echo $result['0']['CZ']; ?></li>
                    <li><div>Délka a datum vydání</div><?php echo $result['0']['DELKA']; ?> minut, <?php echo $result['0']['ROK']; ?></li>
                    <li><div>Žánr</div>
                            <?php
                            foreach ($zanr as $row) {
                                echo $row['ZANR'].", ";
                            }
                            ?>
                    <li><div>Dostupné filmy:</div><?php
                            $result = array();
                            $film = new CMovie();
                            $result = $film->GetByTitul($_GET['movie']);
                            unset($film);
                            foreach ($result as $row) {
                                echo "<a href=\"/film/".$row['KATALOGOVE_CISLO'].".html\">".$row['FORMAT'].", ".$row['JAZYK'].", ".$row['UMISTENI']."</a><br>\n";
                            }
                            ?>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
        <?php } elseif (isset($_GET['cmovie'])) {
        $result = array();
        $film = new CMovie();
        $result = $film->Get($_GET['cmovie']);
        unset($film);

        $zanr = array();
        $genre = new Genre();
        $zanr = $genre->GetByMovie($result['0']['FILM_ID']);
        unset($genre);
        ?>
    <div id="content">
            <!--<div id="banner"><img src="/style/img/img07.jpg" alt="" /></div>-->
        <div class="post">
            <h2 class="title"><a href="#"><?php echo $result['0']['CZ']; ?></a></h2>
            <p class="meta"><?php echo $result['0']['ORIGINAL']; ?></p>
            <div class="entry">
                <p><?php echo $result['0']['POPIS']; ?></p>
                <p class="csfdimdb">Odkaz na <a href="<?php echo $result['0']['CSFD']; ?>">čsfd</a>, <a href="<?php echo $result['0']['IMDB']; ?>">imdb</a>.</p>
                <p class="links"><a href="#" class="edit">Upravit</a> <a href="#" class="borrow">Zapůjčit</a></p>
            </div>
        </div>
        <div class="cleaner both">&nbsp;</div>
    </div><!-- end #content -->
    <div id="sidebar">
        <ul>
            <li>
                <h2>Parametry filmu</h2>
                <ul>
                    <li><div>Originální název</div><a href="/titul/<?php echo $result['0']['FILM_ID']; ?>.html"><?php echo $result['0']['ORIGINAL']; ?></a></li>
                    <li><div>Anglický název</div><?php echo $result['0']['EN']; ?></li>
                    <li><div>Český název</div><?php echo $result['0']['CZ']; ?></li>
                    <li><div>Délka a datum vydání</div><?php echo $result['0']['DELKA']; ?> minut, <?php echo $result['0']['ROK']; ?></li>
                    <li><div>Žánr</div>
                            <?php
                            foreach ($zanr as $row) {
                                echo $row['ZANR'].", ";
                            }
                            ?>
                    </li>
                    <li><div>Jazyk</div><?php echo $result['0']['JAZYK']; ?></li>
                    <li><div>Formát a velikost</div><?php echo $result['0']['FORMAT'].", ".$result['0']['VELIKOST']." kiB"; ?></li>
                    <li><div>Hodnocení</div><?php for($i=0; $result['0']['HODNOCENI']>$i;$i++) { ?><img src="/style/img/str.gif" alt="*" /><?php } ?></li>
                    <li><div>Umístění</div><?php echo $result['0']['UMISTENI']; ?></li>
                    <li><div>Datum přidání</div><?php echo $result['0']['DATUM_PRIDANI']; ?></li>

                </ul>
            </li>
        </ul>
    </div>
        <?php } else { ?>
    <div id="content">
        <div class="post">
            <h2 class="title"><a href="#">Výsledky vyhledávání</a></h2>
            <div class="entry">
            </div>
        </div>
        <div class="cleaner both">&nbsp;</div>
    </div><!-- end #content -->
    <div id="sidebar">
        <script type="text/javascript">
            $(function(){
                setAutoComplete("searchFieldTitul", "results", "/style/autocomplete/autocomplete.php?titul=");
            });
        </script>
        <script type="text/javascript">
            function setfocus() {
                document.getElementsByName("searchFieldTitul")[0].focus();
            }
        </script>
        <ul>
            <li>
                <h2>Vyhledávání</h2>
                <ul>
                    <li id="search">
                        <form method="post" action="#">
                            <p><label for="searchFieldTitul">Titul: </label>
                                <input id="searchFieldTitul" name="searchFieldTitul" type="text" />
                            </p>
                                <!--<input type="submit" value="Odeslat" />-->
                        </form>
                    </li>
                </ul>
            </li>
                <?php
                //if($login->IsAuthorized() && isset($_SESSION['role'])) {
                //  if($_SESSION['role'] == 'Administrator') {
                if($login->IsAuthorized('Administrator')) {
                    ?>
            <li>
                <h2>Export</h2>
                <ul>
                    <li>
                        <a href="?export=xml">Do xml souboru</a>
                    </li>
                </ul>
            </li>
                    <?php } ?>
        </ul>
            <?php } ?>
    </div>
    <?php
    include_once "./inc/Sfooter.php";
    ?>
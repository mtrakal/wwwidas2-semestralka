<?php
require_once dirname(__FILE__) . '/classes/Movie.php';
require_once dirname(__FILE__) . '/classes/Login.php';

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
</div>
<!-- end #menu -->
<div id="page">
    <?php
    if (isset($_GET['movie'])) {
        $result = array();
        $titul = new Movie();
        $result = $titul->Get($_GET['movie']);
        unset($titul);
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
    </div>
    <!-- end #content -->
    <div id="sidebar">
        <ul>
            <li>
                <h2>Parametry filmu</h2>
                <ul>
                    <li><div>Originální název</div><?php echo $result['0']['ORIGINAL']; ?></li>
                    <li><div>Anglický název</div><?php echo $result['0']['EN']; ?></li>
                    <li><div>Český název</div><?php echo $result['0']['CZ']; ?></li>
                    <li><div>Délka a datum vydání</div><?php echo $result['0']['DELKA']; ?> minut, <?php echo $result['0']['ROK']; ?></li>


                    <li><div>Žánr</div>Komedie, Drama, Romantický</li>
                    <li><div>Formát a velikost</div>DVDRip, 1 402 430 kiB</li>
                    <li><div>Dostupné titulky</div><a href="#">české</a>, <a href="#">anglické</a>, <a href="#">francouzské</a></li>
                    <li><div>Hodnocení</div><img src="/style/img/str.gif" alt="*" /><img src="/style/img/str.gif" alt="*" /><img src="/style/img/str.gif" alt="*" /><img src="/style/img/str.gif" alt="*" /><img src="/style/img/str.gif" alt="*" /></li>
                    <li><div>Umístění</div>D:\filmy\CZ\Amelie, DVD F26</li>
                    <li><div>Datum přidání</div>21. srpna 2007</li>
                </ul>
            </li>
            <!--
				<li>
					<h2>Veroeros sit dolore</h2>
                    <p><strong>Donec turpis orci</strong> facilisis et ornare eget, sagittis eu massa. Quisque dui diam, euismod et lobortis sed etiam lorem ipsum dolor etiam nullam et faucibus. <a href="#">More&#8230;</a></p>
				</li>
				-->
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
    </div>
    <!-- end #content -->
    <div id="sidebar">
        <script type="text/javascript">
            $(function(){
                setAutoComplete("searchField", "results", "/style/autocomplete/autocomplete.php?part=");
            });
        </script>
        <ul>
            <li>
                <h2>Vyhledávání</h2>
                <ul>
                    <li id="search">
                        <label for="searchField">Hledat: </label>
                        <input id="searchField" name="searchField" type="text" />
                        <!--<input type="submit" value="Odeslat" />-->
                    </li>
                </ul>
            </li>
                <?php
                if($login->IsAuthorized() && isset($_SESSION['role'])) {
                    if($_SESSION['role'] = 'Administrator') {
                        ?>
            <li>
                <h2>Export</h2>
                <ul>
                    <li>
                        <a href="?export=xml">Do xml souboru</a>
                    </li>
                </ul>
            </li>
        <?php }} ?>
        </ul>
    </div>
<?php } ?>
    <?php
    include_once "./inc/Sfooter.php";
?>
<?php
include_once "./inc/Sheader.php";
?>
<li><a href="/index.php">Hlavní stránka</a></li>
<li><a href="/index_filmoteka.php">Seznam filmů</a></li>
<li class="current_page_item"><a href="/inc/Login.php" class="iframe">Administrace</a></li>
</ul>
</div>
<!-- end #menu -->
<div id="page">
    <div id="content">
            <!--<div id="banner"><img src="/style/img/img07.jpg" alt="" /></div>-->
        <div class="post">
            <h2 class="title"><a href="#">Administrace</a></h2>
            <p class="meta">Bude časem... možná x)</p>
            <div class="entry">
                <p>Nějaký kravinky...</p>
                <p class="csfdimdb">Odkaz na <a href="http://www.csfd.cz/film/29221-amelie-z-montmartru-fabuleux-destin-damelie-poulain-le/">čsfd</a>, <a href="http://www.csfd.cz/film/29221-amelie-z-montmartru-fabuleux-destin-damelie-poulain-le/">imdb</a>.</p>
                <p class="links"><a href="#" class="edit">Upravit</a> <a href="#" class="borrow">Zapůjčit</a></p>
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
                    <li><div>Uživatele</div>
                        <ul>
                            <li><a href="http://localhost/inc/AddUser.php" class="iframe">Přidat</a></li>
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
    <?php
    include_once "./inc/Sfooter.php";
?>
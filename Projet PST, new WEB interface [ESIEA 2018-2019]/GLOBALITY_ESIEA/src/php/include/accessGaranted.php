    <?php
    if ($_SESSION['connected'] == 0) { ?>
        <div class="welcomeMessage">
            <h1>Bienvenue <blue><?php echo$_SESSION['username']; ?></blue></h1>
            <div class="description">
                <blue>email :</blue> <?= $_SESSION['email'];?></br>
                <?php
                if ($_SESSION['promo'] > 0) { ?>
                    <blue>Année :</blue> <?= $_SESSION['promo'];?>A
                <?php } else {
                    $_SESSION['promo'] = "Professeur";
                    echo '<blue>'.$_SESSION['promo'].'</blue>';
                } ?>
            </div>
            <div class="signed">Equipe <blue>GLOBALITY</blue></div>
            <img src="../../src/img/logo_GLOBALITY_ESIEA.png" alt="logoGLOBALITY_ESIEA">
        </div>
    <?php }
    $_SESSION['connected'] = 1;
    ?>

    <script src="../../src/js/showAside.js" charset="utf-8"></script>

    <h1 class="bigTitle"><blue>Menu</blue></h1>
    <div class="lineBigTitle"></div>

    <div class="block">
        <div class="container">
            <a href="lessons.php" class="category">
                <i class="fas fa-book"></i>
                <h3 class="subtitle">Cours</h3>
            </a>
            <a href="project.php" class="category">
                <i class="fab fa-connectdevelop"></i>
                <h3 class="subtitle">Projets</h3>
            </a>
        </div>
        <div class="container">
            <a href="calendar.php" class="category">
                <i class="far fa-calendar"></i>
                <h3 class="subtitle">Agenda</h3>
            </a>
            <a href="settings.php" class="category">
                <i class="fas fa-cog setting"></i>
                <h3 class="subtitle">Paramètres</h3>
            </a>
        </div>
    </div>


    <button onclick="openNav()" class="btn-aside"><i class="fas fa-plus" style="margin-right: 5px;"></i>Liens <blue>ESIEA</blue></button>
    <div id="mySidenav" class="aside">
        <a href="javascript:void(0)" class="link-aside closebtn" onclick="closeNav()">X</a>
        <a href="https://webu4.esiea.fr/extranet/" class="link-aside" target="_blank">WebU4</a>
        <a href="https://learning.esiea.fr/" class="link-aside" target="_blank"      >Learning</a>
        <a href="https://portail.esiea.fr/" class="link-aside" target="_blank"       >Portail ESIEA</a>
        <a href="https://edt.esiea.fr/etudiant" class="link-aside" target="_blank"   >Emploi du Temps</a>
        <a href="http://esieagoesinternational.pbworks.com/w/page/19250753/FrontPage%2A" class="link-aside">Wiki Internationnal</a>
        <a href="../index.php" class="link-aside logOut">Déconnexion</a>
    </div>


    <h1 class="titleProject">GLOBALITY <blue>ESIEA</blue></h1>

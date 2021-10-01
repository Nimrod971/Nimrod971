<?php
    session_start();
    if (empty($_SESSION)) {
        header("Location: ../../../../index.php");
    } else {
        include '../../../../src/database/database.php';
        include '../../../../src/php/composantPage/header.php';
        include '../../../../src/php/composantPage/includeCSS/teacher/followCSS.php';

        include '../../../../src/php/functions/project.php';
?>

<script src="../../../../src/js/scroll.js"       charset="utf-8"></script>
<script src="../../../../src/js/uploadFiles.js"  charset="utf-8"></script>
<script src="../../../../src/js/showButton.js"   charset="utf-8"></script>
<script src="../../../../src/js/searchEngine.js" charset="utf-8"></script>

<a href="../../project.php" class="returnMenu"><i class="fas fa-undo"></i></a>

<div class="header">
    <div class="header-content">
        <h1 class="header-title">Les projets <blue>ESIEA</blue></h1>
        <nav class="header-menu">
            <a href="followPST.php?sortBy=all" class="link">Les projets</a>
            <a href="followPST.php?sortBy=follow" class="link">Mes suivis</a>
        </nav>
    </div>
</div>

<?php
    $allPST     = getAllPST();
    $myFollow   = getPSTForFollower($_SESSION['id']);
    $projects   = array();

    // var_dump($allPST);
    // var_dump($myFollow);
    // var_dump($projects2A);
    // var_dump($projects3A);
    // var_dump($projects4A);
    // var_dump($projects5A);
 ?>

<?php if (isset($_GET['sortBy'])) {
    $_GET['sortBy'] = htmlspecialchars($_GET['sortBy']); ?>
    <div class="showProjects" id="showProjects">
        <div class="mainTitle">
            <?php if ($_GET['sortBy'] == 'all') { ?>
                <h3 class="title">Tous les Projets</h3>
                <?php $projects = $allPST; ?>
            <?php } else if ($_GET['sortBy'] == 'follow') { ?>
                <h3 class="title">Tous mes suivis</h3>
                <?php $projects = $myFollow; ?>
            <?php } else if ($_GET['sortBy'] >= 2 && $_GET['sortBy'] <= 5) { ?>
                <h3 class="title">PST <?= $_GET['sortBy'] ?>A</h3>
                <?php $projects = getPSTByYear($_GET['sortBy']); ?>
            <?php } else { ?>
                <h3 class="title">Choisir sa catégorie</h3>
            <?php } ?>
            <a href="#top" class="goTo">Accéder aux projets</a>
        </div>

        <div class="main" id="top">
            <div class="header-list">
                <h3 class="header-list-title">
                    <?php if ($_GET['sortBy'] == 'all') { ?>
                        Tous les Projets Scientifiques et Techniques
                        <?php $projects = $allPST; ?>
                    <?php } else if ($_GET['sortBy'] == 'follow') { ?>
                        Tous mes suivis
                        <?php $projects = $myFollow; ?>
                    <?php } else if ($_GET['sortBy'] >= 2 && $_GET['sortBy'] <= 5) { ?>
                        PST <?= $_GET['sortBy'] ?>A
                        <?php $projects = getPSTByYear($_GET['sortBy']); ?>
                    <?php } ?>
                </h3>
                <input type="text" id="searchEngineInput" onkeyup="searchEngine()" placeholder="Rechercher un projet" title="Type in a category">
            </div>

            <div class="list-projects" id="list-projects">
                <?php
                $i = 0;
                while (!empty($projects[$i])) { ?>
                    <?php $pathToJacketOfPST = '../../../../src/data/projects/'.$projects[$i]['name'].'/pictures/logo.png'; ?>
                    <a href="infoPST.php?title=<?= $projects[$i]['name'] ?>" class="project">
                        <div class="jacket" style="display: block;">
                            <?php if (file_exists($pathToJacketOfPST)) { ?>
                                <img src="<?= $pathToJacketOfPST ?>" class="unknow" alt="?">
                            <?php } else { ?>
                                <p class="unknow">?</p>
                            <?php } ?>
                        </div>
                        <div class="informations" style="display: block;">
                            <h4 class="titleProject"><?= $projects[$i]['name'] ?></h4>
                            <div class="block">
                                <p class="category"><blue>Catégorie :</blue> <upp> <?= $projects[$i]['category'] ?> </upp> </p>
                                <p class="description"><blue>Description :</blue> <?= $projects[$i]['description'] ?></p>
                                <p class="follower member">Suiveur : <upp> <?= convertIdToName($projects[$i]['idFollower']) ?> </upp> </p>
                                <p class="mark"><?= $projects[$i]['mark'] ?> / 20</p>
                                <p class="yearProject">PST <?= $projects[$i]['year'] ?>A</p>
                                <p class="member">Chef de projet : <upp> <?= convertIdToName($projects[$i]['idProjectManager']) ?> </upp> </p>
                                <p class="member">Membre 2 : <upp> <?= convertIdToName($projects[$i]['idMember2']) ?> </upp> </p>
                                <p class="member">Membre 3 : <upp> <?= convertIdToName($projects[$i]['idMember3']) ?> </upp> </p>
                                <p class="member">Membre 4 : <upp> <?= convertIdToName($projects[$i]['idMember4']) ?> </upp> </p>
                                <p class="member">Membre 5 : <upp> <?= convertIdToName($projects[$i]['idMember5']) ?> </upp> </p>
                            </div>
                        </div>
                    </a>
                    <?php
                    $i++;
                } ?>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="showProjects">
        <div class="mainTitle">
            <h3 class="title" style="top: 40%;">Choisir sa catégorie</h3>
        </div>
    </div>
<?php } ?>


<?php
    include '../../../../src/php/composantPage/footer.php';
    }
 ?>

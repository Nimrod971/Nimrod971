<?php
    session_start();
    if (empty($_SESSION)) {
        header("Location: ../../../../index.php");
    } else {
        include '../../../../src/database/database.php';
        include '../../../../src/php/composantPage/header.php';
        include '../../../../src/php/composantPage/includeCSS/teacher/ordersCSS.php';

        include '../../../../src/php/include/projectComposant/getReports.php';
        include '../../../../src/php/functions/project.php';
        global $db;

        $allOrders    = getAllOrders();
        $maxStep      = getMaxStep($allOrders);
        $orderByStep = array();
?>

<script src="../../../../src/js/scroll.js"       charset="utf-8"></script>
<script src="../../../../src/js/uploadFiles.js"  charset="utf-8"></script>
<script src="../../../../src/js/showButton.js"   charset="utf-8"></script>

<a href="../../project.php" class="returnMenu"><i class="fas fa-undo"></i></a>

<div class="header">
    <div class="header-content">
        <a href="ordersPST.php" class="header-title">Consigne PST <blue>ESIEA</blue></a>
        <nav class="header-menu">
            <a href="ordersPST.php?show=progress" class="link">La progression</a>
            <a href="ordersPST.php?show=reportFiles" class="link">Les fichiers demandés</a>
        </nav>
    </div>
</div>

<?php
    if (isset($_GET['show'])) {
        $_GET['show'] = htmlspecialchars($_GET['show']);
        if ($_GET['show'] == 'progress') { ?>
            <div class="progress">
                <h2 class="title">Consignes progression</h2>
                <div class="selectYearBlock">
                    <h3 class="subtitle">Choisir l'année : </h3>
                    <a href="ordersPST.php?show=progress&year=2" class="selectYear">PST 2A</a>
                    <a href="ordersPST.php?show=progress&year=3" class="selectYear">PST 3A</a>
                    <a href="ordersPST.php?show=progress&year=4" class="selectYear">PST 4A</a>
                    <a href="ordersPST.php?show=progress&year=5" class="selectYear">PST 5A</a>
                </div>
                <?php if (isset($_GET['year'])) {
                    $_GET['year'] = htmlspecialchars($_GET['year']);
                    for ($i = 0; $i <= $maxStep; $i++) {
                        $tempOrder = orderByStepAndYear($i, $_GET['year']);
                        array_push($orderByStep, $tempOrder);
                    }

                    $titleStep = array('Initialisation', 'Confirmation', 'Lancement', 'Réalisation', 'Finalisation');
                    // var_dump($orderByStep);
                ?>
                <div class="infoProject" style="display: block;">
                    <a class="step" href="ordersPST.php?show=progress&year=<?= $_GET['year'] ?>&step=0">Etape 0</a>
                    <a class="step" href="ordersPST.php?show=progress&year=<?= $_GET['year'] ?>&step=1">Etape 1</a>
                    <a class="step" href="ordersPST.php?show=progress&year=<?= $_GET['year'] ?>&step=2">Etape 2</a>
                    <a class="step" href="ordersPST.php?show=progress&year=<?= $_GET['year'] ?>&step=3">Etape 3</a>
                    <a class="step" href="ordersPST.php?show=progress&year=<?= $_GET['year'] ?>&step=4">Etape 4</a>
                </div>
                <?php if (isset($_GET['step']) && htmlspecialchars($_GET['step']) <= $maxStep) {
                    $_GET['step'] = htmlspecialchars($_GET['step']); ?>
                    <div class="infoStep">
                        <h3 class="title">Etape <?= $_GET['step'] ?> : <?= $titleStep[$_GET['step']] ?></h3>
                        <form class="list" action="" method="post">
                            <?php
                            $i = 0;
                            while (isset($orderByStep[$_GET['step']][$i])) { ?>
                                <li class="list-element">
                                    <input type="checkbox" name="deleteOrder-<?= $i ?>">
                                    <?= $orderByStep[$_GET['step']][$i]['contentOrder'] ?>
                                <?php if (isset($orderByStep[$_GET['step']][$i]['deadLine'])) {
                                    echo '<red>DeadLine : '.$orderByStep[$_GET['step']][$i]['deadLine'].'</red>';
                                } ?> </li>
                                <?php
                                $i++;
                            } ?>
                            <input type="submit" name="formDeleteOrder" id="formDeleteOrder" value="Supprimer">
                        </form>
                    </div>
               <?php } ?>
                <?php } ?>
            </div>
            <div class="addOrders">
                <h2 class="title">Ajouter consignes</h2>
                <form action="" method="post">
                    <div class="inputBox">
                        <div class="inputElement">
                            <input type="checkbox" name="PST-2"> <span> PST 2A </span>
                        </div>
                        <div class="inputElement">
                            <input type="checkbox" name="PST-3"> <span> PST 3A </span>
                        </div>
                        <div class="inputElement">
                            <input type="checkbox" name="PST-4"> <span> PST 4A </span>
                        </div>
                        <div class="inputElement">
                            <input type="checkbox" name="PST-5"> <span> PST 5A </span>
                        </div>
                    </div>
                    <div class="inputBox">
                        <span>Séléction étape : </span>
                        <select class="step" name="selectStep" id="selectStep" required>
                            <?php for ($i = 0; $i < $maxStep; $i++) { ?>
                                <option value="<?= $i ?>">Etape <?= $i ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>Ecrire la consigne : </span>
                        <textarea name="selectOrder" id="selectOrder" placeholder="Consigne" required></textarea>
                    </div>
                    <div class="inputBox">
                        <span>Selection deadline : </span>
                        <input type="date" name="selectDeadLine" id="selectDeadLine" placeholder="DeadLine">
                    </div>
                    <input type="submit" name="formAddOrder" id="formAddOrder" value="Ajouter">
                </form>
            </div>
    <?php } else if ($_GET['show'] == 'reportFiles') { ?>
            <div class="reportFiles">
                <h2 class="title">Consigne fichiers demandés</h2>
                <nav class="reportByYear">
                    <a href="ordersPST.php?show=reportFiles&year=2" class="year">PST 2A</a>
                    <a href="ordersPST.php?show=reportFiles&year=3" class="year">PST 3A</a>
                    <a href="ordersPST.php?show=reportFiles&year=4" class="year">PST 4A</a>
                    <a href="ordersPST.php?show=reportFiles&year=5" class="year">PST 5A</a>
                </nav>
                <?php if (isset($_GET['year'])) {
                    $_GET['year'] = htmlspecialchars($_GET['year']); ?>
                    <div class="showReport">
                        <h3 class="title">Les demandes du PST <?= $_GET['year'] ?>A</h3>
                        <form class="list" action="" method="post">
                            <?php
                                $reportByYear = reportByYear($_GET['year']);
                                $i = 0;

                                if (empty($reportByYear)) { ?>
                                    <h4 class="subtitle">Aucune consigne a été définie</h4>
                                <?php } else {
                                    while (isset($reportByYear[$i])) { ?>
                                        <li class="report">
                                            <input type="checkbox" name="deleteReport-<?= $i ?>">
                                            <p class="subtitle info"><?= $reportByYear[$i]['title'] ?></p> </br>
                                            <p class="info">Catégorie : <?=  $reportByYear[$i]['type'] ?></p> </br>
                                            <p class="info">Description : <?= $reportByYear[$i]['description'] ?></p> </br>
                                            <p class="info">DeadLine : <?= $reportByYear[$i]['deadLine'] ?></p> </br>
                                        </li>
                                    <?php    $i++;
                                    }
                                }
                            ?>
                            <input type="submit" name="formDeleteReport" id="formDeleteReport" value="Supprimer">
                        </form>
                    </div>
                <?php } ?>
            </div>
            <div class="addReport">
                <h3 class="title">Ajouter une demande</h3>
                <form action="" method="post">
                    <div class="inputBox">
                        <span>Titre : </span>
                        <input type="text" name="titleReport" id="titleReport" placeholder="Titre de la demande">
                    </div>
                    <div class="inputBox">
                        <div class="inputElement">
                            <input type="checkbox" name="PST-2"> <span> PST 2A </span>
                        </div>
                        <div class="inputElement">
                            <input type="checkbox" name="PST-3"> <span> PST 3A </span>
                        </div>
                        <div class="inputElement">
                            <input type="checkbox" name="PST-4"> <span> PST 4A </span>
                        </div>
                        <div class="inputElement">
                            <input type="checkbox" name="PST-5"> <span> PST 5A </span>
                        </div>
                    </div>
                    <div class="inputBox">
                        <span>Catégorie : </span>
                        <select name="typeReport" id="typeReport" required>
                            <option value="affiche">Affiche</option>
                            <option value="reunion">Réunion</option>
                            <option value="composant">Composants</option>
                            <option value="rapport">Rapport</option>
                            <option value="presentation">Présentation</option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>Description : </span>
                        <textarea name="descriptionReport" id="descriptionReport" placeholder="Description de la demande" required></textarea>
                    </div>
                    <div class="inputBox">
                        <span>DeadLine : </span>
                        <input type="date" name="deadLineReport" id="deadLineReport" required>
                    </div>
                    <input type="submit" name="formAddReport" id="formAddReport" value="Valider">
                </form>
            </div>
    <?php }
    } else { ?>
        <div class="default">
            <a href="ordersPST.php?show=progress"    class="bigChoice btnLeft">Progression</a>
            <a href="ordersPST.php?show=reportFiles" class="bigChoice btnRight">Fichiers Demandés</a>
        </div>
    <?php }
 ?>

<?php
    include '../../../../src/php/include/projectComposant/aboutOrder.php';
?>

<?php
    include '../../../../src/php/composantPage/footer.php';
    }
 ?>

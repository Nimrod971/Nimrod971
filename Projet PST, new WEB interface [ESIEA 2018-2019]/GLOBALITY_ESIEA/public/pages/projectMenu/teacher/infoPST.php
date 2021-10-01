<?php
    session_start();
    if (empty($_SESSION)) {
        header("Location: ../../../../index.php");
    } else {
        $_GET['title'] = htmlspecialchars($_GET['title']);
        include '../../../../src/database/database.php';
        include '../../../../src/php/composantPage/header.php';
        include '../../../../src/php/functions/project.php';
        $project = getPSTWithName($_GET['title']);
        include '../../../../src/php/include/projectComposant/addProject.php';
        $pathToJacketOfPST = '../../../../src/data/projects/'.$project['name'].'/pictures/logo.png';
        include '../../../../src/php/composantPage/includeCSS/teacher/infoPSTCSS.php';
        $allOrders   = getAllOrders();
        $maxStep     = getMaxStep($allOrders);
        $titlesStep  = getTitleStepOrder();
        $orderByStep = array();
        for ($i = 0; $i <= $maxStep; $i++) {
            $tempOrder = orderByStepAndYear($i, $project['year']);
            array_push($orderByStep, $tempOrder);
        }
        $allActions   = getActionsByProjects($project['id']);
        $nbActions    = getSizeArray($allActions);
        $pathToReport = '../../../../src/data/projects/'.$project['name'].'/report/';
        $allReports   = scandir($pathToReport);
        // var_dump($allReports);
        $cptReport    = 2;
        while (isset($allReports[$cptReport])) {
            $cptReport++;
        }
        $cptReport-=2;
        // var_dump($allActions);
        // echo 'nbActions : '.$nbActions.'</br>';
        // var_dump($project);
?>

<script src="../../../../src/js/scroll.js" charset="utf-8"></script>
<script src="../../../../src/js/uploadFiles.js" charset="utf-8"></script>
<script src="../../../../src/js/showButton.js" charset="utf-8"></script>
<script src="../../../../src/js/progressValue.js" charset="utf-8"></script>

<a href="./followPST.php" class="returnMenu"><i class="fas fa-undo"></i></a>

<div class="banner">
    <div class="banner-content">
        <h3 class="title"><?= $project['name'] ?></h3>
        <img src="<?= $pathToJacketOfPST ?>" alt="">
        <div class="members"><?= convertIdToName($project['idProjectManager']) ?> - <?= convertIdToName($project['idMember2']) ?> - <?= convertIdToName($project['idMember3']) ?> - <?= convertIdToName($project['idMember4']) ?> - <?= convertIdToName($project['idMember5']) ?></div>
    </div>
</div>

<div class="header">
    <div class="header-content">
        <h1 class="header-title">PST <?= $project['year'] ?>A <blue style="text-transform: none;"><?= $_GET['title'] ?></blue></h1>
        <nav class="header-menu">
            <a href="#progress" class="link">Progression</a>
            <a href="#files"    class="link">Fichiers</a>
            <a href="#events"   class="link">Evènements</a>
            <a href="#mark"     class="link">Note</a>
        </nav>
    </div>
</div>

<style media="screen">
    <?php for ($i = 0; $i < $nbActions; $i++) { ?>
        #action<?= $i ?>:checked ~ #slide<?= $i ?> {
            z-index: 999;
            animation: scroll 1s ease-in-out;
        }
    	#action<?= $i ?>:checked  ~  #slideNav #dot<?= $i ?> {
            background-color: rgba(255,255,255,.9);
        }
    <?php } ?>

    @keyframes loadingBar {
    	0% {
    		width: 0;
    	}
    	100% {
        	width: <?= $project['step']/$maxStep * 100?>%;
    	}
    }
</style>

<script type="text/javascript">
    var i;

    for (i = 0; i < <?= $project['step']/$maxStep ?>*100) {
        document.getElemementByClass('progressValue')
    }
</script>

<div class="progress" id="progress">
    <h4 class="title">Progression</h4>
    <div class="progressBar"></div>
    <div class="progressValue"><?= $project['step']/$maxStep * 100 ?>%</div>
    <?php if (isset($orderByStep[$project['year']][0]['titleStep'])) { ?>
        <div class="progressBar completed" style="width: <?= $project['step']/$maxStep * 100?>%"></div>
        <?php if ($project['step'] != 5) { ?>
            <p class="descriptionStep">Projet à l'étape <?= $project['step'] ?> : <?= $titlesStep[$project['step']]; ?></p>
        <?php } else { ?>
            <p class="descriptionStep"><blue style="text-transform: uppercase;">Projet terminé</blue></p>
        <?php } ?>
    <?php } ?>
    <div class="lastActions">
        <h4 class="title">Les dernières actions</h4>
        <div class="slider">
            <!-- OK POUR LES INPUT ! -->
            <?php
            if ($nbActions > 0) {
                for ($i = 0; $i < $nbActions; $i++) { ?>
                    <input type="radio" name="action" id="action<?= $i ?>" style="display: none" <?php if ($i == 0) echo 'checked';?>>
                    <div class="slide" id="slide<?= $i ?>">
                        <h5 class="subtitle"><?= $allActions[$i]['title'] ?> by <?= convertIdToName($allActions[$i]['idAuthor']) ?></h5>
                        <p class="description"><?= $allActions[$i]['description'] ?></p>

                        <label for="action<?= ($i - 1)%$nbActions ?>" class="pre"><span><</span></label>
                        <label for="action<?= ($i + 1)%$nbActions ?>" class="nxt"><span>></span></label>
                    </div>
                <?php } ?>

                <div id="slideNav">
                    <?php
                    for ($i = 0; $i < $nbActions; $i++) { ?>
                        <label for="action<?= $i ?>" class="dots" id="dot<?= $i ?>"></label>
                    <?php } ?>
            	</div>
            <?php } else { ?>
                <div class="slide">
                    <p class="description">Aucune action</p>
                </div>
            <?php } ?>

        </div>
    </div>
</div>

<script type="text/javascript">
    progressValue('.progressValue', <?= $project['step']/$maxStep * 100 ?>, <?= ($maxStep / $project['step']) * 30 ?>);
</script>

<div class="files" id="files">
    <h4 class="title">Fichiers</h4>
    <ul class="list">
        <?php
            if ($cptReport == 0)  {
                echo '<p class="information">Aucun document disponible </br></p>';
            } else {
                for($i = 2; $i <= $cptReport+1; $i++) {
                    printElement($pathToReport, $allReports[$i]);
                }
            }
         ?>
    </ul>
</div>

<?php include '../../../../src/php/include/projectComposant/getDatesProject.php'; ?>
<?php
    global $dateProject;
    global $deadLineGLB;
?>

<div class="events" id="events">
    <h4 class="title">Evènements à venir</h4>
        <?php if (empty($dateProject) && empty($deadLineGLB)) { ?>
            <p class="description">Aucun évènement à venir lié au projet <?= $project['name']; ?></p>
        <?php } else { ?>
            <ul class="list">
                <?php
                    $i = 0;
                    while (isset($deadLineGLB[$i])) { ?>
                        <li>
                            <h6 class="subinformation"><cat style="color: red;">Titre :</cat> <?= $deadLineGLB[$i]['titleStep'] ?></h6>
                            <h6 class="subinformation"><cat style="color: red;">Description :</cat> <?= $deadLineGLB[$i]['contentOrder']; ?> </h6>
                            <h6 class="subinformation"><cat style="color: red;">Date :</cat> <?= printDate($deadLineGLB[$i]['deadLine']); ?> </h6>
                        </li>
                    <?php $i++;
                    }
                    $i = 0;
                    while (isset($dateProject[$i])) { ?>
                        <li>
                            <h6 class="subinformation"><cat>Titre :</cat> <?= $dateProject[$i]['title'] ?></h6>
                            <h6 class="subinformation"><cat>Description :</cat> <?= $dateProject[$i]['description']; ?> </h6>
                            <h6 class="subinformation"><cat>Date :</cat> <?= printDate($dateProject[$i]['dateEvent']); ?> </h6>
                        </li>
                    <?php $i++; }
                 ?>
            </ul>
        <?php } ?>
</div>

<div class="mark" id="mark">
    <h4 class="title">Note du projet</h4>
    <form action="" method="post">
        <input type="text"   name="markProject" id="markProject" <?php if (!isset($project['mark'])) echo 'placeholder="__"'; else echo 'value="'.$project['mark'].'"'; ?>>/20
        <input type="submit" name="formMarkProject" id="formMarkProject" value="Valider">
    </form>
</div>

<form class="follow" action="" method="post">
<?php if ($project['idFollower'] == 0) { ?>
    <span>Voulez vous suivre le projet ?</span>
    <input type="submit" name="formFollowPST" value="Suivre le PST">
<?php } else if ($project['idFollower'] == $_SESSION['id']) { ?>
    <span>Voulez vous arreter de suivre le projet ?</span>
    <input class="unfollowPST" type="submit" name="formUnfollowPST" value="Arreter">
<?php } else { ?>
    <span>Projet suivie par :<blue style="font-size: 30px;"> <?= convertIdToName($project['idFollower']) ?> </blue></span>
<?php } ?>
</form>

<?php if ($_SESSION['id'] == $project['idFollower']) { ?>
    <div class="delete">
        <h4 class="title">Suppression du projet</h4>
        <form action="" method="post">
            <input type="submit" name="formDeleteProject" id="formDeleteProject" value="Supprimer le PST">
        </form>
    </div>
<?php } ?>

<?php include '../../../../src/php/include/projectComposant/addMark.php'; ?>


<?php
    include '../../../../src/php/composantPage/footer.php';
    }
 ?>

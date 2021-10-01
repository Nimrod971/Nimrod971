<?php
    session_start();
    if (empty($_SESSION)) {
        header("Location: ../../../../index.php");
    } else {
        $_GET['year'] = htmlspecialchars($_GET['year']);
        include '../../../../src/database/database.php';
        include '../../../../src/php/composantPage/header.php';
        include '../../../../src/php/composantPage/includeCSS/student/projectReport.php';

        include '../../../../src/php/functions/project.php';
        $project   = getProject($_SESSION['id'], $_GET['year']);
        include '../../../../src/php/include/projectComposant/getReports.php';
        include '../../../../src/php/include/projectComposant/navProject.php';
        include '../../../../src/php/include/projectComposant/addFiles.php';
        include '../../../../src/php/include/projectComposant/removeFiles.php';
        global $db;
 ?>

 <?php
    $reportByYear = reportByYear($project['year']);
    // var_dump($reportByYear);
  ?>

<a href="./infoProject.php?year=<?= $project['year'] ?>" class="returnMenu"><i class="fas fa-undo"></i></a>

 <div class="header" style="display: block;">
     <div class="header-content">
         <h1 class="header-title">Fichiers Demandés <blue style="text-transform: none;"><?= $project['name'] ?></blue></h1>
     </div>
 </div>

 <div class="main" style="display: grid">
     <?php
        if (!empty($reportByYear)) {
            $i = 0;
            while (isset($reportByYear[$i])) { ?>
                <div class="container">
                    <h2 class="title"><?= $reportByYear[$i]['title'] ?></h2>
                    <p class="description"><?= $reportByYear[$i]['description'] ?></p>
                    <red><p class="deadLine">DeadLine : <?= $reportByYear[$i]['deadLine'] ?></p></red>
                    <form action="#" method="post">
                        <input type="file" name="addFile" id="addFile" style="display: none;">
                        <label for="addFile">Ajouter un fichier...</label>
                        <input type="submit" name="formAddReport" value="Envoyer">
                    </form>
                </div>
                <?php
                $i++;
            }
        } else { ?>
            <div class="block">
                <div class="title">Information</div>
                <p class="description">Aucun élément demandé par le jury</p>
            </div>
        <?php }
     ?>
 </div>

 <?php
     include '../../../../src/php/composantPage/footer.php';
     }
  ?>

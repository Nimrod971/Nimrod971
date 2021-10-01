<?php
    session_start();
    if (empty($_SESSION)) {
        header("Location: ../../../../index.php");
    } else {
        $_GET['year'] = htmlspecialchars($_GET['year']);
        include '../../../../src/database/database.php';
        include '../../../../src/php/composantPage/header.php';
        include '../../../../src/php/composantPage/includeCSS/student/projectShare.php';

        include '../../../../src/php/functions/project.php';
        $project   = getProject($_SESSION['id'], $_GET['year']);
        include '../../../../src/php/include/projectComposant/navProject.php';
        include '../../../../src/php/include/projectComposant/addFiles.php';
        include '../../../../src/php/include/projectComposant/removeFiles.php';
        global $db;
 ?>

<a href="./infoProject.php?year=<?= $project['year'] ?>" class="returnMenu"><i class="fas fa-undo"></i></a>
<script src="../../../../src/js/showButton.js" charset="utf-8"></script>

 <div class="header" style="display: block">
     <div class="header-content">
         <h1 class="header-title">Partage Fichiers <blue style="text-transform: none;"><?= $project['name'] ?></blue></h1>
     </div>
     <nav class="header-menu" style="text-transform: uppercase;">
         <button onclick="showDocuments()">Documents</button>
         <button onclick="showPictures()">Images</button>
     </nav>
 </div>

<div class="showFiles" id="showFiles" style="display: grid;">
    <div class="part" id="documents" style="display: block;">
        <h3 class="title">Documents</h3>
        <form action="#" method="post">
            <input type="submit" name="formDeleteDocuments" id="formDeleteDocuments" value="" style="display: none">
            <label for="formDeleteDocuments"><i class="fas fa-trash"></i></label>
        </form>
        <ul class="list">
            <?php
                if ($cptDocuments == 0)  {
                    echo '<p class="information">Aucun documents disponible </br></p>';
                } else {
                    for($i = 2; $i <= $cptDocuments+1; $i++) {
                        printElement($pathToFiles.'files/', $allDocuments[$i]);
                    }
                }
             ?>
        </ul>
    </div>
    <div class="part" id="pictures" style="display: none;">
        <h3 class="title">Images</h3>
        <form action="#" method="post">
            <input type="submit" name="formDeletePictures" id="formDeletePictures" value="" style="display: none">
            <label for="formDeletePictures"><i class="fas fa-trash"></i></label>
        </form>
        <ul class="list">
            <?php
                if ($cptPictures == 0)  {
                    echo '<p class="information">Aucun documents disponible </br></p>';
                } else {
                    for($i = 2; $i <= $cptPictures+1; $i++) {
                        printElement($pathToFiles.'pictures/', $allPictures[$i]);
                    }
                }
             ?>
        </ul>
    </div>
</div>

<div class="uploadFiles" id="uploadFiles" style="display: block;">
    <form action="#" method="post">
        <input type="submit" name="formAddFile" id="formAddFile" value="Fichiers" style="display: none;">
        <label for="formAddFile"><i class="fas fa-upload"></i></label>
    </form>
</div>

 <?php
     include '../../../../src/php/composantPage/footer.php';
     }
  ?>

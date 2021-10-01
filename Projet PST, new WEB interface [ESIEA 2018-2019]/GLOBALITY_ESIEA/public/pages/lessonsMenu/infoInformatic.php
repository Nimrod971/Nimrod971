
<?php
    session_start();
    if (empty($_SESSION)) {
        header("Location: ../../index.php");
    } else {
    include '../../../src/php/composantPage/header.php';
    include '../../../src/database/database.php';
    include '../../../src/php/functions/project.php';
    include '../../../src/php/composantPage/includeCSS/infoLessonsCSS.php';
 ?>

 <?php
    global $db;
    $_GET['promo'] = htmlspecialchars($_GET['promo']);
    // Check que la promo existe bien
    if ($_GET['promo'] > '5') {
        $_GET['promo'] = '5';
    } else if ($_GET['promo'] < '1') {
        $_GET['promo'] = '1';
    }
  ?>

 <script src="../../../src/js/scroll.js" charset="utf-8"></script>
 <script src="../../../src/js/colorSVG.js" charset="utf-8"></script>
 <a href="../lessons.php" class="returnMenu"><i class="fas fa-undo"></i></a>

  <div class="header" style="display: block;">
      <div class="header-content">
          <a href="#top" class="header-title">Code <?= $_GET['promo'] ?>A <blue>ESIEA</blue></a>
          <nav class="header-menu">
              <a href="#lessons" class="link">Leçons</a>
              <a href="#works" class="link">Travails</a>
              <a href="#projects" class="link">Projets</a>
              <a href="#perso" class="link">Personnels</a>
          </nav>
      </div>
  </div>

  <div id='top'></div>

  <?php
  if (is_dir('../../../src/data/class/'.$_SESSION['username'].'/')) {
      include '../../../src/php/include/lessonsComposant/info/getLessons.php';
  ?>
  <script src="../../../src/js/uploadFiles.js" charset="utf-8"></script>
  <script src="../../../src/js/showButton.js" charset="utf-8"></script>

  <div id="lessons" class="block">
      <h3 class="title">Leçons</h3>
      <div class="columns">
          <div class="column">
              <h4 class="subtitle">Premier Semestre</h4>
              <ul class="lesson-list">
                  <?php for ($i = 0; $i < $nbLessonsS1; $i++) { ?>
                  <li>
                      <a href="../../../src/data/class/<?= $_SESSION['username'] ?>/<?= $_GET['promo'] ?>/info/LessonsS1/<?= $titlesLessonsS1[$i] ?>" target="_blank"><?= shortString(printWithoutExtension($titlesLessonsS1[$i]), 30) ?></a>
                      <form action="#" method="post">
                          <input type="submit" name="deleteLessonS1-<?= $i ?>" value="Supprimer">
                      </form>
                  </li>
                  <?php } ?>
              </ul>
          </div>
          <div class="column">
              <h5 class="subtitle">Second Semestre</h5>
              <ul class="lesson-list">
                  <?php for ($i = 0; $i < $nbLessonsS2; $i++) { ?>
                  <li>
                      <a href="../../../src/data/class/<?= $_SESSION['username'] ?>/<?= $_GET['promo'] ?>/info/LessonsS2/<?= $titlesLessonsS2[$i] ?>" target="_blank"><?= shortString(printWithoutExtension($titlesLessonsS2[$i]), 30) ?></a>
                      <form action="#" method="post">
                          <input type="submit" name="deleteLessonS2-<?= $i ?>" value="Supprimer">
                      </form>
                  </li>
                  <?php } ?>
              </ul>
          </div>
      </div>
      <div class="columns">
          <div class="column">
              <form action="#" method="post" enctype="multipart/form-data" class="addLessons" style="width: 45%;">
                  <input class="inputFile" type="file" name="fileLessonS1[]" id="fileLessonS1" accept="application/pdf" multiple="" style="display: none;">
                  <label for="fileLessonS1">
                      <span id="span-fileLessonS1">Selectionner</span>
                  </label>
                  <input type="submit" name="formAddLessonS1" id="formAddLessonS1" value="Ajouter">
              </form>
                  <form action="#" method="post" enctype="multipart/form-data" class="deleteLessons" style="width: 45%; float: right;">
                      <input type="submit" name="formDeleteLessonS1" id="formDeleteLessonS1" value="Supprimer Cours S1">
                  </form>
          </div>
          <div class="column">
              <form action="#" method="post" enctype="multipart/form-data" class="addLessons" style="width: 45%;">
                  <input class="inputFile" type="file" name="fileLessonS2[]" id="fileLessonS2" accept="application/pdf" multiple="" style="display: none;">
                  <label for="fileLessonS2">
                      <span id="span-fileLessonS2">Selectionner</span>
                  </label>
                  <input type="submit" name="formAddLessonS2" id="formAddLessonS2" value="Ajouter">
              </form>
                  <form action="#" method="post" enctype="multipart/form-data" class="deleteLessons" style="width: 45%; float: right;">
                      <input type="submit" name="formDeleteLessonS2" id="formDeleteLessonS2" value="Supprimer Cours S2">
                  </form>
          </div>
      </div>
  </div>


  <?php include '../../../src/php/include/lessonsComposant/info/uploadLocalLessons.php'; ?>
  <?php include '../../../src/php/include/lessonsComposant/info/deleteLesson.php'; ?>
  <?php include '../../../src/php/include/lessonsComposant/info/getLink.php'; ?>
  <?php include '../../../src/php/include/lessonsComposant/info/deleteLink.php'; ?>

  <div id="works" class="block">
      <h3 class="title">Travails</h3>
      <div class="columns">
          <div class="colum">
              <h5 class="subtitle">Premier Semestre</h5>
              <div class="works">
                  <ul class="td-list">
                      <?php for ($i = 0; $i < $nbTDS1; $i++) { ?>
                      <li><a href="../../../src/data/class/<?= $_SESSION['username'] ?>/<?= $_GET['promo'] ?>/info/TDS1/<?= $titlesTDS1[$i] ?>" target="_blank"><?= printWithoutExtension($titlesTDS1[$i]) ?></a></li>
                      <?php } ?>
                  </ul>
                  <ul class="tp-list">
                      <?php for ($i = 0; $i < $nbTPS1; $i++) { ?>
                      <li><a href="../../../src/data/class/<?= $_SESSION['username'] ?>/<?= $_GET['promo'] ?>/info/TPS1/<?= $titlesTPS1[$i] ?>" target="_blank"><?= printWithoutExtension($titlesTPS1[$i]) ?></a></li>
                      <?php } ?>
                  </ul>
              </div>
          </div>
          <div class="colum">
              <h5 class="subtitle">Second Semestre</h5>
              <div class="works">
                  <ul class="td-list">
                      <?php for ($i = 0; $i < $nbTDS2; $i++) { ?>
                      <li><a href="../../../src/data/class/<?= $_SESSION['username'] ?>/<?= $_GET['promo'] ?>/info/TDS2/<?= $titlesTDS2[$i] ?>" target="_blank"><?= printWithoutExtension($titlesTDS2[$i]) ?></a></li>
                      <?php } ?>
                  </ul>
                  <ul class="tp-list">
                      <?php for ($i = 0; $i < $nbTPS2; $i++) { ?>
                      <li><a href="../../../src/data/class/<?= $_SESSION['username'] ?>/<?= $_GET['promo'] ?>/info/TPS2/<?= $titlesTPS2[$i] ?>" target="_blank"><?= printWithoutExtension($titlesTPS2[$i]) ?></a></li>
                      <?php } ?>
                  </ul>
              </div>
          </div>
      </div>
      <div class="columns">
          <div class="colum">
              <div class="works">
                  <ul class="td-list">
                      <form action="#" method="post" enctype="multipart/form-data" class="addLessons">
                          <input class="inputFile" type="file" name="fileTDS1[]" id="fileTDS1" accept="application/pdf" multiple="" style="display: none;">
                          <label for="fileTDS1">
                              <span id="span-fileTDS1">TDS1</span>
                          </label>
                          <input type="submit" name="formAddTDS1" id="formAddTDS1">
                      </form>
                          <form action="#" method="post" enctype="multipart/form-data" class="deleteLessons posWork">
                              <input type="submit" name="formDeleteTDS1" id="formDeleteTDS1" value="Supprimer TDS1" style="margin-top: 20px;">
                          </form>
                  </ul>
                  <ul class="tp-list">
                      <form action="#" method="post" enctype="multipart/form-data" class="addLessons">
                          <input class="inputFile" type="file" name="fileTPS1[]" id="fileTPS1" accept="application/pdf" multiple="" style="display: none;">
                          <label for="fileTPS1">
                              <span id="span-fileTPS1">TPS1</span>
                          </label>
                          <input type="submit" name="formAddTPS1" id="formAddTPS1">
                      </form>
                      <form action="#" method="post" enctype="multipart/form-data" class="deleteLessons posWork">
                          <input type="submit" name="formDeleteTPS1" id="formDeleteTPS1" value="Supprimer TPS1" style="margin-top: 20px;">
                      </form>
                  </ul>
              </div>
          </div>
          <div class="colum">
              <div class="works">
                  <ul class="td-list">
                      <form action="#" method="post" enctype="multipart/form-data" class="addLessons">
                          <input class="inputFile" type="file" name="fileTDS2[]" id="fileTDS2" accept="application/pdf" multiple="" style="display: none;">
                          <label for="fileTDS2">
                              <span id="span-fileTDS2">TDS2</span>
                          </label>
                          <input type="submit" name="formAddTDS2" id="formAddTDS2">
                      </form>
                      <form action="#" method="post" enctype="multipart/form-data" class="deleteLessons posWork">
                          <input type="submit" name="formDeleteTDS2" id="formDeleteTDS2" value="Supprimer TDS2" style="margin-top: 20px;">
                      </form>
                  </ul>
                  <ul class="tp-list">
                      <form action="#" method="post" enctype="multipart/form-data" class="addLessons">
                          <input class="inputFile" type="file" name="fileTPS2[]" id="fileTPS2" accept="application/pdf" multiple="" style="display: none;">
                          <label for="fileTPS2">
                              <span id="span-fileTPS2">TPS2</span>
                          </label>
                          <input type="submit" name="formAddTPS2" id="formAddTPS2">
                      </form>
                      <form action="#" method="post" enctype="multipart/form-data" class="deleteLessons posWork">
                          <input type="submit" name="formDeleteTPS2" id="formDeleteTPS2" value="Supprimer TPS2" style="margin-top: 20px;">
                      </form>
                  </ul>
              </div>
          </div>
      </div>
  </div>

  <div id="projects" class="block">
      <h3 class="title">Projets</h3>
      <?php for ($i = 0; $i < $nbProject; $i++) { ?>
          <div class="project-content">
              <nav class="project-header">
                  <h4 class="project-name"><?= printWithoutExtension($titlesProjects[$i]) ?></h4>
                  <div>
                      <a href="../../../src/data/class/<?= $_SESSION['username'] ?>/<?= $_GET['promo'] ?>/info/Projects/<?= $titlesProjects[$i] ?>" class="project-btn" download >Download</a>
                  </div>
              </nav>
          </div>
      <?php } ?>
      <form action="#" method="post" enctype="multipart/form-data" class="addLessons" style="width: 25%; margin-left: 20%; margin-bottom: 50px;">
          <input class="inputFile" type="file" name="fileProjects[]" id="fileProjects" accept="application/zip" multiple="" style="display: none;">
          <label for="fileProjects">
              <span id="span-fileProjects">Ajouter un projet</span>
          </label>
          <input type="submit" name="formAddProjects" id="formAddProjects">
      </form>
      <form action="#" method="post" enctype="multipart/form-data" class="deleteLessons posWork" style="width: 25%; margin-right: 20%; margin-bottom: 50px; float: right; transform: translateX(0px);">
          <input type="submit" name="formDeleteProjects" id="formDeleteProjects" value="Supprimer Projets" style="margin-top: 50px;">
      </form>
  </div>

  <div id="perso" class="block" style="margin-top: 150px;">
      <h3 class="title">Fichiers et Liens personnels</h3>
      <div class="columns">
          <div class="column">
              <h4 class="subtitle">Fichiers</h4>
              <ul class="lesson-list">
                  <?php for ($i = 0; $i < $nbFilePerso; $i++) { ?>
                  <li>
                      <a href="../../../src/data/class/<?= $_SESSION['username'] ?>/<?= $_GET['promo'] ?>/info/filePerso/<?= $titlesFilePerso[$i] ?>" target="_blank"><?= printWithoutExtension($titlesFilePerso[$i]) ?></a>
                      <form action="#" method="post">
                          <input type="submit" name="formDeleteFile-<?= $i ?>" value="Supprimer">
                      </form>
                  </li>
                  <?php } ?>
              </ul>
          </div>
          <div class="column">
              <h5 class="subtitle">Liens</h5>
              <ul class="lesson-list">
                  <?php for ($i = 0; $i < $nbLinkPerso; $i++) { ?>
                  <li>
                      <a href="<?= $linkURL[$i] ?>" target="_blank"><?= $titlesLinkPerso[$i] ?></a>
                      <form action="#" method="post">
                          <input type="submit" name="formDeleteLink-<?= $i ?>" value="Supprimer">
                      </form>
                  </li>
                  <?php } ?>
              </ul>
          </div>
      </div>
      <div class="columns">
          <div class="column">
              <form action="#" method="post" enctype="multipart/form-data" class="addLessons" style="width: 50%; margin-left: 25%; margin-bottom: 50px;">
                  <input class="inputFile" type="file" name="filePerso[]" id="filePerso" accept="application/pdf" multiple="" style="display: none;">
                  <label for="filePerso">
                      <span id="span-filePerso">Ajouter fichier(s)</span>
                  </label>
                  <input type="submit" name="formAddPerso" id="formAddPerso">
              </form>
          </div>
          <div class="column">
             <button type="button" onclick="showAddLink()" name="addLink" style="width: 50%; margin-left: 50%; margin-bottom: 50px;">Ajouter Lien(s)</button>
          </div>
      </div>
  </div>

  <div class="addLink" id="addLink" style="display: none;">
      <button type="button" onclick="showAddLink()" name="button">+</button>
      <h3 class="title">Ajouter un lien</h3>
      <form action="#" method="post">
          <input type="text"   name="linkTitle"   id="linkTitle"   placeholder="Ajouter le titre">
          <input type="text"   name="linkCopy"    id="linkCopy"    placeholder="Copier le lien">
          <input type="submit" name="formAddLink" id="formAddLink" value="Ajouter">
      </form>
  </div>
  <?php include '../../../src/php/include/lessonsComposant/info/uploadLink.php'; ?>
  <?php
} else { ?>
    <div class="alertMessage">
        <h3 class="title">Problème...</h3>
        <p class="message">
            Votre dossier de cours <red>n'existe pas</red> (encore). </br>
            Veuillez créer votre dosser dans les paramètres section <red>"fonctionnalité"</red> en cliquant sur <red>"Activer les cours"</red></br>
            <a href="../settings.php">Paramètres</a>
        </p>
    </div>
<?php } ?>

 <?php
    include '../../../src/php/composantPage/footer.php';
    }
?>

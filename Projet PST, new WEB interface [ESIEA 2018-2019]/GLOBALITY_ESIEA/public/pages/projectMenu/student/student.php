<?php
    include '../../src/php/functions/project.php';
    include '../../src/php/include/projectComposant/getProjects.php';
?>

<script src="../../src/js/showButton.js" charset="utf-8"></script>

<div class="selectProject" id="searchProject" style="display: block;">
    <div class="column">
        <?php for ($i = 2; $i <= 3; $i++) { ?>
            <?php if (isset($titleOfPST[$i])) { ?>
                <a href="projectMenu/student/infoProject.php?year=<?= $i ?>" class="project">
                    <!-- PROJET PST 2A -->
                    <div class="jacket">
                        <?php if (file_exists($pathToJacketOfPST[$i])) { ?>
                            <img src="<?= $pathToJacketOfPST[$i] ?>" class="unknow" alt="?">
                        <?php } else { ?>
                            <p class="unknow">?</p>
                        <?php } ?>
                    </div>
                    <div class="informations">
                        <h4 class="title"><?= $titleOfPST[$i] ?></h4>
                        <p class="mark"><?= $markOfPST[$i] ?> / 20</p>
                        <div class="leftSide">
                            <h5 class="subtitle">Suiveur :</h5>
                            <p class="follower"><?= $followerProjectOfPST[$i] ?></p>
                            <p class="members">
                                <h5 class="subtitle">Membres :</h5>
                                <p class="member"><?= $projectManagerOfPST[$i] ?></p>
                                <p class="member"><?= $member2OfPST[$i] ?></p>
                                <p class="member"><?= $member3OfPST[$i] ?></p>
                                <p class="member"><?= $member4OfPST[$i] ?></p>
                                <p class="member"><?= $member5OfPST[$i] ?></p>
                            </p>
                        </div>
                        <div class="rightSide">
                            <h5 class="subtitle">Descritpion :</h5>
                            <p class="description"><?= $descriptionOfPST[$i] ?></p>
                            <h5 class="subtitle">Type :</h5>
                            <p class="description"><?= $typeOfPST[$i] ?></p>
                        </div>
                    </div>
                </a>
            <?php } else {?>
                <button class="project btn-project" onclick="showAddPST<?= $i ?>()"><add>+</add> <txt>PST <?= $i ?>A</txt></i></button>
            <?php } ?>
        <?php } ?>
    </div>
    <div class="column">
        <?php for ($i = 4; $i <= 5; $i++) { ?>
            <?php if (isset($titleOfPST[$i])) { ?>
                <a href="projectMenu/student/infoProject.php?year=<?= $i ?>" class="project">
                <!-- PROJET PST 2A -->
                    <div class="jacket">
                        <?php if (file_exists($pathToJacketOfPST[$i])) { ?>
                            <img src="<?= $pathToJacketOfPST[$i] ?>" class="unknow" alt="?">
                        <?php } else { ?>
                            <p class="unknow">?</p>
                        <?php } ?>
                    </div>
                    <div class="informations">
                        <h4 class="title"><?= $titleOfPST[$i] ?></h4>
                        <p class="mark"><?= $markOfPST[$i] ?> / 20</p>
                        <div class="leftSide">
                            <h5 class="subtitle">Suiveur :</h5>
                            <p class="follower"><?= $followerProjectOfPST[$i] ?></p>
                            <p class="members">
                                <h5 class="subtitle">Membres :</h5>
                                <p class="member"><?= $projectManagerOfPST[$i] ?></p>
                                <p class="member"><?= $member2OfPST[$i] ?></p>
                                <p class="member"><?= $member3OfPST[$i] ?></p>
                                <p class="member"><?= $member4OfPST[$i] ?></p>
                                <p class="member"><?= $member5OfPST[$i] ?></p>
                            </p>
                        </div>
                        <div class="rightSide">
                            <h5 class="subtitle">Descritpion :</h5>
                            <p class="description"><?= $descriptionOfPST[$i] ?></p>
                            <h5 class="subtitle">Type :</h5>
                            <p class="description"><?= $typeOfPST[$i] ?></p>
                        </div>
                    </div>
                </a>
            <?php } else {?>
                <button class="project btn-project" onclick="showAddPST<?= $i ?>()"><add>+</add> <txt>PST <?= $i ?>A</txt></i></button>
            <?php } ?>
        <?php } ?>
    </div>
</div>

<?php for ($i = 2; $i <= 5; $i++) { ?>
    <div class="addProject" id="addPST<?= $i ?>" style="display: none;">
        <button class="clsMenu" type="button" onclick="showAddPST<?= $i ?>()">+</button>
        <h3 class="title">Inscription PST <?= $i ?>A</h3>
        <form action="#" method="post">
            <input type="text"   name="titleProject"    placeholder="Nom du projet"     required>
            <input type="text"   name="projectManager"  placeholder="Chef de projet"    required>
            <input type="text"   name="member2"         placeholder="Membre 2">
            <input type="text"   name="member3"         placeholder="Membre 3">
            <input type="text"   name="member4"         placeholder="Membre 4">
            <input type="text"   name="member5"         placeholder="Membre 5">
            <select class="catProject" name="catProject" style="height: 40px;" required>
                <option value="robotique">Robotique</option>
                <option value="domotique et environnement">Domotique et Environnement</option>
                <option value="jeux vidéo et développement d'application">Jeux Vidéo et développement d'application</option>
                <option value="algorithme et programmation">Algorithme et programmation</option>
            </select>
            <textarea name="description" rows="4" cols="20"></textarea>
            <input type="submit" name="formAddPST<?= $i ?>"  value="Confirmer le projet">
        </form>
    </div>
<?php } ?>

<?php include '../../src/php/include/projectComposant/addProject.php'; ?>

<?php
    session_start();
    if (empty($_SESSION)) {
        header("Location: ../index.php");
    } else {
    include '../../../src/database/database.php';
    include '../../../src/php/composantPage/header.php';
    include '../../../src/php/functions/project.php';
    include '../../../src/php/composantPage/includeCSS/infoEvent.php';
    $_GET['date'] = htmlspecialchars($_GET['date']);
?>

<script src="../../../src/js/showButton.js" charset="utf-8"></script>
<script src="../../../src/js/persoAlert.js" charset="utf-8"></script>
<script src="../../../src/library/jQuery.js" charset="utf-8"></script>
<a href="../calendar.php" class="returnMenu"><i class="fas fa-undo"></i></a>

<div class="header">
    <div class="header-content">
        <h1 class="header-title"><blue>Evenement</blue> du <?= date('d M Y', strtotime($_GET['date']))?></h1>
    </div>
</div>

<?php include '../../../src/php/include/calendarComposant/calendarMenu/getEvent.php'; ?>
<?php
    global $eventDate;
    global $cptEvent;
    global $deadLineReport;
    global $cptDeadLineReport;
    global $deadLineOrder;
    global $cptDeadLineOrder;
    global $datesProjectMeeting;
    global $cptProjectMeeting;
 ?>

 <div class="blockLink" style="display: block;">
     <h3 class="title">Selectionner votre évènement</h3>
     <div class="listLink" style="<?php if ($cptEventPerDay >= 8) echo 'overflow-y: scroll;'; ?>">
         <ul>
             <?php
                 for ($i = 0; $i < $cptEventPerDay; $i++) {
                     if ($eventDate[$i][3] == 'exam') $typeBis = 'Examen';
                     else if ($eventDate[$i][3] == 'work') $typeBis = 'Travail';
                     else if ($eventDate[$i][3] == 'project') $typeBis = 'Projet';
                     else if ($eventDate[$i][3] == 'meeting') $typeBis = 'Réunion PST';
                     else if ($eventDate[$i][3] == 'perso') $typeBis = 'Personnel';
                     else if ($eventDate[$i][3] == 'other') $typeBis = 'Autre';
                     if ($eventDate[$i][1] == $_GET['date']) {
                         $eventName = shortString($eventDate[$i][0], 20);
                         echo '<li><a href="infoEvent.php?date='.$_GET['date'].'&title='.$eventDate[$i][0].'&description='.$eventDate[$i][2].'&dateEvent='.$eventDate[$i][1].'&type='.$eventDate[$i][3].'&id='.$eventDate[$i][4].'">'.$eventName.'</a><aside>'.$typeBis.'</aside></li>';
                     }
                 }
                 for ($i = 0; $i < $cptDeadLineOrder; $i++) {
                     if ($deadLineOrder[$i]['deadLine'] == $_GET['date']) {
                         $eventName = shortString($deadLineOrder[$i]['titleStep'], 20);
                         echo '<li><a href="infoEvent.php?date='.$_GET['date'].'&title='.$deadLineOrder[$i]['titleStep'].'&description='.$deadLineOrder[$i]['contentOrder'].'&dateEvent='.$deadLineOrder[$i]['deadLine'].'&type=projectDeadLine&id='.$deadLineOrder[$i]['id'].'">'.$eventName.'</a><aside>DeadLine Projet</aside></li>';
                     }
                 }
                 for ($i = 0; $i < $cptDeadLineReport; $i++) {
                     if ($deadLineReport[$i]['deadLine'] == $_GET['date']) {
                         $eventName = shortString($deadLineReport[$i]['title'], 20);
                         echo '<li><a href="infoEvent.php?date='.$_GET['date'].'&title='.$deadLineReport[$i]['title'].'&description='.$deadLineReport[$i]['description'].'&dateEvent='.$deadLineReport[$i]['deadLine'].'&type=projectDeadLine&id='.$deadLineReport[$i]['id'].'">'.$eventName.'</a><aside>DeadLine Projet</aside></li>';
                     }
                 }
                 if ($_SESSION['promo'] == 0) {
                     for ($i = 0; $i < $cptProjectMeeting; $i++) {
                         if ($datesProjectMeeting[$i]['dateEvent'] == $_GET['date']) {
                             $eventName = shortString($datesProjectMeeting[$i]['title'], 20);
                             echo '<li><a href="infoEvent.php?date='.$_GET['date'].'&title='.$datesProjectMeeting[$i]['title'].'&description='.$datesProjectMeeting[$i]['description'].'&dateEvent='.$datesProjectMeeting[$i]['dateEvent'].'&type=meeting&id='.$datesProjectMeeting[$i]['id'].'">'.$eventName.'</a><aside>Réunion</aside></li>';
                         }
                     }
                 }
             ?>
         </ul>
    </div>
    <button class="addNewEvent" onclick="showNewLocalEvent()">Ajouter un évènement</button>
 </div>

 <div class="newEvent" id ="newLocalEvent" style="display: none; opacity: 0;">
     <button onclick="showNewLocalEvent()" class="clsMenu">+</button>
     <h3 class="title">Ajouter un évènement</h3>
     <form method="post" action="" class="addEvent">
         <div class="inputBox">
             <input type="text" name="titleEvent" id="titleEvent" required placeholder="Titre">
         </div>
         <div class="inputBox">
             <h5 class="subtitle">Choisir un jour</h5>
             <input type="date" name="getDate" id="getDate" value="<?= $_GET['date'] ?>" required>
         </div>
         <div class="inputBox">
             <h5 class="subtitle">Choisir le type</h5>
             <select class="selectType" name="selectType" id="selectType" style="margin-left: 40%;">
                 <option value="exam">Examen</option>
                 <option value="work">Travail</option>
                 <option value="project">Projet</option>
                 <option value="perso">Personnel</option>
                 <option value="other">Autre</option>
             </select>
         </div>
         <div class="inputBox" style="width: 80%; margin-left: 30px;">
             <textarea name="descriptionEvent" id="descriptionEvent" rows="5" cols="20" placeholder="description"></textarea>
         </div>
         <input class="btn" type="submit" value="CONFIRMER" name="formAddEvent" id="formAddEvent">
     </form>
 </div>

 <?php include '../../../src/php/include/calendarComposant/getNewEvent.php'; ?>

<?php
    if (isset($_GET['id'])) {
        $event   = getInfoEvent($_GET['id']);
        $project = getPSTForUser($event['idUser']);
        $project = $project->fetch();
        // var_dump($event);
        // var_dump($project);
    }
 ?>

<?php if (!empty($_GET['title'])) {
    $_GET['title'] = htmlspecialchars($_GET['title']);
    $_GET['type']  = htmlspecialchars($_GET['type']);?>
<div class="block" id="infoEvent">
    <div class="title">Information de l'évènement</div>
    <div class="information">
        <h3 class="subtitle">Titre de l'évènement : </h3>
        <output> <?= $_GET['title'] ?> </output>
    </div>
    <?php if ($_SESSION['promo'] == 0) { ?>
        <div class="information">
            <h3 class="subtitle">Projet : </h3>
            <output> <?=  $project['name'] ?> </output>
        </div>
    <?php } ?>
    <div class="information">
        <h3 class="subtitle">Date de l'évènement : </h3>
        <?php
        $date = strtotime($_GET['dateEvent']); ?>
        <output> <?= date('d M Y', $date) ?></output>
    </div>
    <div class="information">
        <h3 class="subtitle">Type d'évènement : </h3>
        <?php
            if ($_GET['type'] == 'exam') $type = 'Examen';
            else if ($_GET['type'] == 'work') $type = 'Travail';
            else if ($_GET['type'] == 'project') $type = "Projet";
            else if ($_GET['type'] == 'perso') $type = 'Personnel';
            else if ($_GET['type'] == 'other') $type = 'Autre';
            else if ($_GET['type'] == 'projectDeadLine') $type = 'DeadLine Projet';
            else if ($_GET['type'] == 'meeting') $type = 'Réunion';
            else $type = "Erreur";
         ?>
        <output> <?= $type ?></output>
    </div>
    <div class="information">
        <h3 class="subtitle">Description de l'évènement : </h3> </br>
        <output style="margin: 0;"> <?= $_GET['description'] ?></output>
    </div>
    <button class="btn-modifEvent" id="btn-modifEvent" onclick="showModifEvent()">Modifier</button>
    <form action="#" method="post">
        <input type="submit" name="btnDeleteEvent" id="btnDeleteEvent" value="SUPPRIMER" style="left: 70%; background-color: red; animation: none;">
    </form>
</div>
<?php } ?>

<?php include '../../../src/php/include/calendarComposant/calendarMenu/deleteEvent.php'; ?>

<div class="modifEvent" id="blockModif" style="display: none; opacity: 0;">
    <button class="clsMenu" onclick="showModifEvent()" style="top: -20px; right: 12px;">+</button>
    <h3 class="title">Modification Examen</h3>
    <form class="modifEvent" action="#" method="post">
        <div class="inputBox">
            <input type="text" name="titleEvent" id="titleEvent" required style="width: 95%;" value="<?= $_GET['title'] ?>">
        </div>
        <div class="inputBox" style="float: left; margin: 20px;">
            <h5 class="subtitle">Choisir un jour</h5>
            <input type="date" name="getDate" id="getDate" required value="<?= $_GET['date'] ?>" style="width: 100%;">
        </div>
        <div class="inputBox" style="float: right; margin: 30px;">
            <h5 class="subtitle">Choisir le type</h5>
            <select class="selectType" name="selectType" id="selectType">
                <option value="exam">Examen</option>
                <option value="work">Travail</option>
                <option value="project">Projet</option>
                <option value="meeting">Réunion PST</option>
                <option value="perso">Personnel</option>
                <option value="other">Autre</option>
            </select>
        </div>
        <div class="inputBox" style="width: 80%; margin-left: 30px;">
            <textarea name="descriptionEvent" id="descriptionEvent"><?= $_GET['description'] ?></textarea>
        </div>
        <input class="btn" type="submit" value="CONFIRMER" name="formModifEvent" id="formModifEvent">
        <!-- <input class="btn" type="submit" value="SUPPRIMER" name="formDeleteEvent" id="formDeleteEvent"> -->
    </form>
</div>

<?php include '../../../src/php/include/calendarComposant/calendarMenu/modifEvent.php'; ?>


<?php
    include '../../../src/php/composantPage/footer.php';
    }
?>

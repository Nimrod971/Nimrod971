<?php
    session_start();
    if (empty($_SESSION)) {
        header("Location: ../index.php");
    } else {
    include '../../src/database/database.php';
    include '../../src/php/composantPage/header.php';
    include '../../src/php/composantPage/includeCSS/calendarCSS.php';
    include '../../src/php/functions/project.php';
    include '../../src/php/include/projectComposant/getDatesProject.php';
 ?>

 <a href="home.php" class="returnMenu"><i class="fas fa-undo"></i></a>
 <div id="alertPanel" ></div>

 <div class="header">
     <div class="header-content">
         <h1 class="header-title">Agenda <blue>ESIEA</blue></h1>
     </div>
 </div>

 <?php include '../../src/php/include/calendarComposant/buildCalendar.php'; ?>

 <script src="../../src/js/showButton.js" charset="utf-8"></script>
 <script src="../../src/js/persoAlert.js" charset="utf-8"></script>
 <div class="block" style="">
     <div class="head">
         <div class="titleHead">
             <a href="?ym=<?php echo $prev; ?>" class="date">&lt;</a>
             <button class="date" onclick="showGetDate()"><?php echo $html_title; ?></button>
             <a href= "?ym=<?php echo $next; ?>" class="date">&gt;</a>
         </div>
         <button class="addEvent" onclick="showAddEvent()">+</button>
         <a href="calendar.php" class="putToday"><i class="fas fa-circle-notch"></i></a>
     </div>
     <table class="calendrier" id="calendar">
         <tr>
             <th>Lundi</th>
             <th>Mardi</th>
             <th>Mercredi</th>
             <th>Jeudi</th>
             <th>Vendredi</th>
             <th>Samedi</th>
             <th>Dimanche</th>
         </tr>
         <?php
         foreach ($weeks as $week) {
             echo $week;
         }
         ?>
     </table>
     <div class="getDate" id="getDate" style="display: none; opacity: 0;">
         <h4 class="subtitle">Entrer la date où vous souhaitez aller :</h4>
         <form name="calendar" method="post" action="calendar.php" class="newDate">
             <div class="inputBox">
                 <input type="text" name="month" required style="width: 100%;" placeholder="Mois (entre 1 et 12)">
                 <!-- <label style="margin-left: 30px;">Mois (entre 1 et 12)</label> -->
             </div>
             <div class="inputBox" style="">
                 <input type="text" name="year" required style="width: 100%;" placeholder="Année">
                 <!-- <label style="margin-left: 30px;">Année</label> -->
             </div>
             <input class="btn" type="submit" value="CONFIRMER" style="margin-bottom: -100px;">
         </form>
     </div>
 </div>

 <div class="newEvent" id ="newEvent" style="display: none; opacity: 0;">
     <button onclick="showAddEvent()" class="clsMenu">+</button>
     <h3 class="title">Ajouter un évènement</h3>
     <form method="post" action="" class="addEvent">
         <div class="inputBox">
             <input type="text" name="titleEvent" id="titleEvent" required placeholder="Titre">
         </div>
         <div class="inputBox">
             <h5 class="subtitle">Choisir un jour</h5>
             <input type="date" name="getDate" id="getDate" required>
         </div>
         <div class="inputBox">
             <h5 class="subtitle">Choisir le type</h5>
             <select class="selectType" name="selectType" id="selectType" style="margin-left: 40%;">
                 <option value="exam">Examen</option>
                 <option value="work">Travail</option>
                 <option value="project">Projet</option>
                 <option value="meeting">Réunion PST</option>
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


<?php include '../../src/php/include/calendarComposant/getNewEvent.php'; ?>


 <?php
    include '../../src/php/composantPage/footer.php';
    }
  ?>

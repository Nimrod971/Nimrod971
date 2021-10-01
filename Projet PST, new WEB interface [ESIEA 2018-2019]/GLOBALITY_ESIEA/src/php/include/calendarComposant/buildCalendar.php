<?php
if (isset($_GET['ym'])) {
    $_GET['ym'] = htmlspecialchars($_GET['ym']);
}
if (isset($_POST['month'])) {
    $_POST['month'] = htmlspecialchars($_POST['month']);
}
if (isset($_POST['year'])) {
    $_POST['year'] = htmlspecialchars($_POST['year']);
}
date_default_timezone_set('Europe/Paris');  //definition de la zone pour le temps

if (isset($_GET['ym'])) {   // recupère l'année et le mois de la timezone
    $ym = $_GET['ym'];      // définie la variable $ym tel que $ym = "AAAA-MM"
} else if (!isset($_POST['year']) && !isset($_POST['month'])) { // si le formulaire pour aller a une date précise n'est pas rempli alors
    $ym = date('Y-m');  // définir la date a celle de la timezone
} else {    // sinon
    $askMonth = $_POST['month'];
    $askYear  = $_POST['year'];

    if ($askMonth < 1 || $askMonth > 12) {
        $askMonth = $askMonth % 12;
    }
    $ym = $askYear.'-'.$askMonth;   // définir le temps a celui demandé par le formulaire
}

$timestamp = strtotime($ym . '-01');    // convertie la chaine de caractère en temps

if ($timestamp === false) {     // Si la chaine de caratère n'est pas definie alors
    $ym = date('Y-m');          // redifiniation de $ym
    $timestamp = strtotime($ym . '-01');    // redefinition de $timestramp
}

global $db;

if ($_SESSION['promo'] == 0) {
    $PSTofFollower = getPSTForFollower($_SESSION['id']);
    $cptProjectOfFollower = getSizeArray($PSTofFollower);

    $datesProjectMeeting = array();
    $cptDateProject = 0;

    $getEventPSTSQL = "SELECT * FROM calendar WHERE type = :project AND (idUser = :id1 OR idUser = :id2 OR idUser = :id3 OR idUser = :id4 OR idUser = :id5)";
    $getEventPST = $db->prepare($getEventPSTSQL);
    for ($i = 0; $i < $cptProjectOfFollower; $i++) {
        $getEventPST->execute([
            'project' => 'meeting',
            'id1'     => $PSTofFollower[$i]['idProjectManager'],
            'id2'     => $PSTofFollower[$i]['idMember2'],
            'id3'     => $PSTofFollower[$i]['idMember3'],
            'id4'     => $PSTofFollower[$i]['idMember4'],
            'id5'     => $PSTofFollower[$i]['idMember5'],
        ]);

        if ($getEventPST) {
            while ($element = $getEventPST->fetch()) {
                array_push($datesProjectMeeting, $element);
                $cptDateProject++;
            }
        } else {
            echo 'Erreur lors du chargement des évènements de tous les projets suivie ! </br>';
        }
    }
}




// $removeCmdSQL = "TRUNCATE TABLE `calendar`";
// $removeCmd = $db->query($removeCmdSQL);
// if ($removeCmd) echo "Données supprimés !";
$checkEventSQL = "SELECT title, dateEvent, description, type FROM calendar WHERE idUser = :idUser";
$checkEvent = $db->prepare($checkEventSQL);
$checkEvent->execute(['idUser'    => $_SESSION['id']]);
$eventDate = array();
$cptEvent = 0;
while ($eventDay = $checkEvent->fetch()) {
    array_push($eventDate, $eventDay);
    $cptEvent++;
}

if ($_SESSION['promo'] != 0) {
    $checkEventOrderSQL = "SELECT step, titleStep, contentOrder, deadLine FROM orderprojects WHERE year = :yearUser";
    $checkEventOrder = $db->prepare($checkEventOrderSQL);
    $checkEventOrder->execute(['yearUser' => $_SESSION['promo']]);

    $checkEventReportSQL = "SELECT * FROM reportorders WHERE year = :yearUser";
    $checkEventReport = $db->prepare($checkEventReportSQL);
    $checkEventReport->execute(['yearUser' => $_SESSION['promo']]);
} else {
    $checkEventOrderSQL = "SELECT step, titleStep, contentOrder, deadLine FROM orderprojects WHERE year BETWEEN 2 AND 5";
    $checkEventOrder = $db->prepare($checkEventOrderSQL);
    $checkEventOrder->execute();

    $checkEventReportSQL = "SELECT * FROM reportorders WHERE year BETWEEN 2 AND 5";
    $checkEventReport = $db->prepare($checkEventReportSQL);
    $checkEventReport->execute();
}
$deadLineOrder = array();
$cptDeadLineOrder = 0;
while ($dateDeadLineOrder = $checkEventOrder->fetch()) {
    array_push($deadLineOrder, $dateDeadLineOrder);
    $cptDeadLineOrder++;
}

$deadLineReport = array();
$cptDeadLineReport = 0;
while ($dateDeadLineReport = $checkEventReport->fetch()) {
    array_push($deadLineReport, $dateDeadLineReport);
    $cptDeadLineReport++;
}

$today = date('Y-m-d', time()); // définition de la date actuelle

$months = array('Janvier', 'Février', 'Mars','Avril', 'Mai', 'Juin','Juillet', 'Aout', 'Septembre','Octobre', 'Novembre', 'Décembre'); // définition des mois de l'année pour affichage
$html_title = $months[date('m', $timestamp) - 1].' - '.date('Y', $timestamp);   //définition du titre du calendrier
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));    // $prev --> mois précédent
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));    // $next --> mois suivant
$day_count = date('t', $timestamp); // définition du nombre de jour pour le mois

$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 0, date('Y', $timestamp))); // Définition du jour de la semaine quand le moi commence
$weeks = array();   // Tableau qui stocke l'affichage du calendrier
$week = '';         // Chaine de caractère qui affiche le jour du mois
$week .= str_repeat('<td></td>', $str); // Ajoute dans $week un nouveu jour

for ($day = 1; $day <= $day_count; $day++, $str++) {   // Boucle qui parcours le tableau et qui affiche les éléments du calendrier
    if ($day < 10) $day = '0'.$day;
    $date = $ym . '-' . $day;

    // var_dump($deadLineProject);

    $testDateAlreadyWrite = 0;
    for ($i = 0; $i < $cptDeadLineOrder; $i++) {
        if ($date == $deadLineOrder[$i]['deadLine'] && $today != $deadLineOrder[$i] && $testDateAlreadyWrite != 1) {
            $week .= '<td style="padding: 0;">';
            $week .= '<a class="eventDay deadLineOrder" href="calendarMenu/infoEvent.php?date='.$deadLineOrder[$i]['deadLine'].'">' . $day.'</a>';
            $i = $cptDeadLineOrder;
            $testDateAlreadyWrite = 1;
        }
    }
    for ($i = 0; $i < $cptDeadLineReport; $i++) {
        if ($date == $deadLineReport[$i]['deadLine'] && $today != $deadLineReport[$i] && $testDateAlreadyWrite != 1) {
            $week .= '<td style="padding: 0;">';
            $week .= '<a class="eventDay deadLineReport" href="calendarMenu/infoEvent.php?date='.$deadLineReport[$i]['deadLine'].'">' . $day.'</a>';
            $i = $cptDeadLineReport;
            $testDateAlreadyWrite = 1;
        }
    }
    if ($_SESSION['promo'] == 0) {
        for ($i = 0; $i < $cptDateProject; $i++) {
            if ($date == $datesProjectMeeting[$i]['dateEvent'] && $today != $datesProjectMeeting[$i] && $testDateAlreadyWrite != 1) {
                $week .= '<td style="padding: 0;">';
                $week .= '<a class="eventDay meetingPST" href="calendarMenu/infoEvent.php?date='.$datesProjectMeeting[$i]['dateEvent'].'">' . $day.'</a>';
                $i = $cptDateProject;
                $testDateAlreadyWrite = 1;
            }
        }
    }
    for ($i = 0; $i < $cptEvent; $i++) {
        if ($date == $eventDate[$i][1] && $today == $date && $testDateAlreadyWrite != 1) {
            // echo $date.' is today and an event day ! </br></br>';
            $week .= '<td class="today" style="padding: 0; color: black;">';
            $week .= '<a class="eventDay" href="calendarMenu/infoEvent.php?date='.$eventDate[$i][1].'">' . $day.'</a>';
            $i = $cptEvent;
            $testDateAlreadyWrite = 1;
         }
    }
    for ($i = 0; $i < $cptEvent; $i++) {
         if ($date == $eventDate[$i][1] && $today != $eventDate[$i][1] && $testDateAlreadyWrite != 1) {
             // echo $date.' is an event day ! </br></br>';
             $week .= '<td style="padding: 0;">';
             $week .= '<a class="eventDay" href="calendarMenu/infoEvent.php?date='.$eventDate[$i][1].'">' . $day.'</a>';
             $i = $cptEvent;
             $testDateAlreadyWrite = 1;
         }
    }
    for ($i = 0; $i < $cptEvent; $i++) {
        if ($date == $today && $today != $eventDate[$i][1] && $testDateAlreadyWrite != 1){
             // echo $date.' is today ! </br></br>';
             $week .= '<td class="today" style="color: black;">'.$day;
             $i = $cptEvent;
             $testDateAlreadyWrite = 1;
         }
     }

     if ($testDateAlreadyWrite != 1 && $date == $today) {
         $week .= '<td class="today" style="color: black;">'.$day;
         $testDateAlreadyWrite = 1;
     }


    if ($today == $date) {
         // $week .= '<td class="today" style="color: black;" >' . $day;
    } else {
        $testPrintDate = 1;
        for ($i = 0; $i < $cptEvent; $i++) {
            if ($today == $date && $date == $eventDate[$i][1]) {
                $testPrintDate = 0;
            } else if ($date == $eventDate[$i][1]) {
                 $testPrintDate = 0;
            }
        }
        for ($i = 0; $i < $cptDeadLineOrder; $i++) {
            if ($today == $date && $date == $deadLineOrder[$i]['deadLine']) {
                $testPrintDate = 0;
            } else if ($date == $deadLineOrder[$i]['deadLine']) {
                 $testPrintDate = 0;
            }
        }
        for ($i = 0; $i < $cptDeadLineReport; $i++) {
            if ($today == $date && $date == $deadLineReport[$i]['deadLine']) {
                $testPrintDate = 0;
            } else if ($date == $deadLineReport[$i]['deadLine']) {
                 $testPrintDate = 0;
            }
        }
        if ($_SESSION['promo'] == 0) {
            for ($i = 0; $i < $cptDateProject; $i++) {
                if ($today == $date && $date == $datesProjectMeeting[$i]['dateEvent']) {
                    $testPrintDate = 0;
                } else if ($date == $datesProjectMeeting[$i]['dateEvent']) {
                     $testPrintDate = 0;
                }
            }
        }
        if ($testPrintDate != 0) {
            $week .= '<td>' . $day;
        }
    }
    $week .= '</td>';
    if ($str % 7 == 6 || $day == $day_count) {
        if ($day == $day_count) {
            $week .= str_repeat('<td></td>', 6 - ($str % 7));
        }

        $weeks[] = '<tr>' . $week . '</tr>';
        $week = '';
    }
}
 ?>

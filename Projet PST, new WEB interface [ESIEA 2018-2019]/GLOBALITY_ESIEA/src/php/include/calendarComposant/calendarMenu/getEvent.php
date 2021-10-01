<?php
    global $db;
    $_GET['date'] = htmlspecialchars($_GET['date']);
    $getCptEventSQL = "SELECT title, dateEvent, description, type, id FROM calendar WHERE idUser = :idUser AND dateEvent = :dateEvent";
    $getCptEvent = $db->prepare($getCptEventSQL);
    $getCptEvent->execute([
        'idUser'    => $_SESSION['id'],
        'dateEvent' => $_GET['date'],
    ]);
    $eventDate = array();
    $cptEventPerDay = 0;
    while ($eventDay = $getCptEvent->fetch()) {
        array_push($eventDate, $eventDay);
        $cptEventPerDay++;
    }

    if ($_SESSION['promo'] != 0) {
        $checkEventOrderSQL = "SELECT id, step, titleStep, contentOrder, deadLine FROM orderprojects WHERE year = :yearUser";
        $checkEventOrder = $db->prepare($checkEventOrderSQL);
        $checkEventOrder->execute(['yearUser' => $_SESSION['promo']]);

        $checkEventReportSQL = "SELECT * FROM reportorders WHERE year = :yearUser";
        $checkEventReport = $db->prepare($checkEventReportSQL);
        $checkEventReport->execute(['yearUser' => $_SESSION['promo']]);
    } else {
        $checkEventOrderSQL = "SELECT id, step, titleStep, contentOrder, deadLine FROM orderprojects WHERE year BETWEEN 2 AND 5";
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

    if ($_SESSION['promo'] == 0) {
        $PSTofFollower = getPSTForFollower($_SESSION['id']);
        $cptProjectOfFollower = getSizeArray($PSTofFollower);

        $datesProjectMeeting = array();
        $cptProjectMeeting = 0;

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
                    $cptProjectMeeting++;
                }
            } else {
                echo 'Erreur lors du chargement des évènements de tous les projets suivie ! </br>';
            }
        }
    }
 ?>

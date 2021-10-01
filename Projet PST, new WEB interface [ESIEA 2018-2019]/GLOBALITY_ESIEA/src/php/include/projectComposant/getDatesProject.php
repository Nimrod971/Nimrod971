<?php
    global $db;
    global $project;

    date_default_timezone_set('Europe/Paris');
    $today = date('Y-m-d');

    $dateProject = array();
    $user = getStudentWithId($project['idProjectManager']);

    $getDateProjectSQL = "SELECT * FROM calendar WHERE idUser = :id1 OR idUser = :id2 OR idUser = :id3 OR idUser = :id4 OR idUser = :id5";
    $getDateProject = $db->prepare($getDateProjectSQL);
    $getDateProject->execute([
        'id1' => $project['idProjectManager'],
        'id2' => $project['idMember2'],
        'id3' => $project['idMember3'],
        'id4' => $project['idMember4'],
        'id5' => $project['idMember5'],
    ]);

    $cptDateProject = 0;

    if ($getDateProject) {
        while ($element = $getDateProject->fetch()) {
            $dif = strtotime($element['dateEvent']) - strtotime($today);
            $explodeDate = explode('-', $element['dateEvent']);

            if ($dif >= 0 && $user['promo'] == $project['year']) {
                array_push($dateProject, $element);
                $cptDateProject++;
            }
        }
    } else {
        echo "Issue with SQL query about dateProject </br>";
    }

    $checkProjectEventSQL = "SELECT * FROM orderprojects WHERE year = :yearUser AND deadLine IS NOT NULL";
    $checkProjectEvent = $db->prepare($checkProjectEventSQL);
    $checkProjectEvent->execute(['yearUser' => $project['year']]);
    $deadLineGLB = array();
    while ($projectDeadLine = $checkProjectEvent->fetch()) {
        $dif = strtotime($projectDeadLine['deadLine']) - strtotime($today);
        $explodeDate = explode('-', $projectDeadLine['deadLine']);

        if ($dif >= 0 && $user['promo'] == $project['year']) {
            array_push($deadLineGLB, $projectDeadLine);
        }
    }

 ?>

<?php
if (isset($_POST['formAddEvent'])) {
    extract($_POST);
    $titleEvent       = htmlspecialchars($titleEvent);
    $getDate          = htmlspecialchars($getDate);
    $descriptionEvent = htmlspecialchars($descriptionEvent);
    $selectType       = htmlspecialchars($selectType);

    if (!empty($titleEvent) && !empty($getDate) && !empty($selectType)) {
        if (empty($descriptionEvent)) $descriptionEvent = ' ';
        $queryAddEventSQL = "INSERT INTO calendar(idUser, title, dateEvent, description, type) VALUES(:idUser, :title, :dateEvent, :description, :type)";
        $queryAddEvent = $db->prepare($queryAddEventSQL);
        $queryAddEvent->execute([
            'idUser'      => $_SESSION['id'],
            'title'       => $titleEvent,
            'dateEvent'   => $getDate,
            'description' => $descriptionEvent,
            'type'        => $selectType,
        ]);
        if ($queryAddEvent) {
            echo 'Les données ont bien été tranféré dans la DB';
            if (!empty($_GET['date'])) {
                $_GET['date'] = htmlspecialchars($_GET['date']);
                echo '<script>window.location = "infoEvent.php?date='.$_GET['date'].'";</script>';
            } else
                echo '<script>window.location = "calendar.php";</script>';
        } else {
            echo 'Echec de transfert de données';
        }
    } else {
        echo 'Tous les champs n\'ont pas été remplis';
    }
}
?>

<?php
if (isset($_POST['formModifEvent'])) {
    global $db;
    extract($_POST);
    
    $titleEvent       = htmlspecialchars($titleEvent);
    $getDate          = htmlspecialchars($getDate);
    $descriptionEvent = htmlspecialchars($descriptionEvent);
    $selectType       = htmlspecialchars($selectType);
    $_GET['id']       = htmlspecialchars($_GET['id']);
    $_GET['date']     = htmlspecialchars($_GET['date']);

    if (!empty($titleEvent) && !empty($getDate) && !empty($selectType)) {
        if (empty($descriptionEvent)) $descriptionEvent = ' ';
        $modifEventSQL = "UPDATE calendar SET title = :title, dateEvent = :dateEvent, description = :description, type = :type WHERE id = :id";
        $modifEvent = $db->prepare($modifEventSQL);
        $modifEvent->execute([
            'title'       => $titleEvent,
            'dateEvent'   => $getDate,
            'description' => $descriptionEvent,
            'type'        => $selectType,
            'id'          => $_GET['id'],
        ]);
        if ($modifEvent) {
            $_GET['title'] = $titleEvent;
            $_GET['description'] = $descriptionEvent;
            $_GET['dateEvent'] = $getDate;
            $_GET['type'] = $selectType;
            echo '<script>window.location = "infoEvent.php?date='.$_GET['date'].'";</script>';
        } else {
            echo 'L\'évènement n\'a pas été modifié </br>';
        }
    } else {
        echo 'Toute les champs n\'ont pas été remplis';
    }
}
?>

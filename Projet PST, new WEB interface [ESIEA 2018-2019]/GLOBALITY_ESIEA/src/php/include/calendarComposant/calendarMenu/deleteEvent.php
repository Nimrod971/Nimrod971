<?php
if (isset($_POST['btnDeleteEvent'])) {
    global $db;
    extract($_POST);
    $_GET['title'] = htmlspecialchars($_GET['title']);
    $_GET['date']  = htmlspecialchars($_GET['date']);
    $_GET['id']  = htmlspecialchars($_GET['id']);


    if ($_GET['type'] == 'projectDeadLine') {
        $deleteEventSQL = "DELETE FROM orderprojects WHERE id = :id";
    } else {
        $deleteEventSQL = "DELETE FROM calendar WHERE id = :id";
    }
    $deleteEvent = $db->prepare($deleteEventSQL);
    $deleteEvent->execute(['id' => $_GET['id']]);

    if ($deleteEvent) {
        echo 'L\'évènement a bien été supprimé !,';
        echo '<script>window.location = "infoEvent.php?date='.$_GET['date'].'";</script>';
    } else {
        echo 'L\'évènement n\'a pas été supprimé !</br>';
    }
}
?>

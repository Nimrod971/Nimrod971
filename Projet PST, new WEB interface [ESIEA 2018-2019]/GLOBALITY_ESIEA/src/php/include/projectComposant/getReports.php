<?php
    function getAllReports() {
        global $db;
        $allReports = array();
        $getAllReportsSQL = "SELECT * FROM reportorders";
        $getAllReports = $db->prepare($getAllReportsSQL);
        $getAllReports->execute();

        if ($getAllReports) {
            // echo 'Order select work </br>';
            while ($tempTab = $getAllReports->fetch()) {
                array_push($allReports, $tempTab);
            }
            if (empty($allReports)) {
                // echo 'Orders hasn\'t been defined </br>';
            } else {
                // echo 'Orders has been defined </br>';
                return $allReports;
            }
        } else {
            echo 'Select order doesn\'t work';
        }
        return false;
    }

    function addReports($year, $type, $title, $description, $deadLine) {
        global $db;
        if ($deadLine != NULL) {
            $addNewReportSQL = "INSERT INTO reportorders(year, type, title, description, deadLine) VALUES (:year, :type, :title, :description, :deadLine)";
            $addNewReport = $db->prepare($addNewReportSQL);
            $addNewReport->execute([
                'year'         => $year,
                'type'         => $type,
                'title'        => $title,
                'description'  => $description,
                'deadLine'     => $deadLine,
            ]);
        } else {
            $addNewReportSQL = "INSERT INTO reportorders(year, type, title, description) VALUES (:year, :type, :title, :description)";
            $addNewReport = $db->prepare($addNewReportSQL);
            $addNewReport->execute([
                'year'         => $year,
                'type'         => $type,
                'title'        => $title,
                'description'  => $description,
            ]);
        }

        if ($addNewReport) {
            echo 'La consigne a été ajouter avec succès </br>';
            // echo '<script>window.location = "project.php";</script>';
        } else {
            echo 'La consigne n\'a pas été ajouter </br>';
        }
    }

    function removeReport($id) {
        global $db;
        $removeReportSQL = "DELETE FROM reportorders WHERE id = :id";
        $removeReport = $db->prepare($removeReportSQL);
        $removeReport->execute(['id' => $id]);

        if ($removeReport) {
            echo 'La consigne a été supprimé </br>';
            // echo '<script>window.location = "project.php";</script>';
        } else {
            echo 'La consigne n\'a pas été supprimé';
        }
    }

    function reportByYear($year) {
        $getReports   = getAllReports();
        $reportByYear = array();
        $i            = 0;

        while (isset($getReports[$i])) {
            if ($getReports[$i]['year'] == $year) array_push($reportByYear, $getReports[$i]);
            $i++;
        }

        return $reportByYear;
    }
 ?>

<?php
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////     GENERAL FUNCTIONS     ///////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function getSizeArray($array) {
        $cpt = 0;
        while (isset($array[$cpt])) {
            $cpt++;
        }
        return $cpt;
    }

    function printWithoutExtension($element) {
        return substr($element, 0, strrpos($element, "."));
    }

    function printDate($date) {
        $tmpDate = explode("-", $date);
        // var_dump($tmpDate);

        if ($tmpDate[1] == 1)       $month = "Janvier";
        else if ($tmpDate[1] == 2)  $month = "Février";
        else if ($tmpDate[1] == 3)  $month = "Mars";
        else if ($tmpDate[1] == 4)  $month = "Avril";
        else if ($tmpDate[1] == 5)  $month = "Mai";
        else if ($tmpDate[1] == 6)  $month = "Juin";
        else if ($tmpDate[1] == 7)  $month = "Juillet";
        else if ($tmpDate[1] == 8)  $month = "Aout";
        else if ($tmpDate[1] == 9)  $month = "Septembre";
        else if ($tmpDate[1] == 10) $month = "Octobre";
        else if ($tmpDate[1] == 11) $month = "Novembre";
        else if ($tmpDate[1] == 12) $month = "Décembre";
        else $month = "ERROR MONTH";

        $newDate = $tmpDate[2].' '.$month.' '.$tmpDate[0];

        return $newDate;
    }

    function shortString($string, $length) {
        if (strlen($string) > $length) {
            $string = substr($string, 0, $length);
            $string = $string.'...';
        }
        return $string;
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////       FUNCTIONS ADD PROJECTS      ///////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // FONCTION QUI VERIFIE LA DISPONIBILTE D'UN MEMBRE
    function checkAvailableMember($idMember, $titlePST, $year) {
        global $db;
        $querySQL = "SELECT * FROM projects WHERE year = :year AND (idProjectManager = :idProjectManager OR idMember2 = :idMember2 OR idMember3 = :idMember3 OR idMember4 = :idMember4 OR idMember5 = :idMember5)";
        $query    = $db->prepare($querySQL);
        $query->execute([
            'year'             => $year,
            'idProjectManager' => $idMember,
            'idMember2'        => $idMember,
            'idMember3'        => $idMember,
            'idMember4'        => $idMember,
            'idMember5'        => $idMember,
        ]);
        $tab = $query->fetch();

        if ($tab['idProjectManager'] == $idMember) return false;
        else if ($tab['idMember2'] == $idMember) return false;
        else if ($tab['idMember3'] == $idMember) return false;
        else if ($tab['idMember4'] == $idMember) return false;
        else if ($tab['idMember5'] == $idMember) return false;
        else if ($tab == false) return false;
        else return true;
    }

    // FONCTION QUI CONVERTIE LE NOM EN IDENTIFIANT PAR RAPPORT A LA BASE DE DONNEE
    function convertNameToID($memberName) {
        global $db;
        $selectMembersIDSQL = "SELECT * FROM users WHERE username = :memberName";
        $selectMembersID = $db->prepare($selectMembersIDSQL);
        $selectMembersID->execute(['memberName' => $memberName]);
        $idInfo = $selectMembersID->fetch();

        if (!$idInfo) $id = 0;
        else $id = $idInfo['id'];

        return $id;
    }


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////// FUNCTIONS ACTIONS PROJECTS //////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function getActionsByProjects($idProject) {
        global $db;
        $actionsByProject = array();
        $getActionsSQL    = "SELECT * FROM actionsinproject WHERE idProject = :idProject";
        $getActions       = $db->prepare($getActionsSQL);
        $getActions->execute(['idProject' => $idProject]);

        while ($element = $getActions->fetch()) {
            array_push($actionsByProject, $element);
        }
        return $actionsByProject;
    }

    function addAction($idProject, $idUser, $title, $description) {
        global $db;
        $addActionSQL = "INSERT INTO actionsinproject(idProject, idAuthor, title, description) VALUES (:idProject, :idAuthor, :title, :description)";
        $addActions    = $db->prepare($addActionSQL);
        $addActions->execute([
            'idProject'   => $idProject,
            'idAuthor'    => $idUser,
            'title'       => $title,
            'description' => $description,
        ]);

        if ($addActions) echo 'addNewAction Success ! </br>';
        else echo 'Error addNewAction ! </br>';
    }


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////   FUNCTIONS GET PROJECTS   ////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function convertIdToName($idToConvert) {
        global $db;
        $querySQL = "SELECT username FROM users WHERE id = :id";
        $query    = $db->prepare($querySQL);
        $query->execute(['id' => $idToConvert]);
        $member = $query->fetch();

        return $member['username'];
    }

    function getPSTForUser($idUser) {
        global $db;
        $getPSTSQL = "SELECT * FROM projects WHERE idProjectManager = :idProjectManager OR idMember2 = :idMember2 OR idMember3 = :idMember3 OR idMember4 = :idMember4 OR idMember5 = :idMember5";
        $getPST   = $db->prepare($getPSTSQL);
        $getPST->execute([
            'idProjectManager' => $idUser,
            'idMember2'        => $idUser,
            'idMember3'        => $idUser,
            'idMember4'        => $idUser,
            'idMember5'        => $idUser,
        ]);

        return $getPST;
    }

    function getPSTForFollower($idFollower) {
        global $db;
        $followPST = array();

        $getPSTSQL = "SELECT * FROM projects WHERE idFollower = :idFollower";
        $getPST    = $db->prepare($getPSTSQL);
        $getPST->execute(['idFollower' => $idFollower]);

        while ($element = $getPST->fetch()) {
            array_push($followPST, $element);
        }

        return $followPST;
    }

    function getPSTWithName($name) {
        global $db;
        $pstArray = array();

        $getPSTSQL = "SELECT * FROM projects WHERE name = :name";
        $getPST   = $db->prepare($getPSTSQL);
        $getPST->execute(['name' => $name]);

        $pstArray = $getPST->fetch();

        return $pstArray;
    }

    function getAllPST() {
        global $db;
        $allPST = array();

        $getAllPSTSQL = "SELECT * FROM projects";
        $getAllPST    = $db->prepare($getAllPSTSQL);
        $getAllPST->execute();

        while ($element = $getAllPST->fetch()) {
            array_push($allPST, $element);
        }

        return $allPST;
    }

    function getPSTByYear($year) {
        global $db;
        $yearPST = array();

        $getPSTSQL = "SELECT * FROM projects WHERE year = :year";
        $getPST    = $db->prepare($getPSTSQL);
        $getPST->execute(['year' => $year]);

        while ($element = $getPST->fetch()) {
            array_push($yearPST, $element);
        }

        return $yearPST;
    }



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////    FUNCTIONS INFO PROJECTS   //////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function getProject($idUser, $year) {
        $allPST = getPSTForUser($idUser);
         while ($project = $allPST->fetch()) {
             if ($project['year'] == $year) return $project;
         }
    }

    function getStudentWithId($id) {
        global $db;
        $getStudentSQL = "SELECT * FROM users WHERE id = :id";
        $getStudent = $db->prepare($getStudentSQL);
        $getStudent->execute(['id' => $id]);
        return $getStudent->fetch();
    }

    function getInfoEvent($id) {
        global $db;
        $querySQL = "SELECT * FROM calendar WHERE id = :id";
        $query = $db->prepare($querySQL);
        $query->execute(['id' => $id]);
        return $query->fetch();
    }


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////// FUNCTIONS ORDER PROJECTS //////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function getAllOrders() {
        global $db;
        $allOrders = array();
        $getAllOrdersSQL = "SELECT * FROM orderprojects";
        $getAllOrders = $db->prepare($getAllOrdersSQL);
        $getAllOrders->execute();

        if ($getAllOrders) {
            // echo 'Order select work </br>';
            while ($tempTab = $getAllOrders->fetch()) {
                array_push($allOrders, $tempTab);
            }
            if (empty($allOrders)) {
                // echo 'Orders hasn\'t been defined </br>';
            } else {
                // echo 'Orders has been defined </br>';
                return $allOrders;
            }
        } else {
            echo 'Select order doesn\'t work';
        }
        return false;
    }


    function addOrder($year, $step, $contentOrder, $deadLine) {
        global $db;
        if ($step == 0) $titleStep = 'Initialisation';
        if ($step == 1) $titleStep = 'Confirmation';
        if ($step == 2) $titleStep = 'Lancement';
        if ($step == 3) $titleStep = 'Réalisation';
        if ($step == 4) $titleStep = 'Finalisation';

        if ($deadLine != NULL) {
            $addNewOrderSQL = "INSERT INTO orderprojects(year, step, titleStep, contentOrder, deadLine) VALUES (:year, :step, :titleStep, :contentOrder, :deadLine)";
            $addNewOrder = $db->prepare($addNewOrderSQL);
            $addNewOrder->execute([
                'year'         => $year,
                'step'         => $step,
                'titleStep'    => $titleStep,
                'contentOrder' => $contentOrder,
                'deadLine'     => $deadLine,
            ]);
        } else {
            $addNewOrderSQL = "INSERT INTO orderprojects(year, step, titleStep, contentOrder) VALUES (:year, :step, :titleStep, :contentOrder)";
            $addNewOrder = $db->prepare($addNewOrderSQL);
            $addNewOrder->execute([
                'year'         => $year,
                'step'         => $step,
                'titleStep'    => $titleStep,
                'contentOrder' => $contentOrder,
            ]);
        }

        if ($addNewOrder) {
            echo 'La consigne a été ajouter avec succès </br>';
            // echo '<script>window.location = "project.php";</script>';
        } else {
            echo 'La consigne n\'a pas été ajouter </br>';
        }
    }

    function getTitleStepOrder() {
        $titleStep = array('Initialisation', 'Confirmation', 'Lancement', 'Réalisation', 'Finalisation');

        return $titleStep;
    }

    function removeOrder($id) {
        global $db;
        $removeOrderSQL = "DELETE FROM orderprojects WHERE id = :id";
        $removeOrder = $db->prepare($removeOrderSQL);
        $removeOrder->execute(['id' => $id]);

        if ($removeOrder) {
            echo 'La consigne a été supprimé </br>';
            // echo '<script>window.location = "project.php";</script>';
        } else {
            echo 'La consigne n\'a pas été supprimé';
        }
    }

    function countStep($step) {
        $getOrders = getAllOrders();
        $cptStep = 0;
        $i       = 0;

        while (isset($getOrders[$i])) {
            if ($getOrders[$i]['step'] == $step) $cptStep++;
            $i++;
        }

        return $cptStep;
    }

    function getMaxStep($allOrders) {
        $i       = 0;
        $maxStep = 0;

        while (isset($allOrders[$i])) {
            if ($allOrders[$i]['step'] > $maxStep) $maxStep = $allOrders[$i]['step'];
            $i++;
        }

        return $maxStep+1;
    }

    function orderByStepAndYear($step, $year) {
        $getOrders   = getAllOrders();
        $orderByStep = array();
        $i           = 0;

        while (isset($getOrders[$i])) {
            if ($getOrders[$i]['step'] == $step && $getOrders[$i]['year'] == $year) array_push($orderByStep, $getOrders[$i]);
            $i++;
        }

        return $orderByStep;
    }


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////// FUNCTIONS SHARE FILES //////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function printZIP($path, $element, $title) {
        echo '
            <a href="'.$path.$element.'" class="element" targer="_blank">
                <i class="fas fa-file-archive"></i>
                <h5 class="subtitle">'.$title.'</h5>
            </a>
        ';
    }

    function printPDF($path, $element, $title) {
        echo '
            <a href="'.$path.$element.'" class="element" target="_blank">
                <i  class="fas fa-file-pdf"></i>
                <h5 class="subtitle">'.$title.'</h5>
            </a>
        ';
    }

    function printWORD($path, $element, $title) {
        echo '
            <a href="'.$path.$element.'" class="element" target="_blank">
                <i  class="fas fa-file-word"></i>
                <h5 class="subtitle">'.$title.'</h5>
            </a>
        ';
    }

    function printEXCEL($path, $element, $title) {
        echo '
            <a href="'.$path.$element.'" class="element" target="_blank">
                <i  class="fas fa-file-excel"></i>
                <h5 class="subtitle">'.$title.'</h5>
            </a>
        ';
    }

    function printPOWERPOINT($path, $element, $title) {
        echo '
            <a href="'.$path.$element.'" class="element" target="_blank">
                <i  class="fas fa-file-powerpoint"></i>
                <h5 class="subtitle">'.$title.'</h5>
            </a>
        ';
    }

    function printC($path, $element, $title) {
        echo '
            <a href="'.$path.$element.'" class="element" target="_blank">
                <i  class="fab fa-cuttlefish"></i>
                <h5 class="subtitle">'.$title.'</h5>
            </a>
        ';
    }

    function printHTML($path, $element, $title) {
        echo '
            <a href="'.$path.$element.'" class="element" target="_blank">
                <i  class="fab fa-html5"></i>
                <h5 class="subtitle">'.$title.'</h5>
            </a>
        ';
    }

    function printCSS($path, $element, $title) {
        echo '
            <a href="'.$path.$element.'" class="element" target="_blank">
                <i  class="fab fa-css3-alt"></i>
                <h5 class="subtitle">'.$title.'</h5>
            </a>
        ';
    }

    function printPHP($path, $element, $title) {
        echo '
            <a href="'.$path.$element.'" class="element" target="_blank">
                <i  class="fab fa-php"></i>
                <h5 class="subtitle">'.$title.'</h5>
            </a>
        ';
    }

    function printJS($path, $element, $title) {
        echo '
            <a href="'.$path.$element.'" class="element" target="_blank">
                <i  class="fab fa-js"></i>
                <h5 class="subtitle">'.$title.'</h5>
            </a>
        ';
    }

    function printJAVA($path, $element, $title) {
        echo '
            <a href="'.$path.$element.'" class="element" target="_blank">
                <i  class="fab fa-java"></i>
                <h5 class="subtitle">'.$title.'</h5>
            </a>
        ';
    }

    function printPY($path, $element, $title) {
        echo '
            <a href="'.$path.$element.'" class="element" target="_blank">
                <i  class="fab fa-python"></i>
                <h5 class="subtitle">'.$title.'</h5>
            </a>
        ';
    }

    function printDOCUMENT($path, $element, $title) {
        echo '
            <a href="'.$path.$element.'" class="element" target="_blank">
                <i class="fas fa-file"></i>
                <h5 class="subtitle">'.$title.'</h5>
            </a>
        ';
    }

    function printPICTURES($path, $element, $title) {
        echo '
            <a href="'.$path.$element.'" class="element" target="_blank">
                <i class="fas fa-image"></i>
                <h5 class="subtitle">'.$title.'</h5>
            </a>
        ';
    }


    function printElement($path, $element) {
        // echo 'Element Name : '.$element.'</br>';
        // echo 'Path Element : '.$path.'</br>';
        $fileExtension = explode('.', $element);
        $fileExtension = strtolower(end($fileExtension));
        $title = printWithoutExtension($element);
        $title = shortString($title, 32);


        if ($fileExtension == "zip")       printZIP($path, $element, $title);
        else if ($fileExtension == "pdf")  printPDF($path, $element, $title);
        else if ($fileExtension == "docx" || $fileExtension == 'odt' || $fileExtension == 'ott') printWORD($path, $element, $title);
        else if ($fileExtension == "xlsx" || $fileExtension == 'ods' || $fileExtension == 'ots') printEXCEL($path, $element, $title);
        else if ($fileExtension == "pptx" || $fileExtension == 'odp' || $fileExtension == 'otp') printPOWERPOINT($path, $element, $title);
        else if ($fileExtension == "c")    printC($path, $element, $title);
        else if ($fileExtension == "html") printHTML($path, $element, $title);
        else if ($fileExtension == "css")  printCSS($path, $element, $title);
        else if ($fileExtension == "php")  printPHP($path, $element, $title);
        else if ($fileExtension == "js")   printJS($path, $element, $title);
        else if ($fileExtension == "java") printJAVA($path, $element, $title);
        else if ($fileExtension == "py")   printPY($path, $element, $title);
        else {
            if (basename($path) == 'files') printDOCUMENT($path, $element, $title);
            if (basename($path) == 'pictures') printPICTURES($path, $element, $title);
        }
    }

    function printDeleteElement($type, $element, $i) {
        $fileExtension = explode('.', $element);
        $fileExtension = strtolower(end($fileExtension));
        $title = printWithoutExtension($element);
        $title = shortString($title, 12);

        $title = $title.'.'.$fileExtension;

        echo '<input type="submit" name="formDelete'.$type.'-'.$i.'" id="formDelete'.$type.'-'.$i.'" style="display: none;">';
        echo '<label for="formDelete'.$type.'-'.$i.'">';
        echo '<i class="fas fa-minus-circle"></i>';
        echo '<h5 class="subtitle">'.$title.'</h5>';
        echo '</label>';
    }



 ?>

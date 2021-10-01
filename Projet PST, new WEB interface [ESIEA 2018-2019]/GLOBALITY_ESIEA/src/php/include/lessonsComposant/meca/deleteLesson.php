<?php
    for ($i = 0; $i < $nbLessonsS1; $i++) {
        $_GET['promo'] = htmlspecialchars($_GET['promo']);
        $pathToDelete = '../../../src/data/class/'.$_SESSION['username'].'/'.$_GET['promo'].'/meca/LessonsS1/';
        if (isset($_POST['deleteLessonS1-'.$i])) {
            $tmpPath = $pathToDelete;
            $tmpPath = $tmpPath.$titlesLessonsS1[$i];
            if(!unlink($tmpPath)) {
                echo $titlesLessonsS1[$i].' n\'a pas été supprimé </br>';
            } else {
                echo $titlesLessonsS1[$i].' a été supprimé </br>';
                echo '<script>window.location="infoMecanic.php?promo='.$_GET['promo'].'"</script>';
            }
        }
    }

    for ($i = 0; $i < $nbLessonsS2; $i++) {
        $_GET['promo'] = htmlspecialchars($_GET['promo']);
        $pathToDelete = '../../../src/data/class/'.$_SESSION['username'].'/'.$_GET['promo'].'/meca/LessonsS2/';
        if (isset($_POST['deleteLessonS2-'.$i])) {
            $tmpPath = $pathToDelete;
            $tmpPath = $tmpPath.$titlesLessonsS2[$i];
            if(!unlink($tmpPath)) {
                echo $titlesLessonsS1[$i].' n\'a pas été supprimé </br>';
            } else {
                echo $titlesLessonsS1[$i].' a été supprimé </br>';
                echo '<script>window.location="infoMecanic.php?promo='.$_GET['promo'].'"</script>';
            }
        }
    }

    for ($i = 0; $i < $nbFilePerso; $i++) {
        $_GET['promo'] = htmlspecialchars($_GET['promo']);
        $pathToDelete = '../../../src/data/class/'.$_SESSION['username'].'/'.$_GET['promo'].'/meca/filePerso/';
        if (isset($_POST['formDeleteFile-'.$i])) {
            $tmpPath = $pathToDelete;
            $tmpPath = $tmpPath.$titlesFilePerso[$i];
            if(!unlink($tmpPath)) {
                echo $titlesFilePerso[$i].' n\'a pas été supprimé </br>';
            } else {
                echo $titlesFilePerso[$i].' a été supprimé </br>';
                echo '<script>window.location="infoMecanic.php?promo='.$_GET['promo'].'"</script>';
            }
        }
    }


    $deleteTest  = 0;
    $cptFile     = 0;
    $titlesFiles = array();
    if (isset($_POST['formDeleteLessonS1'])) {
        $_GET['promo'] = htmlspecialchars($_GET['promo']);
        $pathToDelete = '../../../src/data/class/'.$_SESSION['username'].'/'.$_GET['promo'].'/meca/LessonsS1/';
        $cptFile = $nbLessonsS1;
        $titlesFiles = $titlesLessonsS1;
        $deleteTest = 1;
    }

    if (isset($_POST['formDeleteLessonS2'])) {
        $_GET['promo'] = htmlspecialchars($_GET['promo']);
        $pathToDelete = '../../../src/data/class/'.$_SESSION['username'].'/'.$_GET['promo'].'/meca/LessonsS2/';
        $cptFile = $nbLessonsS2;
        $titlesFiles = $titlesLessonsS2;
        $deleteTest = 1;
    }

    if (isset($_POST['formDeleteTDS1'])) {
        $_GET['promo'] = htmlspecialchars($_GET['promo']);
        $pathToDelete = '../../../src/data/class/'.$_SESSION['username'].'/'.$_GET['promo'].'/meca/TDS1/';
        $cptFile = $nbTDS1;
        $titlesFiles = $titlesTDS1;
        $deleteTest = 1;
    }

    if (isset($_POST['formDeleteTPS1'])) {
        $_GET['promo'] = htmlspecialchars($_GET['promo']);
        $pathToDelete = '../../../src/data/class/'.$_SESSION['username'].'/'.$_GET['promo'].'/meca/TPS1/';
        $cptFile = $nbTPS1;
        $titlesFiles = $titlesTPS1;
        $deleteTest = 1;
    }

    if (isset($_POST['formDeleteTDS2'])) {
        $_GET['promo'] = htmlspecialchars($_GET['promo']);
        $pathToDelete = '../../../src/data/class/'.$_SESSION['username'].'/'.$_GET['promo'].'/meca/TDS2/';
        $cptFile = $nbTDS2;
        $titlesFiles = $titlesTDS2;
        $deleteTest = 1;
    }

    if (isset($_POST['formDeleteTPS2'])) {
        $_GET['promo'] = htmlspecialchars($_GET['promo']);
        $pathToDelete = '../../../src/data/class/'.$_SESSION['username'].'/'.$_GET['promo'].'/meca/TPS2/';
        $cptFile = $nbTPS2;
        $titlesFiles = $titlesTPS2;
        $deleteTest = 1;
    }

    if (isset($_POST['formDeleteProjects'])) {
        $_GET['promo'] = htmlspecialchars($_GET['promo']);
        $pathToDelete = '../../../src/data/class/'.$_SESSION['username'].'/'.$_GET['promo'].'/meca/Projects/';
        $cptFile = $nbProject;
        $titlesFiles = $titlesProjects;
        $deleteTest = 1;
    }

    if ($deleteTest) {
        $_GET['promo'] = htmlspecialchars($_GET['promo']);
        // echo $cptFile;
        // var_dump($titlesFiles);
        for ($i = 0; $i < $cptFile; $i++) {
            $tmpPath = $pathToDelete;
            $tmpPath = $tmpPath.$titlesFiles[$i];
            if(!unlink($tmpPath)) {
                echo $titlesFiles[$i].' n\' pas été supprimé </br>';
            }
        }
        echo '<script>window.location="infoMecanic.php?promo='.$_GET['promo'].'"</script>';
    }
 ?>

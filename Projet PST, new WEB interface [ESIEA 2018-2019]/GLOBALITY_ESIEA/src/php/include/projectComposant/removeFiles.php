<?php
    if (isset($_POST['formDeleteDocuments'])) {
        include '../../../../src/php/include/projectComposant/blockForm/formDeleteDocuments.php';
    }

    if (isset($_POST['formDeletePictures'])) {
        include '../../../../src/php/include/projectComposant/blockForm/formDeletePictures.php';
    }

    for ($i = 2; $i <= $cptDocuments+1; $i++) {
        $pathToDelete = '../../../../src/data/projects/'.$project['name'].'/files/';
        if (isset($_POST['formDeleteDocument-'.$i])) {
            $_GET['year'] = htmlspecialchars($_GET['year']);
            echo 'formDeleteDocument-'.$i.' has been confirmed </br>';
            $tmpPath = $pathToDelete;
            $tmpPath = $tmpPath.$allDocuments[$i];
            echo '$allDocuments['.$i.'] : '.$allDocuments[$i].'</br>';
            echo 'tempPath : '.$tmpPath.'</br>';
            if(!unlink($tmpPath)) {
                echo $allDocuments[$i].' n\'a pas été supprimé </br>';
            } else {
                echo $allDocuments[$i].' a été supprimé </br>';
                echo '<script>window.location="shareFiles.php?year='.$_GET['year'].'"</script>';
            }
        }
    }

    for ($i = 2; $i <= $cptPictures+1; $i++) {
        $pathToDelete = '../../../../src/data/projects/'.$project['name'].'/pictures/';
        if (isset($_POST['formDeletePicture-'.$i])) {
            $_GET['year'] = htmlspecialchars($_GET['year']);
            echo 'formDeletePicture-'.$i.' has been confirmed </br>';
            $tmpPath = $pathToDelete;
            $tmpPath = $tmpPath.$allPictures[$i];
            echo '$allPictures['.$i.'] : '.$allPictures[$i].'</br>';
            echo 'tempPath : '.$tmpPath.'</br>';
            if(!unlink($tmpPath)) {
                echo $allPictures[$i].' n\'a pas été supprimé </br>';
            } else {
                echo $allPictures[$i].' a été supprimé </br>';
                echo '<script>window.location="shareFiles.php?year='.$_GET['year'].'"</script>';
            }
        }
    }
?>

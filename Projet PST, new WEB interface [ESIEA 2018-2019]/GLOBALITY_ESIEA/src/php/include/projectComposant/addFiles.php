<?php
    if (isset($_POST['formAddFile'])) {
        include '../../../../src/php/include/projectComposant/blockForm/formAddFiles.php';
    }

    if (isset($_FILES['addNewFile'])) {
        $_POST['type'] = htmlspecialchars($_POST['type']);
        
        // var_dump($_FILES);
        // var_dump($_POST);

        if ($_POST['type'] != 'default') {
            $totalFiles = count($_FILES['addNewFile']['name']);
            for ($i = 0; $i < $totalFiles; $i++) {
                $file_name  = $_FILES['addNewFile']['name'][$i];
                $file_type  = $_FILES['addNewFile']['type'][$i];
                $file_tmp   = $_FILES['addNewFile']['tmp_name'][$i];
                $file_size  = $_FILES['addNewFile']['size'][$i];
                $file_error = $_FILES['addNewFile']['error'][$i];

                $file_ext = explode('.', $file_name);
                $file_ext = strtolower(end($file_ext));

                if ($file_error === 0) {
                    if ($file_size < 2097152) {
                        $file_destination = '../../../../src/data/projects/'.$project['name'].'/'.$_POST['type'].'/'.$file_name;
                        if (!file_exists($file_destination)) {
                            if (move_uploaded_file($file_tmp, $file_destination)) {
                                include '../../../../src/php/include/lessonsComposant/moveFileSuccess.php';
                                echo '<script>window.location="shareFiles.php?year='.$_GET['year'].'"</script>';
                            } else {
                                include '../../../../src/php/include/lessonsComposant/moveFileDenied.php';
                            }
                        } else {
                            include '../../../../src/php/include/lessonsComposant/fileAlreadyExists.php';
                        }
                    }
                } else {
                    echo 'Error Uploading file ! </br>';
                }
            }
        } else {
            echo 'Error type file, please selet a type before uploading </br>';
        }
    }

    $pathToFiles  = '../../../../src/data/projects/'.$project['name'].'/';
    $allDocuments = scandir($pathToFiles.'files/');
    $allPictures  = scandir($pathToFiles.'pictures/');
    $cptDocuments = 2;
    $cptPictures  = 2;

    while (isset($allDocuments[$cptDocuments])) {
        $cptDocuments++;
    }
    while (isset($allPictures[$cptPictures])) {
        $cptPictures++;
    }

    $cptDocuments -= 2;
    $cptPictures -= 2;

    // var_dump($allDocuments);
    // var_dump($allPictures);
?>

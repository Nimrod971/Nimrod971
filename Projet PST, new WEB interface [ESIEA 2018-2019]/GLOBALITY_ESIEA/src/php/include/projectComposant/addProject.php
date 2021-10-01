<?php
    for ($i = 2; $i <= 5; $i++) {
        if (isset($_POST['formAddPST'.$i])) {
            $_POST['titleProject']   = htmlspecialchars($_POST['titleProject']);
            $_POST['projectManager'] = htmlspecialchars($_POST['projectManager']);
            $_POST['member2']        = htmlspecialchars($_POST['member2']);
            $_POST['member3']        = htmlspecialchars($_POST['member3']);
            $_POST['member4']        = htmlspecialchars($_POST['member4']);
            $_POST['member5']        = htmlspecialchars($_POST['member5']);
            $_POST['catProject']     = htmlspecialchars($_POST['catProject']);
            $_POST['description']    = htmlspecialchars($_POST['description']);
            // var_dump($_POST);

            // RECUPERE LES NOMS DES IDENTIFIANTS DES MEMBRES A PARTIR DES NOMS
            $idProjectManager  = convertNameToID($_POST['projectManager']);
            $idMember2         = convertNameToID($_POST['member2']);
            $idMember3         = convertNameToID($_POST['member3']);
            $idMember4         = convertNameToID($_POST['member4']);
            $idMember5         = convertNameToID($_POST['member5']);

            // VERIFIE LA DISPONIBILITE DES MEMBRES POUR LE PROJET
            $testMember1 = checkAvailableMember($idProjectManager, $_POST['titleProject'], $i);
            $testMember2 = checkAvailableMember($idMember2,        $_POST['titleProject'], $i);
            $testMember3 = checkAvailableMember($idMember3,        $_POST['titleProject'], $i);
            $testMember4 = checkAvailableMember($idMember4,        $_POST['titleProject'], $i);
            $testMember5 = checkAvailableMember($idMember5,        $_POST['titleProject'], $i);

            if (!is_dir('../../src/data/projects/')) {
                mkdir('../../src/data/projects/');
            }
            if ($idProjectManager != 0 || $idMember2 != 0 || $idMember3 != 0 || $idMember4 != 0 || $idMember5 != 0) {
                if ($testMember1 == true || $testMember2 == true || $testMember3 == true || $testMember4 == true || $testMember5 == true) {
                    echo 'Impossible de créer le projet, un membre (ou plus) est déjà engagé dans un autre projet pour cette année !</br>';
                } else {
                    if (is_dir('../../src/data/projects/'.$_POST['titleProject'])) {
                        echo 'Impossible de créer ce projet car il existe déjà ! </br>';
                    } else {
                        mkdir('../../src/data/projects/'.$_POST['titleProject'].'/');
                        mkdir('../../src/data/projects/'.$_POST['titleProject'].'/shares/');
                        mkdir('../../src/data/projects/'.$_POST['titleProject'].'/files/');
                        mkdir('../../src/data/projects/'.$_POST['titleProject'].'/pictures/');
                        mkdir('../../src/data/projects/'.$_POST['titleProject'].'/report/');
                        $addNewProjectSQL = "INSERT INTO projects(year, category, idProjectManager, idMember2, idMember3, idMember4, idMember5, name, idFollower, description) VALUES(:year, :category, :idProjectManager, :idMember2, :idMember3, :idMember4, :idMember5, :name, :idFollower, :description)";
                        $addNewProject    = $db->prepare($addNewProjectSQL);
                        $addNewProject->execute([
                            'year'             => $i,
                            'category'         => $_POST['catProject'],
                            'idProjectManager' => intval($idProjectManager),
                            'idMember2'        => intval($idMember2),
                            'idMember3'        => intval($idMember3),
                            'idMember4'        => intval($idMember4),
                            'idMember5'        => intval($idMember5),
                            'name'             => $_POST['titleProject'],
                            'idFollower'       => 0,
                            'description'      => $_POST['description'],
                        ]);

                        if ($addNewProject) {
                            echo 'Le nouveau projet à bien été ajouter !</br>';
                            echo '<script>window.location = "project.php";</script>';
                        } else {
                            echo 'Un problème est survenue </br>';
                        }
                    }
                }
            } else {
                echo 'idProjectManager : '.$idProjectManager.'</br>';
                echo 'idMember2 : '.$idMember2.'</br>';
                echo 'idMember3 : '.$idMember3.'</br>';
                echo 'idMember4 : '.$idMember4.'</br>';
                echo 'idMember5 : '.$idMember5.'</br>';
                echo 'Impossible de créer le projet. Aucun membre n\'est reconnue dans nos données.</br>';
            }
        }
    }

    if(isset($_FILES['input-logoPST'])) {
        $_GET['year'] = htmlspecialchars($_GET['year']);
        // var_dump($_POST);
        // var_dump($_FILES);
        $file_name  = $_FILES['input-logoPST']['name'];
        $file_type  = $_FILES['input-logoPST']['type'];
        $file_tmp   = $_FILES['input-logoPST']['tmp_name'];
        $file_size  = $_FILES['input-logoPST']['size'];
        $file_error = $_FILES['input-logoPST']['error'];

        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));

        $allowed = array('png');

        if (in_array($file_ext, $allowed)) {
            if ($file_error === 0) {
                if ($file_size < 2097152) {
                    $file_destination = '../../../../src/data/projects/'.$project['name'].'/pictures/logo.png';
                    if (!file_exists($file_destination)) {
                        if (move_uploaded_file($file_tmp, $file_destination)) {
                            include '../../../../src/php/include/lessonsComposant/moveFileSuccess.php';
                            echo '<script>window.location="infoProject?year='.$_GET['year'].'"</script>';
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
        } else {
            echo 'Format incompatible ! </br>';
        }
    }

    if (isset($_POST['deleteLogo'])) {
        $_GET['year'] = htmlspecialchars($_GET['year']);
        unlink($pathToJacketOfPST);
        echo '<script>window.location="infoProject?year='.$_GET['year'].'"</script>';
    }


    if (isset($_POST['formUpdateInfo'])) {
        $_POST['member1']        = htmlspecialchars($_POST['member1']);
        $_POST['member2']        = htmlspecialchars($_POST['member2']);
        $_POST['member3']        = htmlspecialchars($_POST['member3']);
        $_POST['member4']        = htmlspecialchars($_POST['member4']);
        $_POST['member5']        = htmlspecialchars($_POST['member5']);
        $_POST['descriptionPST'] = htmlspecialchars($_POST['descriptionPST']);
        $_GET['title']           = htmlspecialchars($_GET['title']);
        $_GET['year']            = htmlspecialchars($_GET['year']);

        // RECUPERE LES NOMS DES IDENTIFIANTS DES MEMBRES A PARTIR DES NOMS
        $idMember1 = convertNameToID($_POST['member1']);
        $idMember2 = convertNameToID($_POST['member2']);
        $idMember3 = convertNameToID($_POST['member3']);
        $idMember4 = convertNameToID($_POST['member4']);
        $idMember5 = convertNameToID($_POST['member5']);

        $updateProjectSQL = "UPDATE projects SET idProjectManager = :id1, idMember2 = :id2, idMember3 = :id3, idMember4 = :id4, idMember5 = :id5, description = :descriptionPST WHERE id = :id";
        $updateProject    = $db->prepare($updateProjectSQL);
        $updateProject->execute([
            'id1' => $idMember1,
            'id2' => $idMember2,
            'id3' => $idMember3,
            'id4' => $idMember4,
            'id5' => $idMember5,
            'descriptionPST' => $_POST['descriptionPST'],
            'id' => $project['id'],
        ]);

        if ($updateProject) {
            echo 'Le projet a été mis à jour !</br>';
            echo '<script>window.location="infoProject?title='.$_GET['title'].'&year='.$_GET['year'].'"</script>';
        } else {
            echo 'Un problème est survenue </br>';
        }
    }

    function delete_directory($dirName) {
        if (is_dir($dirName)) $dir_handle = opendir($dirName);
        if (!$dir_handle) return false;
            while($file = readdir($dir_handle)) {
                if ($file != "." && $file != "..") {
                    if (!is_dir($dirName."/".$file))
                        unlink($dirName."/".$file);
                    else
                        delete_directory($dirName.'/'.$file);
               }
         }
         closedir($dir_handle);
         rmdir($dirName);
         return true;
    }

    function delete_data($projectID) {
        global $db;
        $queryProjectSQL = "DELETE FROM projects WHERE id = :id";
        $queryProject = $db->prepare($queryProjectSQL);
        $queryProject->execute(['id' => $projectID]);

        if ($queryProject) {
            echo 'The project has been deleted from database projects </br>';
        } else {
            echo 'The project has not been deleted from database </br>';
        }

        $queryActionSQL = "DELETE FROM actionsinproject WHERE idProject = :idProject";
        $queryAction = $db->prepare($queryActionSQL);
        $queryAction->execute(['idProject' => $projectID]);

        if ($queryAction) {
            echo 'The project has been deleted from database action </br>';
        } else {
            echo 'The project has not been deleted from database </br>';
        }
    }

    if (isset($_POST['formDeleteProject'])) {
        include '../../../../src/php/composantPage/confirmeQuery.php';
    }

    if (isset($_POST['formDeleteProjectYes'])) {
        $pathToProject = '../../../../src/data/projects/'.$project['name'].'/';
        echo $pathToProject.'</br>';
        delete_directory($pathToProject);
        delete_data($project['id']);
        echo '<script>window.location="../../project.php"</script>';
    }
 ?>

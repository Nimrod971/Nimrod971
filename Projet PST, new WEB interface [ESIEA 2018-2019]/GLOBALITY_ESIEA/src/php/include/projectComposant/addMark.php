<?php
    if (isset($_POST['formMarkProject']) && $project['idFollower'] == $_SESSION['id'] && htmlspecialchars($_POST['markProject']) >= 0 && htmlspecialchars($_POST['markProject'] <= 20)) {
        $_POST['markProject'] = htmlspecialchars($_POST['markProject']);
        $_GET['title']        = htmlspecialchars($_GET['title']);
        global $db;
        global $project;
        $markSQL = "UPDATE projects SET mark = :mark WHERE id = :id";
        $mark = $db->prepare($markSQL);
        $mark->execute([
            'mark' => $_POST['markProject'],
            'id'   => $project['id'],
        ]);

        if ($mark) {
            echo 'New mark has been insert into database ! </br>';
            echo '<script>window.location="infoPST.php?title='.$_GET['title'].'"</script>';
        } else {
            echo 'The mark hasn\'t been insert into database ! </br>';
        }
    }

    if (isset($_POST['formFollowPST'])) {
        $_GET['title'] = htmlspecialchars($_GET['title']);
        $followPST = "UPDATE projects SET idFollower = :idFollower WHERE id = :idProject";
        $follow = $db->prepare($followPST);
        $follow->execute(['idFollower' => $_SESSION['id'], 'idProject' => $project['id']]);

        if ($follow) {
            echo '<script>window.location="infoPST.php?title='.$_GET['title'].'"</script>';
        } else {
            echo "Une erreur est survenue, réessayer ! </br>";
        }
    }

    if (isset($_POST['formUnfollowPST'])) {
        $_GET['title'] = htmlspecialchars($_GET['title']);
        $followPST = "UPDATE projects SET idFollower = :idFollower WHERE id = :idProject";
        $follow = $db->prepare($followPST);
        $follow->execute(['idFollower' => 0, 'idProject' => $project['id']]);

        if ($follow) {
            echo '<script>window.location="infoPST.php?title='.$_GET['title'].'"</script>';
        } else {
            echo "Une erreur est survenue, réessayer ! </br>";
        }
    }
 ?>

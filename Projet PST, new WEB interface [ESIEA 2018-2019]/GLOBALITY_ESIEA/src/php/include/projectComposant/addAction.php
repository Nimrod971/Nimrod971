<?php
    if (isset($_POST['formAddAction'])) {
        $_POST['titleAction']       = htmlspecialchars($_POST['titleAction']);
        $_POST['descriptionAction'] = htmlspecialchars($_POST['descriptionAction']);
        $_GET['year']               = htmlspecialchars($_GET['year']);

        global $project;
        addAction($project['id'], $_SESSION['id'], $_POST['titleAction'], $_POST['descriptionAction']);
        echo '<script>window.location="progress.php?year='.$_GET['year'].'"</script>';
    }
 ?>

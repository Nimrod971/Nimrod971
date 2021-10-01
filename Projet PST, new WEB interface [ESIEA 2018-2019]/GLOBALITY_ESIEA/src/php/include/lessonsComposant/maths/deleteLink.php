<?php
    for ($i = 0; $i <= $nbLinkPerso; $i++) {
        if (isset($_POST['formDeleteLink-'.$i])) {
            $_GET['promo'] = htmlspecialchars($_GET['promo']);
            $addLinkSQL = "DELETE FROM lessons WHERE idUser = :idUser AND titleLink = :titleLink AND subject = :subject";
            $addLink    = $db->prepare($addLinkSQL);
            $addLink->execute([
                'idUser'    => $_SESSION['id'],
                'titleLink' => $titlesLinkPerso[$i],
                'subject'   => 'maths',
            ]);

            if ($addLink) {
                echo 'Lien inclue dans la DB </br>';
                echo '<script>window.location="infoMaths.php?promo='.$_GET['promo'].'"</script>';
            } else {
                echo 'input error !</br>';
            }
        }
    }
 ?>

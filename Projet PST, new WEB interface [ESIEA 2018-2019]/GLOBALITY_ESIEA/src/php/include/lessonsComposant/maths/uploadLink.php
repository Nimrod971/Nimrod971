<?php
    if (isset($_POST['formAddLink'])) {
        $_POST['linkTitle'] = htmlspecialchars($_POST['linkTitle']);
        $_POST['linkCopy']  = htmlspecialchars($_POST['linkCopy']);
        $_GET['promo']      = htmlspecialchars($_GET['promo']);
        $linkTitle = $_POST['linkTitle'];
        $linkCopy  = $_POST['linkCopy'];

        $addLinkSQL = "INSERT INTO lessons(idUser, promo, subject, titleLink, link) VALUES (:idUser, :promo, :subject, :titleLink, :link)";
        $addLink    = $db->prepare($addLinkSQL);
        $addLink->execute([
            'idUser'    => $_SESSION['id'],
            'promo'     => $_GET['promo'],
            'subject'   => 'maths',
            'titleLink' => $linkTitle,
            'link'      => $linkCopy,
        ]);

        if ($addLink) {
            echo 'Lien inclue dans la DB </br>';
            echo '<script>window.location="infoMaths.php?promo='.$_GET['promo'].'"</script>';
        } else {
            echo 'input error !</br>';
        }
    }
 ?>

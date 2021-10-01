<?php
    $_GET['promo'] = htmlspecialchars($_GET['promo']);
    $getLinkSQL = 'SELECT titleLink, link FROM lessons WHERE idUser = :idUser AND subject = :subject AND promo = :promo';
    $getLink    = $db->prepare($getLinkSQL);
    $getLink->execute([
        'idUser'  => $_SESSION['id'],
        'subject' => 'elec',
        'promo' => $_GET['promo'],
    ]);

    $nbLinkPerso     = 0;
    $titlesLinkPerso = array();
    $linkURL         = array();

    while ($element = $getLink->fetch()) {
        array_push($linkURL, $element['link']);
        array_push($titlesLinkPerso, $element['titleLink']);
        $nbLinkPerso++;
    }
 ?>

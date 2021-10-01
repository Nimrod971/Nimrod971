<?php
    // include '../../src/php/functions/project.php';
    // echo $_SESSION['id'];

    $getProjects = getPSTForUser($_SESSION['id']);

    $markOfPST            = array();
    $pathToJacketOfPST    = array();
    $titleOfPST           = array();
    $descriptionOfPST     = array();
    $typeOfPST            = array();
    $followerProjectOfPST = array();
    $projectManagerOfPST  = array();
    $member2OfPST         = array();
    $member3OfPST         = array();
    $member4OfPST         = array();
    $member5OfPST         = array();

    while ($e = $getProjects->fetch()) {
        // var_dump($e);
        $markOfPST[$e['year']]            = $e['mark'];
        $descriptionOfPST[$e['year']]     = $e['description'];
        $typeOfPST[$e['year']]            = $e['category'];
        $titleOfPST[$e['year']]           = $e['name'];
        $followerProjectOfPST[$e['year']] = convertIdToName($e['idFollower']);
        $projectManagerOfPST[$e['year']]  = convertIdToName($e['idProjectManager']);
        $member2OfPST[$e['year']]         = convertIdToName($e['idMember2']);
        $member3OfPST[$e['year']]         = convertIdToName($e['idMember3']);
        $member4OfPST[$e['year']]         = convertIdToName($e['idMember4']);
        $member5OfPST[$e['year']]         = convertIdToName($e['idMember5']);
        $pathToJacketOfPST[$e['year']]    = '../../src/data/projects/'.$e['name'].'/pictures/logo.png';
    }

    // var_dump($titleOfPST);
    // var_dump($projectManagerOfPST);
    // var_dump($member2OfPST);
    // var_dump($member3OfPST);
    // var_dump($member4OfPST);
    // var_dump($member5OfPST);

 ?>

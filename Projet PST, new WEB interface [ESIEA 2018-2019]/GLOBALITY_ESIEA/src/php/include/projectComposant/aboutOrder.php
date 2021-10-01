<?php
    if (isset($_POST['formAddOrder'])) {
        $_POST['selectStep']     = htmlspecialchars($_POST['selectStep']);
        $_POST['selectOrder']    = htmlspecialchars($_POST['selectOrder']);
        $_POST['selectDeadLine'] = htmlspecialchars($_POST['selectDeadLine']);

        for ($i = 2; $i <= 5; $i++) {
            if (isset($_POST['PST-'.$i])) addOrder($i, $_POST['selectStep'], $_POST['selectOrder'], $_POST['selectDeadLine']);
        }
        echo '<script>window.location="ordersPST.php?show=progress"</script>';
    }

    if (isset($_POST['formDeleteOrder'])) {
        $_GET['step'] = htmlspecialchars($_GET['step']);
        $_GET['year'] = htmlspecialchars($_GET['year']);

        global $orderByStep;
        $ordersToDelete = orderByStepAndYear($_GET['step'], $_GET['year']);
        // var_dump($_POST);
        // var_dump($orderByStep);
        $nbStep = countStep($_GET['step']);
        $i = 0;
        while (isset($ordersToDelete[$i])) {
            if (isset($_POST['deleteOrder-'.$i])) removeOrder($orderByStep[$_GET['step']][$i]['id']);
            $i++;
        }
        echo '<script>window.location="ordersPST.php?show=progress&year='.$_GET['year'].'&step='.$_GET['step'].'"</script>';
    }

    if (isset($_POST['formAddReport'])) {
        $_POST['typeReport']        = htmlspecialchars($_POST['typeReport']);
        $_POST['titleReport']       = htmlspecialchars($_POST['titleReport']);
        $_POST['descriptionReport'] = htmlspecialchars($_POST['descriptionReport']);
        $_POST['deadLineReport']    = htmlspecialchars($_POST['deadLineReport']);

        for ($i = 2; $i <= 5; $i++) {
            if (isset($_POST['PST-'.$i])) addReports($i, $_POST['typeReport'], $_POST['titleReport'], $_POST['descriptionReport'], $_POST['deadLineReport']);
        }
        echo '<script>window.location="ordersPST.php?show=reportFiles"</script>';
    }

    if (isset($_POST['formDeleteReport'])) {
        $_GET['year'] = htmlspecialchars($_GET['year']);

        global $reportByYear;
        $reportsToDelete = reportByYear($_GET['year']);
        // var_dump($_POST);
        // var_dump($reportByYear);
        $i = 0;
        while (isset($reportsToDelete[$i])) {
            if (isset($_POST['deleteReport-'.$i])) removeReport($reportsToDelete[$i]['id']);
            $i++;
        }
        echo '<script>window.location="ordersPST.php?show=reportFiles&year='.$_GET['year'].'"</script>';
    }


 ?>

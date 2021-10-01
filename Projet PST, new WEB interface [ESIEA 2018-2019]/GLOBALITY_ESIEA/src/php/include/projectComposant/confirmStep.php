<?php
    for ($i = 0; $i <= 4; $i++) {
        if (isset($_POST['formConfirmStep'.$i])) {
            $_GET['year'] = htmlspecialchars($_GET['year']);
            $_GET['step'] = htmlspecialchars($_GET['step']);
            
            echo 'enter in formConfirmStep'.$i.'</br>';
            $updateStepSQL = "UPDATE projects SET step = :step WHERE id = :id";
            $updateStep = $db->prepare($updateStepSQL);
            $updateStep->execute([
                'step' => $i+1,
                'id'   => $project['id'],
            ]);

            if (!$updateStep) {
                echo "L'étape ".$i." n'a pas été validé ! </br>";
            } else {
                echo '<script>window.location="progress.php?year='.$_GET['year'].'&step='.($_GET['step']+1).'"</script>';
            }
        }
    }
 ?>

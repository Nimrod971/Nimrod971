<?php
    if (isset($_POST['formAccessLessons'])) {
        if (!is_dir('../../src/data/class/')) {
            mkdir('../../src/data/class/');
        }
        // mkdir('../../src/data/class/'.$_SESSION['username'].'/', 0777);
        if (!is_dir('../../src/data/class/'.$_SESSION['username'].'/1/')) {
            mkdir('../../src/data/class/'.$_SESSION['username'].'/');
            $subject = array('info', 'elec', 'meca', 'maths');
            for ($i = 1; $i <= 3; $i++) {
                mkdir('../../src/data/class/'.$_SESSION['username'].'/'.$i.'/');
                for ($j = 0; $j < 4; $j++) {
                    mkdir('../../src/data/class/'.$_SESSION['username'].'/'.$i.'/'.$subject[$j].'/');

                    mkdir('../../src/data/class/'.$_SESSION['username'].'/'.$i.'/'.$subject[$j].'/LessonsS1/');
                    mkdir('../../src/data/class/'.$_SESSION['username'].'/'.$i.'/'.$subject[$j].'/LessonsS2/');
                    mkdir('../../src/data/class/'.$_SESSION['username'].'/'.$i.'/'.$subject[$j].'/TDS1/');
                    mkdir('../../src/data/class/'.$_SESSION['username'].'/'.$i.'/'.$subject[$j].'/TDS2/');
                    mkdir('../../src/data/class/'.$_SESSION['username'].'/'.$i.'/'.$subject[$j].'/TPS1/');
                    mkdir('../../src/data/class/'.$_SESSION['username'].'/'.$i.'/'.$subject[$j].'/TPS2/');
                    mkdir('../../src/data/class/'.$_SESSION['username'].'/'.$i.'/'.$subject[$j].'/Projects/');
                    mkdir('../../src/data/class/'.$_SESSION['username'].'/'.$i.'/'.$subject[$j].'/filePerso/');
                }
            }
            echo 'Votre dossier de stockage a été créer avec succès !';
        } else {
            echo 'Le dossier de leçon existe déjà !';
        }
    }

 ?>

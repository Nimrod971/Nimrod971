<?php
$_GET['promo'] = htmlspecialchars($_GET['promo']);

$dirLessonS1     = '../../../src/data/class/'.$_SESSION['username'].'/'.$_GET['promo'].'/maths/LessonsS1/';
$lessonS1        = scandir($dirLessonS1);
$titlesLessonsS1 = array();
$dirLessonS2     = '../../../src/data/class/'.$_SESSION['username'].'/'.$_GET['promo'].'/maths/LessonsS2/';
$lessonS2        = scandir($dirLessonS2);
$titlesLessonsS2 = array();

$dirTDS1         = '../../../src/data/class/'.$_SESSION['username'].'/'.$_GET['promo'].'/maths/TDS1/';
$TDS1            = scandir($dirTDS1);
$titlesTDS1      = array();
$dirTDS2         = '../../../src/data/class/'.$_SESSION['username'].'/'.$_GET['promo'].'/maths/TDS2/';
$TDS2            = scandir($dirTDS2);
$titlesTDS2      = array();

$dirTPS1         = '../../../src/data/class/'.$_SESSION['username'].'/'.$_GET['promo'].'/maths/TPS1/';
$TPS1            = scandir($dirTPS1);
$titlesTPS1      = array();
$dirTPS2         = '../../../src/data/class/'.$_SESSION['username'].'/'.$_GET['promo'].'/maths/TPS2/';
$TPS2            = scandir($dirTPS2);
$titlesTPS2      = array();

$dirProjects     = '../../../src/data/class/'.$_SESSION['username'].'/'.$_GET['promo'].'/maths/Projects/';
$Projects        = scandir($dirProjects);
$titlesProjects  = array();

$dirFilePerso     = '../../../src/data/class/'.$_SESSION['username'].'/'.$_GET['promo'].'/maths/filePerso/';
$filePerso        = scandir($dirFilePerso);
$titlesFilePerso  = array();

$nbLessonsS1 = 0;
$nbLessonsS2 = 0;
$nbTDS1      = 0;
$nbTPS1      = 0;
$nbTDS2      = 0;
$nbTPS2      = 0;
$nbProject   = 0;
$nbFilePerso = 0;
$nbLinkPerso = 0;

while(isset($lessonS1[$nbLessonsS1])) {
    if ($lessonS1[$nbLessonsS1] != '.' && $lessonS1[$nbLessonsS1] != '..')
    array_push($titlesLessonsS1, $lessonS1[$nbLessonsS1]);
    $nbLessonsS1++;
}

while(isset($lessonS2[$nbLessonsS2])) {
    if ($lessonS2[$nbLessonsS2] != '.' && $lessonS2[$nbLessonsS2] != '..')
    array_push($titlesLessonsS2, $lessonS2[$nbLessonsS2]);
    $nbLessonsS2++;
}

while(isset($TDS1[$nbTDS1])) {
    if ($TDS1[$nbTDS1] != '.' && $TDS1[$nbTDS1] != '..')
    array_push($titlesTDS1, $TDS1[$nbTDS1]);
    $nbTDS1++;
}

while(isset($TDS2[$nbTDS2])) {
    if ($TDS2[$nbTDS2] != '.' && $TDS2[$nbTDS2] != '..')
    array_push($titlesTDS2, $TDS2[$nbTDS2]);
    $nbTDS2++;
}

while(isset($TPS1[$nbTPS1])) {
    if ($TPS1[$nbTPS1] != '.' && $TPS1[$nbTPS1] != '..')
    array_push($titlesTPS1, $TPS1[$nbTPS1]);
    $nbTPS1++;
}

while(isset($TPS2[$nbTPS2])) {
    if ($TPS2[$nbTPS2] != '.' && $TPS2[$nbTPS2] != '..')
    array_push($titlesTPS2, $TPS2[$nbTPS2]);
    $nbTPS2++;
}

while(isset($Projects[$nbProject])) {
    if ($Projects[$nbProject] != '.' && $Projects[$nbProject] != '..')
    array_push($titlesProjects, $Projects[$nbProject]);
    $nbProject++;
}

while(isset($filePerso[$nbFilePerso])) {
    if ($filePerso[$nbFilePerso] != '.' && $filePerso[$nbFilePerso] != '..')
    array_push($titlesFilePerso, $filePerso[$nbFilePerso]);
    $nbFilePerso++;
}

$nbLessonsS1 -= 2;
$nbLessonsS2 -= 2;
$nbTDS1      -= 2;
$nbTPS1      -= 2;
$nbTDS2      -= 2;
$nbTPS2      -= 2;
$nbProject   -= 2;
$nbFilePerso -= 2;

// echo '</br></br></br>';
// echo 'nbLessonsS1 : '.$nbLessonsS1.'</br>';
// echo 'nbLessonsS2 : '.$nbLessonsS2.'</br>';
// echo 'nbTDS1 : '.$nbTDS1.'</br>';
// echo 'nbTDS2 : '.$nbTDS2.'</br>';
// echo 'nbTPS1 : '.$nbTPS1.'</br>';
// echo 'nbTPS2 : '.$nbTPS2.'</br>';
// echo 'nbProjects : '.$nbProject.'</br>';
// echo 'nbFilePerso : '.$nbFilePerso.'</br>';
// echo '</br></br>';
// echo $_SERVER['DOCUMENT_ROOT'].'</br>';
// echo $_SERVER['SCRIPT_FILENAME'].'</br>';
// echo getcwd().'</br>';
// var_dump($_SERVER);
 ?>

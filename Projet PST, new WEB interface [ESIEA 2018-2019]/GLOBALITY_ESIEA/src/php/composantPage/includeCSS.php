<?php
if ($_SESSION['theme'] == 1) {
    echo '<link rel="stylesheet" href="../../src/css/themes/colorDefault.css">';
    echo '<link rel="stylesheet" href="../../../src/css/themes/colorDefault.css">';
    echo '<link rel="stylesheet" href="../../../../src/css/themes/colorDefault.css">';
}
else if($_SESSION['theme'] == 2) {
    echo '<link rel="stylesheet" href="../../src/css/themes/colorLight.css">';
    echo '<link rel="stylesheet" href="../../../src/css/themes/colorLight.css">';
    echo '<link rel="stylesheet" href="../../../../src/css/themes/colorLight.css">';
}
else if ($_SESSION['theme'] == 3) {
    echo '<link rel="stylesheet" href="../../src/css/themes/darkYellow.css">';
    echo '<link rel="stylesheet" href="../../../src/css/themes/darkYellow.css">';
    echo '<link rel="stylesheet" href="../../../../src/css/themes/darkYellow.css">';
}
else if ($_SESSION['theme'] == 4) {
    echo '<link rel="stylesheet" href="../../src/css/themes/darkGreen.css">';
    echo '<link rel="stylesheet" href="../../../src/css/themes/darkGreen.css">';
    echo '<link rel="stylesheet" href="../../../../src/css/themes/darkGreen.css">';
}
else if ($_SESSION['theme'] == 5) {
    echo '<link rel="stylesheet" href="../../src/css/themes/darkCyan.css">';
    echo '<link rel="stylesheet" href="../../../src/css/themes/darkCyan.css">';
    echo '<link rel="stylesheet" href="../../../../src/css/themes/darkCyan.css">';
}
 ?>

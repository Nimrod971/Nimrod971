<?php
    session_start();
    if (empty($_SESSION)) {
        header("Location: ../../../../index.php");
    } else {
        include '../../../../src/database/database.php';
        include '../../../../src/php/composantPage/header.php';
        include '../../../../src/php/composantPage/includeCSS/teacher/dataProcessing.php';

        include '../../../../src/php/functions/project.php';
        global $db;
?>

<script src="../../../../src/js/scroll.js"       charset="utf-8"></script>
<script src="../../../../src/js/showButton.js"   charset="utf-8"></script>

<a href="../../project.php" class="returnMenu"><i class="fas fa-undo"></i></a>

<div class="header">
    <div class="header-content">
        <a href="ordersPST.php" class="header-title">Suivie des projets <blue>ESIEA</blue></a>
        <nav class="header-menu">
            <a href="" class="link">Réunions</a>
        </nav>
    </div>
</div>

<?php
    include '../../../../src/php/composantPage/footer.php';
    }
 ?>
